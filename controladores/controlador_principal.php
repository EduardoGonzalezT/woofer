<?php
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorPrincipal{
        public function iniciarSesionAlumno(){
            $usuario=Principal::iniciarSesionAlumno();
            include_once("vistas/principal/principalAlumno.php");
        }

        public function cerrarSesionAlumno(){
            session_start();
            session_destroy();
            header("Location:./?controlador=login&accion=mostrarLogin");
        }

        public function iniciarSesionProfesor(){
            $usuario=Principal::iniciarSesionProfesor();
            include_once("vistas/principal/principalProfesor.php");
        }

        public function cerrarSesionProfesor(){
            session_start();
            session_destroy();
            header("Location:./?controlador=login&accion=mostrarLogin");
        }
    }
?>