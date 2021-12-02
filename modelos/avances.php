<?php 
    class Avances{
        public $nombreCurso;
        public $nombreUnidad;
        public $estatus;

        public function __construct($nombreCurso,$nombreUnidad,$estatus){
            $this->nombreCurso=$nombreCurso;
            $this->nombreUnidad=$nombreUnidad;
            $this->estatus=$estatus;
        }
    }
?>