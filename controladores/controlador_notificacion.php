<?php
    include_once("modelos/notificacion.php");
    include_once("modelos/notificacionProfesor.php");
    include_once("modelos/notificacionAlumno.php");
    include_once("modelos/profesor.php");
    include_once("modelos/alumno.php");
    include_once("modelos/cursoProfesor.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorNotificacion{
        public function mostrarNotiPendienteProfesor(){
            $usuario=Principal::iniciarSesionProfesor();
            $cuentaPro=$_SESSION['usuario'];
            $profesor=Profesor::buscarIdProfesor($cuentaPro);
            $notificacionProfesor=Notificacion::consultarPendientes($profesor);
            include_once("vistas/profesor/notificaciones/pendientes.php");
        }

        public function mostrarNoticompletasProfesor(){
            $usuario=Principal::iniciarSesionProfesor();
            $cuentaPro=$_SESSION['usuario'];
            $profesor=Profesor::buscarIdProfesor($cuentaPro);
            $completo=Notificacion::consultarCompletos($profesor);
            include_once("vistas/profesor/notificaciones/completado.php");
        }

        public function accionSolicitud(){
            $usuario=Principal::iniciarSesionProfesor();
            $nombreAlumno=$_GET['nAlumno'];
            $matriculaAlumno=$_GET['mAlumno'];
            $nombreCurso=$_GET['nCurso'];
            $idPendiente=$_GET['idP'];
            $valor=$_GET['valor'];
            Notificacion::accionSolicitud($valor,$idPendiente,$nombreAlumno,$matriculaAlumno,$nombreCurso);
            header("Location:./?controlador=notificacion&accion=mostrarNotiPendienteProfesor");
        }

        public function borrarSolicitud(){
            $usuario=Principal::iniciarSesionProfesor();
            $idPendiente=$_GET['idP'];
            Notificacion::borrarSolicitud($idPendiente);
            header("Location:./?controlador=notificacion&accion=mostrarNoticompletasProfesor");
        }

        public function visualizarNotiAlumno(){
            $usuario=Principal::iniciarSesionAlumno();
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            $notificacion=Notificacion::notifiacionAlumno($alumno);
            include_once("vistas/alumno/notificaciones/visualizar.php");
        }

        public function eliminarNotificacion(){
            $usuario=Principal::iniciarSesionAlumno();
            $idPendiente=$_GET['idP'];
            Notificacion::eliminarNotificacion($idPendiente);
            header("Location:./?controlador=notificacion&accion=visualizarNotiAlumno");
        }
    }
?>