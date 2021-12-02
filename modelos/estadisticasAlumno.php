<?php
    class EstadisticasAlumno{
        public $estatus;
        public $nombreCurso;
        public $calificacion;
        public $fechaRegistro;
        public $nombreUnidad;

        public function __construct($estatus,$nombreCurso,$calificacion,$fechaRegistro,$nombreUnidad){
            $this->estatus=$estatus;
            $this->nombreCurso=$nombreCurso;
            $this->calificacion=$calificacion;
            $this->fechaRegistro=$fechaRegistro;
            $this->nombreUnidad=$nombreUnidad;
        }
        
        public static function buscarEstadistica($idAlumno){
            $conexionBD=BD::crearInstancia();
            $estadisticas=[];
            $sql=$conexionBD->prepare("SELECT estatus, nombre_curso, calificacion, fecha_Registro, nombre_Unidad FROM registro_curso INNER JOIN cursos ON registro_curso.id_Curso = cursos.id_Curso INNER JOIN unidades ON cursos.id_Curso = unidades.id_Curso INNER JOIN estatus ON estatus.id_Unidad= unidades.id_Unidad INNER JOIN examen ON examen.id_Unidad = unidades.id_Unidad INNER JOIN historial ON historial.id_Examen= examen.id_Examen INNER JOIN usuario_alumno ON usuario_alumno.id_Alumno = historial.id_Alumno WHERE usuario_alumno.id_Alumno=? AND estatus.estatus='Terminado'");
            $sql->execute(array($idAlumno));
            foreach($sql->fetchAll() as $iterador){
                $estadisticas[]=new EstadisticasAlumno($iterador['estatus'],$iterador['nombre_curso'],$iterador['calificacion'],$iterador['fecha_Registro'],$iterador['nombre_Unidad']);
            }
            return $estadisticas;
        }

        public static function buscarEstadisticaAvances($idAlumno){
            $conexionBD=BD::crearInstancia();
            $estadisticas=[];
            $sql=$conexionBD->prepare("SELECT nombre_curso,nombre_Unidad,estatus FROM registro_curso INNER JOIN cursos ON registro_curso.id_Curso=cursos.id_Curso INNER JOIN unidades ON cursos.id_Curso=unidades.id_Curso INNER JOIN estatus ON estatus.id_Unidad=unidades.id_Unidad INNER JOIN usuario_alumno ON estatus.id_Alumno=usuario_alumno.id_Alumno WHERE usuario_alumno.id_Alumno=?");
            $sql->execute(array($idAlumno));
            foreach($sql->fetchAll() as $iterador){
                $estadisticas[]=new Avances($iterador['nombre_curso'],$iterador['nombre_Unidad'],$iterador['estatus']);
            }
            return $estadisticas;
        }
    }
?>