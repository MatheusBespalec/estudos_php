<?php $userOnline = Painel::listUserOnline(); ?>
<?php 
	$counterVisit = MySql::conect()->prepare("SELECT * FROM `tb_admin.visitas`"); 
	$counterVisit->execute();

	$counterMonthVisit = $counterVisit->rowCount();

	$counterVisitOfDay = MySql::conect()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?"); 
	$counterVisitOfDay->execute(array(date('Y-m-d')));

	$visitOfDay = $counterVisitOfDay->rowCount();

	$userPainel = MySql::conect()->prepare("SELECT * FROM `tb_admin.user` ORDER BY cargo DESC");
	$userPainel->execute();
	$userPainel = $userPainel->fetchAll();
?>
	
	<!-- Informações Gerais -->
	<div class="box-content w100">
		<h2><i class="fas fa-home"></i> Painel de Controle > </h2>
		<div class="wraper-painel">

			<div class="box-painel">
				<h3>Usuários Online</h3>
				<p><?php echo count($userOnline) ?></p>
			</div><!--box-painel-->

			<div class="box-painel">
				<h3>Total de Visitas</h3>
				<p><?php echo $counterMonthVisit; ?></p>
			</div><!--box-painel-->

			<div class="box-painel">
				<h3>Visitas Hoje</h3>
				<p><?php echo $visitOfDay; ?></p>
			</div><!--box-painel-->

		</div><!--wraper-painel-->
	</div><!--box-content-->

	<!-- Visitantes Online -->
	<div class="box-content w100">
		<h2><i class="fas fa-globe-americas"></i> Visitantes Online</h2>

		<div class="table">

			<div class="row">
				<div class="col">
					<p>Ip</p>
				</div><!--col-->
				<div class="col">
					<p>Ultima Ação</p>
				</div><!--col-->
			</div><!--row-->

			<?php foreach ($userOnline as $key => $value) { ?>

			<div class="row">
				<div class="col">
					<p><?php echo $value['ip']; ?></p>
				</div><!--col-->
				<div class="col">
					<p><?php echo date('d/m/Y H:i:s',strtotime($value['ultimo_acesso'])); ?></p>
				</div><!--col-->
			</div><!--row-->

			<?php } ?>

		</div><!--table-->
	</div><!--box-content-->

	<!-- Usuário do Painel -->
	<div class="box-content w100">
		<h2><i class="fas fa-users"></i> Usuários do Painel</h2>

		<div class="table">

			<div class="row">
				<div class="col">
					<p>Nome</p>
				</div><!--col-->
				<div class="col">
					<p>Cargo</p>
				</div><!--col-->
			</div><!--row-->

			<?php foreach ($userPainel as $key => $value) { ?>

			<div class="row">
				<div class="col">
					<p><?php echo $value['nome']; ?></p>
				</div><!--col-->
				<div class="col">
					<p><?php echo getCargo($value['cargo']); ?></p>
				</div><!--col-->
			</div><!--row-->

			<?php } ?>

		</div><!--table-->
	</div><!--box-content-->
