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
            <h3 class="panel-title">Оплата товара</h3>
          </div>
          <div class="panel-body">
            <?php echo $this->InfoMessages;
            if ($product):
              ?>
              <p class="text-center">Вы приобретаете товар "<?php echo $product['name'] ?>" стоимостью <?php echo $product['price'] ?>
                руб.</p>
              <form action="/orders/saveorder/pd4" method="post" role="form" id="pay-form">
                <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                <fieldset>
                  <div class="form-group input-group">
                    <span class="input-group-addon">@</span>
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon">ФИО</span>
                    <input class="form-control" placeholder="Иванов Иван Иванович" name="fio" type="text" required>
                  </div>
                  <input type="submit" onclick="return( submit_product_pd4( this.form ) );"
                         class="btn btn-lg btn-primary btn-block" value="Оплата через банк (форма ПД-4)">
                  <input type="submit" onclick="return( submit_product_online( this.form ) );"
                         class="btn btn-lg btn-info btn-block" value="Онлайн оплата (visa, maestro, mastercard)">
                </fieldset>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function submit_product_pd4(form) {
      if (form.email.value == '') {
        alert("Введите e-mail.");
        return false;
      }
      else {
        return true;
      }
    }
    function submit_product_online(form) {
      if (form.email.value == '') {
        alert("Введите e-mail.");
        return false;
      }
      else {
        form.action = '/orders/saveorder/online';
        return true;
      }
    }
  </script>
<?php include('footer.php'); ?>