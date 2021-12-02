<?php 
    class estatusUnidad{
        public $idEstatusUnidad;
        public $estado;
        public $idUnidad;

        public function __construct($idEstatusUnidad,$estado,$idUnidad){
            $this->idEstatusUnidad=$idEstatusUnidad;
            $this->estado=$estado;
            $this->idUnidad=$idUnidad;
        }

        public static function insertarUnidad($idUnidad){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO estatus_unidad(estado,id_Unidad) VALUES (?,?)");
            $sql->execute(array("Activado",$idUnidad));
        }

        public static function consultarEstatus(){
            $estatusUnidades=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM estatus_unidad");
            foreach($sql->fetchAll() as $iterador){
                    $estatusUnidades[]=new estatusUnidad($iterador['id_estatus_unidad'],$iterador['estado'],$iterador['id_Unidad']);
            }
            return $estatusUnidades;
        }

        public static function actualizarEstado($cambioEstado,$idUnidad){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE estatus_unidad SET estado=? WHERE id_Unidad=?");
            $sql->execute(array($cambioEstado,$idUnidad));
        }
    }
?>