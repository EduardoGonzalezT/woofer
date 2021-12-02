<?php
    class ExamenProfesor{
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
        
        public static function registrarExamen($titulo,$numeroPreguntas,$valorVerdadero,$tiempo,$etiqueta,$descripcion,$idUnidad){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO examen(titulo,valor_Verdadero,total_Preguntas,tiempo,descripcion_Examen,etiqueta,fecha_Examen,id_Unidad) VALUES (?,?,?,?,?,?,?,?)");
            $sql->execute(array($titulo,$valorVerdadero,$numeroPreguntas,$tiempo,$descripcion,$etiqueta,date('y-m-d'),$idUnidad));
        }

        public static function buscarExamen($titulo){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM examen WHERE titulo=?");
            $sql->execute(array($titulo));
            $examen=$sql->fetch();
            return new ExamenProfesor($examen['id_Examen'],$examen['titulo'],$examen['valor_Verdadero'],$examen['total_Preguntas'],$examen['tiempo'],$examen['descripcion_Examen'],$examen['etiqueta'],$examen['fecha_Examen'],$examen['id_Unidad']);
        }

        public static function insertarPregunta($idExamen,$pregunta,$opciones,$nPregunta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO preguntas(Pregunta,numero_Seleccion,numero_Preguntas,id_Examen) VALUES (?,?,?,?)");
            $sql->execute(array($pregunta,$opciones,$nPregunta,$idExamen));
        }

        public static function insertarOpciones($idPregunta,$a,$num){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO opcion(opcion,num_Pregunta,id_Pregunta) VALUES (?,?,?)");
            $sql->execute(array($a,$num,$idPregunta));
        }

        public static function insertarRespuesta($idPregunta,$idRespuesta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO respuestas(respuesta,id_Pregunta) VALUES (?,?)");
            $sql->execute(array($idRespuesta,$idPregunta));
        }


    }
?>