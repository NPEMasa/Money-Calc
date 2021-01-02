<?php
?>
<html>
  <head>

    <title> Total Income Calc Tool </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>
  <body>


    <main role="main" class="container">

      <div class="content">

      <h2>手取り計算ツール</h2>

        <form action="/result.php" method="post">
          <div class="form-group row">

            <label for="basic-addon1" class="col-sm-4 col-form-label">年収総額(Annual Amount)</label>
            <div class="input-group mb-3 col-sm-8">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">¥</span>
              </div>
              <input type="text" class="form-control" placeholder="3000000" name="thisAmount">
            </div>

            <label for="basic-addon2" class="col-sm-4 col-form-label">前年年収総額(Last Year Annual Amount)</label>
            <div class="input-group mb-3 col-sm-8">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">¥</span>
              </div>
              <input type="text" class="form-control" placeholder="2500000" name="lastAmount">
            </div>

            <label for="basic-addon1" class="col-sm-4 col-form-label">年齢(Age)</label>
            <div class="input-group mb-3 col-sm-8">
              <input type="text" class="form-control" placeholder="35" name="age">
              <div class="input-group-append">
                <span class="input-group-text">歳</span>
              </div>
            </div>
            <br>
            
              <button type="submit" class="btn btn-primary">計算</button>

          </div>
        </form>

      </div>

    </main>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
