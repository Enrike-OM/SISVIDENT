<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="far fa-calendar-alt fa-fw"></i> &nbsp; ACTUALIZAR CITA
    </h3>
</div>

<!-- Content -->
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL ?>cita-list/"><i class="fas fa-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL ?>cita-update/"><i class="far fa-calendar-alt fa-fw"></i> &nbsp; ACTUALIZAR CITA</a>
        </li>
    </ul>
</div>

<!-- Cita form -->
<div class="container-fluid">
    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/citaAjax.php" method="POST" data-form="update" autocomplete="off">
        <input type="hidden" name="cita_id_up" value="<?php echo $datos['cita_id']; ?>">
        <fieldset>
            <legend><i class="far fa-calendar-alt"></i> &nbsp; Información de la cita</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="odontologo_nombre" class="bmd-label-floating">Odontólogo</label>
                            <input type="text" class="form-control" name="odontologo_nombre_up" id="odontologo_nombre" value="<?php echo $datos['odontologo_nombre']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paciente_nombre" class="bmd-label-floating">Paciente</label>
                            <input type="text" class="form-control" name="paciente_nombre_up" id="paciente_nombre" value="<?php echo $datos['paciente_nombre']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tratamiento_consulta" class="bmd-label-floating">Tratamiento o Consulta</label>
                            <input type="text" class="form-control" name="tratamiento_consulta_up" id="tratamiento_consulta" value="<?php echo $datos['tratamiento_consulta']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="fecha_cita" class="bmd-label-floating">Fecha de Cita</label>
                            <input type="date" class="form-control" name="fecha_cita_up" id="fecha_cita" value="<?php echo $datos['fecha_cita']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="hora_cita" class="bmd-label-floating">Hora de Cita</label>
                            <input type="time" class="form-control" name="hora_cita_up" id="hora_cita" value="<?php echo $datos['hora_cita']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="estado_cita" class="bmd-label-floating">Estado de Cita</label>
                            <select class="form-control" name="estado_cita_up" id="estado_cita">
                                <option value="Pendiente" <?php if ($datos['estado_cita'] == "Pendiente") echo "selected"; ?>>Pendiente</option>
                                <option value="Cancelado" <?php if ($datos['estado_cita'] == "Cancelado") echo "selected"; ?>>Cancelado</option>
                                <option value="Atendido" <?php if ($datos['estado_cita'] == "Atendido") echo "selected"; ?>>Atendido</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR CAMBIOS</button>
        </p>
    </form>
</div>
