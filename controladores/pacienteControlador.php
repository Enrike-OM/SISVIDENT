<?php
    if ($peticionAjax) {
        require_once "../modelos/pacienteModelo.php";
    } else {
        require_once "./modelos/pacienteModelo.php";
    }

    class pacienteControlador extends pacienteModelo {
        /*--------- Controlador agregar paciente ---------*/
        public function agregar_paciente_controlador() {
            $dni = mainModel::limpiar_cadena($_POST['paciente_dni_reg']);
            $nombre = mainModel::limpiar_cadena($_POST['paciente_nombre_reg']);
            $apellido = mainModel::limpiar_cadena($_POST['paciente_apellido_reg']);
            $telefono = mainModel::limpiar_cadena($_POST['paciente_telefono_reg']);
            $direccion = mainModel::limpiar_cadena($_POST['paciente_direccion_reg']);
            $lugarNacimiento = mainModel::limpiar_cadena($_POST['paciente_lugarNacimiento_reg']);
            $fechaNacimiento = mainModel::limpiar_cadena($_POST['paciente_fechaNacimiento_reg']);
            $gradoInstruccion = mainModel::limpiar_cadena($_POST['paciente_gradoInstruccion_reg']);
            $ocupacion = mainModel::limpiar_cadena($_POST['paciente_ocupacion_reg']);
            $religion = mainModel::limpiar_cadena($_POST['paciente_religion_reg']);
            $estadoCivil = mainModel::limpiar_cadena($_POST['paciente_estadoCivil_reg']);
            $emergencia = mainModel::limpiar_cadena($_POST['paciente_emergencia_reg']);
            $parentesco = mainModel::limpiar_cadena($_POST['paciente_parentesco_reg']);
            $motivoConsulta = mainModel::limpiar_cadena($_POST['paciente_motivoConsulta_reg']);
            $enfermedad = mainModel::limpiar_cadena($_POST['paciente_enfermedad_reg']);

            /*== comprobar campos vacíos ==*/
            if ($dni == "" || $nombre == "" || $apellido == "" || $telefono == "" || $direccion == "" || $emergencia == "") {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No has llenado todos los campos que son obligatorios",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*== Verificando integridad de los datos ==*/
            if (mainModel::verificar_datos("[0-9-]{6,20}", $dni)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El DNI no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El nombre no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El apellido no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($telefono != "") {
                if (mainModel::verificar_datos("[0-9()+]{8,20}", $telefono)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El telefono no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            if ($direccion != "") {
                if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $direccion)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "La direccion no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            /*== comprobar Lugar de nacimiento ==*/
            if ($direccion != "") {
                if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $lugarNacimiento)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El lugar de nacimiento no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            /*== comprobar fecha de nacimiento ==*/
            if (mainModel::verificar_fecha($fechaNacimiento)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La fecha de nacimiento no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($direccion != "") {
                if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $gradoInstruccion)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El grado de instrucción no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }


            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $ocupacion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La ocupación no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }


            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $religion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La religión no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $estadoCivil)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El estado civil no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($emergencia != "") {
                if (mainModel::verificar_datos("[0-9()+]{8,20}", $emergencia)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El contacto de emergencia no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $parentesco)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El parentesco no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $motivoConsulta)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El motivo de consulta no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $enfermedad)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La enfermedad actual no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }


            //Formateando fecha de Nacimiento
            $fecha_inicio=date("Y-m-d",strtotime($fechaNacimiento));

            $datos_paciente_reg = [
                "DNI" => $dni,
                "Nombre" => $nombre,
                "Apellido" => $apellido,
                "Telefono" => $telefono,
                "Direccion" => $direccion,
                "LugarNacimiento" => $lugarNacimiento,
                "FechaNacimiento" => $fechaNacimiento,
                "GradoInstruccion" => $gradoInstruccion,
                "Ocupacion" => $ocupacion,
                "Religion" => $religion,
                "EstadoCivil" => $estadoCivil,
                "Emergencia" => $emergencia,
                "Parentesco" => $parentesco,
                "MotivoConsulta" => $motivoConsulta,
                "Enfermedad" => $enfermedad
            ];

            $agregar_paciente = pacienteModelo::agregar_paciente_modelo($datos_paciente_reg);
            if ($agregar_paciente->rowCount() == 1) {
                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Paciente registrado",
                    "Texto" => "Los datos del Paciente se registraron con éxito",
                    "Tipo" => "success"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido registrar el paciente, por favor intente nuevamente",
                    "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);
        }/*Fin Controlador*/


        /*--------- Controlador paginar pacientes ---------*/
        public function paginador_paciente_controlador($pagina,$registros,$privilegio,$url, $busqueda){

            $pagina=mainModel::limpiar_cadena($pagina);
            $registros=mainModel::limpiar_cadena($registros);
            $privilegio=mainModel::limpiar_cadena($privilegio);
            
            $url=mainModel::limpiar_cadena($url);
            $url=SERVERURL.$url."/";

            $busqueda=mainModel::limpiar_cadena($busqueda);
            $tabla="";

            $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
            $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

            if (isset($busqueda) && $busqueda!="") {
                $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM paciente WHERE paciente_dni LIKE '%$busqueda%' OR paciente_nombre LIKE '%$busqueda%' OR paciente_apellido LIKE '%$busqueda%' OR paciente_telefono LIKE '%$busqueda%' ORDER BY paciente_nombre ASC LIMIT $inicio,$registros";
            }else{
                $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM paciente ORDER BY paciente_nombre ASC LIMIT $inicio,$registros";
            }

            $conexion= mainModel::conectar();

            $datos = $conexion->query($consulta);
            $datos = $datos->fetchAll();

            $total = $conexion->query("SELECT FOUND_ROWS()");
            $total = (int) $total->fetchColumn();

            $Npaginas=ceil($total/$registros);

            $tabla.='<div class="table-responsive">
                    <table class="table table-dark table-sm">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>DNI</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>TELÉFONO</th>
                                <th>DIRECCION</th>';
                                if ($privilegio==1 || $privilegio==2) {
                                    $tabla.='<th>ACTUALIZAR</th>';
                                }
                                
                                if ($privilegio==1) {
                                    $tabla.='<th>HISTORIA</th>
                                    <th>ELIMINAR</th>';
                                }
                                
                            $tabla.='</tr>
                        </thead>
                        <tbody>';

            if ($total>=1 && $pagina<=$Npaginas) {
                $contador=$inicio+1;

                $reg_inicio=$inicio+1;

                foreach($datos as $rows){
                    $tabla.='<tr class="text-center" >
                                <td>'.$contador.'</td>
                                <td>'.$rows['paciente_dni'].'</td>
                                <td>'.$rows['paciente_nombre'].'</td>
                                <td>'.$rows['paciente_apellido'].'</td>
                                <td>'.$rows['paciente_telefono'].'</td>
                                <td><button type="button" class="btn btn-info" data-toggle="popover" data-trigger="hover" title="'.$rows['paciente_nombre'].' '.$rows['paciente_apellido'].' "data-content="'.$rows['paciente_direccion'].'">
                                        <i class="fas fa-info-circle"></i>
                                    </button></td>';
                                    if ($privilegio==1 || $privilegio==2) {
                                        $tabla.='
                                        <td>
                                            <a href="'.SERVERURL.'pacient-update/'.mainModel::encryption($rows['paciente_id']).'/" class="btn btn-success">
                                                <i class="fas fa-sync-alt"></i> 
                                            </a>
                                        </td>';

                                    }

                                    if ($privilegio==1) {
                                        $tabla.=
                                        '<td><a href="'.SERVERURL.'pacient-historia/'.mainModel::encryption($rows['paciente_id']).'/" class="btn btn-success">
                                            <i class="fas fa-clipboard-list fa-fw"></i>
                                        </a></td>';

                                        $tabla.='<td>
                                            <form class="FormularioAjax" action="'.SERVERURL.'ajax/pacienteAjax.php" method="POST" data-form="delete" autocomplete="off">
                                                <input type="hidden" name="paciente_id_del" value="'.mainModel::encryption($rows['paciente_id']).'">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>';
                                    }
                            $tabla.='</tr>';
                            $contador++;
                }
                $reg_final=$contador-1;

            }else{
                if ($total>=1) {
                    $tabla.='<tr class="text-center" ><td colspan="9">
                    <a href="'.$url.'" class="btn btn-raised btn-primary btn-sm">Haga click aqui para recargar el listado</a>
                    </td></tr>';
                }else{
                    $tabla.='<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td></tr>';
                }
                
            }
            $tabla.='</tbody></table></div>';


            if ($total>=1 && $pagina<=$Npaginas) {
                $tabla.='<p class="text-right">Mostrando paciente '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
                $tabla.=mainModel::paginador_tablas($pagina,$Npaginas,$url,7);
            }

            return $tabla;
        }/* Fin controlador */

        /*--------- Controlador eliminar paciente ---------*/
        public function eliminar_paciente_controlador() {

            //Recuperar id cliente
            $id=mainModel::decryption($_POST['paciente_id_del']);
            $id=mainModel::limpiar_cadena($id);

            //Comprobar el paciente en la DB
            $chek_cliente=mainModel::ejecutar_consulta_simple("SELECT paciente_id FROM paciente WHERE paciente_id='$id'");
            if ($chek_cliente->rowCount()<=0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos encontrado el cliente en el sistema",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

           /* //Comprobar prestamos
            $check_prestamos=mainModel::ejecutar_consulta_simple("SELECT paciente_id FROM prestamo WHERE paciente_id='$id' LIMIT 1");
            if ( $check_prestamos->rowCount()>0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No podemos eliminar el paciente del sistema porque tiene cita",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }*/

            //Comprobar los privilegios
            session_start(['name'=>'SISCOST']);
            if ($_SESSION['privilegio_siscost']!=1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No tienes los premisos necesarios para realizar esta operacion",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            $eliminar_paciente=pacienteModelo::eliminar_paciente_modelo($id);

            if ($eliminar_paciente->rowCount()==1) {
                $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Paciente eliminado",
                    "Texto" => "El paciente ha sido eliminado del sistema con exito",
                    "Tipo" => "success"
                ];
            }else{
                 $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido eliminar el paciente, por favor intente nuevamente",
                    "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);

        }/* Fin controlador */

        /*--------- Controlador datos paciente ---------*/
        public function datos_paciente_controlador($tipo,$id) {
            $tipo=mainModel::limpiar_cadena($tipo);

            $id=mainModel::decryption($id);
            $id=mainModel::limpiar_cadena($id);

            return pacienteModelo::datos_paciente_modelo($tipo,$id);
        }/* Fin controlador */

        /*--------- Controlador actualizar paciente ---------*/
        public function actualizar_paciente_controlador() {
            // Recuperar id 
            $id=mainModel::decryption($_POST['paciente_id_up']);
            $id=mainModel::limpiar_cadena($id);

            //Comprobar el paciente en la DB
            $check_paciente=mainModel::ejecutar_consulta_simple("SELECT * FROM paciente WHERE paciente_id='$id'");
            if ($check_paciente->rowCount()<=0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos encontrado al paciente en el sistema",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }else{
                $campos=$check_paciente->fetch();
            }

            $dni = mainModel::limpiar_cadena($_POST['paciente_dni_up']);
            $nombre = mainModel::limpiar_cadena($_POST['paciente_nombre_up']);
            $apellido = mainModel::limpiar_cadena($_POST['paciente_apellido_up']);
            $telefono = mainModel::limpiar_cadena($_POST['paciente_telefono_up']);
            $direccion = mainModel::limpiar_cadena($_POST['paciente_direccion_up']);
            $lugarNacimiento = mainModel::limpiar_cadena($_POST['paciente_lugarNacimiento_up']);
            $fechaNacimiento = mainModel::limpiar_cadena($_POST['paciente_fechaNacimiento_up']);
            $gradoInstruccion = mainModel::limpiar_cadena($_POST['paciente_gradoInstruccion_up']);
            $ocupacion = mainModel::limpiar_cadena($_POST['paciente_ocupacion_up']);
            $religion = mainModel::limpiar_cadena($_POST['paciente_religion_up']);
            $estadoCivil = mainModel::limpiar_cadena($_POST['paciente_estadoCivil_up']);
            $emergencia = mainModel::limpiar_cadena($_POST['paciente_emergencia_up']);
            $parentesco = mainModel::limpiar_cadena($_POST['paciente_parentesco_up']);
            $motivoConsulta = mainModel::limpiar_cadena($_POST['paciente_motivoConsulta_up']);
            $enfermedad = mainModel::limpiar_cadena($_POST['paciente_enfermedad_up']);

            /*== comprobar campos vacíos ==*/
            if ($dni == "" || $nombre == "" || $apellido == "" || $telefono == "" || $direccion == "" || $emergencia == "") {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No has llenado todos los campos que son obligatorios",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[0-9-]{6,20}", $dni)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El DNI no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El nombre no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El apellido no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($telefono != "") {
                if (mainModel::verificar_datos("[0-9()+]{8,20}", $telefono)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El telefono no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            if ($direccion != "") {
                if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $direccion)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "La direccion no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            /*== comprobar Lugar de nacimiento ==*/
            if ($direccion != "") {
                if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $lugarNacimiento)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El lugar de nacimiento no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            /*== comprobar fecha de nacimiento ==*/
            if (mainModel::verificar_fecha($fechaNacimiento)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La fecha de nacimiento no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($direccion != "") {
                if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $gradoInstruccion)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El grado de instrucción no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }


            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $ocupacion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La ocupación no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }


            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $religion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La religión no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $estadoCivil)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El estado civil no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($emergencia != "") {
                if (mainModel::verificar_datos("[0-9()+]{8,20}", $emergencia)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El contacto de emergencia no coincide con el formato solicitado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $parentesco)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El parentesco no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $motivoConsulta)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El motivo de consulta no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}", $enfermedad)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La enfermedad actual no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*== comprobar DNI ==*/
            if ($dni!=$campos['paciente_dni']) {
                $check_dni = mainModel::ejecutar_consulta_simple("SELECT paciente_dni FROM paciente WHERE paciente_dni='$dni'");
                if ($check_dni->rowCount() > 0) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "El DNI ingresado ya se encuentra registrado",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            //Comprobando privilegios
            session_start(['name'=>'SISCOST']);
            if($_SESSION['privilegio_siscost']<1 || $_SESSION['privilegio_siscost']>2) {
                $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "No tienes los premisos necesarios para realizar esta operacion",
                        "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            $datos_paciente_up=[
                "DNI"=>$dni,
                "Nombre"=>$nombre,
                "Apellido"=>$apellido,
                "Telefono"=>$telefono,
                "Direccion"=>$direccion,
                "ID"=>$id
            ];

            if (pacienteModelo::actualizar_paciente_modelo($datos_paciente_up)) {
                $alerta = [
                        "Alerta" => "recargar",
                        "Titulo" => "Paciente actualizado",
                        "Texto" => "Los datos del paciente han sido actualizados",
                        "Tipo" => "success"
                ];
            }else{
                $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "No hemos podido actualizar los datos del cliente, por favor intente nuevamente",
                        "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);
        }/* Fin controlador */

    }
