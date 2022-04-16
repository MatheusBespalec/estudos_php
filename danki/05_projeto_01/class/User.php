<?php

	class User{

		public function updateUser($user,$nome,$pass,$img){
			$sql = MySql::conect()->prepare("UPDATE `tb_admin.user` SET nome = ?, password = ?, img = ? WHERE user = ?");
			if($sql->execute(array($nome,$pass,$img,$user))){
				return true;
			}else{
				return false;
			}
		}

		public static function userExists($user){
			$sql = MySql::conect()->prepare("SELECT * FROM `tb_admin.user` WHERE user = ?");
			$sql->execute(array($user));
			if ($sql->rowCount() == 1)
				return true;
			else
				return false;
			
		}

		public function newUser($user,$pass,$nome,$img,$cargo){
			$sql = MySql::conect()->prepare("INSERT INTO `tb_admin.user` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($user,$pass,$nome,$img,$cargo));
			return true;
		}

	}

?>