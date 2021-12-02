<?php 
    class ComentarioCurso{
        public $comentario;
        public $fechaHora;
        public $valoracion;
        public $nombreCurso;

        public function __construct($comentario,$fechaHora,$valoracion,$nombreCurso){
            $this->comentario=$comentario;
            $this->fechaHora=$fechaHora;
            $this->valoracion=$valoracion;
            $this->nombreCurso=$nombreCurso;
        }
    }
?>