<?php 
    class Respuestas{
        public $idRespuesta;
        public $respuesta;
        public $idPregunta;

        public function __construct($idRespuesta,$respuesta,$idPregunta){
            $this->idRespuesta=$idRespuesta;
            $this->respuesta=$respuesta;
            $this->idPregunta=$idPregunta;
        }
    }
?>