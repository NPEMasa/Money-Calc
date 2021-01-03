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


    <main role="main">
      <div class="container">
        <h2>手取り計算ツール</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-12 shadow">
              <form action="/result.php" method="post">
                <div class="form-group m-3">

                  <label for="this-amount" >年収総額(Annual Amount)</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="this-amount">¥</span>
                    </div>
                    <input type="text" class="form-control" placeholder="3000000" name="thisAmount">
                  </div>

                  <label for="last-amount">前年年収総額(Last Year Annual Amount)</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="last-amount">¥</span>
                    </div>
                    <input type="text" class="form-control" placeholder="2500000" name="lastAmount">
                  </div>

                  <label for="age">年齢(Age)</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="35" name="age">
                    <div class="input-group-append">
                        <span class="input-group-text" id="age">歳</span>
                    </div>
                  </div>
                    
                  <div class="form-check mb-3">
                    <input type="radio" class="form-check-input" name="insuranceFlag" id="wpInsurance" value="0" checked>
                    <label class="form-check-label" for="wpInsurance">
                      厚生年金保険
                    </label>
                  </div>
                  <div class="form-check mb-3">
                    <input type="radio" class="form-check-input" name="insuranceFlag" id="healthInsurance" value="1">
                    <label class="form-check-label" for="healthInsurance">
                      健康保険
                    </label>
                  </div>
                    
                    <button type="submit" class="btn btn-primary">計算</button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
