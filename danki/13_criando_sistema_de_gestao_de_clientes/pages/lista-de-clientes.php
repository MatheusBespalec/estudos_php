<?php 

	$sql = MySql::conect()->prepare("SELECT * FROM `tb_admin.clientes`");
	$sql->execute();
	$clientes = $sql->fetchAll();

?>

<div class="box-content">

	<h2>Lista de Clientes</h2>

	<table>
		<tr>
			<td>Nome</td>
			<td>E-mail</td>
			<td>Tipo</td>
			<td>CPF/CNPJ</td>
		</tr>

		<?php foreach($clientes as $key => $value){ ?>
			<td><?php echo $value['nome']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['tipo']; ?></td>
			<td><?php echo $value['cpf_cnpj']; ?></td>
		<?php } ?>
	</table>

</div><!--box-content-->