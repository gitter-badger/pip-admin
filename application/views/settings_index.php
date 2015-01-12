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
              <h1 class="page-header">Настройки </h1>
              <?php echo $this->InfoMessages; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">Основные</a>
                </li>
                <li class=""><a href="#messages" data-toggle="tab">Шаблоны писем</a>
                </li>
                <li class=""><a href="#reminder" data-toggle="tab">Автонапоминание</a>
                </li>
                <li class=""><a href="#robokassa" data-toggle="tab">Robokassa</a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade active in" id="general">
                  <p></p>

                  <form name="form_settings_general" action="/settings/save/" method="post" role="form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Обратный e-mail</label>
                        <input type="text" name="general[mail_from]" class="form-control"
                               value="<?php echo $settings['mail_from'] ?>" placeholder="mail@mail.ru">
                      </div>
                      <div class="form-group">
                        <label>Название компании</label>
                        <input type="text" name="general[company_name]" class="form-control"
                               value="<?php echo $settings['company_name'] ?>" placeholder="Название компании">
                      </div>
                      <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" name="general[company_address]" class="form-control"
                               value="<?php echo $settings['company_address'] ?>" placeholder="Адрес">
                      </div>
                      <div class="form-group">
                        <label>ИНН</label>
                        <input type="text" name="general[company_inn]" class="form-control"
                               value="<?php echo $settings['company_inn'] ?>" placeholder="ИНН">
                      </div>
                      <div class="form-group">
                        <label>КПП</label>
                        <input type="text" name="general[company_kpp]" class="form-control"
                               value="<?php echo $settings['company_kpp'] ?>" placeholder="КПП">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Название отправителя</label>
                        <input type="text" name="general[mail_from_name]" class="form-control"
                               value="<?php echo $settings['mail_from_name'] ?>" placeholder="Вася Пупкин">
                      </div>
                      <div class="form-group">
                        <label>Номер расчетного счета</label>
                        <input type="text" name="general[company_account_number]" class="form-control"
                               value="<?php echo $settings['company_account_number'] ?>"
                               placeholder="Номер расчетного счета">
                      </div>
                      <div class="form-group">
                        <label>Наименование банка</label>
                        <input type="text" name="general[company_bank_name]" class="form-control"
                               value="<?php echo $settings['company_bank_name'] ?>" placeholder="Наименование банка">
                      </div>
                      <div class="form-group">
                        <label>БИК Банка</label>
                        <input type="text" name="general[company_bank_bik]" class="form-control"
                               value="<?php echo $settings['company_bank_bik'] ?>" placeholder="БИК Банка">
                      </div>
                      <div class="form-group">
                        <label>Корреспондентский счёт</label>
                        <input type="text" name="general[company_corr_account]" class="form-control"
                               value="<?php echo $settings['company_corr_account'] ?>"
                               placeholder="Корреспондентский счёт">
                      </div>
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="messages">
                  <h4>Спец. теги для писем:</h4>

                  <p><strong>{order_id}</strong> - ID заказа</p>

                  <p><strong>{order_fio}</strong> - ФИО пользователя из заказа</p>

                  <p><strong>{product_title}</strong> - Название товара</p>

                  <p><strong>{product_price}</strong> - Цена товара</p>

                  <p><strong>{product_url}</strong> - Ссылка на товар</p>

                  <p><strong>{product_pay_url}</strong> - Ссылка на оплату товара
                    <small>(Только для писем автонапоминания)</small>
                  </p>
                  <form name="form_settings_messages" action="/settings/save/" method="post" role="form">
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Письмо
                              автонапоминания</a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <div class="form-group">
                              <label>Тема письма</label>
                              <input type="text" name="msg[msg_reminder_subject]" class="form-control"
                                     value="<?php echo $settings['msg_reminder_subject'] ?>">
                            </div>
                            <textarea class="form-control" name="msg[msg_reminder]" rows="5"
                                      id="msg_reminder"><?php echo $settings['msg_reminder'] ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Письмо анулирования
                              заказа</a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="form-group">
                              <label>Тема письма</label>
                              <input type="text" name="msg[msg_cancel_subject]" class="form-control"
                                     value="<?php echo $settings['msg_cancel_subject'] ?>">
                            </div>
                            <textarea class="form-control" name="msg[msg_cancel]" rows="5"
                                      id="msg_cancel"><?php echo $settings['msg_cancel'] ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="reminder">
                  <p></p>
                  <form name="form_settings_reminder" action="/settings/save/" method="post" role="form">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Включить? </label>
                        <label class="radio-inline">
                          <input type="radio" name="general[remainder]"  value="1" <?php echo $settings['remainder'] == 1? 'checked' : '' ?>>Да
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="general[remainder]"  value="0" <?php echo $settings['remainder'] == 0? 'checked' : '' ?>>Нет
                        </label>
                      </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Кол-во напоминаний</label>
                          <input type="text" name="general[remainder_count]" class="form-control" value="<?php echo $settings['remainder_count'] ?>" placeholder="5">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Интервал напоминаний (мин.)</label>
                          <input type="text" name="general[remainder_interval]" class="form-control" value="<?php echo $settings['remainder_interval'] ?>" placeholder="60">
                        </div>
                      </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="robokassa">
                  <p></p>
                  <form name="form_settings_robokassa" action="/settings/save/" method="post" role="form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>URL</label>
                        <input type="text" name="general[robokassa_url]" class="form-control" value="<?php echo $settings['robokassa_url'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Пароль 1</label>
                        <input type="password" name="general[robokassa_pass1]" class="form-control" value="<?php echo $settings['robokassa_pass1'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Язык</label>
                        <input type="text" name="general[robokassa_cultur]" class="form-control" value="<?php echo $settings['robokassa_cultur'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Валюта</label>
                        <input type="text" name="general[robokassa_curr]" class="form-control" value="<?php echo $settings['robokassa_curr'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Идентификатор магазина</label>
                        <input type="text" name="general[robokassa_login]" class="form-control" value="<?php echo $settings['robokassa_login'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Пароль 2</label>
                        <input type="password" name="general[robokassa_pass2]" class="form-control" value="<?php echo $settings['robokassa_pass2'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Тип товара</label>
                        <input type="text" name="general[robokassa_shp_item]" class="form-control" value="<?php echo $settings['robokassa_shp_item'] ?>">
                      </div>
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                  </form>
                </div>
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