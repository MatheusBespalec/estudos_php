<?php
		
	namespace Controllers;	

	class ContatoController{

		public function executar(){
			if(isset($_POST['action'])){
				$nome  = $_POST['nome'];
				$email = $_POST['email'];
				$txt   = $_POST['mensagem'];

				if($nome != '' && $email != '' && $txt != ''){
					//Host,Email,Senha,Nome
					$mail = new \Models\MailModel('br330.hostgator.com.br','teste@jpgefata.com','testando321!','Matheus');
					//E-mail que vai receber a mensagem e Nome de Quem vai Receber
					$mail->sendTo($email,$nome);
						//Corpo do email e Assunto
					if($mail->sendMail($txt,'Nova Mensagem do Site')){
						header('Location: '.INCLUDE_PATH.'contato/sucesso');
						die();
					}else{
						\Router::rota('contato',function(){
							$this->view = new \Views\MainView('contato');
							$this->view->render(['titulo'=>'Contato','msg'=>'Falha ao enviar!']);
						});
					}

				}else{
					\Router::rota('contato',function(){
						$this->view = new \Views\MainView('contato');
						$this->view->render(['titulo'=>'Contato','msg'=>'Campos vazios não são permitidos!']);
					});
				}
			}

			\Router::rota('contato/sucesso',function(){
				$this->view = new \Views\MainView('contato-sucesso');
				$this->view->render(['titulo'=>'Contato','msg'=>'Enviado com sucesso!']);
			});

			\Router::rota('contato',function(){
				$this->view = new \Views\MainView('contato');
				$this->view->render(['titulo'=>'Contato']);
			});

			\Router::rota('contato/?',function($par){
				$this->view = new \Views\MainView('erro');
				$this->view->render(['titulo'=>'Erro','msg'=>'A pagina '.$par[1].' não existe!']);
			});
		}

	}

?>