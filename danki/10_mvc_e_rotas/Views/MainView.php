<?php

	namespace Views;

	class MainView{

		private $header;
		private $fileName;
		private $footer;

		public $menu = ['Home','Empresa','Contato'];

		public function __construct($fileName,$header = 'header',$footer = 'footer'){
			$this->header = $header;
			$this->fileName = $fileName;
			$this->footer = $footer;
		}

		public function render($arr = []){
			include('pages/templates/'.$this->header.'.php');
			include('pages/'.$this->fileName.'.php');
			include('pages/templates/'.$this->footer.'.php');
		}

	}

?>