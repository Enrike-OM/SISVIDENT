<div class="full-box page-header">
	<h3 class="text-left">
		<i class="fab fa-dashcube fa-fw"></i> &nbsp; DASHBOARD
	</h3>
	<p class="text-justify">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
	</p>
</div>

<!-- Content -->
<div class="full-box tile-container">
	<?php
		require_once "./controladores/pacienteControlador.php";
		$ins_paciente = new pacienteControlador();

		$total_pacientes = $ins_paciente->datos_paciente_controlador("Conteo",0);
	?>
	<a href="<?php echo SERVERURL ?>pacient-new/" class="tile">
		<div class="tile-tittle">Pacientes</div>
		<div class="tile-icon">
			<i class="fas fa-users fa-fw"></i>
			<p><?php echo $total_pacientes->rowCount();?> Registrados</p>
		</div>
	</a>
	
	<?php
		require_once "./controladores/tratamientoControlador.php";
		$ins_tratamiento = new tratamientoControlador();

		$total_tratamiento = $ins_tratamiento->datos_tratamiento_controlador("Conteo",0);
	?>

	<a href="<?php echo SERVERURL ?>tratamiento-list/" class="tile">
		<div class="tile-tittle">Tratamientos</div>
		<div class="tile-icon">
			<i class="fas fa-pallet fa-fw"></i>
			<p><?php echo $total_tratamiento->rowCount();?> Registrados</p>
		</div>
	</a>

	<?php
		require_once "./controladores/citaControlador.php";
		$ins_cita = new citaControlador();

		$total_reservacion = $ins_cita->datos_cita_controlador("Conteo_Reservacion",0);
		$total_finalizados = $ins_cita->datos_cita_controlador("Conteo_Finalizado",0);
	?>

	<a href="<?php echo SERVERURL ?>reservation-reservation/" class="tile">
		<div class="tile-tittle">Pendientes</div>
		<div class="tile-icon">
			<i class="far fa-calendar-alt fa-fw"></i>
			<p><?php echo $total_reservacion->rowCount();?> Registradas</p>
		</div>
	</a>

	<a href="<?php echo SERVERURL ?>reservation-list/" class="tile">
		<div class="tile-tittle">Finalizados</div>
		<div class="tile-icon">
			<i class="fas fa-clipboard-list fa-fw"></i>
			<p><?php echo $total_finalizados->rowCount();?> Registrados</p>
		</div>
	</a>

	<?php 
		if($_SESSION['privilegio_siscost']==1){
			require_once "./controladores/usuarioControlador.php";
			$ins_usuario = new usuarioControlador();
			$total_usuarios=$ins_usuario->datos_usuario_controlador("Conteo",0);
	?>
	<a href="<?php echo SERVERURL ?>user-list/" class="tile">
		<div class="tile-tittle">Usuarios</div>
		<div class="tile-icon">
			<i class="fas fa-user-secret fa-fw"></i>
			<p> <?php echo $total_usuarios->rowCount(); ?> </p>
		</div>
	</a>
	<?php }?>
</div>