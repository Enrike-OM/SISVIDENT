<?php

	if($peticionAjax){
		require_once "../modelos/tratamientoModelo.php";
	}else{
		require_once "./modelos/tratamientoModelo.php";
	}

	class tratamientoControlador extends tratamientoModelo{

		/*--------- Controlador agregar tratamiento ---------*/
		public function agregar_tratamiento_controlador() {
			 $codigo = mainModel::limpiar_cadena($_POST['tratamiento_codigo_reg']);
            $nombre = mainModel::limpiar_cadena($_POST['tratamiento_nombre_reg']);
            $estado = mainModel::limpiar_cadena($_POST['tratamiento_estado_reg']);
            $detalle = mainModel::limpiar_cadena($_POST['tratamiento_detalle_reg']);

    		/*== comprobar campos vacíos ==*/
            if ($codigo == "" || $nombre == "" || $estado == "" || $detalle == "") {
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
            if (mainModel::verificar_datos("[a-zA-Z0-9-]{1,45}", $codigo)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El codigo no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}", $nombre)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El nombre no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($detalle!="") {
	            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}", $detalle)) {
	                $alerta = [
	                    "Alerta" => "simple",
	                    "Titulo" => "Ocurrió un error inesperado",
	                    "Texto" => "El APELLIDO no coincide con el formato solicitado",
	                    "Tipo" => "error"
	                ];
	                echo json_encode($alerta);
	                exit();
	            }
            }
            if ($estado!="Habilitado" && $estado!="Deshabilitado") {
            	$alerta = [
	                    "Alerta" => "simple",
	                    "Titulo" => "Ocurrió un error inesperado",
	                    "Texto" => "El estado del tratamiento no coincide con el formato solicitado",
	                    "Tipo" => "error"
	                ];
	            echo json_encode($alerta);
	            exit();
            }
            
            /*== comprobar codigo ==*/
            $check_codigo = mainModel::ejecutar_consulta_simple("SELECT tratamiento_codigo FROM tratamiento WHERE tratamiento_codigo='$codigo'");
            if ($check_codigo->rowCount() > 0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El codigo ingresado ya se encuentra registrado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /*== comprobar nombre ==*/
            $check_nombre = mainModel::ejecutar_consulta_simple("SELECT tratamiento_nombre FROM tratamiento WHERE tratamiento_nombre='$nombre'");
            if ($check_nombre->rowCount() > 0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El nombre del tratamiento ingresado ya se encuentra registrado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            $datos_tratamiento_reg = [
                "Codigo" => $codigo,
                "Nombre" => $nombre,
                "Estado" => $estado,
                "Detalle" => $detalle,
            ];

            $agregar_tratamiento=tratamientoModelo::agregar_tratamiento_modelo($datos_tratamiento_reg);

            if ($agregar_tratamiento->rowCount()==1) {
            	$alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Tratamiento registrado",
                    "Texto" => "Los datos del tratamiento han sido registrados con exito",
                    "Tipo" => "success"
                ];
            }else{
            	$alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido registrar el tratamiento, intente nuevamente",
                    "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);
		}/*Fin Controlador*/

		/*--------- Controlador paginar tratamientos ---------*/
        public function paginador_tratamiento_controlador($pagina,$registros,$privilegio,$url,$busqueda){

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
                $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM tratamiento WHERE tratamiento_codigo LIKE '%$busqueda%' OR tratamiento_nombre LIKE '%$busqueda%' ORDER BY tratamiento_codigo ASC LIMIT $inicio,$registros";
            }else{
                $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM tratamiento ORDER BY tratamiento_codigo ASC LIMIT $inicio,$registros";
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
                                <th>CODIGO</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>DETALLE</th>';
                                if ($privilegio==1 || $privilegio==2) {
                                    $tabla.='<th>ACTUALIZAR</th>';
                                }
                                
                                if ($privilegio==1) {
                                    $tabla.='<th>ELIMINAR</th>';
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
                                <td>'.$rows['tratamiento_codigo'].'</td>
                                <td>'.$rows['tratamiento_nombre'].'</td>
                                <td>'.$rows['tratamiento_estado'].'</td>
                                <td><button type="button" class="btn btn-info" data-toggle="popover" data-trigger="hover" title="'.$rows['tratamiento_nombre'].'"data-content="'.$rows['tratamiento_detalle'].'">
                                        <i class="fas fa-info-circle"></i>
                                    </button></td>';
                                    if ($privilegio==1 || $privilegio==2) {
                                        $tabla.='<td>
                                            <a href="'.SERVERURL.'tratamiento-update/'.mainModel::encryption($rows['tratamiento_id']).'/" class="btn btn-success">
                                                <i class="fas fa-sync-alt"></i> 
                                            </a>
                                        </td>';

                                    }

                                    if ($privilegio==1) {
                                        $tabla.='<td>
                                            <form class="FormularioAjax" action="'.SERVERURL.'ajax/tratamientoAjax.php" method="POST" data-form="delete" autocomplete="off">
                                                <input type="hidden" name="tratamiento_id_del" value="'.mainModel::encryption($rows['tratamiento_id']).'">
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
                    $tabla.='<tr class="text-center" ><td colspan="7">
                    <a href="'.$url.'" class="btn btn-raised btn-primary btn-sm">Haga click aqui para recargar el listado</a>
                    </td></tr>';
                }else{
                    $tabla.='<tr class="text-center" ><td colspan="7">No hay registros en el sistema</td></tr>';
                }
                
            }
            $tabla.='</tbody></table></div>';


            if ($total>=1 && $pagina<=$Npaginas) {
                $tabla.='<p class="text-right">Mostrando tratamiento '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
                $tabla.=mainModel::paginador_tablas($pagina,$Npaginas,$url,7);
            }

            return $tabla;
        }/* Fin controlador */

        /*--------- Controlador eliminar tratamiento ---------*/
		public function eliminar_tratamiento_controlador() {

			//recibiendo id
			$id=mainModel::decryption($_POST['tratamiento_id_del']);
			$id=mainModel::limpiar_cadena($id);

			//comprobar tratamiento en la db
			$check_tratamiento=mainModel::ejecutar_consulta_simple("SELECT tratamiento_id FROM tratamiento WHERE  tratamiento_id='$id'");

			if ($check_tratamiento->rowCount()<=0) {
				$alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El tratamiento que intenta eliminar no existe en el sistema",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
			}

			/*
			//comprobar detalles de tratamiento
			$check_tratamiento=mainModel::ejecutar_consulta_simple("SELECT tratamiento_id FROM detalle WHERE  tratamiento_id='$id' LIMIT 1");

			if ($check_tratamiento->rowCount()>0) {
				$alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No podemos eliminar el tratamiento, porque tiene citas asociadas, recomendamos deshabilitar el tratamientos si ya no sera usado en el sistema",
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

            $eliminar_tratamiento=tratamientoModelo::eliminar_tratamiento_modelo($id);

            if ($eliminar_tratamiento->rowCount()==1) {
            	$alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Tratamiento eliminado",
                    "Texto" => "El tratamiento ha sido eliminado con exito",
                    "Tipo" => "success"
                ];
            }else{
            	$alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido eliminar el tratamiento del sistema, por favor intente nuevamente",
                    "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);
		}/* Fin controlador */


		/*--------- Controlador datos tratamiento ---------*/
        public function datos_tratamiento_controlador($tipo,$id) {
            $tipo=mainModel::limpiar_cadena($tipo);

            $id=mainModel::decryption($id);
            $id=mainModel::limpiar_cadena($id);

            return tratamientoModelo::datos_tratamiento_modelo($tipo,$id);
        }/* Fin controlador */

        /*--------- Controlador actualizar tratamiento ---------*/
        public function actualizar_tratamiento_controlador() {

        	// Recuperar id 
            $id=mainModel::decryption($_POST['tratamiento_id_up']);
            $id=mainModel::limpiar_cadena($id);

            //Comprobar el tratamiento en la DB
            $check_tratamiento=mainModel::ejecutar_consulta_simple("SELECT * FROM tratamiento WHERE tratamiento_id='$id'");
            if ($check_tratamiento->rowCount()<=0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos encontrado el tratamiento en el sistema",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }else{
                $campos=$check_tratamiento->fetch();
            }

            $codigo=mainModel:: limpiar_cadena($_POST[ 'tratamiento_codigo_up']);
			$nombre=mainModel:: limpiar_cadena($_POST[ 'tratamiento_nombre_up']);
			$estado=mainModel:: limpiar_cadena($_POST[ 'tratamiento_estado_up']);
			$detalle=mainModel::limpiar_cadena($_POST[ 'tratamiento_detalle_up']);

			/*== comprobar campos vacíos ==*/
            if ($codigo == "" || $nombre == "" || $estado == "" || $detalle == "") {
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
            if (mainModel::verificar_datos("[a-zA-Z0-9-]{1,45}", $codigo)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El codigo no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}", $nombre)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "El nombre no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if ($detalle!="") {
	            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}", $detalle)) {
	                $alerta = [
	                    "Alerta" => "simple",
	                    "Titulo" => "Ocurrió un error inesperado",
	                    "Texto" => "El detalle no coincide con el formato solicitado",
	                    "Tipo" => "error"
	                ];
	                echo json_encode($alerta);
	                exit();
	            }
            }
            if ($estado!="Habilitado" && $estado!="Deshabilitado") {
            	$alerta = [
	                    "Alerta" => "simple",
	                    "Titulo" => "Ocurrió un error inesperado",
	                    "Texto" => "El estado del tratamiento no coincide con el formato solicitado",
	                    "Tipo" => "error"
	                ];
	            echo json_encode($alerta);
	            exit();
            }
            
            /*== comprobar codigo ==*/
            if ($codigo!=$campos['tratamiento_codigo']) {
	            $check_codigo = mainModel::ejecutar_consulta_simple("SELECT tratamiento_codigo FROM tratamiento WHERE tratamiento_codigo='$codigo'");
	            if ($check_codigo->rowCount() > 0) {
	                $alerta = [
	                    "Alerta" => "simple",
	                    "Titulo" => "Ocurrió un error inesperado",
	                    "Texto" => "El codigo ingresado ya se encuentra registrado",
	                    "Tipo" => "error"
	                ];
	                echo json_encode($alerta);
	                exit();
	            }
            }

            /*== comprobar nombre ==*/
            if ($nombre!=$campos['tratamiento_nombre']) {
	            $check_nombre = mainModel::ejecutar_consulta_simple("SELECT tratamiento_nombre FROM tratamiento WHERE tratamiento_nombre='$nombre'");
	            if ($check_nombre->rowCount() > 0) {
	                $alerta = [
	                    "Alerta" => "simple",
	                    "Titulo" => "Ocurrió un error inesperado",
	                    "Texto" => "El nombre del tratamiento ingresado ya se encuentra registrado",
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

            $datos_tratamiento_up = [
                "Codigo" => $codigo,
                "Nombre" => $nombre,
                "Estado" => $estado,
                "Detalle" => $detalle,
                "ID" =>$id
            ];

            if (tratamientoModelo::actualizar_tratamiento_modelo($datos_tratamiento_up)) {
            	 $alerta = [
                        "Alerta" => "recargar",
                        "Titulo" => "Tratamiento actualizado",
                        "Texto" => "Los datos del tratamiento fueron actualizados con exito",
                        "Tipo" => "success"
                ];
            }else{
            	 $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrió un error inesperado",
                        "Texto" => "No hemos podido actualizar los datos del tratamiento, intente nuevamente",
                        "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);
         }/* Fin controlador */
	}