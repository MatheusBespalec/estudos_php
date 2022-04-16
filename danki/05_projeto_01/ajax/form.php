<?php

	include('../class/Mailer.php');

	if ($_POST['identificador'] == 'form_email') {
		$email = $_POST['email'];
		
		$txt = '';
		foreach ($_POST as $key => $value) {
			$txt.= ucfirst($key).': '.$value;
			$txt.='<hr>';
		}
		//Parametros Mailer: 1°SMTP Server 2° Email que vai disparar o email 3° Senha do E-mail 4° Nome de quem esta enviando
		$mail = new Mailer('br330.hostgator.com.br','teste@jpgefata.com','testando321!','SiteTeste');
		$mail->sendTo($email,'Usuário Cadastrado');
		if($mail->sendMail($txt,'Novo E-mail Cadastrado!')){
			$data['mensagem'] = 'Formulario enviado com sucesso!';
			$data['resultado'] = true;
			die(json_encode($data));
		}else{
			$data['mensagem'] = 'Erro ao enviar formulário!';
			$data['resultado'] = false;
			die(json_encode($data));
		}
		

	}else if($_POST['identificador'] == 'form_contato'){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];

		$txt = '';
		foreach ($_POST as $key => $value) {
			$txt.= ucfirst($key).': '.$value;
			$txt.='<hr>';
		}
		//Parametros Mailer: 1°SMTP Server 2° Email que vai disparar o email 3° Senha do E-mail 4° Nome de quem esta enviando
		$mail = new Mailer('','','','');
		$mail->sendTo($email,$nome);
		if($mail->sendMail($txt,'Nova mensagem do site!')){
			$data['mensagem'] = 'Formulario enviado com sucesso!';
			$data['resultado'] = true;
			die(json_encode($data));
		}else{
			$data['mensagem'] = 'Erro ao enviar formuçário';
			$data['resultado'] = false;
			die(json_encode($data));
		}
	}

?>