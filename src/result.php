<?php

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

  # 型の状態を確認
  print(gettype($thisAmount));
  print(gettype($lastAmount));
  print(gettype($age)); 

  # ページへの出力
  echo '¥' . $thisAmount;
  echo '¥' . $lastAmount;
  echo $age . '歳';
}
?>
<html>
  <head>

    <title> Total Income Calc Tool </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>
  <body>

    <main role="main" class="container">
      <div class="content">
        <h2>手取り計算ツール</h2>
            <label for="basic-addon1">年収総額(Annual Amount)</label>
            <div class="input-group mb-3">
              <input type="text" readonly class="form-control-plaintext" value="<?php echo '¥' . $thisAmount; ?>">
            </div>

            <label for="basic-addon2">前年年収総額(Last Year Annual Amount)</label>
            <div class="input-group mb-3">
              <input type="text" readonly class="form-control-plaintext" value="<?php echo '¥' . $lastAmount; ?>">
            </div>

            <label for="basic-addon1">年齢(Age)</label>
            <div class="input-group mb-3">
              <input type="text" readonly class="form-control-plaintext" value="<?php echo $age . '歳'; ?>">
            </div>
      </div>
    </main>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
