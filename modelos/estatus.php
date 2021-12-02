<?php 
    class Estatus{
        public $idEstatus;
        public $estatus;
        public $numeroUnidad;
        public $idUnidad;
        public $idAlumno;

        public function __construct($idEstatus,$estatus,$numeroUnidad,$idUnidad,$idAlumno){
            $this->idEstatus=$idEstatus;
            $this->estatus=$estatus;
            $this->numeroUnidad=$numeroUnidad;
            $this->idUnidad=$idUnidad;
            $this->idAlumno=$idAlumno;
        }

        public static function insertarEstatus($idAlumno,$idUnidad,$nUnidad){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO estatus(estatus,numero_Unidad,id_Unidad,id_Alumno) VALUES (?,?,?,?)");
            $sql->execute(array("Proceso",$nUnidad,$idUnidad,$idAlumno));



        }

        public static function actualizarEstatus($idUnidad,$idAlumno){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE estatus SET estatus=? WHERE id_Unidad=? AND id_Alumno=?");
            $sql->execute(array("Terminado",$idUnidad,$idAlumno));
        }
    }
?>