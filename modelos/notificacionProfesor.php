<?php
    class notificacionProfesor{
        public $idNotificacionProfesor;
        public $nombreAlumno;
        public $matriculaAlumno;
        public $nombreCurso;
        public $estatus;
        public $idProfesor;

        public function __construct($idNotificacionProfesor,$nombreAlumno,$matriculaAlumno,$nombreCurso,$estatus,$idProfesor){
            $this->idNotificacionProfesor=$idNotificacionProfesor;
            $this->nombreAlumno=$nombreAlumno;
            $this->matriculaAlumno=$matriculaAlumno;
            $this->nombreCurso=$nombreCurso;
            $this->estatus=$estatus;
            $this->idProfesor=$idProfesor;
        }
    }
?>