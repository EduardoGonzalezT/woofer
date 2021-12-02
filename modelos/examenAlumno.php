<?php 
    class ExamenAlumno{
        public $idExamen;
        public $titulo;
        public $valorVerdadero;
        public $totalPreguntas;
        public $tiempo;
        public $descripcion;
        public $etiqueta;
        public $fecha;
        public $idUnidad;

        public function __construct($idExamen,$titulo,$valorVerdadero,$totalPreguntas,$tiempo,$descripcion,$etiqueta,$fecha,$idUnidad){
            $this->idExamen=$idExamen;
            $this->titulo=$titulo;
            $this->valorVerdadero=$valorVerdadero;
            $this->totalPreguntas=$totalPreguntas;
            $this->tiempo=$tiempo;
            $this->descripcion=$descripcion;
            $this->etiqueta=$etiqueta;
            $this->fecha=$fecha;
            $this->idUnidad=$idUnidad;
        }

        public static function consultarExamen($idUnidad){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM examen WHERE id_Unidad=?");
            $sql->execute(array($idUnidad));
            $iterador=$sql->fetch();
            return new ExamenAlumno($iterador['id_Examen'],$iterador['titulo'],$iterador['valor_Verdadero'],$iterador['total_Preguntas'],$iterador['tiempo'],$iterador['descripcion_Examen'],$iterador['etiqueta'],$iterador['fecha_Examen'],$iterador['id_Unidad']);
        }

        public static function buscarPreguntas($idExamen,$numeroPregunta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM preguntas WHERE id_Examen=? AND numero_Preguntas=?");
            $sql->execute(array($idExamen,$numeroPregunta));
            $iterador=$sql->fetch();
            return new Preguntas($iterador['id_Pregunta'],$iterador['Pregunta'],$iterador['numero_Seleccion'],$iterador['numero_Preguntas'],$iterador['id_Examen']);
        }

        public static function buscarOpciones($idPregunta,$numeroPregunta){
            $conexionBD=BD::crearInstancia();
            $opciones=[];
            $sql=$conexionBD->prepare("SELECT * FROM opcion WHERE id_Pregunta=? AND num_Pregunta=?");
            $sql->execute(array($idPregunta,$numeroPregunta));
            foreach($sql->fetchAll() as $iterador){
                $opciones[]=new Opcion($iterador['id_Opcion'],$iterador['opcion'],$iterador['num_Pregunta'],$iterador['id_Pregunta']);
            }
            return $opciones;
        }

        public static function respuestas($idPregunta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM respuestas WHERE id_Pregunta=?");
            $sql->execute(array($idPregunta));
            $iterador=$sql->fetch();
            return new Respuestas($iterador['id_Respuesta'],$iterador['respuesta'],$iterador['id_Pregunta']);
        }

        public static function buscarExamen($idExamen){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM examen WHERE id_Examen=?");
            $sql->execute(array($idExamen));
            $iterador=$sql->fetch();
            return new ExamenAlumno($iterador['id_Examen'],$iterador['titulo'],$iterador['valor_Verdadero'],$iterador['total_Preguntas'],$iterador['tiempo'],$iterador['descripcion_Examen'],$iterador['etiqueta'],$iterador['fecha_Examen'],$iterador['id_Unidad']);
        }

        public static function insertarHistorial($idExamen,$idAlumno){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO historial(calificacion,nivel,valor_Verdadero,valor_Falso,id_Examen,id_Alumno) VALUES (?,?,?,?,?,?)");
            $sql->execute(array(0,0,0,0,$idExamen,$idAlumno));
        }

        public static function consultarHistorial($idExamen){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM historial WHERE id_Examen=?");
            $sql->execute(array($idExamen));
            $iterador=$sql->fetch();
            return new Historial($iterador['id_Historial'],$iterador['calificacion'],$iterador['nivel'],$iterador['valor_Verdadero'],$iterador['valor_Falso'],$iterador['estatus'],$iterador['id_Examen'],$iterador['id_Alumno']);
        }

        public static function consultarhistoriales($idExamen,$idAlumno){
            $conexionBD=BD::crearInstancia();
            $historiales=[];
            $sql=$conexionBD->prepare("SELECT * FROM historial WHERE id_historial!=? id_Examen=? AND id_Alumno=?");
            $sql->execute(array($idExamen,$idAlumno));
            foreach($sql->fetchAll() as $iterador){
                $historiales[]=new Historial($iterador['id_Historial'],$iterador['calificacion'],$iterador['nivel'],$iterador['valor_Verdadero'],$iterador['valor_Falso'],$iterador['estatus'],$iterador['id_Examen'],$iterador['id_Alumno']);
            }
            return $historiales;
        }


        public static function consultarHistorialEspecifico($idExamen,$idAlumno){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM historial WHERE id_Examen=? and id_Alumno=?");
            $sql->execute(array($idExamen,$idAlumno));
            $iterador=$sql->fetch();
            return new Historial($iterador['id_Historial'],$iterador['calificacion'],$iterador['nivel'],$iterador['valor_Verdadero'],$iterador['valor_Falso'],$iterador['estatus'],$iterador['id_Examen'],$iterador['id_Alumno']);
        }

        public static function actualizarHistorial($calificacion,$numeroPregunta,$valor,$idExamen){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE historial SET calificacion=?, nivel=?,valor_Verdadero=? WHERE id_Examen=?");
            $sql->execute(array($calificacion,$numeroPregunta,$valor,$idExamen));
        }

        public static function actualizarHistorialFalso($calificacion,$numeroPregunta,$valor_F,$idExamen){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE historial SET calificacion=?, nivel=?,valor_Falso=? WHERE id_Examen=?");
            $sql->execute(array($calificacion,$numeroPregunta,$valor_F,$idExamen));
        }

        public static function insertarCalificacion($calificacion,$idExamen){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE historial SET calificacion=? WHERE id_Examen=?");
            $sql->execute(array($calificacion,$idExamen));
        }

    }
?>