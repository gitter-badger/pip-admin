<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die; ?>
<div class="modal fade" id="SettingsModal" tabindex="-1" role="dialog" aria-labelledby="SettingsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="form_settings" action="/main/settings" method="post" role="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="SettingsModalLabel">Настройки аккаунта (<?php echo $user_info['user_login']?>)</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>E-mail <span class="red">*</span></label>
            <input type="email" name="email" class="form-control" value="<?php echo $user_info['user_mail']?>" placeholder="email@email.com" required>
          </div>
          <div class="form-group">
            <label>Текущий пароль <span class="red">*</span></label>
            <input type="password" name="now_password" class="form-control" placeholder="******" required>
          </div>
          <div class="form-group">
            <label>Новый пароль</label>
            <input type="password" name="new_password" class="form-control" placeholder="******">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>