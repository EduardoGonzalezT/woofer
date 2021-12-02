<?php 
    class Comentario{
        public $idComentario;
        public $nombreAlumno;
        public $comentario;
        public $fechaHora;
        public $valoracion;
        public $idCurso;
        public $idAlumno;

        public function __construct($idComentario,$nombreAlumno,$comentario,$fechaHora,$valoracion,$idCurso,$idAlumno){
            $this->idComentario=$idComentario;
            $this->nombreAlumno=$nombreAlumno;
            $this->comentario=$comentario;
            $this->fechaHora=$fechaHora;
            $this->valoracion=$valoracion;
            $this->idCurso=$idCurso;
            $this->idAlumno=$idAlumno;
        }

        public static function registrarComentario($usuario,$comentario,$valoracion,$idCurso){
            date_default_timezone_set('America/Mexico_City');
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT * FROM usuario_alumno WHERE usuario=?");
            $sql2->execute(array($usuario));
            $alumno=$sql2->fetch(PDO::FETCH_LAZY);
            $sql=$conexionBD->prepare("INSERT INTO comentarios(nombre_Alumno,comentario,fecha_Hora,valoracion,id_Curso,id_Alumno) VALUES (?,?,?,?,?,?)");
            $sql->execute(array($alumno['nombre_Alumno']." ".$alumno['apellido_Pat']." ".$alumno['apellido_Mat'],$comentario,date('y-m-d H:i:s',time()),$valoracion,$idCurso,$alumno['id_Alumno']));
        }

        public static function consultarComentarios($idCurso){
            $conexionBD=BD::crearInstancia();
            $comentarios=[];
            $sql=$conexionBD->prepare("SELECT * FROM comentarios WHERE id_Curso=?");
            $sql->execute(array($idCurso));
            foreach($sql->fetchAll() as $iterador){
                $comentarios[]=new Comentario($iterador['id_Comentario'],$iterador['nombre_Alumno'],$iterador['comentario'],$iterador['fecha_Hora'],$iterador['valoracion'],$iterador['id_Curso'],$iterador['id_Alumno']);
            }
                return $comentarios;
        }
    }
?>