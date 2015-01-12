<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die; ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Меню</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="/">Админ панель</a>
</div>
<!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
  </a>
  <ul class="dropdown-menu dropdown-user">
    <li>
      <a data-toggle="modal" href="#SettingsModal"><i class="fa fa-gear fa-fw"></i> Настройки</a>
    </li>
    <li class="divider"></li>
    <li><a href="/main/logout"><i class="fa fa-sign-out fa-fw"></i> Выход</a>
    </li>
  </ul>
  <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li>
        <a class="<?php echo $menu['first'] == 'main'? 'active': ''; ?>" href="/"><i class="fa fa-reorder fa-fw"></i> Заказы</a>
      </li>
      <li>
        <a class="<?php echo $menu['first'] == 'tags'? 'active': ''; ?>" href="/tags/"><i class="fa fa-tags fa-fw"></i> Теги</a>
      </li>
      <li>
        <a class="<?php echo $menu['first'] == 'products'? 'active': ''; ?>" href="/products/"><i class="fa fa-table fa-fw"></i> Товары</a>
      </li>
      <li>
        <a class="<?php echo $menu['first'] == 'settings'? 'active': ''; ?>" href="/settings/"><i class="fa fa-wrench fa-fw"></i> Настройки</a>
      </li>
    </ul>
  </div>
  <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
