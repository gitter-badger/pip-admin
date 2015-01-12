<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;
include('header.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-2">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Онлайн оплата товара</h3>
          </div>
          <div class="panel-body">
            <?php echo $this->InfoMessages;
            if ($product):
              $js = "var bar = $('.progress-bar.pay_online');
                      var current_perc = 10;

                      var progress = setInterval(function() {
                        if (current_perc>=100) {
                          clearInterval(progress);
                          $('form#pay-form').submit();
                        } else {
                          current_perc +=10;
                          bar.css('width', (current_perc)+'%');
                        }
                      }, 150);";
              ?>
              <p class="text-center">В течении нескольких секунд вы будете переадресованы на страницу онлайн оплаты, если
                этого не произошло, нажмите кнопку "ОПЛАТИТЬ"</p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success pay_online" role="progressbar" aria-valuenow="10" aria-valuemin="0"
                     aria-valuemax="100" style="width: 10%;">
                </div>
              </div>
              <form action="<?php echo $config['robokassa_url'] ?>" method="post" role="form" id="pay-form">
                <fieldset>
                  <input type="hidden" name="MrchLogin" value="<?php echo $config['robokassa_login'] ?>">
                  <input type="hidden" name="OutSum" value="<?php echo $product['price'] ?>">
                  <input type="hidden" name="InvId" value="<?php echo $order_id ?>">
                  <input type="hidden" name="Desc" value="Онлайн оплата заказа №<?php echo $order_id ?>">
                  <input type="hidden" name="SignatureValue" value="<?php echo $crc ?>">
                  <input type="hidden" name="Shp_item" value="<?php echo $config['robokassa_shp_item'] ?>">
                  <input type="hidden" name="IncCurrLabel" value="<?php echo $config['robokassa_curr'] ?>">
                  <input type="hidden" name="Culture" value="<?php echo $config['robokassa_cultur'] ?>">
                  <input type="submit" class="btn btn-lg btn-info btn-block" value="Оплатить">
                </fieldset>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>