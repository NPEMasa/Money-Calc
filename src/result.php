<?php

# 税金関連クラス
require_once('lib/taxclass.php');

# 変数初期化
$thisAmount = 0;
$lastAmount = 0;
$age = 0;
$residentTax = 0;

if(isset($_POST['thisAmount']) && isset($_POST['lastAmount']) && isset($_POST['age']) && isset($_POST['insuranceFlag'])){

  # 入力値エスケープ処理後、変数へ格納
  $thisAmount = htmlspecialchars($_POST['thisAmount'], ENT_QUOTES, 'UTF-8');
  $lastAmount = htmlspecialchars($_POST['lastAmount'], ENT_QUOTES, 'UTF-8');
  $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
  $insuranceFlag = htmlspecialchars($_POST['insuranceFlag'], ENT_QUOTES, 'UTF-8');

  # string型をinteger型に変換
  $thisAmount = intval($thisAmount);
  $lastAmount = intval($lastAmount);
  $age = intval($age);
  $insuranceFlag = intval($insuranceFlag);

  # 課税所得金額 算出
  $tx = new Tax();
  $incomeDeduction = $tx->txincomeCalc($thisAmount);
  $txIncome = $thisAmount - 480000 - $incomeDeduction;

  # 所得税 算出
  $incomeTax = $tx->incometaxCalc($txIncome);

  # 住民税 算出
  $lyincomeDeduction = $tx->txincomeCalc($lastAmount);
  $lytxIncome = $lastAmount - $lyincomeDeduction;
  $residentTax = $tx->rtxCalc($lytxIncome);

  # 雇用保険料 算出
  $monthlyAmount = round($thisAmount / 12);
  $eInsurance = $tx->employinsuranceCalc($monthlyAmount);

  # 健康保険料・厚生年金保険料 算出
  $totalInsurance = 0;
  switch ($insuranceFlag) {
      # 厚生年金含む
      case 0:
        $hInsurance = $tx->healthinsuranceCalc($monthlyAmount, $age);
        $wpInsurance = $tx->wpinsuranceCalc($monthlyAmount);
        $totalInsurance = $hInsurance + $wpInsurance + $eInsurance;
        break;

      # 健康保険のみ
      case 1:
        $hInsurance = $tx->healthinsuranceCalc($monthlyAmount, $age);
        $totalInsurance = $hInsurance + $eInsurance;
        break;

      default:
        $totalInsurance = 0;

  }

  # 手取り年収/月収 算出
  $totalYamount = $thisAmount - $totalInsurance - $residentTax - $incomeTax;
  $totalMamount = $totalYamount / 12;

}
?>
<html>
  <head>

    <title> Total Income Calc Tool </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>
  <body>

  <main role="main">
    <div class="container">
        <h2>手取り計算ツール</h2>
      <div class="row">
          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                年収総額
              </div>
              <div class="card-body">
                <?php if(isset($thisAmount)){ echo '¥' . number_format($thisAmount); } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                前年年収総額
              </div>
              <div class="card-body">
                <?php if(isset($lastAmount)){ echo '¥' . number_format($lastAmount); } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                年齢
              </div>
              <div class="card-body">
                <?php if(isset($age)){ echo $age . '歳'; } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                所得控除額
              </div>
              <div class="card-body">
                <?php if(isset($incomeDeduction)){ echo '¥' . number_format($incomeDeduction); } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                所得税
              </div>
              <div class="card-body">
                <?php if(isset($incomeTax)){ echo '¥' . number_format($incomeTax); } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                住民税
              </div>
              <div class="card-body">
                <?php if(isset($residentTax)){ echo '¥' . number_format($residentTax); } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                手取り年収
              </div>
              <div class="card-body">
                <?php if(isset($totalYamount)){ echo '¥' . number_format($totalYamount); } ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-2 shadow">
              <div class="card-header">
                手取り月収
              </div>
              <div class="card-body">
                <?php if(isset($totalMamount)){ echo '¥' . number_format($totalMamount); } ?>
              </div>
            </div>
          </div>

      </div>
    </div>
  </main>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
