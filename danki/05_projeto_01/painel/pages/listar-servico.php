<div class="box-content w100">

	<?php 
		
		Painel::permisionPage(1);

		//Sistemade Paginação
		$perPage = 10;
		$table = 'tb_site.servico';

		if(@$_GET['pagina'] == null)
			$currentPage = 1;
		else
			$currentPage = (int)$_GET['pagina'];
		$numDep = count(Painel::listTable($table));
		$numPages = ceil($numDep/$perPage);

		//Exclusão itens da lista
		if (isset($_GET['excluir'])) {
			$idDelete = intval($_GET['excluir']);
			Painel::deleteList($table,$idDelete);
			Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servico');
		}else if(isset($_GET['order'])){
			Painel::orderItens($table,$_GET['order'],$_GET['id_order']);
		}

	?>

	<h2><i class="fas fa-clipboard-list"></i> Lista de Serviços > </h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Serviço</td>
				<td>Editar</td>
				<td>Excluir</td>
				<td>Subir</td>
				<td>Descer</td>
			</tr>
			<?php foreach (Painel::pagination($table,($currentPage - 1) * $perPage,$perPage) as $key => $value) { ?>
				<tr>
					<td><?php Painel::longText($value['servico'],60); ?></td>
					<td><a class="edit" href="<?php echo INCLUDE_PATH_PAINEL;?>editar-servico?id=<?php echo$value['id'];?>"><i class="fa fa-pencil"></i> Editar</a></td>
					<td><a class="delete" href="<?php echo '?excluir='.$value['id']; ?>"><i class="fa fa-times"></i> Ecluir</a></td>
					<td><a class="order" href="?order=up&id_order=<?php echo $value['order_id']; ?>"><i class="fas fa-angle-up"></i></a></td>
					<td><a class="order" href="?order=down&id_order=<?php echo $value['order_id']; ?>"><i class="fas fa-angle-down"></i></a></td>
				</tr>
			<?php } ?>
		</table>
		<?php if($numPages > 1){ ?>
			<div class="pagination">
				<?php 

					for ($i = 0; $i < $numPages; $i++) {
						$num = $i+1;
						if($num == $currentPage)
							echo '<a class="select-page" href="?pagina='.$num.'">'.$num.'</a>';
						else
							echo '<a href="?pagina='.$num.'">'.$num.'</a>';
					}

				?>
			</div><!--pagination-->
		<?php } ?>
	</div><!--wraper-table-->
</div><!--box-content-->