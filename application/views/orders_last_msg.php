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
              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Последнее письмо по заказу</h3>
                      </div>
                      <div class="panel-body">
                        <?php if ($msg): ?>
                          <div class="col-md-12"><strong>Тема письма: </strong><br/><?php echo $subject;?></div>
                          <div class="col-md-12"><strong>Письмо: </strong><br/><?php echo $msg;?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
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