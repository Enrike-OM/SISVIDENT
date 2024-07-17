<?php
	
	class vistasModelo{

		/*--------- Modelo obtener vistas ---------*/
		protected static function obtener_vistas_modelo($vistas){
			$listaBlanca=["pacient-list","pacient-new","pacient-search","pacient-update","company","home","tratamiento-list",
                "tratamiento-new","tratamiento-search","tratamiento-update","reservation-list","reservation-new","reservation-pending",
                "reservation-search","reservation-update","user-list","reservation-reservation","user-new","user-search","user-update",
                "pacient-historia"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vistas=="login" || $vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}