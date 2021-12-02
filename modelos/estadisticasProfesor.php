<?php 
    class EstadisticasProfesor{
        
        public static function consultarTotalAlumnos(){
            $conexionBD=BD::crearInstancia();
            $total=[];
            $sql=$conexionBD->query("SELECT COUNT(id_Alumno) as numero,nombre_Curso FROM registro_curso INNER JOIN cursos ON cursos.id_Curso=registro_curso.id_Curso GROUP BY registro_curso.id_Curso");
            foreach($sql->fetchAll() as $iterador){
                $total[]=new TotalAlumno($iterador['nombre_Curso'],$iterador['numero']);
            }
                return $total;
        }

        public static function calificacionEstudiante(){
            $conexionBD=BD::crearInstancia();
            $cal=[];
            $sql=$conexionBD->query("SELECT CONCAT(nombre_Alumno,' ',apellido_Pat,' ',apellido_Mat) as nombreAlumno ,nombre_curso, calificacion,nombre_Unidad  FROM cursos INNER JOIN unidades ON unidades.id_Curso=cursos.id_Curso INNER JOIN examen ON examen.id_Unidad=unidades.id_Unidad INNER JOIN historial ON historial.id_Examen=examen.id_Examen INNER JOIN usuario_alumno ON historial.id_Alumno=usuario_alumno.id_Alumno");
            foreach($sql->fetchAll() as $iterador){
                $cal[]=new CalificacionAlumno($iterador['nombreAlumno'],$iterador['nombre_curso'],$iterador['calificacion'],$iterador['nombre_Unidad']);
            }
                return $cal;
        }

        public static function buscarComentariosCurso(){
            $conexionBD=BD::crearInstancia();
            $comentarios=[];
            $sql=$conexionBD->query("SELECT comentario, fecha_Hora, valoracion,nombre_curso FROM comentarios INNER JOIN cursos on cursos.id_Curso=comentarios.id_Curso INNER JOIN usuario_profesor ON usuario_profesor.id_Profesor=cursos.id_Profesor");
            foreach($sql->fetchAll() as $iterador){
                $comentarios[]=new ComentarioCurso($iterador['comentario'],$iterador['fecha_Hora'],$iterador['valoracion'],$iterador['nombre_curso']);
            }
                return $comentarios;
        }
    }
?>