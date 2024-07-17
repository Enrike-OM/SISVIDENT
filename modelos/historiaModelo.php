<?php
    require_once "mainModel.php";

class historiaModelo extends mainModel{
    /*--------- Modelo agregar formulario ---------*/
    protected static function agregar_formulario_modelo($datos){
        $sql=mainModel::conectar()->prepare("INSERT INTO historia()");

        $sql->bindParam(":DNI",$datos['DNI']);

    }
}