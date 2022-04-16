<?php
		
	namespace Controllers;	

	class EmpresaController{

		public function __construct(){
			$this->view = new \Views\MainView('empresa');
		}

		public function executar(){
			$this->view->render(['titulo'=>'A Empresa']);
		}

	}

?>