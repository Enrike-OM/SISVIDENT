<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['buscar_paciente']) || isset($_POST['id_agregar_paciente']) || isset($_POST['id_eliminar_paciente']) || isset($_POST['buscar_tratamiento']) || isset($_POST['id_agregar_tratamiento']) || isset($_POST['id_eliminar_tratamiento']) || isset($_POST['buscar_odontologo']) || isset($_POST['id_agregar_odontologo']) || isset($_POST['id_eliminar_odontologo']) || isset($_POST['cita_fecha_inicio_reg'])) {

        /*--------- Instancia al controlador ---------*/
        require_once "../controladores/citaControlador.php";
        $ins_cita=new citaControlador();
        
        /*--------- Buscar Pacientes ---------*/
        if (isset($_POST['buscar_paciente'])) {
            echo $ins_cita->buscar_paciente_cita_controlador();
        }

         /*--------- Agregar Pacientes ---------*/
        if (isset($_POST['id_agregar_paciente'])) {
            echo $ins_cita->agregar_paciente_cita_controlador();
        }

         /*--------- Eliminar Pacientes ---------*/
        if (isset($_POST['id_eliminar_paciente'])) {
            echo $ins_cita->eliminar_paciente_cita_controlador();
        }

         /*--------- Buscar Tratamientos ---------*/
        if (isset($_POST['buscar_tratamiento'])) {
            echo $ins_cita->buscar_tratamiento_cita_controlador();
        }

        /*--------- Agregar Tratamientos ---------*/
        if (isset($_POST['id_agregar_tratamiento'])) {
            echo $ins_cita->agregar_tratamiento_cita_controlador();
        }

        /*--------- Eliminar Tratamientos ---------*/
        if (isset($_POST['id_eliminar_tratamiento'])) {
            echo $ins_cita->eliminar_tratamiento_cita_controlador();
        }

        /*--------- Buscar Odontologo ---------*/
        if (isset($_POST['buscar_odontologo'])) {
            echo $ins_cita->buscar_odontologo_cita_controlador();
        }

         /*--------- Agregar Odontologo ---------*/
        if (isset($_POST['id_agregar_odontologo'])) {
            echo $ins_cita->agregar_odontologo_cita_controlador();
        }

         /*--------- Eliminar Odontologo ---------*/
        if (isset($_POST['id_eliminar_odontologo'])) {
            echo $ins_cita->eliminar_odontologo_cita_controlador();
        }
         /*--------- Agregar Cita ---------*/
        if (isset($_POST['cita_fecha_inicio_reg'])) {
            echo $ins_cita->agregar_cita_controlador();
        }
    } else {
        session_start(['name'=>'SISCOST']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit();
    }

    