<?php
    class RegistroCursos{
        public $idRegistro;
        public $fechaRegistro;
        public $idAlumno;
        public $idCurso;

        public function __construct($idRegistro,$fechaRegistro,$idAlumno,$idCurso){
            $this->idRegistro=$idRegistro;
            $this->fechaRegistro=$fechaRegistro;
            $this->idAlumno=$idAlumno;
            $this->idCurso=$idCurso;
        }

        
        public static function buscarRegistro(){
            $conexionBD=BD::crearInstancia();
            $registro=[];
            $sql=$conexionBD->query("SELECT * FROM registro_curso");
            foreach($sql->fetchAll() as $iterador){
                $registro[]=new RegistroCursos($iterador['id_Registro'],$iterador['fecha_Registro'],$iterador['id_Alumno'],$iterador['id_Curso']);
            }
                return $registro;
        }
    }
?>