<?php
if($_SESSION['privilegio_siscost']<1 || $_SESSION['privilegio_siscost']>2){
    echo $lc->forzar_cierre_sesion_controlador();
    exit();
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; HISTORIA DEL PACIENTE
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem odit amet asperiores quis minus, dolorem repellendus optio doloremque error a omnis soluta quae magnam dignissimos, ipsam, temporibus sequi, commodi accusantium!
    </p>
</div>

<div class="container-fluid">
    <?php
    require_once "./controladores/historiaControlador.php";

    $ins_historia= new historiaControlador();

    //$datos_historia=$ins_historia->datos_historia_controlador("Unico",$pagina[1]);

    //if ($datos_historia->rowCount()==1) {
    //$campos=$datos_historia->fetch();
    ?>
        <form action="<?php echo SERVERURL; ?>ajax/historiaAjax.php" method="POST" data-form="update" autocomplete="off">
        <input type="hidden" name="paciente_id_up" value="<?php echo $pagina[1]?>">
        <fielset>
            <legend><i class="fas fa-user"></i> &nbsp; Formulario</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paciente_motivoConsulta" class="bmd-label-floating">Motivo de consulta</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_motivoConsulta_reg" id="paciente_motivoConsulta" maxlength="1500">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paciente_enfermedad" class="bmd-label-floating">Enfermedad Actual</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_enfermedad_reg" id="paciente_enfermedad" maxlength="150">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-sm">
                    <thead>
                    <tr class="text-center roboto-medium">
                        <th COLSPAN="6"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <!--Pregunta 1-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Está usted bajo tratamiento médico?</b></td>
                    </tr>
                    <!--Respuesta 1-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta1_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion1" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion1_reg" id="formulario_descripcion1" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 2-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Toma actualmente algún medicamento?</b></td>
                    </tr>
                    <!--Respuesta 2-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta2_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion2" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion2_reg" id="formulario_descripcion2" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 3-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Le han practicado alguna intervencion quirurgica?</b></td>
                    </tr>
                    <!--Respuesta 3-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta3_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion3" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion3_reg" id="formulario_descripcion3" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 4-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Ha recibido alguna transfusión sanguinea?</b></td>
                    </tr>
                    <!--Respuesta 4-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta4_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion4" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion4_reg" id="formulario_desccripcion4" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 5-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Ha consumido o consume drogas?</b></td>
                    </tr>
                    <!--Respuesta 5-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta5_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion5" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion5_reg" id="formulario_descripcion5" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 6-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Ha presentado reaccion a...?</b></td>
                    </tr>
                    <!--Respuesta 6_1-->
                    <tr>
                        <td class="text-center " colspan="1">Penisilina</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta6_1_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion6_1" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion6_1_reg" id="formulario_descripcion6_1" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 6_2-->
                    <tr>
                        <td class="text-center " colspan="1">Anestesia</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta6_2_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion6_2" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion6_2_reg" id="formulario_descripcion6_2" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 6_3-->
                    <tr>
                        <td class="text-center " colspan="1">Aspirina, yodo, Methiolate,otros.</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta6_3_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_desccripcion6_3" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion6_3_reg" id="formulario_descripcion6_3" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 7-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Sufre de tención arterial?</b></td>
                    </tr>
                    <!--Respuesta 7-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta7_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Alta</option>
                                    <option value="2">Baja</option>
                                    <option value="3">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion7" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion7_reg" id="formulario_descripcion7" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 8-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Sangra excesivamente al cortarse?</b></td>
                    </tr>
                    <!--Respuesta 8-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta8_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion8" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion8_reg" id="formulario_descripcion8" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 9-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Padece o a padecido algún problema sanguineo?</b><br>Anemia, leucemia, hemofilia, deficit Vit. K.</td>
                    </tr>
                    <!--Respuesta 9-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta9_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion9" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion9_reg" id="formulario_descripcion9" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 10-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Usted es V.I.H.+?</b></td>
                    </tr>
                    <!--Respuesta 10-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta10_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion10" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion10_reg" id="formulario_descripcion10" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 11-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Toma algún medicamento retroviral?</b></td>
                    </tr>
                    <!--Respuesta 11-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta11_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion11" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion11_reg" id="formulario_descripcion11" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 12-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Está usted embarazada?</b></td>
                    </tr>
                    <!--Respuesta 12-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta12_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion12" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion12_reg" id="formulario_descripcion12" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 13-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Esta tomando actualmente pastillas anticonceptivas?</b></td>
                    </tr>
                    <!--Respuesta 13-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta13_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion13" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion13_reg" id="formulario_descripcion13" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 14-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Sufre o ha sufido de...?</b></td>
                    </tr>
                    <!--Respuesta 14_1-->
                    <tr>
                        <td class="text-center " colspan="1">Enfermedades venereas</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_1_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_1" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_1_reg" id="formulario_descripcion14_1" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 14_2-->
                    <tr>
                        <td class="text-center " colspan="1">Problemas del corazón</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_2_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_2" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_2_reg" id="formulario_descripcion14_2" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 14_3-->
                    <tr>
                        <td class="text-center " colspan="1">Hepatitis</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_3_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_3" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_3_reg" id="formulario_descripcion14_3" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 14_4-->
                    <tr>
                        <td class="text-center " colspan="1">Fiebre reumatica</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_4_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descipcion14_4" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_4_reg" id="formulario_descripcion14_4" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 14_5-->
                    <tr>
                        <td class="text-center " colspan="1">Asma</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_5_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_5" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_5_reg" id="formulario_descripcion14_5" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 14_6-->
                    <tr>
                        <td class="text-center " colspan="1">Diabetes</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_6_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_6" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_6_reg" id="formulario_descripcion14_6" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 14_7-->
                    <tr>
                        <td class="text-center " colspan="1">Úlcera gastrica</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_7_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_7" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_7_reg" id="formulario_descripcion14_7" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 12_8-->
                    <tr  >
                        <td class="text-center " colspan="1">Tiroides</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control text-center" name="formulario_respuesta14_8_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group">
                                <label for="formulario_descripcion14_8" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion14_8_reg" id="formulario_descripcion14_8" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 15-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Ah tenido limitación al abrir o cerrar la boca?</b></td>
                    </tr>
                    <!--Respuesta 15-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta15_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion15" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion15_reg" id="formulario_descripcion15" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 16-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Siente ruidos en la mandibula al abrir o cerrar la boca?</b></td>
                    </tr>
                    <!--Respuesta 16-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta16_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion16" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion16_reg" id="formulario_descripcion16" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 17-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Siente ruidos en la mandibula al abrir o cerrar la boca?</b></td>
                    </tr>
                    <!--Respuesta 17-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta17_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion17" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion17_reg" id="formulario_descripcion17" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 18-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Sufre de herpes o aftas recurrentes?</b></td>
                    </tr>
                    <!--Respuesta 18-->
                    <tr>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta18_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion18" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion18_reg" id="formulario_descripcion18" maxlength="550">
                            </div>
                        </td>
                    </tr>

                    <!--Pregunta 19-->
                    <tr class="text-center roboto-medium">
                        <td colspan="6"><b>¿Presenta alguno de los siguientes hábitos?</b></td>
                    </tr>
                    <!--Respuesta 19_1-->
                    <tr>
                        <td class="text-center " colspan="1">¿Morderse las uñas o labios?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_1_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion19_1" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_1_reg" id="formulario_descripcion19_1" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 19_2-->
                    <tr>
                        <td class="text-center " colspan="1">¿Fumas?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_2_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion19_2" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_2_reg" id="formulario_descripcion19_2" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 19_3-->
                    <tr>
                        <td class="text-center " colspan="1">¿Morderse las uñas o labios?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_3_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion19_3" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_3_reg" id="formulario_descripcion19_3" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 19_4-->
                    <tr>
                        <td class="text-center " colspan="1">¿Consumo de alimentos citricos?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_4_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion19_4" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_4_reg" id="formulario_descripcion19_4" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 19_5-->
                    <tr>
                        <td class="text-center " colspan="1">¿Muerde objetos con los dientes?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_5_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion19_5" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_5_reg" id="formulario_descripcion19_5" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 19_6-->
                    <tr>
                        <td class="text-center " colspan="1">¿Apretamiento dentario?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_6_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion19_6" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_6_reg" id="formulario_descripcion19_6" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    <!--Respuesta 19_7-->
                    <tr>
                        <td class="text-center " colspan="1">¿Respiración bucal?</td>
                        <td colspan="1">
                            <div class="form-group" >
                                <select class="form-control " name="formulario_respuesta19_7_reg">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="5">
                            <div class="form-group align-content-center">
                                <label for="formulario_descripcion17_7" class="bmd-label-floating">Descripción</label>
                                <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="formulario_descripcion19_7_reg" id="formulario_descripcion19_7" maxlength="550">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div><!--FIN DE FORMULARIO-->
            <br><br>
            <legend><i class="fas fa-user"></i> &nbsp; Antecedentes Familiares</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="formulario_antecedentes" class="bmd-label-floating">Escriba aqui</label>
                            <input type="text" pattern="[0-9-]{1,27}" class="form-control" name="formulario_antecedentes_reg" id="formulario_antecedentes" maxlength="27">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <legend><i class="fas fa-user"></i> &nbsp; Exploración Física</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="form-group">
                            <label for="paciente_pa" class="bmd-label-floating">P.A.</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_pa_reg" id="paciente_pa" maxlength="150">
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="form-group">
                            <label for="paciente_pulso" class="bmd-label-floating">Pulso</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_pulso_reg" id="paciente_pulso" maxlength="150">
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="form-group">
                            <label for="paciente_temperatura" class="bmd-label-floating">Temperatura</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_temperatura_reg" id="paciente_temperatura" maxlength="150">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="paciente_fc" class="bmd-label-floating">F.C.</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_fc_reg" id="paciente_fc" maxlength="150">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="paciente_fr" class="bmd-label-floating">F.R.</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_fr_reg" id="paciente_fr" maxlength="150">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="paciente_peso" class="bmd-label-floating">Peso</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_peso_reg" id="paciente_peso" maxlength="150">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="paciente_talla" class="bmd-label-floating">Talla</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_talla_reg" id="paciente_talla" maxlength="150">
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="paciente_examen" class="bmd-label-floating">Examen clinico gerenals</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="paciente_examen_reg" id="paciente_examen" maxlength="150">
                        </div>
                    </div>
                </div>
            </div>
            <legend><i class="fas fa-user"></i> &nbsp; Odontograma</legend>
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="centrar-div">
                    <canvas id="background" class="col-12 col-md-12" width="1024" height="500"></canvas>
                    <canvas id="pad" class="col-12 col-md-12" width="1024" height="500"></canvas>
                </div>
                <br><br><br>
                <div class="centrar-div">
                    <input type="color" id="colorPicker"> <!-- Selector de color -->
                    <input type="range" id="lineWidthSlider" min="1" max="10" value="1"> <!-- Control deslizante para el grosor de línea -->

                </div>
            </div>

            <script src="<?php echo SERVERURL; ?>vistas/js/jquery-3.5.1.min.js" ></script>
            <script>
                var backgroundCanvas = document.getElementById("background"); // Capa de fondo
                var backgroundContext = backgroundCanvas.getContext("2d"); // Contexto de dibujo para el fondo
                var canvas = document.getElementById("pad"); // Obtener el elemento canvas por su ID
                var context = canvas.getContext("2d"); // Obtener el contexto de dibujo en 2D
                var isDrawing = false; // Variable para rastrear si se está dibujando o no
                var lastX = 0; // Variable para almacenar la última posición X del mouse
                var lastY = 0; // Variable para almacenar la última posición Y del mouse
                var imageLoaded = false; // Variable para verificar si la imagen está cargada

                // Precargar la imagen
                var odontogramaImg = new Image();
                odontogramaImg.onload = function () {
                    imageLoaded = true;
                    backgroundContext.drawImage(odontogramaImg, 0, 0, backgroundCanvas.width, backgroundCanvas.height);
                };
                odontogramaImg.src = "<?php echo SERVERURL; ?>vistas/assets/img/odontograma.jpg";

                // Función para iniciar el dibujo
                function startDrawing(event) {
                    if (!imageLoaded) return; // No iniciar el dibujo si la imagen no está cargada
                    isDrawing = true;
                    var rect = canvas.getBoundingClientRect(); // Obtener el tamaño y la posición del lienzo
                    var parentRect = canvas.parentElement.getBoundingClientRect(); // Obtener el tamaño y la posición del contenedor padre
                    var scaleX = canvas.width / parentRect.width; // Calcular la escala en X
                    var scaleY = canvas.height / parentRect.height; // Calcular la escala en Y
                    var offsetX = 5 / scaleX; // Calcular el ajuste en X
                    lastX = (event.clientX - rect.left) * scaleX - offsetX; // Calcular la posición X del mouse relativa al lienzo
                    lastY = (event.clientY - rect.top) * scaleY; // Calcular la posición Y del mouse relativa al lienzo
                }

                // Función para dibujar
                function draw(event) {
                    if (!isDrawing || !imageLoaded) return; // Si no se está dibujando, salir de la función
                    var rect = canvas.getBoundingClientRect(); // Obtener el tamaño y la posición del lienzo
                    var parentRect = canvas.parentElement.getBoundingClientRect(); // Obtener el tamaño y la posición del contenedor padre
                    var scaleX = canvas.width / parentRect.width; // Calcular la escala en X
                    var scaleY = canvas.height / parentRect.height; // Calcular la escala en Y
                    var offsetX = 5 / scaleX; // Calcular el ajuste en X
                    var currentX = (event.clientX - rect.left) * scaleX - offsetX; // Calcular la posición X actual del mouse relativa al lienzo
                    var currentY = (event.clientY - rect.top) * scaleY; // Calcular la posición Y actual del mouse relativa al lienzo
                    context.beginPath(); // Comenzar un nuevo trazo
                    context.moveTo(lastX, lastY); // Mover el punto de dibujo a la posición anterior
                    context.lineTo(currentX, currentY); // Dibujar una línea desde la posición anterior hasta la posición actual
                    context.stroke(); // Dibujar la línea en el lienzo

                    lastX = currentX; // Actualizar la última posición X con la posición actual
                    lastY = currentY; // Actualizar la última posición Y con la posición actual
                }

                // Agregar el manejador de eventos para iniciar el dibujo al hacer clic en el lienzo
                $('#pad').on({
                    mousedown: startDrawing,
                    mousemove: draw,
                    mouseup: function() {
                        isDrawing = false; // Establecer la variable isDrawing en false para indicar que no se está dibujando
                    }
                });

                // Agregar el manejador de eventos para cambiar el color de dibujo al cambiar el valor del selector de color
                $('#colorPicker').change(function () {
                    var color = $(this).val(); // Obtener el valor del color seleccionado
                    context.strokeStyle = color; // Establecer el color de dibujo en el contexto
                });

                // Agregar el manejador de eventos para cambiar el grosor de línea al deslizar el control deslizante
                $('#lineWidthSlider').on('input', function () {
                    var lineWidth = $(this).val(); // Obtener el valor del grosor de línea seleccionado
                    context.lineWidth = lineWidth; // Establecer el grosor de línea en el contexto
                });

                // Agregar el manejador de eventos para limpiar el lienzo al hacer clic en el botón "Limpiar"
                $('#clearButton').click(function () {
                    // Agregar animación de desvanecimiento al limpiar el lienzo
                    $('#pad').fadeOut('slow', function () {
                        context.clearRect(0, 0, canvas.width, canvas.height); // Borrartodo el contenido del lienzo
                        $(this).fadeIn('slow'); // Mostrar el lienzo nuevamente después de limpiarlo
                    });
                });

                // Agregar el manejador de eventos para guardar el dibujo al hacer clic en el botón "Guardar"
                $('#saveButton').click(function () {
                    var dataURL = canvas.toDataURL(); // Obtener la representación de la imagen del lienzo en formato base64
                    var link = document.createElement('a'); // Crear un elemento de enlace
                    link.href = dataURL; // Establecer la URL base64 como destino del enlace
                    link.download = 'dibujo.png'; // Establecer el nombre de archivo para descargar
                    link.click(); // Hacer clic en el enlace para iniciar la descarga del archivo
                });
            </script>
        </fielset>
            <!--FIN FORMULARIO-->

            <div class="form-group text-center">

                <button id="clearButton">Limpiar</button> <!-- Botón para limpiar el lienzo -->
                <button id="saveButton">Guardar</button> <!-- Botón para guardar el dibujo -->
            </div>
        </form>
</div>