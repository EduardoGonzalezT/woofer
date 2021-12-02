<?php
    include_once("modelos/profesor.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorProfesor{

        public function mostrarRegistro(){
            include_once("vistas/profesor/registrarProfesor.php");
        }

        public function registrarProfesor(){
            if($_POST){
                $nombre=$_POST['txtNombre'];
                $apellidoPaterno=$_POST['txtPaterno'];
                $apellidoMaterno=$_POST['txtMaterno'];
                $fecha=$_POST['txtFecha'];
                $correo=$_POST['txtCorreo'];
                $usuario=$_POST['txtUsuario'];
                $contraseña=$_POST['txtContraseña'];
                $cedula=$_POST['txtCedula'];
                $pregunta=$_POST['txtPregunta'];
                $respuesta=$_POST['txtRespuesta'];
                $nombreFoto=(isset($_FILES['fotoPerfil']['name']))?$_FILES['fotoPerfil']['name']:"";
                $tmpFoto=$_FILES["fotoPerfil"]["tmp_name"];
                Profesor::registrarProfesor($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$correo,$usuario,$contraseña,$cedula,$pregunta,$respuesta,$nombreFoto,$tmpFoto);
                header("Location:?controlador=profesor&accion=registroCorrecto");
            }
        }

        public function editarProfesor(){
            $usuario=Principal::iniciarSesionProfesor();
            $profesor=Profesor::buscarIdProfesor($usuario);
            if($_POST){
                $contraseña=$_POST['txtContraseña'];
                $pregunta=$_POST['txtPregunta'];
                $respuesta=$_POST['txtRespuesta'];
                $nombreFoto=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
                $tmpFoto=$_FILES["txtImagen"]["tmp_name"];
                Profesor::editarProfesor($profesor->usuario,$contraseña,$pregunta,$respuesta,$nombreFoto,$tmpFoto);
                header("Location:./?controlador=principal&accion=iniciarSesionProfesor");
            }
            include_once("vistas/profesor/editarProfesor.php");
        }

        public function registroCorrecto(){
            include_once("includes/correcto/registroCorrecto.php");
        }
    }
?>