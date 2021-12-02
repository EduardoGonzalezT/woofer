<?php 
    class Principal{
        
        public static function iniciarSesionProfesor(){
            session_start();
            $usuario=$_SESSION['usuario'];
            if($usuario==NULL || $usuario=''){
                header("Location:./?controlador=login&accion=errorSesion");
                die();
            }else{
                return $_SESSION['usuario'];
            }
        }

        public static function iniciarSesionAlumno(){
            session_start();
            $usuario=$_SESSION['usuario'];
            if($usuario==NULL || $usuario=''){
                header("Location:./?controlador=login&accion=errorSesion");
                die();
            }else{
                return $_SESSION['usuario'];
            }
        }
    }
?>