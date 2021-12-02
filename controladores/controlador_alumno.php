<?php
    include_once("modelos/alumno.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorAlumno{
        public function mostrarRegistro(){
            include_once("vistas/alumno/registrarAlumno.php");
        }

        public function registrarAlumno(){
            if($_POST){
                $nombre=$_POST['txtNombre'];
                $apellidoPaterno=$_POST['txtApPaterno'];
                $apellidoMaterno=$_POST['txtApMaterno'];
                $fecha=$_POST['txtFecha'];
                $correo=$_POST['txtCorreo'];
                $usuario=$_POST['txtUsuario'];
                $contraseña=$_POST['txtContraseña'];
                $matricula=$_POST['txtMatricula'];
                $pregunta=$_POST['txtPregunta'];
                $respuesta=$_POST['txtRespuesta'];
                $nombreFoto=(isset($_FILES['fotoPerfil']['name']))?$_FILES['fotoPerfil']['name']:"";
                $tmpFoto=$_FILES["fotoPerfil"]["tmp_name"];
                Alumno::registrarAlumno($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$correo,$usuario,$contraseña,$matricula,$pregunta,$respuesta,$nombreFoto,$tmpFoto);
                header("Location:?controlador=alumno&accion=registroCorrecto");
            }
        }

        public function editarAlumno(){
            $usuario=Principal::iniciarSesionAlumno();
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            if($_POST){
                $contraseña=$_POST['txtContraseña'];
                $pregunta=$_POST['txtPregunta'];
                $respuesta=$_POST['txtRespuesta'];
                $nombreFoto=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
                $tmpFoto=$_FILES["txtImagen"]["tmp_name"];
                Alumno::editarAlumno($alumno->usuario,$contraseña,$pregunta,$respuesta,$nombreFoto,$tmpFoto);
                header("Location:./?controlador=principal&accion=iniciarSesionAlumno");
            }
            include_once("vistas/alumno/editarAlumno.php");
        }

        public function registroCorrecto(){
            include_once("includes/correcto/registroCorrecto.php");
        }
    }
?>