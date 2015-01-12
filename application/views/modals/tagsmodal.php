<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die; ?>
<div class="modal fade" id="TagsModal" tabindex="-1" role="dialog" aria-labelledby=TagModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="form_tag_new" action="/tags/edit" method="post" role="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="TagModalLabel">Выберите тип тега</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Тип <span class="red">*</span></label>
            <select name="type" class="form-control" id="tag_type">
              <option value="0">Уникальный</option>
              <option value="1">Один на всех</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Далее</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>