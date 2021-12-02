<?php 
    class notificacionAlumno{
        public $idNotificacionAlumno;
        public $nombreAlumno;
        public $matriculaAlumno;
        public $nombreCurso;
        public $estatus;
        public $idAlumno;

        public function __construct($idNotificacionAlumno,$nombreAlumno,$matriculaAlumno,$nombreCurso,$estatus,$idAlumno){
            $this->idnotificacionAlumno=$idNotificacionAlumno;
            $this->nombreAlumno=$nombreAlumno;
            $this->matriculaAlumno=$matriculaAlumno;
            $this->nombreCurso=$nombreCurso;
            $this->estatus=$estatus;
            $this->idAlumno=$idAlumno;
        }
    }
?>