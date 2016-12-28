<?php if(!defined("IN_RULE")) die ("Oops"); ?>

<!-- Header -->
<header>
    <div class="container">
        <div class="row message" data-vis="<?php echo $panelVisibility; ?>">
            <div class="col-lg-12">
                <div class="panel-group">
                    <div class="panel panel-info">
                      <div class="panel-heading"><?php echo $messageHead; ?></div>
                      <div class="panel-body" style="color:black;"><?php echo $messageBody; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-col col-md-6 text-center">
                    <form class="form-horizontal" method="POST" action="/sql">
                      <input type="hidden" class="form-control" name="sql" value="1">
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Отправить запрос 1</button>
                        </div>
                      </div>
                    </form>
                    <hr>
                    <p class="text-justify">
                      There is a MySQL database with a table “transactions”.<br>
                      id - INT, PRIMARY KEY<br>
                      email - VARCHAR(255)<br>
                      amount - NUMERIC(10,2)<br>
                      status - ENUM ('rejected', 'approved')<br>
                      create_date - TIMESTAMP<br>
                      Please write SQL query (first) for getting a report which will show the sum of all approved transactions for each email within current month.

                    </p>
                </div>
                <div class="footer-col col-md-6 text-center">
                    <form class="form-horizontal" method="POST" action="/sql">
                      <input type="hidden" class="form-control" name="sql"  value="2">
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Отправить запрос 2</button>
                        </div>
                      </div>
                    </form>
                    <hr>
                    <p class="text-justify">
                      Please write SQL query (second) to show the report by days of week. The report must contain the name of a day of the week and the sum of all approved transactions per each day of the week per each email.

                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<script type='text/javascript' src='assets/js/transactions.js?v=1'></script>