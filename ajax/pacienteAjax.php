<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['paciente_dni_reg']) || isset($_POST['paciente_id_del']) || isset($_POST['paciente_id_up'])) {

		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/pacienteControlador.php";
		$ins_paciente = new pacienteControlador();

		/*--------- Agregar un paciente ---------*/
		if (isset($_POST['paciente_dni_reg']) && isset($_POST['paciente_nombre_reg'])) {
			echo $ins_paciente->agregar_paciente_controlador();
		}

		/*--------- Eliminar un paciente ---------*/
		if (isset($_POST['paciente_id_del'])) {
			echo $ins_paciente->eliminar_paciente_controlador();
		}

		/*--------- Actualizar un paciente ---------*/
		if (isset($_POST['paciente_id_up'])) {
			echo $ins_paciente->actualizar_paciente_controlador();
		}

	} else {
		session_start(['name'=>'SISCOST']);
		session_unset();
		session_destroy();
		header("Location: ".SERVERURL."login/");
		exit();
	}
