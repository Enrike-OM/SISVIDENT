<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['tratamiento_codigo_reg']) || isset($_POST['tratamiento_id_del']) || isset($_POST['tratamiento_id_up'])) {

		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/tratamientoControlador.php";
		$ins_tratamiento = new tratamientoControlador();

		/*--------- Agregar Tratamiento ---------*/
		if (isset($_POST['tratamiento_codigo_reg'])) {
			echo $ins_tratamiento->agregar_tratamiento_controlador();
		}

		/*--------- Eliminar Tratamiento ---------*/
		if (isset($_POST['tratamiento_id_del'])) {
			echo $ins_tratamiento->eliminar_tratamiento_controlador();
		}

		/*--------- Actualizar Tratamiento ---------*/
		if (isset($_POST['tratamiento_id_up'])) {
			echo $ins_tratamiento->actualizar_tratamiento_controlador();
		}

	} else {
		session_start(['name'=>'SISCOST']);
		session_unset();
		session_destroy();
		header("Location: ".SERVERURL."login/");
		exit();
	}
