<?php
    include_once("modelos/cursoProfesor.php");
    include_once("modelos/profesor.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorCursoProfesor{
        public function mostrarCurso(){
            $usuario=Principal::iniciarSesionProfesor();
            $idProfesor=CursoProfesor::buscarIdProfesor($usuario);
            $cursos=CursoProfesor::buscarCursos();
            include_once("vistas/profesor/curso/consultar.php");
        }

        public function agregarCurso(){
            $usuario=Principal::iniciarSesionProfesor();
            if($_POST){
                $idProfesor=$_POST['txtidProfesor'];
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                $duracion=$_POST['txtDuracion'];
                $nombreFoto=(isset($_FILES['fotoCurso']['name']))?$_FILES['fotoCurso']['name']:"";
                $tmpFoto=$_FILES["fotoCurso"]["tmp_name"];
                CursoProfesor::agregarCurso($idProfesor,$nombre,$descripcion,$duracion,$nombreFoto,$tmpFoto);
                header("Location:./?controlador=cursoProfesor&accion=cursoAgregado");
            }
        }

        public function modificarCurso(){
            $usuario=Principal::iniciarSesionProfesor();
            $idProfesor=$_GET['idP'];
            $idCurso=$_GET['idC'];
            $curso=CursoProfesor::consultarCursoEspecifico($idCurso);
            if($_POST){
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                $duracion=$_POST['txtDuracion'];
                $nombreFoto=(isset($_FILES['fotoC']['name']))?$_FILES['fotoC']['name']:"";
                $tmpFoto=$_FILES["fotoC"]["tmp_name"];
                CursoProfesor::editarCurso($idCurso,$idProfesor,$nombre,$descripcion,$duracion,$nombreFoto,$tmpFoto);
                header("Location:./?controlador=cursoProfesor&accion=mostrarCurso&idP=$idProfesor&idC=$idCurso");
            }
            include_once("vistas/profesor/curso/modificar.php");
        }

        public function borrarCurso(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idProfesor=$_GET['idP'];
            CursoProfesor::borrarCurso($idCurso);
            header("Location:./?controlador=cursoProfesor&accion=mostrarCurso");
        }

        public function cursoAgregado(){
            include_once("includes/correcto/cursoAgregado.php");
        }
    }
?>