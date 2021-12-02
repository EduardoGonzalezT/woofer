<?php
    class Unidad{
        public $idUnidad;
        public $nombre;
        public $descripcion;
        public $fecha;
        public $numeroUnidad;
        public $idCurso;

        public function __construct($idUnidad,$nombre,$descripcion,$fecha,$numeroUnidad,$idCurso){
            $this->idUnidad=$idUnidad;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->fecha=$fecha;
            $this->numeroUnidad=$numeroUnidad;
            $this->idCurso=$idCurso;
        }

        public static function consultarUnidades($idCurso){
            $unidades=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM unidades");
            foreach($sql->fetchAll() as $iterador){
                if($idCurso==$iterador['id_Curso']){
                    $unidades[]=new Unidad($iterador['id_Unidad'],$iterador['nombre_Unidad'],$iterador['descripcion_Unidad'],$iterador['fecha_Creacion'],$iterador['numero_Unidad'],$iterador['id_Curso']);
                }
            }
            return $unidades;
        }

        public static function agregarUnidad($idCurso,$nombre,$descripcion,$fecha,$numero){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO unidades(nombre_Unidad,descripcion_Unidad,fecha_Creacion,numero_Unidad,id_Curso) VALUES (?,?,?,?,?)");
            $sql->execute(array($nombre,$descripcion,$fecha,$numero,$idCurso));
        }

        public static function borrarUnidad($idUnidad){
            $conexionBD=BD::crearInstancia();
            $sqlArchivos=$conexionBD->prepare("SELECT archivo FROM unidades INNER JOIN temas on temas.id_Unidad = unidades.id_Unidad INNER JOIN subtemas ON subtemas.id_Tema = temas.id_Tema INNER JOIN archivos ON archivos.id_Subtema = subtemas.id_Subtema WHERE unidades.id_Unidad =?");
            $sqlArchivos->execute(array($idUnidad));
            $idArchivos=$sqlArchivos->fetchAll();
            foreach($idArchivos as $iterador){
                if(isset($iterador['archivo']) && ($iterador['archivo']!="imagen.jpg")){
                    if(file_exists("material/".$iterador['archivo'])){
                        unlink("material/".$iterador['archivo']);
                    }
                }
            }
            $sql=$conexionBD->prepare("DELETE FROM unidades WHERE id_Unidad=?");
            $sql->execute(array($idUnidad));
        }

        public static function buscarUnidadEspecifica($idUnidad){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM unidades WHERE id_Unidad=?");
            $sql->execute(array($idUnidad));
            $unidad=$sql->fetch();
            return new Unidad($unidad['id_Unidad'],$unidad['nombre_Unidad'],$unidad['descripcion_Unidad'],$unidad['fecha_Creacion'],$unidad['numero_Unidad'],$unidad['id_Curso']);
        }

        public static function modificarUnidad($idUnidad,$nombre,$descripcion,$fecha){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE unidades SET nombre_Unidad=?,descripcion_Unidad=?,fecha_Creacion=? WHERE id_Unidad=?");
            $sql->execute(array($nombre,$descripcion,$fecha,$idUnidad));
        }


        public static function obtenerUnidadEspecifica($nombre){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM unidades WHERE nombre_Unidad=?");
            $sql->execute(array($nombre));
            $unidad=$sql->fetch();
            return new Unidad($unidad['id_Unidad'],$unidad['nombre_Unidad'],$unidad['descripcion_Unidad'],$unidad['fecha_Creacion'],$unidad['numero_Unidad'],$unidad['id_Curso']);
        }

        public static function verficarExamenUnico($idProfesor,$idCurso){
            $verificacion=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT nombre_Unidad FROM usuario_profesor INNER JOIN cursos ON usuario_profesor.id_Profesor=cursos.id_Profesor INNER JOIN unidades ON unidades.id_Curso=cursos.id_Curso LEFT JOIN examen ON examen.id_Unidad=unidades.id_Unidad WHERE usuario_profesor.id_Profesor=? AND cursos.id_Curso=? AND Examen.id_Unidad is null;");
            $sql->execute(array($idProfesor,$idCurso));
            foreach($sql->fetchAll() as $iterador){
                $verificacion[]=new VerificacionExamen($iterador['nombre_Unidad']);
            }
            return $verificacion;
        }
    }
?>