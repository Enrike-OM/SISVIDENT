<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CITA
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quod harum vitae, fugit quo soluta. Molestias officiis voluptatum delectus doloribus at tempore, iste optio quam recusandae numquam non inventore dolor.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL ?>reservation-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CITA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>reservation-reservation/"><i class="far fa-calendar-alt"></i> &nbsp; RESERVACIONES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>reservation-pending/"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; CITAS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>reservation-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; FINALIZADOS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>reservation-search/"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; BUSCAR POR FECHA</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="container-fluid form-neon">
        <div class="container-fluid">
            <p class="text-center roboto-medium">AGREGAR PACIENTE - TRATAMIENTO - ODONTOLOGO</p>
            <p class="text-center">
                <?php if (empty($_SESSION['datos_paciente'])) {
                ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPaciente"><i class="fas fa-user-plus"></i> &nbsp; Agregar paciente</button>
                <?php } ?>
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTratamiento"><i class="fas fa-box-open"></i> &nbsp; Agregar tratamiento</button>
                
                <?php if (empty($_SESSION['datos_odontologo'])) {
                ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOdontologo"><i class="fas fa-user-plus"></i> &nbsp; Agregar odontologo</button>
                <?php } ?>
            </p>
            <div>
                <span class="roboto-medium">PACIENTE:</span>
                <?php if (empty($_SESSION['datos_paciente'])) {
                ?>
                <span class="text-danger">&nbsp; <i class="fas fa-exclamation-triangle"></i> Seleccione un paciente</span>
                <?php }else{ ?>
                <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/citaAjax.php" method="POST" data-form="loans" style="display: inline-block !important;">
                    <input type="hidden" name="id_eliminar_paciente" value="<?php echo $_SESSION['datos_paciente']['ID'];?>">
                    <?php echo $_SESSION['datos_paciente']['Nombre']." ".$_SESSION['datos_paciente']['Apellido']." (".$_SESSION['datos_paciente']['DNI'].")";?>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                </form>
                <?php } ?>
            </div>

            <div>
                <span class="roboto-medium">ODONTOLOGO:</span>
                <?php if (empty($_SESSION['datos_odontologo'])) {
                ?>
                <span class="text-danger">&nbsp; <i class="fas fa-exclamation-triangle"></i> Seleccione un odontologo</span>
                <?php }else{ ?>
                <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/citaAjax.php" method="POST" data-form="loans" style="display: inline-block !important;">
                    <input type="hidden" name="id_eliminar_odontologo" value="<?php echo $_SESSION['datos_odontologo']['ID'];?>">
                    <?php echo $_SESSION['datos_odontologo']['Nombre']." ".$_SESSION['datos_odontologo']['Apellido'];?>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                </form>
                <?php } ?>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-sm">
                    <thead>
                        <tr class="text-center roboto-medium">
                            <th>TRATAMIENTO</th>
                            <th>DETALLE</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (empty($_SESSION['datos_tratamiento'])) {

                        ?>


                        <tr class="text-center" >
                            <td colspan="3">No has seleccionado tratamientos</td>   
                        </tr>

                        
                        <?php
                                
                        }else{

                        ?>
                        <tr class="text-center" >
                            <td><?php echo $_SESSION['datos_tratamiento']['Nombre'];?></td>
                            
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="popover" data-trigger="hover" title=<?php echo $_SESSION['datos_tratamiento']['Nombre'];?> data-content=<?php echo $_SESSION['datos_tratamiento']['Detalle'];?>>
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </td>
                            <td>
                                <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/citaAjax.php" method="POST" data-form="loans" autocomplete="off">
                                    <input type="hidden" name="id_eliminar_tratamiento" value="<?php $_SESSION['datos_tratamiento']['ID'];?>">
                                    <button type="submit" class="btn btn-warning"> 
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/citaAjax.php" method="POST" data-form="save" autocomplete="off">
            <fieldset>
                <legend><i class="far fa-clock"></i> &nbsp; Fecha y hora de cita</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cita_fecha_inicio">Fecha de cita</label>
                                <input type="date" class="form-control" name="cita_fecha_inicio_reg" value="<?php echo date("Y-m-d");?>" id="cita_fecha_inicio">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cita_hora_inicio">Hora de cita</label>
                                <input type="time" class="form-control" value="<?php echo date("H:i");?>" name="cita_hora_inicio_reg" id="cita_hora_inicio">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend><i class="fas fa-cubes"></i> &nbsp; Otros datos</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="cita_estado" class="bmd-label-floating">Estado</label>
                                <select class="form-control" name="cita_estado_reg" id="cita_estado">
                                    <option value="" selected="" >Seleccione una opción</option>
                                    <option value="Reservacion">Reservación</option>

                                    <option value="Finalizado">Finalizado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cita_observacion" class="bmd-label-floating">Observación</label>
                                <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" class="form-control" name="cita_observacion_reg" id="cita_observacion" maxlength="400">
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
</div>


<!-- MODAL PACIENTE -->
<div class="modal fade" id="ModalPaciente" tabindex="-1" role="dialog" aria-labelledby="ModalPaciente" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalPaciente">Agregar paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="input_paciente" class="bmd-label-floating">DNI, Nombre, Apellido, Telefono</label>
                        <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="input_paciente" id="input_paciente" maxlength="30">
                    </div>
                </div>
                <br>
                <div class="container-fluid" id="tabla_pacientes"></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="buscar_paciente()"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar</button>
                &nbsp; &nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- MODAL Tratamiento -->
<div class="modal fade" id="ModalTratamiento" tabindex="-1" role="dialog" aria-labelledby="ModalTratamiento" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTratamiento">Agregar Tratamiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="input_tratamiento" class="bmd-label-floating">Código, Nombre</label>
                        <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="input_tratamiento" id="input_tratamiento" maxlength="30">
                    </div>
                </div>
                <br>
                <div class="container-fluid" id="tabla_tratamiento">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="buscar_tratamiento()"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar</button>
                &nbsp; &nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ODONTOLOGO -->
<div class="modal fade" id="ModalOdontologo" tabindex="-1" role="dialog" aria-labelledby="ModalOdontologo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalOdontologo">Agregar odontologo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="input_odontologo" class="bmd-label-floating">ID, Nombre, Apellido</label>
                        <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="input_odontologo" id="input_odontologo" maxlength="30">
                    </div>
                </div>
                <br>
                <div class="container-fluid" id="tabla_odontologo"></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="buscar_odontologo()"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar</button>
                &nbsp; &nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<?php include_once "./vistas/inc/reservation.php";?>