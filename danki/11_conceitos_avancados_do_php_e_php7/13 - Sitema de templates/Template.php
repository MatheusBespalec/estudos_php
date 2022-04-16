<?php

	class Template{

		public function render($arr,$file){
			$arquivo = file_get_contents('arquivos/'.$file);
			foreach ($arr as $key => $value) {
				$arquivo = str_replace('{'.$key.'}', $value, $arquivo);
			}
			echo $arquivo;
		}

	}

?>