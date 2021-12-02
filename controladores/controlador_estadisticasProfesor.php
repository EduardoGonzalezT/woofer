<?php
    include_once("modelos/estadisticasProfesor.php");
    include_once("modelos/principal.php");
    include_once("modelos/cursoProfesor.php");
    include_once("modelos/totalAlumnos.php");
    include_once("modelos/profesor.php");
    include_once("modelos/comentariosCurso.php");
    include_once("modelos/calificacionAlumno.php");
    include_once("modelos/registroCursos.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorEstadisticasProfesor{
        public function mostrarEstadisticasProfesor(){
            $usuario=Principal::iniciarSesionProfesor();
            $profesor=CursoProfesor::buscarIdProfesor($usuario);
            $totalAlumnos=EstadisticasProfesor::consultarTotalAlumnos();
            foreach($totalAlumnos as $iterador){
                $nombreCurso[]=$iterador->nombreCurso;
                $total[]=$iterador->numero;
            }
            $calificacionEstudiante=EstadisticasProfesor::calificacionEstudiante();
            $comentarios=EstadisticasProfesor::buscarComentariosCurso();
            include_once("vistas/profesor/estadisticas/estadisticas.php");
        }
    }
?>