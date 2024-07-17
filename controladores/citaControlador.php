<?php

if ($peticionAjax) {
    require_once "../modelos/citaModelo.php";
} else {
    require_once "./modelos/citaModelo.php";
}

class citaControlador extends citaModelo{

    /*Controlador buscar paciente para cita*/
    public function buscar_paciente_cita_controlador(){

        /*-----------Recuperar el texto-----------*/
        $paciente = mainModel::limpiar_cadena($_POST['buscar_paciente']);

        /*-----------Comprobar el texto-----------*/
        if ($paciente == "") {
            return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                    Debes introducir el DNI, Nombre, Apellido o Teléfono
                </p>
            </div>';
            exit();
        }

        /*-----------Seleccionando pacientes en la db-----------*/
        $datos_paciente = mainModel::ejecutar_consulta_simple("SELECT * FROM paciente WHERE paciente_dni LIKE '%$paciente%' OR paciente_nombre LIKE '%$paciente%' OR paciente_apellido LIKE '%$paciente%' OR paciente_telefono LIKE '%$paciente%' ORDER BY paciente_nombre ASC");

        if ($datos_paciente->rowCount() >= 1) {
            $datos_paciente=$datos_paciente->fetchAll();

            $tabla='<div class="table-responsive"><table class="table table-hover table-bordered table-sm"><tbody>';
            foreach ($datos_paciente as $rows) {
                $tabla.='<tr class="text-center">
                                    <td>'.$rows['paciente_nombre'].' '.$rows['paciente_apellido'].' - '.$rows['paciente_dni'].'</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="agregar_paciente('.$rows['paciente_id'].')"><i class="fas fa-user-plus"></i></button>
                                    </td>
                        </tr>';
            }
            $tabla.='</tbody></table></div>';
            return $tabla;
        } else {
            return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                    No hemos encontrado ningún paciente en el sistema que coincida con <strong>"'.$paciente.'"</strong>
                </p>
            </div>';
            exit();
        }
    }/*-----------Fin controlador-----------*/

