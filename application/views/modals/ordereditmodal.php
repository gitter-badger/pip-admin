<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die; ?>
<div class="modal fade" id="OrderEditModal" tabindex="-1" role="dialog" aria-labelledby=OrderEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="form_product_edit" action="/orders/edit" method="post" role="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="OrderEditModalLabel">Редактирование заказа</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Оплата </label>
            <input type="text" name="pay" class="form-control" value="">
          </div>
          <div class="form-group">
            <label>Статус <span class="red">*</span></label>
            <select name="status" class="form-control">
              <option value="0">В работе</option>
              <option value="1">Выполнено</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" value="">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>