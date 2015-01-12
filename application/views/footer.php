<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;
include('modals/settingmodal.php'); ?>
<!-- Static navbar -->
<div class="navbar-default navbar-fixed-bottom">
  <div class="navbar-collapse collapse">
    <p class="text-center">© Web developer <a href="http://gaalferov.com" target="_blank" title="Профессиональное создание сайтов">GAAlferov</a> <?php echo date('Y');?></p>
  </div><!--/.nav-collapse -->
</div>
<!-- jQuery Version 1.11.0 -->
<script src="<?php echo BASE_URL; ?>static/js/jquery-1.11.0.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo BASE_URL; ?>static/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo BASE_URL; ?>static/js/plugins/metisMenu/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo BASE_URL; ?>static/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>static/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo BASE_URL; ?>static/js/sb-admin-2.js"></script>
<!-- Redactor -->
<script src="<?php echo BASE_URL; ?>static/js/redactor.js"></script>
<script>
  $(document).ready(function () {

    window.setTimeout(function () {
      $("#InfoMessages").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 3500);

    $('#dataTables').dataTable({
      "language": {
        "sLengthMenu": "_MENU_ записей на странице",
        "emptyTable": "Нет данных",
        "info": "Показана _PAGE_ страница из _PAGES_",
        "infoEmpty": "Нет данных для отображения",
        "search": "Поиск ",
        "paginate": {
          "first": "Первая",
          "next": "Следующая",
          "previous": "Предыдущая",
          "last": "Последняя"
        }
      }
    });

    //settings page
    $('#msg').redactor();
    $('#msg_reminder').redactor();
    $('#msg_cancel').redactor();

    //orders page
    $('#OrderEditModal').on('show.bs.modal', function (event) {
      var href = $(event.relatedTarget);
      var id = href.data('id');
      var pay = href.data('pay');
      var status = href.data('status');
      var modal = $(this);
      modal.find('.modal-title').text('Редактирование заказа ID: ' + id);
      modal.find('.modal-body [name="pay"]').val(pay);
      modal.find('.modal-body [name="status"]').val(status);
      modal.find('.modal-footer [name="id"]').val(id);
    });

    //tags page
    $(document).on('click', '.btn-add', function(e)
    {
      e.preventDefault();
      var controlForm = $('#form_tag_edit'),
        currentEntry = $(this).parents('.entry:first'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);
      newEntry.find('input').val('');
      controlForm.find('.entry:not(:last) .btn-add')
        .removeClass('btn-add').addClass('btn-remove')
        .removeClass('btn-success').addClass('btn-danger')
        .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
      $(this).parents('.entry:first').remove();
      e.preventDefault();
      return false;
    });

    <?php echo (isset($js))? $js: ''; ?>
  });
</script>
</body>
</html>