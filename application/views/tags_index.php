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
              <h1 class="page-header">Теги </h1>
              <?php echo $this->InfoMessages; ?>
            </div>
            <div class="panel-body">
              <span class="right"><a href="#TagsModal" data-toggle="modal" class="btn btn-primary">Добавить тег</a></span>
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                  <thead>
                  <tr>
                    <th>№</th>
                    <th>Тэг</th>
                    <th>Тип</th>
                    <th>Название</th>
                    <th class="text-center">-</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($tags):
                    $i = 0;
                    foreach ($tags as $tag):
                      if (($i % 2) == 1) $class = 'odd';
                      else $class = 'even'; ?>
                      <tr class="<?php echo $class; ?>">
                        <td><?php echo $tag['id']; ?></td>
                        <td>{tag_<?php echo $tag['id']; ?>}</td>
                        <td><?php echo ($tag['type'] == 0)? "Уникальный" : "Один на всех" ?></td>
                        <td><?php echo $tag['title']; ?></td>
                        <td class="text-center">
                          <a href="/tags/edit/<?php echo $tag['id']; ?>">Редактировать</a>
                          \
                          <a href="/tags/del/<?php echo $tag['id']; ?>">Удалить</a>
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
include('modals/tagsmodal.php');
include('footer.php'); ?>