<?php 
    class CalificacionAlumno{
        public $nombreAlumno;
        public $nombreCurso;
        public $calificacion;
        public $nombreUnidad;

        public function __construct($nombreAlumno,$nombreCurso,$calificacion,$nombreUnidad){
            $this->nombreAlumno=$nombreAlumno;
            $this->nombreCurso=$nombreCurso;
            $this->calificacion=$calificacion;
            $this->nombreUnidad=$nombreUnidad;
        }
    }
?>