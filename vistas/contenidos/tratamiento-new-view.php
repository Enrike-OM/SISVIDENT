<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR TRATAMIENTO
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque laudantium necessitatibus eius iure adipisci modi distinctio. Earum repellat iste et aut, ullam, animi similique sed soluta tempore cum quis corporis!
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL ?>tratamiento-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR TRATAMIENTO</a>
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
	<form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/tratamientoAjax.php" method="POST" data-form="save" autocomplete="off">
		<fieldset>
			<legend><i class="far fa-plus-square"></i> &nbsp; Información del tratamiento</legend>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="form-group">
							<label for="tratamiento_codigo" class="bmd-label-floating">Código</label>
							<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="tratamiento_codigo_reg" id="tratamiento_codigo" maxlength="45">
						</div>
					</div>
					
					<div class="col-12 col-md-4">
						<div class="form-group">
							<label for="tratamiento_nombre" class="bmd-label-floating">Nombre</label>
							<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="tratamiento_nombre_reg" id="tratamiento_nombre" maxlength="140">
						</div>
					</div>
					<!-- <div class="col-12 col-md-4">
						<div class="form-group">
							<label for="tratamiento_stock" class="bmd-label-floating">Stock</label>
							<input type="num" pattern="[0-9]{1,9}" class="form-control" name="tratamiento_stock_reg" id="tratamiento_stock" maxlength="9">
						</div>
					</div>Page header -->
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="tratamiento_estado" class="bmd-label-floating">Estado</label>
							<select class="form-control" name="tratamiento_estado_reg" id="tratamiento_estado">
								<option value="" selected="">Seleccione una opción</option>
								<option value="Habilitado">Habilitado</option>
								<option value="Deshabilitado">Deshabilitado</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="tratamiento_detalle" class="bmd-label-floating">Detalle</label>
							<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="tratamiento_detalle_reg" id="tratamiento_detalle" maxlength="190">
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