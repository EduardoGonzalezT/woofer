<?php 
    class Opcion{
        public $idOpcion;
        public $opcion;
        public $numPregunta;
        public $idPregunta;

        public function __construct($idOpcion,$opcion,$numPregunta,$idPregunta){
            $this->idOpcion=$idOpcion;
            $this->opcion=$opcion;
            $this->numPregunta=$numPregunta;
            $this->idPregunta=$idPregunta;
        }

        public static function buscarIdOpcion($opcion){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM opcion WHERE opcion=?");
            $sql->execute(array($opcion));
            $opcion=$sql->fetch();
            return new Opcion($opcion['id_Opcion'],$opcion['opcion'],$opcion['num_Pregunta'],$opcion['id_Pregunta']);
        }
    }
?>