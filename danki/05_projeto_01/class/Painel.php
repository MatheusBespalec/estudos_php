<?php

	class Painel{
		
		public static $cargo = [
			'0'=>'Normal',
			'1'=>'Sub-Administrador',
			'2'=>'Administrador'
		];

		public static function login(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function loggout(){
			session_destroy();
			setcookie('lembrar',true,time()-1,'/');
		}

		public static function loadPage(){
			if (isset($_GET['url'])) {
				$url = explode('/',$_GET['url']);
				if (file_exists('pages/'.$url[0].'.php')) {
					include('pages/'.$url[0].'.php');
				}else{
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}else{
				include('pages/home.php');
			}
		}

		public static function listUserOnline(){
			self::deleteUserOffline();
			$sql = MySql::conect()->prepare("SELECT * FROM `tb_admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function deleteUserOffline(){
			$date = date('Y-m-d H:i:s');
			MySql::conect()->exec("DELETE FROM `tb_admin.online` WHERE ultimo_acesso < '$date' - INTERVAL 1 MINUTE");
		}

		public static function alert($type,$txt){
			if ($type == true) {
				echo '<div class="alert sucesso">'.$txt.'</div>';
			}else if($type == false){
				echo '<div class="alert erro">'.$txt.'</div>';
			}
		}

		public static function validImage($img){
			if ($img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' || $img['type'] == 'image/pmg') {
				$tamanho = intval($img['size']/1024);
				if ($tamanho > 300) {
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}

		public static function uploadImage($file){
			$formatImage = explode('.', $file['name']);
			$nameImage = uniqid().'.'.$formatImage[count($formatImage) - 1];
			if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'uploads/'.$nameImage)){
				return $nameImage;
			}else{
				return false;
			}
		}

		public static function validImageSlide($img){
			if ($img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' || $img['type'] == 'image/png') {
				$tamanho = intval($img['size']/1024);
				if ($tamanho > 1000) {
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}

		public static function uploadImageSlide($file){
			if(move_uploaded_file($file['tmp_name'], BASE_DIR.'/images/slides/'.$file['name'])){
				return $file['name'];
			}else{
				return false;
			}
		}

		public static function imageExists($img){
			$sql = MySql::conect()->prepare("SELECT * FROM `tb_site.slide` WHERE img = ?");
			$sql->execute(array($img));
			if ($sql->rowCount() >= 1) {
				return false;
			}else{
				return true;
			}
		}

		public static function deleteFile($file){
			@unlink(BASE_DIR_PAINEL.'uploads/'.$file);
		}

		public static function deleteFileConfig($file){
			@unlink(BASE_DIR.'/images/'.$file);
		}

		public static function permisionMenu($cargoMin){
			if ($_SESSION['cargo'] >= $cargoMin) {
				return true;
			}else{
				echo 'style="display: none;"';
			}
		}

		public static function permisionPage($cargoMin){
			if ($_SESSION['cargo'] >= $cargoMin) {
				return true;
			}else{
				include('../painel/pages/permicao_negada.php');
				die();
			}
		}

		public static function generateSlug($str){
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|ã|á)/','a', $str);
			$str = preg_replace('/(ê|é)/','e', $str);
			$str = preg_replace('/(í)/','i', $str);
			$str = preg_replace('/(ú)/','u', $str);
			$str = preg_replace('/(ó|ô|õ)/','o', $str);
			$str = preg_replace('/(_|\/|!|\?|#)/','', $str);
			$str = preg_replace('/( )/','-', $str);
			$str = preg_replace('/ç/','c', $str);
			$str = preg_replace('/(-[-]{1,})/','-', $str);
			$str = preg_replace('/(,)/','-', $str);
			return $str;
		}

		public static function insert($arr){
			$certo = true;
			$nomeTabela = $arr['nome_tabela'];
			$query = "INSERT INTO `".$nomeTabela."` VALUES (null";
			foreach ($arr as $key => $value) {

				if($value == ''){
					$certo = false;
					break;
				}
				
				if($key === 'nome_tabela' || $key === 'act')
					continue;

				$query.=",?";
				$el[] = $value;
				
			}
			$query.=")";
			if($certo == true){
				$sql = MySql::conect()->prepare($query);
				$sql->execute($el);
				$orderId = self::lastOrder($nomeTabela,'order_id');
				$id = self::lastOrder($nomeTabela,'id');
				$orderId = $orderId+1;
				$order = MySql::conect()->prepare("UPDATE `$nomeTabela` SET order_id = ? WHERE id = ?");
				$order->execute(array($orderId, $id));
			}
			return $certo;
		}

		public static function lastOrder($table,$column){
			$sql = MySql::conect()->prepare("SELECT $column FROM `$table`");
			$sql->execute();
			$info = $sql->fetchAll(PDO::FETCH_ASSOC);

			foreach ($info as $key => $value) {
				$arr[] = $value["$column"];
			}

			return max($arr);
		}

		public static function listTable($table){
			$sql = MySql::conect()->prepare("SELECT * FROM `$table`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function longText($text,$maxChar){
			if (strlen($text) > $maxChar) 
				echo substr($text, 0, $maxChar).'...'; 
			else
				echo $text;
		}

		public static function pagination($tabela,$start=null,$end=null){
			$sql = MySql::conect()->prepare("SELECT * FROM `$tabela` ORDER BY order_id LIMIT $start,$end");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function paginationWhere($tabela,$where,$start=null,$end=null){
			$sql = MySql::conect()->prepare("SELECT * FROM `$tabela` WHERE $where ORDER BY order_id LIMIT $start,$end");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function deleteList($table,$id=null){
			if($id==null)
				$sql = MySql::conect()->prepare("DELETE FROM `$table`");
			else
				$sql = MySql::conect()->prepare("DELETE FROM `$table` WHERE id = $id");
			$sql->execute();
		}

		public static function deleteImageslide($file){
			@unlink(BASE_DIR.'/images/slides/'.$file);
		}

		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		public static function update($arr,$noId=false){
			$certo = true;
			$nomeTabela = $arr['nome_tabela'];
			$query = "UPDATE `".$nomeTabela."` SET ";
			$first = false;
			foreach ($arr as $key => $value) {
				if($value == ''){
					$certo = false;
					break;
				}
				if($key == 'nome_tabela' || $key == 'act' || $key == 'id')
					continue;

				if ($first == false){
					$first = true;
					$query.="$key = ?";
				}else{
					$query.=",$key = ?";
				}
				
				$el[] = $value;
				
			}
			if ($noId == false) {
				$id = $arr['id'];
				$query.= " WHERE id = $id";
			}
			
			if($certo == true){
				$sql = MySql::conect()->prepare($query);
				$sql->execute($el);
			}
			return $certo;
		}

		public static function selectItem($table,$campo,$id){
			$sql = MySql::conect()->prepare("SELECT $campo FROM `$table` WHERE id = ?");
			$sql->execute(array($id));
			$teste = $sql->fetchAll();
			$info = '';
			foreach ($teste as $key => $value) {
				$info.= $value[$campo];
			}
			return $info;
		}

		public static function orderItens($table,$orderType,$currentId){
			if ($orderType == 'up') {
				$sql = MySql::conect()->prepare("SELECT * FROM `$table` WHERE order_id < $currentId ORDER BY order_id DESC LIMIT 1");
				$sql->execute();

				if ($sql->rowCount() == 0)
					return;

				$beforeId = $sql->fetch();
				$beforeOrderId = $beforeId['order_id'];
				$beforeId = $beforeId['id'];

				$currentItem = MySql::conect()->prepare("UPDATE `$table` SET order_id = ? WHERE order_id = ?");
				$currentItem->execute(array($beforeOrderId,$currentId));

				$beforeItem = MySql::conect()->prepare("UPDATE `$table` SET order_id = ? WHERE id = ?");
				$beforeItem->execute(array($currentId,$beforeId));
			}else if($orderType == 'down'){
				$sql = MySql::conect()->prepare("SELECT * FROM `$table` WHERE order_id > $currentId ORDER BY order_id ASC LIMIT 1");
				$sql->execute();

				if ($sql->rowCount() == 0)
					return;

				$afterId = $sql->fetch();
				$afterOrderId = $afterId['order_id'];
				$afterId = $afterId['id'];

				$currentItem = MySql::conect()->prepare("UPDATE `$table` SET order_id = ? WHERE order_id = ?");
				$currentItem->execute(array($afterOrderId,$currentId));
				
				$afterItem = MySql::conect()->prepare("UPDATE `$table` SET order_id = ? WHERE id = ?");
				$afterItem->execute(array($currentId,$afterId));
			}
		}

		public static function uploadImageConfig($file){
			if(move_uploaded_file($file['tmp_name'], BASE_DIR.'/images/'.$file['name'])){
				return $file['name'];
			}else{
				return false;
			}
		}

		public static function recoverPost($post){
			if (isset($_POST[$post])) {
				echo $_POST[$post];
			}
		}

	}

?>