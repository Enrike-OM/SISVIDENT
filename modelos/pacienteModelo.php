<?php
	
	require_once "mainModel.php";

	class pacienteModelo extends mainModel{

		/*--------- Modelo agregar paciente ---------*/
		protected static function agregar_paciente_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO paciente(paciente_dni,paciente_nombre,
                paciente_apellido,paciente_telefono,paciente_direccion,paciente_lugarNacimiento,paciente_fechaNacimiento,
                paciente_gradoInstruccion,paciente_ocupacion,paciente_religion,paciente_estadoCivil,paciente_emergencia,
                paciente_parentesco,paciente_motivoConsulta,paciente_enfermedad) 
                VALUES (:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:LugarNacimiento,:FechaNacimiento,:GradoInstruccion,:Ocupacion,
                        :Religion,:EstadoCivil,:Emergencia,:Parentesco,:MotivoConsulta,:Enfermedad)");
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
            $sql->bindParam(":LugarNacimiento",$datos['LugarNacimiento']);
            $sql->bindParam(":FechaNacimiento",$datos['FechaNacimiento']);
            $sql->bindParam(":GradoInstruccion",$datos['GradoInstruccion']);
            $sql->bindParam(":Ocupacion",$datos['Ocupacion']);
            $sql->bindParam(":Religion",$datos['Religion']);
            $sql->bindParam(":EstadoCivil",$datos['EstadoCivil']);
            $sql->bindParam(":Emergencia",$datos['Emergencia']);
            $sql->bindParam(":Parentesco",$datos['Parentesco']);
            $sql->bindParam(":MotivoConsulta",$datos['MotivoConsulta']);
            $sql->bindParam(":Enfermedad",$datos['Enfermedad']);
			$sql->execute();

			return $sql;
		}



        /*--------- Modelo eliminar paciente ---------*/
        protected static function eliminar_paciente_modelo($id){
            $sql=mainModel::conectar()->prepare("DELETE FROM paciente WHERE paciente_id=:ID");
            $sql->bindParam(":ID",$id);
            $sql->execute();

            return $sql;
        }

        /*--------- Modelo datos paciente ---------*/
        protected static function datos_paciente_modelo($tipo,$id){
            if($tipo=="Unico"){
                $sql=mainModel::conectar()->prepare("SELECT * FROM paciente WHERE paciente_id=:ID");
                $sql->bindParam(":ID",$id);
            }elseif($tipo=="Conteo"){
                 $sql=mainModel::conectar()->prepare("SELECT paciente_id FROM paciente");
            }
            $sql->execute();

            return $sql;
        }


        /*--------- Modelo actualizar paciente ---------*/
        protected static function actualizar_paciente_modelo($datos){
            $sql=mainModel::conectar()->prepare("UPDATE paciente SET paciente_dni=:DNI,paciente_nombre=:Nombre,
                    paciente_apellido=:Apellido,paciente_telefono=:Telefono,paciente_direccion=:Direccion,
                    paciente_lugarNacimiento=:LugarNacimiento,paciente_fechaNacimiento=:FechaNacimiento,
                    paciente_gradoInstruccion=:GradoInstruccion,paciente_ocupacion=:Ocupacion,paciente_religion=:Religion,
                    paciente_estadoCivil=:EstadoCivil,paciente_emergencia=:Emergencia,paciente_parentesco=:Parentesco,
                    paciente_motivoConsulta=:MotivoConsulta,paciente_enfermedad=:Enfermedad WHERE paciente_id=:ID");

            $sql->bindParam(":DNI",$datos['DNI']);
            $sql->bindParam(":Nombre",$datos['Nombre']);
            $sql->bindParam(":Apellido",$datos['Apellido']);
            $sql->bindParam(":Telefono",$datos['Telefono']);
            $sql->bindParam(":Direccion",$datos['Direccion']);
            $sql->bindParam(":LugarNacimiento",$datos['LugarNacimiento']);
            $sql->bindParam(":FechaNacimiento",$datos['FechaNacimiento']);
            $sql->bindParam(":GradoInstruccion",$datos['GradoInstruccion']);
            $sql->bindParam(":Ocupacion",$datos['Ocupacion']);
            $sql->bindParam(":Religion",$datos['Religion']);
            $sql->bindParam(":EstadoCivil",$datos['EstadoCivil']);
            $sql->bindParam(":Emergencia",$datos['Emergencia']);
            $sql->bindParam(":Parentesco",$datos['Parentesco']);
            $sql->bindParam(":MotivoConsulta",$datos['MotivoConsulta']);
            $sql->bindParam(":Enfermedad",$datos['Enfermedad']);
            $sql->bindParam(":ID",$datos['ID']);

            $sql->execute();

            return $sql;
        }



        /* --- Modelo para obtener el contenido del archivo .txt --- */
            protected static function obtenerHistoriaPaciente($id_paciente)
            {
                $id_paciente = mainModel::limpiar_cadena($id_paciente);

                try {
                    $sql = "SELECT historia_txt FROM paciente WHERE paciente_id = :id_paciente";
                    $stmt = conexion::conectar()->prepare($sql);
                    $stmt->bindParam(":id_paciente", $id_paciente, PDO::PARAM_INT);
                    $stmt->execute();
                    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($resultado) {
                        return $resultado['historia_txt'];
                    } else {
                        return "No se encontró contenido para el paciente con ID $id_paciente";
                    }
                } catch (PDOException $e) {
                    return "Error al obtener el contenido de la historia: " . $e->getMessage();
                }
            }

            /* --- Modelo para actualizar el contenido del archivo .txt --- */
            protected static function actualizarHistoriaPaciente($id_paciente, $nueva_historia)
            {
                $id_paciente = mainModel::limpiar_cadena($id_paciente);
                $nueva_historia = mainModel::limpiar_cadena($nueva_historia);

                try {
                    $sql = "UPDATE paciente SET historia_txt = :historia_txt WHERE paciente_id = :id_paciente";
                    $stmt = conexion::conectar()->prepare($sql);
                    $stmt->bindParam(":historia_txt", $nueva_historia, PDO::PARAM_STR);
                    $stmt->bindParam(":id_paciente", $id_paciente, PDO::PARAM_INT);
                    return $stmt->execute();
                } catch (PDOException $e) {
                    return false;
                }
            }
	}

