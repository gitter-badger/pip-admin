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
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Авторизация</h3>
          </div>
          <div class="panel-body">
            <?php echo $this->InfoMessages; ?>
            <form action="/main/login" method="post" role="form" id="form-login">
              <input type="submit" class="hidden" value="Войти">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Логин" name="login" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Пароль" name="password" type="password" value="">
                </div>
                <a href="#" class="btn btn-lg btn-success btn-block" onclick="document.getElementById('form-login').submit();">Войти</a>
              </fieldset>
            </form>
            <br/><p class="text-center">Демо магазин <a href="/magazin.php" target="_blank">ТУТ</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('footer.php'); ?>