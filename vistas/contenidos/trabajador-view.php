<div class="full-box page-header">
	<h3 class="text-left">
		<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PACIENTE
	</h3>
	<p class="text-justify">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem odit amet asperiores quis minus, dolorem repellendus optio doloremque error a omnis soluta quae magnam dignissimos, ipsam, temporibus sequi, commodi accusantium!
	</p>
</div>

<div class="container-fluid">
	<ul class="full-box list-unstyled page-nav-tabs">
		<li>
			<a class="active" href="<?php echo SERVERURL ?>pacient-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR TRABAJADOR</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL ?>pacient-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TRABAJADOR</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL ?>pacient-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TRABAJDOR</a>
		</li>
	</ul>	
</div>

<div class="container-fluid">
		<form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/pacienteAjax.php" method="POST" data-form="save" autocomplete="off">
		<fieldset>
			<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="paciente_nombre" class="bmd-label-floating">Nombre</label>
							<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="trabajador_nombre_reg" id="trabajador_nombre" maxlength="40">
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="form-group">
							<label for="paciente_apellido" class="bmd-label-floating">Apellido</label>
							<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="trabajador_apellido_reg" id="trabajador_apellido" maxlength="40">
						</div>
					</div>
					
				</div>
			</div>
		</fieldset>
		<br><br><br>
		<p class="text-center" style="margin-top: 40px;">
			<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
			&nbsp; &nbsp;
			<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
		</p>
	</form>
</div>	

		