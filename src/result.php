<?php

# 税金関連クラス
require_once('lib/taxclass.php');

# 変数初期化
$thisAmount = 0;
$lastAmount = 0;
$age = 0;

if(isset($_POST['thisAmount']) && isset($_POST['lastAmount']) && isset($_POST['age'])){

  # 入力値エスケープ処理後、変数へ格納
  $thisAmount = htmlspecialchars($_POST['thisAmount'], ENT_QUOTES, 'UTF-8');
  $lastAmount = htmlspecialchars($_POST['lastAmount'], ENT_QUOTES, 'UTF-8');
  $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');

  # string型をinteger型に変換
  $thisAmount = intval($thisAmount);
  $lastAmount = intval($lastAmount);
  $age = intval($age);

  # 課税所得金額 算出
  $tx = new Tax();
  $incomeDeduction = $tx->txincomeCalc($thisAmount);
  $txIncome = $thisAmount - $incomeDeduction;
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
                課税対象所得
              </div>
              <div class="card-body">
                <?php if(isset($txIncome)){ echo '¥' . number_format($txIncome); } ?>
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
