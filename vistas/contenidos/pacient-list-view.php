<div class="full-box page-header">
	<h3 class="text-left">
		<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTES
	</h3>
	<p class="text-justify">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
	</p>
</div>

<div class="container-fluid">
	<ul class="full-box list-unstyled page-nav-tabs">
		<li>
			<a href="<?php echo SERVERURL ?>pacient-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PACIENTE</a>
		</li>
		<li>
			<a class="active" href="<?php echo SERVERURL ?>pacient-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTES</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL ?>pacient-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PACIENTE</a>
		</li>
	</ul>	
</div>

<div class="container-fluid">
	<?php
		require_once "./controladores/pacienteControlador.php";
		$ins_paciente = new pacienteControlador();

		echo $ins_paciente->paginador_paciente_controlador($pagina[1],3,$_SESSION['privilegio_siscost'],$pagina[0],"");
	?>
</div>