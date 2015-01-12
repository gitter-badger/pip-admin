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
              <h1 class="page-header">Заказы </h1>
              <?php echo $this->InfoMessages; ?>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                  <thead>
                  <tr>
                    <th>№</th>
                    <th>Дата</th>
                    <th>E-mail</th>
                    <th>ФИО</th>
                    <th>Название товара</th>
                    <th>Сумма</th>
                    <th>Автонапоминание</th>
                    <th class="text-center">Оплата</th>
                    <th class="text-center">Статус заказа</th>
                    <th class="text-center">-</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($orders):
                    $i = 0;
                    foreach ($orders as $order):
                      if (($i % 2) == 1) $class = 'odd';
                      else $class = 'even';
                      if ($order['status'] == 2) $class .=' danger';
                      ?>
                      <tr class="<?php echo $class; ?>">
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['fio']; ?></td>
                        <td><?php echo $products[$order['product_id']]['name']; ?></td>
                        <td><?php echo $products[$order['product_id']]['price']; ?></td>
                        <td><?php echo "(" . $order['count_remind'] . ") " . $order['remind']; ?>
                          <a href="/orders/remaind/<?php echo $order['id']; ?>" title="Повтор" class="btn btn-default btn-circle btn-xs"><i class="fa fa-repeat"></i></a>
                        </td>
                        <td class="text-center"><?php
                          $type =  ($order['type'] == 'pd4') ? '<small>(Оплата через банк)</small>' : '<small>(Онлайн оплата)</small>';
                          echo $order['pay'] ? 'Оплачено '.$type : 'Нет '.$type; ?></td>
                        <td class="text-center"><?php echo $order['status'] == 0 ? 'В работе' : 'Выполнен'; ?>
                          <a href="/orders/repeat/<?php echo $order['id']; ?>" title="Повтор отправки последнего сообщения" class="btn btn-default btn-circle btn-xs"><i class="fa fa-repeat"></i></a>
                        </td>
                        <td class="text-center">
                          <a href="#OrderEditModal" data-toggle="modal" data-id="<?php echo $order['id']; ?>"
                             data-pay="<?php echo str_replace('"', '', $order['pay']); ?>"
                             data-status="<?php echo $order['status']; ?>">Редактировать</a>
                          \
                          <a href="/orders/del/<?php echo $order['id']; ?>">Удалить</a>
                        </td>
                      </tr>
                      <?php $i++; endforeach; ?>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->

<?php
include('modals/ordereditmodal.php');
include('footer.php'); ?>