    /*Controlador agregar paciente para cita*/
    public function agregar_paciente_cita_controlador(){
        /*-----------Recuperar el id del paciente-----------*/
        $id = mainModel::limpiar_cadena($_POST['id_agregar_paciente']);
        /*-----------Comprobando el paciente en la bd----------*/
        $check_paciente = mainModel::ejecutar_consulta_simple("SELECT * FROM paciente WHERE paciente_id='$id'");

        if ($check_paciente->rowCount()<=0) {
            $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido encontrar el paciente en la base de datos",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
        }else{
            $campos=$check_paciente->fetch();

        }

        /*Iniciando la sesion*/

        session_start(['name'=>'SISCOST']);

        if (empty($_SESSION['datos_paciente'])) {
            $_SESSION['datos_paciente']=[
                "ID"=>$campos['paciente_id'],
                "DNI"=>$campos['paciente_dni'],
                "Nombre"=>$campos['paciente_nombre'],
                "Apellido"=>$campos['paciente_apellido']
            ];

             $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Paciente agregado",
                    "Texto" => "El paciente se agrego a la cita",
                    "Tipo" => "success"
                ];
                echo json_encode($alerta);
        }else{
             $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido agregar el paciente a la cita",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
        }
    }/*-----------Fin controlador-----------*/

    /*Controlador eliminar paciente para cita*/
    public function eliminar_paciente_cita_controlador(){
        
        /*iniciando session*/
        session_start(['name'=>'SISCOST']);

        unset($_SESSION['datos_paciente']);

        if (empty($_SESSION['datos_paciente'])) {
             $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Paciente removido",
                    "Texto" => "Los datos del paciennte han sido removidos con exito",
                    "Tipo" => "success"
                ];
        }else{
             $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "No hemos podido remover los datos del paciente",
                    "Tipo" => "error"
                ];
        }
        echo json_encode($alerta);
    }/*-----------Fin controlador-----------*/

    /*Controlador buscar tratamiento para cita*/
    public function buscar_tratamiento_cita_controlador(){

         /*-----------Recuperar el texto-----------*/
        $tratamiento = mainModel::limpiar_cadena($_POST['buscar_tratamiento']);

        /*-----------Comprobar el texto-----------*/
        if ($tratamiento == "") {
            return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                    Debes introducir el Codigo o nombre del tratamiento
                </p>
            </div>';
            exit();
        }

        /*-----------Seleccionando tratamiento en la db-----------*/
        $datos_tratamiento = mainModel::ejecutar_consulta_simple("SELECT * FROM tratamiento WHERE (tratamiento_codigo LIKE '%$tratamiento%' OR tratamiento_nombre LIKE '%$tratamiento%') AND (tratamiento_estado='Habilitado') ORDER BY tratamiento_nombre ASC");

        if ($datos_tratamiento->rowCount() >= 1) {

            $tabla='<div class="table-responsive"><table class="table table-hover table-bordered table-sm"><tbody>';
            foreach ($datos_tratamiento as $rows) {
                $tabla.='<tr class="text-center">
                                    <td>'.$rows['tratamiento_codigo'].'-'.$rows['tratamiento_nombre'].'</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="agregar_tratamiento('.$rows['tratamiento_id'].')"><i class="fas fa-box-open"></i></button>
                                    </td>
                        </tr>';
            
            $tabla.='</tbody></table></div>';
            return $tabla;
            }
        } else {
            return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                    No hemos encontrado ningún tratamiento que coincida con <strong>"'.$tratamiento.'"</strong>
                </p>
            </div>';
            exit();
        }
    }/*-----------Fin controlador-----------*/

     /*Controlador agregar tratamiento para cita*/
    public function agregar_tratamiento_cita_controlador(){
        /*-----------Recuperar el id del tratamiento-----------*/
        $id = mainModel::limpiar_cadena($_POST['id_agregar_tratamiento']);
        /*-----------Comprobando el tratamiento en la bd----------*/
        $check_tratamiento = mainModel::ejecutar_consulta_simple("SELECT * FROM tratamiento WHERE tratamiento_id='$id'AND tratamiento_estado='Habilitado'");

        if ($check_tratamiento->rowCount()<=0) {
            $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido encontrar el tratamiento en la base de datos",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
        }else{
            $campos=$check_tratamiento->fetch();

        }

        /*Iniciando la sesion*/

        session_start(['name'=>'SISCOST']);

        if (empty($_SESSION['datos_tratamiento'])) {
            $_SESSION['datos_tratamiento']=[
                "ID"=>$campos['tratamiento_id'],
                "Codigo"=>$campos['tratamiento_codigo'],
                "Nombre"=>$campos['tratamiento_nombre'],
                "Detalle"=>$campos['tratamiento_detalle']
            ];

             $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Tratamiento agregado",
                    "Texto" => "El tratamiento se agrego a la cita correctamente",
                    "Tipo" => "success"
                ];
                echo json_encode($alerta);
        }else{
             $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El tratamiento que intenta agregar ya se encuentra seleccionado para la cita",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
        }
    }/*-----------Fin controlador-----------*/

    /*Controlador eliminar tratamiento para cita*/
    public function eliminar_tratamiento_cita_controlador(){
        
        $id=mainModel::limpiar_cadena($_POST['id_eliminar_tratamiento']);
        /*iniciando session*/
        session_start(['name'=>'SISCOST']);

        unset($_SESSION['datos_tratamiento']);

        if (empty($_SESSION['datos_tratamiento'])) {
             $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Tratamiento removido",
                    "Texto" => "Los datos del tratamiento han sido removidos con exito",
                    "Tipo" => "success" 
                ];
        }else{
             $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "No hemos podido remover los datos del tratamiento",
                    "Tipo" => "error"
                ];
        }
        echo json_encode($alerta);
    }/*-----------Fin controlador-----------*/

    /*Controlador buscar odontologo para cita*/
    public function buscar_odontologo_cita_controlador(){

        /*-----------Recuperar el texto-----------*/
        $odontologo = mainModel::limpiar_cadena($_POST['buscar_odontologo']);

        /*-----------Comprobar el texto-----------*/
        if ($odontologo == "") {
            return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                    Debes introducir el ID, Nombre o Apellido
                </p>
            </div>';
            exit();
        }

        /*-----------Seleccionando odontologo en la db-----------*/
        $datos_odontologo = mainModel::ejecutar_consulta_simple("SELECT * FROM odontologo WHERE odontologo_id LIKE '%$odontologo%' OR odontologo_nombre LIKE '%$odontologo%' OR odontologo_apellido LIKE '%$odontologo%' ORDER BY odontologo_id ASC");

        if ($datos_odontologo->rowCount() >= 1) {
            $datos_odontologo=$datos_odontologo->fetchAll();

            $tabla='<div class="table-responsive"><table class="table table-hover table-bordered table-sm"><tbody>';
            foreach ($datos_odontologo as $rows) {
                $tabla.='<tr class="text-center">
                                    <td>'.$rows['odontologo_nombre'].' '.$rows['odontologo_apellido'].'</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="agregar_odontologo('.$rows['odontologo_id'].')"><i class="fas fa-user-plus"></i></button>
                                    </td>
                        </tr>';
            }
            $tabla.='</tbody></table></div>';
            return $tabla;
        } else {
            return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                    No hemos encontrado ningún odontologo en el sistema que coincida con <strong>"'.$odontologo.'"</strong>
                </p>
            </div>';
            exit();
        }
    }/*-----------Fin controlador-----------*/

    /*Controlador agregar odontologo para cita*/
    public function agregar_odontologo_cita_controlador(){
        /*-----------Recuperar el id del odontologo-----------*/
        $id = mainModel::limpiar_cadena($_POST['id_agregar_odontologo']);
        /*-----------Comprobando el odontologo en la bd----------*/
        $check_odontologo = mainModel::ejecutar_consulta_simple("SELECT * FROM odontologo WHERE odontologo_id='$id'");

        if ($check_odontologo->rowCount()<=0) {
            $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido encontrar el odontologo en la base de datos",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
        }else{
            $campos=$check_odontologo->fetch();

        }

        /*Iniciando la sesion*/

        session_start(['name'=>'SISCOST']);

        if (empty($_SESSION['datos_odontologo'])) {
            $_SESSION['datos_odontologo']=[
                "ID"=>$campos['odontologo_id'],
                "Nombre"=>$campos['odontologo_nombre'],
                "Apellido"=>$campos['odontologo_apellido']
            ];

             $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Odontologo agregado",
                    "Texto" => "El odontologo se agrego a la cita",
                    "Tipo" => "success"
                ];
                echo json_encode($alerta);
        }else{
             $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido agregar el odontologo a la cita",
                    "Tipo" => "error"
            ];
            echo json_encode($alerta);
        }
    }/*-----------Fin controlador-----------*/

    /*Controlador eliminar odontologo para cita*/
    public function eliminar_odontologo_cita_controlador(){
        
        
        /*iniciando session*/
        session_start(['name'=>'SISCOST']);

        unset($_SESSION['datos_odontologo']);

        if (empty($_SESSION['datos_odontologo'])) {
             $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Odontologo removido",
                    "Texto" => "Los datos del odontologo han sido removidos con exito",
                    "Tipo" => "success"
                ];
        }else{
             $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "No hemos podido remover los datos del odontologo",
                    "Tipo" => "error"
                ];
        }
        echo json_encode($alerta);
    }/*-----------Fin controlador-----------*/

    /*-------Controlador datos cita-----*/
    public function datos_cita_controlador($tipo,$id){
        $tipo=mainModel::limpiar_cadena($tipo);
        $id=mainModel::decryption($id);
        $id=mainModel::limpiar_cadena($id);
        return citaModelo::datos_cita_modelo($tipo, $id) ;
    }/*----------Fin Controlador----------*/

    /*-------Controlador agregar cita-----*/
    public function agregar_cita_controlador(){
        
        /*----------Iniciando la sesion----------*/
        session_start(['name'=>'SISCOST']);

        /*----------Comprobando tratamiento----------*/
        if (empty($_SESSION['datos_odontologo'])) {
            $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No haz seleccionado ningun tratamiento para la cita",
                    "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        /*----------Comprobando paciente----------*/
        if (empty($_SESSION['datos_paciente'])) {
            $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No haz seleccionado ningun paciente para la cita",
                    "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        /*----------Recibiendo datos del formulario----------*/
        $fecha_inicio=mainModel::limpiar_cadena($_POST['cita_fecha_inicio_reg']);
        $hora_inicio=mainModel::limpiar_cadena($_POST['cita_hora_inicio_reg']);
        $estado=mainModel::limpiar_cadena($_POST['cita_estado_reg']);
        $observacion=mainModel::limpiar_cadena($_POST['cita_observacion_reg']);

        /*----------Comprobando la integridad de los datos----------*/
        if (mainModel::verificar_fecha($fecha_inicio)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La fecha no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        if (mainModel::verificar_datos("([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])",$hora_inicio)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La hora no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        
        if (!empty($observacion)) {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,5000}", $observacion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El contenido de la observacion no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }                       
        }

        if ($estado!="Reservacion" && $estado!="Finalizado") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "El estado no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        /*== Formateando Fecha y Hora ==*/
        $fecha_inicio=date("Y-m-d",strtotime($fecha_inicio));
        $hora_inicio=date("h:i a",strtotime($hora_inicio));

        /*== Generar Codigo de cita ==*/
        $correlativo=mainModel::ejecutar_consulta_simple("SELECT cita_id FROM cita");
        $correlativo=($correlativo->rowCount())+1;
        $codigo=mainModel::generar_codigo_aleatorio("CC",7,$correlativo);

        $datos_cita_reg=[
            "Codigo"=>$codigo,
            "Fecha"=>$fecha_inicio,
            "Hora"=>$hora_inicio,
            "Estado"=>$estado,
            "Observacion"=>$observacion,
            "Usuario"=>$_SESSION['id_siscost'],
            "Paciente"=>$_SESSION['datos_paciente']['ID'],
            "Odontologo"=>$_SESSION['datos_odontologo']['ID'],
            "Tratamiento"=>$_SESSION['datos_tratamiento']['ID']
        ];

        /*== Agregar Cita ==*/
        $agregar_cita=citaModelo::agregar_cita_modelo($datos_cita_reg);

        if ($agregar_cita->rowCount()!=1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado (Error: 001)",
                "Texto" => "No hemos podido registrar la cita, por favor intente otra vez",
                "Tipo" => "error"
            ];
        }else{
            unset($_SESSION['datos_paciente']);
            unset($_SESSION['datos_odontologo']);
            unset($_SESSION['datos_tratamiento']);

            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "La cita registrada",
                "Texto" => "la cita ha sido registrada con exito",
                "Tipo" => "success"
            ];   
        }
        echo json_encode($alerta);
            exit();
    }/*----------Fin Controlador----------*/

}
