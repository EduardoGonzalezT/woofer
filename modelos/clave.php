<?php 
    class Clave{
        public $idClave;
        public $clave;

        public function __construct($idClave,$clave){
            $this->idClave=$idClave;
            $this->clave=$clave;
        }

        public static function consultarClave($clave){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM claveacceso WHERE clave=?");
            $sql->execute(array($clave));
            $obj=$sql->fetch();
            if($obj!=NULL){
                return "Si";
            }else{
                return "No";
            }
        }

        public static function eliminarClave($clave){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("DELETE FROM claveacceso WHERE clave=?");
            $sql->execute(array($clave));
        }
    }
?>