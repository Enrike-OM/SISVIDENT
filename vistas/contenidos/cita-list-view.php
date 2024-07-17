<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-list fa-fw"></i> &nbsp; LISTA DE CITAS
    </h3>
</div>

<!-- Content -->
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL ?>cita-new/"><i class="far fa-calendar-plus fa-fw"></i> &nbsp; AGENDAR CITA</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL ?>cita-list/"><i class="fas fa-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>cita-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CITA</a>
        </li>
    </ul>
</div>

<!-- Citas table -->
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Odontólogo</th>
                <th class="text-center">Paciente</th>
                <th class="text-center">Tratamiento o Consulta</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Hora</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "./controladores/citaControlador.php";
            $ins_cita = new citaControlador();
            echo $ins_cita->tabla_citas_controlador();
            ?>
        </tbody>
    </table>
</div>
