<section class="contato">
	<div class="container">

		<?php if(isset($arr['msg'])){ ?>
			<div class="alert erro"><?php echo $arr['msg']; ?></div>
		<?php } ?>

		<h2>Entre em Contato!</h2>

		<form method="post">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" required />
			</div><!--form-group-->

			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" required />
			</div><!--form-group-->

			<div class="form-group">
				<label>Sua mensagem:</label>
				<textarea name="mensagem" required></textarea>
			</div><!--form-group-->

			<input type="submit" name="action" value="Enviar!" />
		</form>
		
	</div><!--container-->
</section><!--contato-->