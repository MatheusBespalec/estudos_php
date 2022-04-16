<div class="box-content">

	<h2>Cadastrar Cliente</h2>

	<form method="post" class="ajax" action="<?php echo INCLUDE_PATH; ?>ajax/forms.php">
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Email:</label>
			<input type="email" name="email">
		</div><!--form-group-->

		<div class="form-group">
			<label>Tipo:</label>
			<select name="tipo">
				<option value="fisico" >Fisico</option>
				<option value="juridico">Juridico</option>
			</select>
		</div><!--form-group-->

		<div class="form-group" rel="cpf">
			<label>CPF:</label>
			<input type="text" name="cpf">
		</div><!--form-group-->

		<div class="form-group" rel="cnpj" style="display: none;">
			<label>CNPJ:</label>
			<input type="text" name="cnpj">
		</div><!--form-group-->

		<input type="submit" name="action" value="Cadastrar!">
	</form>

</div><!--box-content-->