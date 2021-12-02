<?php 
    class Preguntas{
        public $idPregunta;
        public $pregunta;
        public $numeroSeleccion;
        public $numeroPreguntas;
        public $idExamen;

        public function __construct($idPregunta,$pregunta,$numeroSeleccion,$numeroPreguntas,$idExamen){
            $this->idPregunta=$idPregunta;
            $this->pregunta=$pregunta;
            $this->numeroSeleccion=$numeroSeleccion;
            $this->numeroPreguntas=$numeroPreguntas;
            $this->idExamen=$idExamen;
        }

        public static function buscarIdPregunta($pregunta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM preguntas WHERE Pregunta=?");
            $sql->execute(array($pregunta));
            $pregunta=$sql->fetch();
            return new Preguntas($pregunta['id_Pregunta'],$pregunta['Pregunta'],$pregunta['numero_Seleccion'],$pregunta['numero_Preguntas'],$pregunta['id_Examen']);
        }
    }
?>