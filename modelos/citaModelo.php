    <?php
    require_once "mainModel.php";

    class citaModelo extends mainModel {
        
        /*--------- Modelo agregar cita ---------*/
        protected static function agregar_cita_modelo($datos){
            $sql=mainModel::conectar()->prepare("INSERT INTO cita(cita_codigo,cita_fecha,cita_hora,cita_estado,cita_observacion,usuario_id,paciente_id,odontologo_id,tratamiento_id) VALUES(:Codigo,:Fecha,:Hora,:Estado,:Observacion,:Usuario,:Paciente,:Odontologo,:Tratamiento)");

            $sql->bindParam(":Codigo",$datos['Codigo']);
            $sql->bindParam(":Fecha",$datos['Fecha']);
            $sql->bindParam(":Hora",$datos['Hora']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Observacion",$datos['Observacion']);
            $sql->bindParam(":Usuario",$datos['Usuario']);
            $sql->bindParam(":Paciente",$datos['Paciente']);
            $sql->bindParam(":Odontologo",$datos['Odontologo']);
            $sql->bindParam(":Tratamiento",$datos['Tratamiento']);
            $sql->execute();

            return $sql;
        }


        /*--------- Modelo eliminar cita ---------*/
        protected static function eliminar_cita_modelo($codigo,$tipo){

            if ($tipo==="Cita") {
                $sql=mainModel::conectar()->prepare("DELETE FROM cita WHERE cita_codigo=:Codigo");
                
            }elseif ($tipo=="Detalle") {
                $sql=mainModel::conectar()->prepare("DELETE FROM detalle WHERE cita_codigo=:Codigo");
            }elseif ($tipo=="HU") {
                $sql=mainModel::conectar()->prepare("DELETE FROM cita WHERE cita_codigo=:Codigo");
            }

            $sql->bindParam(":Codigo",$codigo);
            $sql->execute();

            return $sql;
        }

        /*--------- Modelo datos cita ---------*/
        protected static function datos_cita_modelo($tipo,$id){
            if ($tipo=="Unico") {
                $sql=mainModel::conectar()->prepare("SELECT * FROM cita WHERE cita_id=:ID");
                $sql->bindParam(":ID",$id);

            }elseif ($tipo=="Conteo_Reservacion") {
                $sql=mainModel::conectar()->prepare("SELECT cita_id FROM cita WHERE cita_estado='Reservacion'");

            }elseif ($tipo=="Conteo_Finalizado") {
                $sql=mainModel::conectar()->prepare("SELECT cita_id FROM cita WHERE cita_estado='Finalizado'");

            }elseif ($tipo=="Conteo") {
                $sql=mainModel::conectar()->prepare("SELECT cita_id FROM cita");

            }

            $sql->execute();

            return $sql;

        }

        /*--------- Modelo actualizar cita ---------*/
        protected static function actualizar_cita_modelo($datos){
            if ($datos['Tipo']=="HU") {
                $sql=mainModel::conectar()->prepare("UPDATE cita SET cita_observacion=:Observacion WHERE cita_codigo=:Codigo");
                $sql->bindParam(":Observacion",$datos['Observacion']);
            }elseif ($datos['Tipo']=="Cita") {
                $sql=mainModel::conectar()->prepare("UPDATE cita SET cita_fecha=:Fecha,cita_hora=:Hora,cita_estado=:Estado WHERE cita_codigo=:Codigo");
                $sql->bindParam(":Fecha",$datos['Fecha']);
                $sql->bindParam(":Hora",$datos['Hora']);
                $sql->bindParam(":Estado",$datos['Estado']);
            }
            $sql->bindParam(":Codigo",$datos['Codigo']);
            $sql->execute();

            return $sql;
        }
    }
