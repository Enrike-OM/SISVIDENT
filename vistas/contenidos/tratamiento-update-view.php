<?php
	if($_SESSION['privilegio_siscost']<1 || $_SESSION['privilegio_siscost']>2){
		echo $lc->forzar_cierre_sesion_controlador();
		exit();
	}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR TRATAMIENTO
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque laudantium necessitatibus eius iure adipisci modi distinctio. Earum repellat iste et aut, ullam, animi similique sed soluta tempore cum quis corporis!
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL ?>tratamiento-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR TRATAMIENTO</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>tratamiento-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TRATAMIENTOS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>tratamiento-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TRATAMIENTO</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
	<?php
		require_once "./controladores/tratamientoControlador.php";

		$ins_tratamiento= new tratamientoControlador();

		$datos_tratamiento=$ins_tratamiento->datos_tratamiento_controlador("Unico",$pagina[1]);

		if ($datos_tratamiento->rowCount()==1) {
			$campos=$datos_tratamiento->fetch();
	?>
	<form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/tratamientoAjax.php" method="POST" data-form="update" autocomplete="off">
		<input type="hidden" name="tratamiento_id_up" value="<?php echo $pagina[1];?>">
		<fieldset>
			<legend><i class="far fa-plus-square"></i> &nbsp; Información del tratamiento</legend>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="form-group">
							<label for="tratamiento_codigo" class="bmd-label-floating">Código</label>
							<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="tratamiento_codigo_up" value="<?php echo $campos['tratamiento_codigo'];?>" id="tratamiento_codigo" maxlength="45">
						</div>
					</div>
					
					<div class="col-12 col-md-4">
						<div class="form-group">
							<label for="tratamiento_nombre" class="bmd-label-floating">Nombre</label>
							<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="tratamiento_nombre_up" value="<?php echo $campos['tratamiento_nombre'];?>" id="tratamiento_nombre" maxlength="140">
						</div>
					</div>
					
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="tratamiento_estado" class="bmd-label-floating">Estado</label>
							<select class="form-control" name="tratamiento_estado_up" id="tratamiento_estado">
								<option value="Habilitado" <?php if($campos['tratamiento_estado']=="Habilitado"){echo 'selected=""';}?>>Habilitado <?php if($campos['tratamiento_estado']=="Habilitado"){echo '(Actual)';}?></option>
								<option value="Deshabilitado" <?php if($campos['tratamiento_estado']=="Deshabilitado"){echo 'selected=""';}?> >Deshabilitado <?php if($campos['tratamiento_estado']=="Deshabilitado"){echo '(Actual)';}?></option>
							</select>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="tratamiento_detalle" class="bmd-label-floating">Detalle</label>
							<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="tratamiento_detalle_up" value="<?php echo $campos['tratamiento_detalle'];?>" id="tratamiento_detalle" maxlength="190">
						</div>
					</div>
				</div>
			</div>
		</fieldset>
		<br><br><br>
		<p class="text-center" style="margin-top: 40px;">
			<button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
		</p>
	</form>
	<?php }else{ ?>
    <div class="alert alert-danger text-center" role="alert">
        <p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
        <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
        <p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
    </div>
    <?php }?>
</div>