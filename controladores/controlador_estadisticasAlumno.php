<?php
    include_once("modelos/estadisticasAlumno.php");
    include_once("modelos/principal.php");
    include_once("modelos/alumno.php");
    include_once("modelos/avances.php");
    include_once("modelos/registroCursos.php");
    include_once("modelos/cursoProfesor.php");
    include_once("modelos/historial.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorEstadisticasAlumno{
        public function mostrarEstadisticas(){
            $usuario=Principal::iniciarSesionAlumno();
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            $consulta=EstadisticasAlumno::buscarEstadistica($alumno->idAlumno);
            foreach($consulta as $iterador){
                $arreglo[]=$iterador->calificacion;
                $nombres[]=$iterador->nombreUnidad;
            }
            $consultaProceso=EstadisticasAlumno::buscarEstadisticaAvances($alumno->idAlumno);
            foreach($consultaProceso as $iterador){
                $datos[]=$iterador->nombreUnidad;
                if($iterador->estatus=="Terminado"){
                    $estatus[]=1;
                }else{
                    $estatus[]=0.5;
                }
            }
            include_once("vistas/alumno/estadisticas/estadisticas.php");
        }
    }
?>