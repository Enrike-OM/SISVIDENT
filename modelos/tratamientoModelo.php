<?php
	
	require_once "mainModel.php";

	class tratamientoModelo extends mainModel{

		/*--------------Modelo agregar tratamiento--------------*/
		protected static function agregar_tratamiento_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO tratamiento(tratamiento_codigo,tratamiento_nombre,tratamiento_estado,tratamiento_detalle) VALUES (:Codigo,:Nombre,:Estado,:Detalle)");
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Estado",$datos['Estado']);
			$sql->bindParam(":Detalle",$datos['Detalle']);
			
			$sql->execute();

			return $sql;
		}

		/*--------------Modelo eliminar tratamiento--------------*/
		protected static function eliminar_tratamiento_modelo($id){
			$sql=mainModel::conectar()->prepare("DELETE FROM tratamiento WHERE tratamiento_id=:ID");

			$sql->bindParam(":ID",$id);
			$sql->execute();

			return $sql;
		}

		 /*--------- Modelo datos tratamiento ---------*/
        protected static function datos_tratamiento_modelo($tipo,$id){
            if($tipo=="Unico"){
                $sql=mainModel::conectar()->prepare("SELECT * FROM tratamiento WHERE tratamiento_id=:ID");
                $sql->bindParam(":ID",$id);
            }elseif($tipo=="Conteo"){
                 $sql=mainModel::conectar()->prepare("SELECT tratamiento_id FROM tratamiento");
            }
            $sql->execute();

            return $sql;
        }

        /*--------- Modelo actualizar tratamiento ---------*/
        protected static function actualizar_tratamiento_modelo($datos){
            $sql=mainModel::conectar()->prepare("UPDATE tratamiento SET tratamiento_codigo=:Codigo,tratamiento_nombre=:Nombre,tratamiento_estado=:Estado,tratamiento_detalle=:Detalle WHERE tratamiento_id=:ID");

            $sql->bindParam(":Codigo",$datos['Codigo']);
            $sql->bindParam(":Nombre",$datos['Nombre']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Detalle",$datos['Detalle']);
            
            $sql->bindParam(":ID",$datos['ID']);

            $sql->execute();

            return $sql;
        }
	}