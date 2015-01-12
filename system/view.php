<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
class View {

	private $pageVars = array();
	private $InfoMessages = '';
	private $template;

	public function __construct($template)
	{
		$this->template = APP_DIR .'views/'. $template .'.php';
    $this->ShowInfoMessages();
	}

	public function set($var, $val)
	{
		$this->pageVars[$var] = $val;
	}

  private function ShowInfoMessages()
	{
    if (isset($_SESSION['InfoMessages']) && !empty($_SESSION['InfoMessages'])) {
      $this->InfoMessages = '
        <div class="alert alert-'.$_SESSION["InfoMessagesType"].' alert-dismissable fade in" id="InfoMessages">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          '.$_SESSION["InfoMessages"].'
        </div>';
      unset($_SESSION['InfoMessages']);
      unset($_SESSION['InfoMessagesType']);
    }
	}

  function fetch() {
    extract($this->pageVars);
    ob_start();
    require_once($this->template);

  }

	public function render($fetch = FALSE)
	{
		extract($this->pageVars);
		ob_start();
    require_once($this->template);
    if ($fetch) {
      $contents = ob_get_contents();
      ob_end_clean();
      return $contents;
    } else {
      echo ob_get_clean();
      return TRUE;
    }
	}

}