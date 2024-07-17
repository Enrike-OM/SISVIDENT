<?php
if ($peticionAjax) {
    require_once "../modelos/historiaModelo.php";
} else {
    require_once "./modelos/historiaModelo.php";
}

class historiaControlador extends historiaModelo {
    /*--------- Controlador actualizar historia ---------*/
    public function actualizar_paciente_controlador() {
        // Recuperar id
        $id=mainModel::decryption($_POST['historia_id_up']);
        $id=mainModel::limpiar_cadena($id);

        //Comprobar la historia en la DB
        $check_historia_paciente=mainModel::ejecutar_consulta_simple("SELECT * FROM historia WHERE paciente_id='$id'");
        if ($check_historia_paciente->rowCount()<=0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos encontrado la historia del paciente en el sistema",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }else{
            $campos=$check_historia_paciente->fetch();
        }

        //¿Está usted bajo tratamiento médico?
        $r1 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta1_reg']);
        $d1 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion1_reg']);
        //¿Toma actualmente algún medicamento?
        $r2 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta2_reg']);
        $d2 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion2_reg']);
        //¿Le han practicado alguna intervencion quirurgica?
        $r3 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta3_reg']);
        $d3 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion3_reg']);
        //¿Ha recibido alguna transfusión sanguinea?
        $r4 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta4_reg']);
        $d4 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion4_reg']);
        //¿Ha consumido o consume drogas?
        $r5 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta5_reg']);
        $d5 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion5_reg']);
        //Penisilina
        $r6_1 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta6_1_reg']);
        $d6_1 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion6_1_reg']);
        //Anestesia
        $r6_2 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta6_2_reg']);
        $d6_2 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion6_2_reg']);
        //Aspirina, yodo, Methiolate,otros.
        $r6_3 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta6_3_reg']);
        $d6_3 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion6_3_reg']);
        //¿Sufre de tención arterial?
        $r7 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta7_reg']);
        $d7 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion7_reg']);
        //¿Sangra excesivamente al cortarse?
        $r8 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta8_reg']);
        $d8 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion8_reg']);
        //¿Padece o a padecido algún problema sanguineo?
        $r9 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta9_reg']);
        $d9 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion9_reg']);
        //¿Usted es V.I.H.+?
        $r10 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta10_reg']);
        $d10 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion10_reg']);
        //¿Toma algún medicamento retroviral?
        $r11 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta11_reg']);
        $d11 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion11_reg']);
        //¿Está usted embarazada?
        $r12 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta12_reg']);
        $d12 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion12_reg']);
        //¿Esta tomando actualmente pastillas anticonceptivas?
        $r13 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta13_reg']);
        $d13 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion13_reg']);
        //Enfermedades venereas
        $r14_1 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_1_reg']);
        $d14_1 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_1_reg']);
        //Problemas del corazón
        $r14_2 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_2_reg']);
        $d14_2 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_2_reg']);
        //Hepatitis
        $r14_3 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_3_reg']);
        $d14_3 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_3_reg']);
        //Fiebre reumatica
        $r14_4 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_4_reg']);
        $d14_4 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_4_reg']);
        //Asma
        $r14_5 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_5_reg']);
        $d14_5 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_5_reg']);
        //Diabetes
        $r14_6 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_6_reg']);
        $d14_6 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_6_reg']);
        //Diabetes
        $r14_7 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_7_reg']);
        $d14_7 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_7_reg']);
        //Tiroides
        $r14_8 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta14_8_reg']);
        $d14_8 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion14_8_reg']);
        //¿Ah tenido limitación al abrir o cerrar la boca?
        $r15 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta15_reg']);
        $d15 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion15_reg']);
        //¿Siente ruidos en la mandibula al abrir o cerrar la boca?
        $r16 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta16_reg']);
        $d16 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion16_reg']);
        //¿Siente ruidos en la mandibula al abrir o cerrar la boca?
        $r17 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta17_reg']);
        $d17 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion17_reg']);
        //¿Sufre de herpes o aftas recurrentes?
        $r18 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta18_reg']);
        $d18 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion18_reg']);
        //¿Morderse las uñas o labios?
        $r19_1 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_1_reg']);
        $d19_1 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_1_reg']);
        //¿Fumas?
        $r19_2 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_2_reg']);
        $d19_2 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_2_reg']);
        //¿Morderse las uñas o labios?
        $r19_3 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_3_reg']);
        $d19_3 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_3_reg']);
        //¿Consumo de alimentos citricos?
        $r19_4 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_4_reg']);
        $d19_4 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_4_reg']);
        //¿Muerde objetos con los dientes?
        $r19_5 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_5_reg']);
        $d19_5 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_5_reg']);
        //¿Apretamiento dentario?
        $r19_6 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_6_reg']);
        $d19_6 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_6_reg']);
        //¿Respiración bucal?
        $r19_7 = mainModel::limpiar_cadena($_POST['historia_formulario_respuesta19_7_reg']);
        $d19_7 = mainModel::limpiar_cadena($_POST['historia_formulario_descripcion19_7_reg']);

        $antecendentes = mainModel::limpiar_cadena($_POST['historia_formulario_antecedentes_reg']);
        $exploracion = mainModel::limpiar_cadena($_POST['historia_formulario_exploracion_reg']);

        /*== comprobar campos vacíos ==*/
        if ($r1 == "" || $r2 == "" || $r3 == "" || $r4 == "" || $r5 == "" || $r6_1 == "" ||
            $r6_2 == "" || $r6_3 == "" || $r7 == "" || $r8 == "" || $r9 == "" || $r10 == "" ) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No has llenado todos los campos que son obligatorios",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

        /*== comprobar integridad de datos ==*/

        //¿Está usted bajo tratamiento médico?
        if ($r1 != "Si" && $r1 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d1 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d1)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 2 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Toma actualmente algún medicamento?
        if ($r2 != "Si" && $r2 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 2 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d2 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d2)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 2 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Le han practicado alguna intervencion quirurgica?
        if ($r3 != "Si" && $r3 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 3 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d3 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d3)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 3 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Ha recibido alguna transfusión sanguinea?
        if ($r4 != "Si" && $r4 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 4 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d4 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d4)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 4 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Ha consumido o consume drogas?
        if ($r5 != "Si" && $r5 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 5 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d5 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d5)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 5 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Ha presentado reaccion a...?
        //Penisilina
        if ($r6_1 != "Si" && $r6_1 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 6.1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d6_1 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d6_1)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 6.1 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //Anestesia
        if ($r6_2 != "Si" && $r1 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 6.2 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d6_2 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d6_2)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 6.2 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //Aspirina, yodo, Methiolate,otros.
        if ($r6_3 != "Si" && $r6_3 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 6.3 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d6_3 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d6_3)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 6.3 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Sufre de tención arterial?
        if ($r7 != "Si" && $r7 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 7 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d7 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d7)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 7 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Sangra excesivamente al cortarse?
        if ($r8 != "Si" && $r8 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 8 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d8 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d8)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 8 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Padece o a padecido algún problema sanguineo?
        if ($r9 != "Si" && $r9 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 9 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d9 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d9)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 9 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Usted es V.I.H.+?
        if ($r10 != "Si" && $r10 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 10 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d10 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d10)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 10 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
        //¿Toma algún medicamento retroviral?
        if ($r11 != "Si" && $r11 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 11 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d11 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d11)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 11 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Está usted embarazada?
        if ($r12 != "Si" && $r12 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 12 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d12 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d12)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 12 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Esta tomando actualmente pastillas anticonceptivas?
        if ($r13 != "Si" && $r13 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 13 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d13 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d13)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 13 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Enfermedades venereas
        if ($r14_1 != "Si" && $r14_1 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_1 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_1)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.1 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Problemas del corazón
        if ($r14_2 != "Si" && $r14_2 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.2 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_2 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_2)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.2 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Hepatitis
        if ($r14_3 != "Si" && $r14_3 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.3 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_3 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_3)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.3 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Fiebre reumatica
        if ($r14_4 != "Si" && $r14_4 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.4 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_4 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_4)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.4 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Asma
        if ($r14_5 != "Si" && $r14_5 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.5 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_5 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_5)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.5 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Diabetes
        if ($r14_6 != "Si" && $r14_6 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.6 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_6 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_6)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.6 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Diabetes
        if ($r14_7 != "Si" && $r14_7 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.7 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_7 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_7)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.7 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//Tiroides
        if ($r14_8 != "Si" && $r14_8 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 14.8 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d14_8 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d14_8)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 14.8 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Ah tenido limitación al abrir o cerrar la boca?
        if ($r15 != "Si" && $r15 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 15 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d15 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d15)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 15 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Siente ruidos en la mandibula al abrir o cerrar la boca?
        if ($r16 != "Si" && $r16 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 16 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d16 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d16)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 16 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Siente ruidos en la mandibula al abrir o cerrar la boca?
        if ($r17 != "Si" && $r17 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 17 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d17 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d17)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 17 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
 //¿Sufre de herpes o aftas recurrentes?
        if ($r18 != "Si" && $r18 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d18 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d18)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 18 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Morderse las uñas o labios?
        if ($r19_1 != "Si" && $r19_1 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 19.1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_1 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_1)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.1 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Fumas?
        if ($r19_2 != "Si" && $r19_2 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 19.2 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_2 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_2)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.2 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Morderse las uñas o labios?
        if ($r19_3 != "Si" && $r19_3 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 19.3 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_3 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_3)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.3 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Consumo de alimentos citricos?
        if ($r19_4 != "Si" && $r19_4 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_4 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_4)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.4 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Muerde objetos con los dientes?
        if ($r19_5 != "Si" && $r19_5 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 19.5 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_5 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_5)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.5 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Apretamiento dentario?
        if ($r19_6 != "Si" && $r19_6 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 19.6 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_6 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_6)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.6 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }
//¿Respiración bucal?
        if ($r19_7 != "Si" && $r19_7 != "No") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "La respuesta 1 no coincide con el formato solicitado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        if ($d19_7 != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $d19_7)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "La descripción 19.7 no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        if ($antecendentes != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $antecendentes)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "Antecedentes no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        if ($exploracion != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,550}", $exploracion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "Exploracion no coincide con el formato solicitado",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
        }

        $datos_historia_up = [
            "Respuesta1"=>$r1,
            "Descripcion1"=>$d1,
            "Respuesta2"=>$r2,
            "Descripcion2"=>$d2,
            "Respuesta3"=>$r3,
            "Descripcion3"=>$d3,
            "Respuesta4"=>$r4,
            "Descripcion4"=>$d4,
            "RespuestaRespuesta"=>$r5,
            "Descripcion5"=>$d5,
            "Respuesta6.1"=>$r6_1,
            "Descripcion6.1"=>$d6_1,
            "Respuesta6.2"=>$r6_2,
            "Descripcion6.2"=>$d6_2,
            "Respuesta6.3"=>$r6_3,
            "Descripcion6.3"=>$d6_3,
            "Respuesta7"=>$r7,
            "Descripcion7"=>$d7,
            "Respuesta8"=>$r8,
            "Descripcion8"=>$d8,
            "Respuesta9"=>$r9,
            "Descripcion9"=>$d9,
            "Respuesta10"=>$r10,
            "Descripcion10"=>$d10,
            "Respuesta11"=>$r11,
            "Descripcion11"=>$d11,
            "Respuesta12"=>$r12,
            "Descripcion12"=>$d12,
            "Respuesta13"=>$r13,
            "Descripcion13"=>$d13,
            "Respuesta14.1"=>$r14_1,
            "Descripcion14.1"=>$d14_1,
            "Respuesta14.2"=>$r14_2,
            "Descripcion14.2"=>$d14_2,
            "Respuesta14.3"=>$r14_3,
            "Descripcion14.3"=>$d14_3,
            "Respuesta14.4"=>$r14_4,
            "Descripcion14.4"=>$d14_4,
            "Respuesta14.5"=>$r14_5,
            "Descripcion14.5"=>$d14_5,
            "Respuesta14.6"=>$r14_6,
            "Descripcion14.6"=>$d14_6,
            "Respuesta14.7"=>$r14_7,
            "Descripcion14.7"=>$d14_7,
            "Respuesta14.8"=>$r14_8,
            "Descripcion14.8"=>$d14_8,
            "Respuesta15"=>$r15,
            "Descripcion15"=>$d15,
            "Respuesta16"=>$r16,
            "Descripcion16"=>$d16,
            "Respuesta17"=>$r17,
            "Descripcion17"=>$d17,
            "Respuesta18"=>$r18,
            "Descripcion18"=>$d18,
            "Respuesta19.1"=>$r19_1,
            "Descripcion19.1"=>$d19_1,
            "Respuesta19.2"=>$r19_2,
            "Descripcion19.2"=>$d19_2,
            "Respuesta19.3"=>$r19_3,
            "Descripcion19.3"=>$d19_3,
            "Respuesta19.4"=>$r19_4,
            "Descripcion19.4"=>$d19_4,
            "Respuesta19.5"=>$r19_5,
            "Descripcion19.5"=>$d19_5,
            "Respuesta19.6"=>$r19_6,
            "Descripcion19.6"=>$d19_6,
            "Respuesta19.7"=>$r19_7,
            "Descripcion19.7"=>$d19_7,
            "Antecedentes"=>$antecendentes,
            "Exploración"=>$exploracion
        ];

        if (historiaModelo::actualizar_historia_modelo($datos_historia_up)) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Historia actualizado",
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
    }

}

