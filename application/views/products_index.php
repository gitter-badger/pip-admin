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
              <h1 class="page-header">Товары </h1>
              <?php echo $this->InfoMessages; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <span class="right"><a href="/products/edit/" class="btn btn-primary">Добавить товар</a></span>
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                  <thead>
                  <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>URL</th>
                    <th class="text-center">-</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($products) {
                    $i = 0;
                    foreach ($products as $product) {
                      if (($i % 2) == 1) $class = 'odd';
                      else $class = 'even';
                      echo
                        '<tr class="' . $class . '">'
                        . '<td width="5%">'.$product["id"].'</td>'
                        . '<td>'.$product["name"].'</td>'
                        . '<td>'.$product["price"].'</td>'
                        . '<td>http://'.$_SERVER["SERVER_NAME"].'/products/get/'.$product["id"].'</td>'
                        . '<td width="15%" class="text-center">'
                        . '<a href="/products/edit/'.$product["id"].'">Редактировать</a>'
                        . ' \ '
                        . '<a href="/products/del/'.$product["id"].'">Удалить</a></td>'
                        . '</tr>';
                      $i++;
                    }
                  }
                  ?>
                  </tbody>
                </table>
              </div>
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