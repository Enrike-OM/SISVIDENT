<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['historia_dni_reg']) || isset($_POST['historia_id_del']) || isset($_POST['historia_id_up'])) {

		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/pacienteControlador.php";
		$ins_paciente = new pacienteControlador();

		/*--------- Actualizar un paciente ---------*/
		if (isset($_POST['paciente_id_up'])) {
			echo $ins_historia->actualizar_historia_controlador();
		}

	} else {
		session_start(['name'=>'SISCOST']);
		session_unset();
		session_destroy();
		header("Location: ".SERVERURL."login/");
		exit();
	}
