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
                class="page-header"><?php echo (isset($tag) && !empty($tag['id'])) ? 'Редактирование тега {tag_' . $tag["id"] . '}' : 'Добавление нового тега' ?> </h1>
              <?php echo $this->InfoMessages; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <form name="form_tag_edit" action="/tags/save" method="post" role="form" id="form_tag_edit">
                <input type="hidden" name="id" value="<?php echo $tag['id'] ?>">
                <input type="hidden" name="type" value="<?php echo $tag['type'] ?>">

                <div class="text-right">
                  <button name="button" type="submit" class="btn btn-primary" value="only_save">Применить</button>
                  <button name="button" type="submit" class="btn btn-success" value="save_exit">Сохранить и Закрыть
                  </button>
                  <a href="/tags/" class="btn btn-danger">Закрыть</a>
                </div>
                <div class="form-group">
                  <label>Название <span class="red">*</span></label>
                  <input type="text" name="title" class="form-control" value="<?php echo $tag['title'] ?>"
                         placeholder="Название тега" required>
                </div>
                <?php if ($tag['type'] == 0): ?>
                  <?php if ($tag_params): ?>
                    <div class="form-group">
                      <small>Нажмите <span class="glyphicon glyphicon-plus gs"></span> для добавления нового уникального
                        параметра
                      </small>
                    </div>
                    <?php $i = 1;
                    $count = count($tag_params);
                    foreach ($tag_params as $param): ?>
                      <div class="entry input-group col-md-3" style="margin-top: 10px;">
                      <span class="input-group-addon">
                        <?php if ($param['use']): ?>
                          <span class="glyphicon glyphicon-ok"></span>
                        <?php else: ?>
                          <span class="glyphicon glyphicon-remove"></span>
                        <?php endif; ?>
                      </span>
                        <input class="form-control" name="params_use[]" type="hidden" value="<?php echo $param['use'] ? $param['use'] : 0; ?>">
                        <input class="form-control" name="params[]" type="text" placeholder="TGDG-GEWDSG-4DFG-4223"
                               value="<?php echo $param['param'] ?>" required>
                    	<span class=" input-group-btn">
                        <?php if ($count == $i): ?>
                          <button class="btn btn-success btn-add" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                          </button>
                        <?php else: ?>
                          <button class="btn btn-remove btn-danger" type="button">
                            <span class="glyphicon glyphicon-minus"></span>
                          </button>
                        <?php endif; ?>
                      </span>
                      </div>
                      <?php $i++; endforeach; ?>
                  <?php else: ?>
                    <div class="entry input-group col-md-3" style="margin-top: 10px;">
                      <div class="form-group">
                        <label>Уникальные параметры (каждое с новой строки)</label>
                        <textarea class="form-control" name="params[]" rows="10"></textarea>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php else: ?>
                  <div class="form-group">
                    <small>Введите постоянный (один на всех) параметр</small>
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><?php echo $tag_params['count'] ? $tag_params['count'] : 0; ?></span>
                    <input class="form-control" name="params_use" type="hidden" value="<?php echo $tag_params['count'] ? $tag_params['count'] : 0; ?>">
                    <input class="form-control" placeholder="http://site.ru" name="params" type="text" value="<?php echo $tag_params['param'] ?>"
                           required>
                  </div>
                <?php endif; ?>
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