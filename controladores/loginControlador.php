<?php
	if($peticionAjax){
		require_once "../modelos/loginModelo.php";
	}else{
		require_once "./modelos/loginModelo.php";
	}

	class loginControlador extends loginModelo{

		/*--Controlador para iniciar sesion--*/
		public function iniciar_sesion_controlador(){
			$usuario=mainModel::limpiar_cadena($_POST['usuario_log']);
			$clave=mainModel::limpiar_cadena($_POST['clave_log']);

			/*==Comprobar campos vacios==*/
			if ($usuario == "" || $clave == "") {
			    echo '
			    <script>
			        Swal.fire({
			            title: "Ocurrió un error inesperado",
			            text: "No has llenado todos los campos requeridos",
			            type: "error",
			            confirmButtonText: "Aceptar"
			        });
			    </script>
			    ';
			}


			/*== Verificando integridad de los datos ==*/

			if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $usuario)) {
			    echo '
			    <script>
			        Swal.fire({
			            title: "Ocurrio un error inesperado",
			            text: "El NOMBRE DE USUARIO no coincide con el formato solicitado",
			            type: "error",
			            confirmButtonText: "Aceptar"
			        });
			    </script>
			    ';
			}

			if (mainModel::verificar_datos("[-a-zA-Z0-9\$@.]{6,100}", $clave)) {
			    echo '
			    <script>
			        Swal.fire({
			            title: "Ocurrio un error inesperado",
			            text: "La CLAVE de usuario no coincide con el formato solicitado",
			            type: "error",
			            confirmButtonText: "Aceptar"
			        });
			    </script>
			    ';
			}

			$clave=mainModel::encryption($clave);

			$datos_login=[
				"Usuario"=>$usuario,
				"Clave"=>$clave
			];

			$datos_cuenta=loginModelo::iniciar_sesion_modelo($datos_login);
			if ($datos_cuenta->rowCount()==1) {
				$row=$datos_cuenta->fetch();

				session_start(['name'=>'SISCOST']);

				$_SESSION['id_siscost']=$row['usuario_id'];
				$_SESSION['nombre_siscost']=$row['usuario_nombre'];
				$_SESSION['apellido_siscost']=$row['usuario_apellido'];
				$_SESSION['usuario_siscost']=$row['usuario_usuario'];
				$_SESSION['privilegio_siscost']=$row['usuario_privilegio'];
				$_SESSION['token_siscost']=md5(uniqid(mt_rand(),true));

				return header("Location: ".SERVERURL."home/");
			}else{
				echo '
				<script>
					Swal.fire({
						title: "Ocurrio un error inesperado",
						text: "El USUARIO o CLAVE son incorrectos",
						type: "error",
						confirmButtonText: "Aceptar"
					});
				</script>
				';
			}
		}/*--Fin Controlador--*/

		/*--Controlador para forzar cierre de sesion--*/

		public function forzar_cierre_sesion_controlador(){
			session_unset();
			session_destroy();
			if (headers_sent()) {
				return "<script> window.location.href='".SERVERURL."login/';</script>";
			}else{
				return header("Location: ".SERVERURL."login/");
			}
		}/*--Fin Controlador--*/


		/*--Controlador cierre de sesion--*/
		public function cerrar_sesion_controlador(){
			session_start(['name'=>'SISCOST']);
			$token=mainModel::decryption($_POST['token']);
			$usuario=mainModel::decryption($_POST['usuario']);

			if ($token==$_SESSION['token_siscost'] && $usuario==$_SESSION['usuario_siscost']) {
				session_unset();
				session_destroy();
				$alerta=[
					"Alerta"=>"redireccionar",
					"URL"=>SERVERURL."login/"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No se pudo cerrar la sesion en el sistema",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
		}/*--Fin Controlador--*/

	}