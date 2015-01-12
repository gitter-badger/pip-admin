<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;
include('header.php'); ?>

  <div id="wrapper">
    <?php include('navbar.php'); ?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1
                class="page-header"><?php echo (isset($product) && !empty($product)) ? 'Редактирование товара "' . $product["name"] . '"' : 'Добавление нового товара' ?> </h1>
              <?php echo $this->InfoMessages; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <form name="form_product_edit" action="/products/save" method="post" role="form">
                <div class="text-right">
                  <button name="button" type="submit" class="btn btn-primary" value="only_save">Применить</button>
                  <button name="button" type="submit" class="btn btn-success" value="save_exit">Сохранить и Закрыть</button>
                  <a href="/products/" class="btn btn-danger">Закрыть</a>
                </div>
                <div class="form-group">
                  <label>Название <span class="red">*</span></label>
                  <input type="text" name="name" class="form-control" value="<?php echo $product['name'] ?>" placeholder="Название товара" required>
                </div>
                <div class="form-group">
                  <label>Цена <span class="red">*</span></label>
                  <input type="text" name="price" class="form-control" value="<?php echo $product['price'] ?>" placeholder="777" required>
                </div>
                <div class="form-group">
                  <label>Сообщение <span class="red">*</span></label>
                  <textarea class="form-control" name="msg" rows="10" id="msg"><?php echo $product['msg'] ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
              </form>
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
        <!-- /.col-md-12 -->
      </div>
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->

<?php include('footer.php'); ?>