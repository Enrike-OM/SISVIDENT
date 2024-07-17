<?php
	if($_SESSION['privilegio_siscost']<1 || $_SESSION['privilegio_siscost']>2){
		echo $lc->forzar_cierre_sesion_controlador();
		exit();
	}
?>
<div class="full-box page-header">
	<h3 class="text-left">
		<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR PACIENTE
	</h3>
	<p class="text-justify">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem odit amet asperiores quis minus, dolorem repellendus optio doloremque error a omnis soluta quae magnam dignissimos, ipsam, temporibus sequi, commodi accusantium!
	</p>
</div>

<div class="container-fluid">
	<ul class="full-box list-unstyled page-nav-tabs">
		<li>
			<a href="<?php echo SERVERURL ?>pacient-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PACIENTE</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL ?>pacient-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTES</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL ?>pacient-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PACIENTE</a>
		</li>
	</ul>	
</div>

<div class="container-fluid">
	<?php
		require_once "./controladores/pacienteControlador.php";

		$ins_paciente= new pacienteControlador();

		$datos_paciente=$ins_paciente->datos_paciente_controlador("Unico",$pagina[1]);

		if ($datos_paciente->rowCount()==1) {
			$campos=$datos_paciente->fetch();
	?>
            <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/pacienteAjax.php" method="POST" data-form="update" autocomplete="off">
                <input type="hidden" name="paciente_id_up" value="<?php echo $pagina[1]?>">
                <fieldset>
                    <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="paciente_dni" class="bmd-label-floating">DNI</label>
                                    <input type="text" pattern="[0-9-]{1,27}" class="form-control" name="paciente_dni_up" value="<?php echo isset($campos['paciente_dni']) ? $campos['paciente_dni'] : ''; ?>" id="paciente_dni" maxlength="27">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="paciente_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="paciente_nombre_up" value="<?php echo isset($campos['paciente_nombre']) ? $campos['paciente_nombre'] : ''; ?>" id="paciente_nombre" maxlength="40">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_apellido" class="bmd-label-floating">Apellido</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="paciente_apellido_up" value="<?php echo isset($campos['paciente_apellido']) ? $campos['paciente_apellido'] : ''; ?>" id="paciente_apellido" maxlength="40">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_telefono" class="bmd-label-floating">Teléfono</label>
                                    <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="paciente_telefono_up" value="<?php echo isset($campos['paciente_telefono']) ? $campos['paciente_telefono'] : ''; ?>" id="paciente_telefono" maxlength="20">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_direccion" class="bmd-label-floating">Dirección</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_direccion_up" value="<?php echo isset($campos['paciente_direccion']) ? $campos['paciente_direccion'] : ''; ?>" id="paciente_direccion" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_lugarNacimiento" class="bmd-label-floating">Lugar de Nacimiento</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_lugarNacimiento_up" value="<?php echo isset($campos['paciente_lugarNacimiento']) ? $campos['paciente_lugarNacimiento'] : ''; ?>" id="paciente_lugarNacimiento" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_fechaNacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="paciente_fechaNacimiento_up" value="<?php echo date("Y-m-d");?>" id="paciente_fechaNacimiento">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_gradoInstruccion" class="bmd-label-floating">Grado de instrucción</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_gradoInstruccion_up" value="<?php echo isset($campos['paciente_gradoInstruccion']) ? $campos['paciente_gradoInstruccion'] : ''; ?>" id="paciente_gradoInstruccion" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_ocupacion" class="bmd-label-floating">Ocupación</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_ocupacion_up" value="<?php echo isset($campos['paciente_ocupacion']) ? $campos['paciente_ocupacion'] : ''; ?>" id="paciente_ocupacion" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_religion" class="bmd-label-floating">Religión</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_religion_up" value="<?php echo isset($campos['paciente_religion']) ? $campos['paciente_religion'] : ''; ?>" id="paciente_religion" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_estadoCivil" class="bmd-label-floating">Estado civil</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_estadoCivil_up" value="<?php echo isset($campos['paciente_estadoCivil']) ? $campos['paciente_estadoCivil'] : ''; ?>" id="paciente_estadoCivil" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_emergencia" class="bmd-label-floating">En caso de emergencia llamar a...</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_emergencia_up" value="<?php echo isset($campos['paciente_emergencia']) ? $campos['paciente_emergencia'] : ''; ?>" id="paciente_emergencia" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="paciente_parentesco" class="bmd-label-floating">Parentesco</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_parentesco_up" value="<?php echo isset($campos['paciente_parentesco']) ? $campos['paciente_parentesco'] : ''; ?>" id="paciente_parentesco" maxlength="150">
                                </div>
                            </div>
                            <!-- Otros campos adicionales aquí -->
                        </div>
                    </div>
                </fieldset>
                <br><br><br>
                <p class="text-center" style="margin-top: 40px;">
                    <button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
                </p>
            </form>>


        <?php }else{ ?>
	<div class="alert alert-danger text-center" role="alert">
		<p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
		<h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
		<p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
	</div>
	<?php }?>
</div>