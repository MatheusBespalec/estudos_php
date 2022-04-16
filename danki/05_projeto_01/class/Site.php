<?php

	class Site{
		public static function updateUserOnline(){
			if (isset($_SESSION['online'])) {
				$token = $_SESSION['online'];
				$date = date('Y-m-d H:i:s');
				$check = MySql::conect()->prepare("SELECT id FROM `tb_admin.online` WHERE token = ?");
				$check->execute(array($token));

				if ($check->rowCount() == 1) {
					$sql = MySql::conect()->prepare("UPDATE `tb_admin.online` SET ultimo_acesso = ? WHERE token = ?");
					$sql->execute(array($date,$token));
				}else{
					$ip = $_SERVER['REMOTE_ADDR'];
					$sql = MySql::conect()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
					$sql->execute(array($ip,$date,$token));
				}
			}else{
				$_SESSION['online'] = uniqid();
				$token = $_SESSION['online'];
				$ip = $_SERVER['REMOTE_ADDR'];
				$date = date('Y-m-d H:i:s');
				$sql = MySql::conect()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
				$sql->execute(array($ip,$date,$token));
			}
		}

		public static function counter(){
			if (!isset($_COOKIE['visita'])) {
				setcookie('visita',true,time() + (60*60*24*30));
				$ip = $_SERVER['REMOTE_ADDR'];
				$date = date('Y-m-d');
				$sql = MySql::conect()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
				$sql->execute(array($ip,$date));
			}else{
				$date = date('Y-m-d');
				$ip = $_SERVER['REMOTE_ADDR'];
				$sql = MySql::conect()->prepare("UPDATE `tb_admin.visitas` SET dia = ? WHERE ip = ?");
				$sql->execute(array($date,$ip));
			}
		}

		public static function getData($table){
			$sql = MySql::conect()->prepare("SELECT * FROM `$table` ORDER BY order_id ASC LIMIT 4");
			$sql->execute();
			$info = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $info;
		}

	}

?>