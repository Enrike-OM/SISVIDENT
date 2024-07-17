<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="far fa-calendar-plus fa-fw"></i> &nbsp; AGENDAR CITA
    </h3>
</div>

<!-- Content -->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/citaAjax.php" method="POST" data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-user-md"></i> &nbsp; Datos del Odontólogo</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="odontologo_nombre" class="bmd-label-floating">Nombre del Odontólogo</label>
                            <input type="text" class="form-control" name="odontologo_nombre_reg" id="odontologo_nombre" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="odontologo_apellido" class="bmd-label-floating">Apellido del Odontólogo</label>
                            <input type="text" class="form-control" name="odontologo_apellido_reg" id="odontologo_apellido" maxlength="50" required="">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-user"></i> &nbsp; Datos del Paciente</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paciente_nombre" class="bmd-label-floating">Nombre del Paciente</label>
                            <input type="text" class="form-control" name="paciente_nombre_reg" id="paciente_nombre" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paciente_apellido" class="bmd-label-floating">Apellido del Paciente</label>
                            <input type="text" class="form-control" name="paciente_apellido_reg" id="paciente_apellido" maxlength="50" required="">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-notes-medical"></i> &nbsp; Datos de la Cita</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tratamiento" class="bmd-label-floating">Tratamiento o Consulta</label>
                            <input type="text" class="form-control" name="tratamiento_reg" id="tratamiento" maxlength="100" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="hora" class="bmd-label-floating">Hora de la Cita</label>
                            <input type="time" class="form-control" name="hora_reg" id="hora" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="fecha" class="bmd-label-floating">Fecha de la Cita</label>
                            <input type="date" class="form-control" name="fecha_reg" id="fecha" required="">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; AGENDAR</button>
        </p>
    </form>
</div>
