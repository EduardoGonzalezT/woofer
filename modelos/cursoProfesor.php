<?php
    class CursoProfesor{
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

        public static function buscarIdProfesor($usuario){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_profesor WHERE usuario=?");
            $sql->execute(array($usuario));
            $profesor=$sql->fetch();
            return new Profesor($profesor['id_Profesor'],$profesor['nombre_Profesor'],$profesor['apellido_Pat'],$profesor['apellido_Mat'],$profesor['fecha_Nac'],$profesor['correo'],$profesor['usuario'],$profesor['contrasenia'],$profesor['cedula'],$profesor['pregunta'],$profesor['respuesta'],$profesor['imagen']);
        }

        public static function buscarCursosProfesorEspecifico($idProfesor){
            $conexionBD=BD::crearInstancia();
            $cursos=[];
            $sql=$conexionBD->prepare("SELECT * FROM cursos WHERE id_Profesor=?");
            $sql->execute(array($idProfesor));
            foreach($sql->fetchAll() as $iterador){
                $cursos[]=new CursoProfesor($iterador['id_Curso'],$iterador['nombre_Curso'],$iterador['descripcion_Curso'],$iterador['duracion_Curso'],$iterador['imagen_Curso'],$iterador['id_Profesor'],$iterador['cantidad_Unidades']);
            }
            return $cursos;
        }

        public static function buscarCursos(){
            $cursos=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM cursos");
            foreach($sql->fetchAll() as $iterador){
                $cursos[]=new CursoProfesor($iterador['id_Curso'],$iterador['nombre_Curso'],$iterador['descripcion_Curso'],$iterador['duracion_Curso'],$iterador['imagen_Curso'],$iterador['id_Profesor'],$iterador['cantidad_Unidades']);
            }
            return $cursos;
        }

        public static function agregarCurso($idProfesor,$nombre,$descripcion,$duracion,$nombreFoto,$tmpFoto){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO cursos(nombre_Curso,descripcion_Curso,duracion_Curso,imagen_Curso,id_Profesor,cantidad_Unidades) VALUES (?,?,?,?,?,?)");
            $fecha=new DateTime();
            $nombreArchivo=($nombreFoto!="")?$fecha->getTimestamp()."_".$nombreFoto:"imagen.jpg";
            move_uploaded_file($tmpFoto,"img\curso/".$nombreArchivo);
            $sql->execute(array($nombre,$descripcion,$duracion,$nombreArchivo,$idProfesor,0));
        }

        public static function consultarCursoEspecifico($idCurso){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM cursos WHERE id_Curso=?");
            $sql->execute(array($idCurso));
            $curso=$sql->fetch();
            return new CursoProfesor($curso['id_Curso'],$curso['nombre_Curso'],$curso['descripcion_Curso'],$curso['duracion_Curso'],$curso['imagen_Curso'],$curso['id_Profesor'],$curso['cantidad_Unidades']);
        }

        public static function editarCurso($idCurso,$idProfesor,$nombre,$descripcion,$duracion,$nombreFoto,$tmpFoto){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT imagen_Curso FROM cursos WHERE id_Curso=?");
            $sql2->execute(array($idCurso));
            $img=$sql2->fetch(PDO::FETCH_LAZY);
            if($nombreFoto==""){
                $sql=$conexionBD->prepare("UPDATE cursos SET nombre_Curso=?, descripcion_Curso=?,duracion_Curso=?,imagen_Curso=?,id_Profesor=? WHERE id_Curso=?");
                $sql->execute(array($nombre,$descripcion,$duracion,$img['imagen_Curso'],$idProfesor,$idCurso));
            }else{
                if(isset($img['imagen_Curso']) && ($img["imagen_Curso"]!="imagen.jpg")){
                    if(file_exists("img\curso/".$img["imagen_Curso"])){
                        unlink("img\curso/".$img["imagen_Curso"]);
                    }
                }
                $fecha=new DateTime();
                $nombreArchivo=($nombreFoto!="")?$fecha->getTimestamp()."_".$nombreFoto:"imagen.jpg";
                move_uploaded_file($tmpFoto,"img\curso/".$nombreArchivo);
                $sql=$conexionBD->prepare("UPDATE cursos SET nombre_Curso=?, descripcion_Curso=?,duracion_Curso=?,imagen_Curso=?,id_Profesor=? WHERE id_Curso=?");
                $sql->execute(array($nombre,$descripcion,$duracion,$nombreArchivo,$idProfesor,$idCurso));
            }
        }

        public static function borrarCurso($idCurso){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT imagen_Curso FROM cursos WHERE id_Curso=?");
            $sql2->execute(array($idCurso));
            $img=$sql2->fetch(PDO::FETCH_LAZY);
            if(isset($img['imagen_Curso']) && ($img['imagen_Curso']!="imagen.jpg")){
                if(file_exists("img\curso/".$img['imagen_Curso'])){
                    unlink("img\curso/".$img['imagen_Curso']);
                }
            }
            $sqlArchivos=$conexionBD->prepare("SELECT archivo FROM cursos INNER JOIN unidades ON unidades.id_Curso = cursos.id_Curso INNER JOIN temas on temas.id_Unidad = unidades.id_Unidad INNER JOIN subtemas ON subtemas.id_Tema = temas.id_Tema INNER JOIN archivos ON archivos.id_Subtema = subtemas.id_Subtema WHERE cursos.id_Curso = ?");
            $sqlArchivos->execute(array($idCurso));
            $idArchivos=$sqlArchivos->fetchAll();
            foreach($idArchivos as $iterador){
                if(isset($iterador['archivo']) && ($iterador['archivo']!="imagen.jpg")){
                    if(file_exists("material/".$iterador['archivo'])){
                        unlink("material/".$iterador['archivo']);
                    }
                }
            }
            $sql=$conexionBD->prepare("DELETE FROM cursos WHERE id_Curso=?");
            $sql->execute(array($idCurso));
        }

        public static function buscarUnidadesNumeradas($idCurso){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM cursos WHERE id_Curso=?");
            $sql->execute(array($idCurso));
            $curso=$sql->fetch();
            return new CursoProfesor($curso['id_Curso'],$curso['nombre_Curso'],$curso['descripcion_Curso'],$curso['duracion_Curso'],$curso['imagen_Curso'],$curso['id_Profesor'],$curso['cantidad_Unidades']);
        }

        public static function actualizarUnidades($numero,$idCurso){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE cursos SET cantidad_Unidades=? WHERE id_Curso=?");
            $sql->execute(array($numero,$idCurso));
        }
    }
?>