<?php if(!defined("IN_RULE")) die ("Oops"); ?>

<header>
    <div class="container" style="color:#777;">
<!-- In order to run correctly AJAX - you need to change in line 7 of this file the value of data-create-url -->    
        <div class="message row" data-create-url="http://test2712.in.ua/transaction/" data-vis="<?php echo $panelVisibility; ?>">
            <div class="col-lg-12">
                <div class="panel-group">
                    <div class="panel panel-info">
                      <div class="panel-heading"><?php echo $messageHead; ?></div>
                      <div class="panel-body"><?php echo $messageBody; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" method="POST" action="/example">
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">Amount</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="token" class="col-sm-2 control-label">Token</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="token" name="token" placeholder="default = mytoken">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Send using сURL</button>
                    </div>
                  </div>
                </form>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-default button-ajax">Send using AJAX</button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</header>

<script type='text/javascript' src='assets/js/transactions.js?v=1'></script>