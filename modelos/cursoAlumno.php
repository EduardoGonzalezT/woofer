<?php 
    class CursoAlumno{
        public $idCurso;
        public $nombre;
        public $descripcion;
        public $duracion;
        public $imagen;
        public $idProfesor;
        public $cantidadUnidades;

        public function __construct($idCurso,$nombre,$descripcion,$duracion,$imagen,$idProfesor,$cantidadUnidades){
            $this->idCurso=$idCurso;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->duracion=$duracion;
            $this->imagen=$imagen;
            $this->idProfesor=$idProfesor;
            $this->cantidadUnidades=$cantidadUnidades;
        }

        public static function consultarCursos(){
            $cursos=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM cursos");
            foreach($sql->fetchAll() as $iterador){
                $cursos[]=new CursoAlumno($iterador['id_Curso'],$iterador['nombre_Curso'],$iterador['descripcion_Curso'],$iterador['duracion_Curso'],$iterador['imagen_Curso'],$iterador['id_Profesor'],$iterador['cantidad_Unidades']);
            }
            return $cursos;
        }

        public static function consultarCurso($idCurso){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM cursos WHERE id_Curso=?");
            $sql->execute(array($idCurso));
            $curso=$sql->fetch();
            return new CursoAlumno($curso['id_Curso'],$curso['nombre_Curso'],$curso['descripcion_Curso'],$curso['duracion_Curso'],$curso['imagen_Curso'],$curso['id_Profesor'],$curso['cantidad_Unidades']);
        }

        public static function consultarUnidad($idCurso){
            $conexionBD=BD::crearInstancia();
            $unidad=[];
            $sql=$conexionBD->prepare("SELECT * FROM unidades WHERE id_Curso=?");
            $sql->execute(array($idCurso));
            foreach($sql->fetchAll() as $iterador){
                $unidad[]=new Unidad($iterador['id_Unidad'],$iterador['nombre_Unidad'],$iterador['descripcion_Unidad'],$iterador['fecha_Creacion'],$iterador['numero_Unidad'],$iterador['id_Curso']);
            }
                return $unidad;
        }

        public static function consultarTema(){
            $conexionBD=BD::crearInstancia();
            $temas=[];
            $sql=$conexionBD->query("SELECT * FROM temas");
            foreach($sql->fetchAll() as $iterador){
                $temas[]=new Tema($iterador['id_Tema'],$iterador['nombre_Tema'],$iterador['descripcion_Tema'],$iterador['id_Unidad']);
            }
                return $temas;
        }

        public static function consultarSubtemas(){
            $conexionBD=BD::crearInstancia();
            $subtemas=[];
            $sql=$conexionBD->query("SELECT * FROM subtemas");
            foreach($sql->fetchAll() as $iterador){
                $subtemas[]=new Subtema($iterador['id_Subtema'],$iterador['nombre_Subtema'],$iterador['id_Tema']);
            }
                return $subtemas;
        }

        public static function recuperarNombreCompleto($identificador){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_alumno WHERE usuario=?");
            $sql->execute(array($identificador));
            $obj=$sql->fetch();
            return new Alumno($obj['id_Alumno'],$obj['nombre_Alumno'],$obj['apellido_Pat'],$obj['apellido_Mat'],$obj['fecha_Nac'],$obj['correo'],$obj['usuario'],$obj['contrasenia'],$obj['matricula'],$obj['pregunta'],$obj['respuesta'],$obj['imagen']);
        }

        public static function inscribirseCurso($alumno,$nombreCurso,$idProfesor){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO notificacion_profesor(nombre_Alumno,matricula_Alumno,nombre_Curso,estatus,id_Profesor) VALUES (?,?,?,?,?)");
            $sql->execute(array($alumno->nombreAlumno." ".$alumno->apellidoPaterno." ".$alumno->apellidoMaterno,$alumno->matricula,$nombreCurso,"Pendiente",$idProfesor));
        }

        public static function consultarMaterial(){
            $conexionBD=BD::crearInstancia();
            $materiales=[];
            $sql=$conexionBD->query("SELECT * FROM archivos");
            foreach($sql->fetchAll() as $iterador){
                $materiales[]=new Material($iterador['id_Archivo'],$iterador['nombre_Archivo'],$iterador['descripcion_Archivo'],$iterador['archivo'],$iterador['extension'],$iterador['id_Subtema']);
            }
                return $materiales;
        }
    }
?>