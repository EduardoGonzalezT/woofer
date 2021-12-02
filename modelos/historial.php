<?php 
    class Historial{
        public $idHistorial;
        public $calificacion;
        public $nivel;
        public $valorVerdadero;
        public $valorFalso;
        public $idExamen;
        public $idAlumno;

        public function __construct($idHistorial,$calificacion,$nivel,$valorVerdadero,$valorFalso,$idExamen,$idAlumno){
            $this->idHistorial=$idHistorial;
            $this->calificacion=$calificacion;
            $this->nivel=$nivel;
            $this->valorVerdadero=$valorVerdadero;
            $this->valorFalso=$valorFalso;
            $this->idExamen=$idExamen;
            $this->idAlumno=$idAlumno;
        }

        public static function buscarHistorialCalificaciones(){
            $conexionBD=BD::crearInstancia();
            $historial=[];
            $sql=$conexionBD->query("SELECT * FROM historial");
            foreach($sql->fetchAll() as $iterador){
                $historial[]=new Historial($iterador['id_Historial'],$iterador['calificacion'],$iterador['nivel'],$iterador['valor_Verdadero'],$iterador['valor_Falso'],$iterador['id_Examen'],$iterador['id_Alumno']);
            }
                return $historial;
        }

    }
?>