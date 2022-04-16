<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    class Mailer{

        private $email;
        private $nome;
        private $mail;

        public function __construct($host,$email,$pass,$nome){
            $this->email = $email;
            $this->nome = $nome;
            
            //Create an instance; passing `true` enables exceptions
            $this->mail = new PHPMailer(true);

            //Server settings
            $this->mail->SMTPDebug  = 0;
            $this->mail->isSMTP();
            $this->mail->Host       = $host;                      //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                       //Enable SMTP authentication
            $this->mail->Username   = $email;                     //SMTP username | Email que envia
            $this->mail->Password   = $pass;                      //SMTP password | Senha do email
            $this->mail->SMTPSecure = 'ssl';                      //Enable implicit TLS encryption
            $this->mail->Port       = 465;                        //Porta TCP para conectar
            $this->mail->CharSet    = 'UTF-8';                    //Acentuação
            $this->mail->isHTML(true);                            //Formato E-mail
            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        }

        public function sendTo($email,$nome){
            $this->mail->setFrom($this->email, $this->nome);           //Quem envia o e-mail
            $this->mail->addAddress($email, $nome);                   //Quem recebe o e-mail
        }

        public function sendMail($txt,$ass){
            $this->mail->Subject = $ass;
            $this->mail->Body    = $txt;
            $this->mail->AltBody = strip_tags($txt);

            if($this->mail->send()){
                return true;
            }else{
                return false;
            }
        }
        
    }

?>