<?php
    include_once("modelos/tema.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorTema{
        public function mostrarTema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $tema=Tema::consultarTemas($idUnidad);
            include_once("vistas/profesor/curso/tema/consultar.php");
        }

        public function agregarTema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            if($_POST){
                $idUnidad=$_POST['txtidUnidad'];
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                Tema::agregarTema($idUnidad,$nombre,$descripcion);
                header("Location:./?controlador=tema&accion=mostrarTema&idU=$idUnidad&idC=$idCurso");
            }
        }

        public function borrarTema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            $idCurso=$_GET['idC'];
            Tema::borrarTema($idTema);
            header("Location:./?controlador=tema&accion=mostrarTema&idU=$idUnidad&idC=$idCurso");
        }

        public function modificarTema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            $tema=Tema::buscarTemaEspecifico($idTema);
            if($_POST){
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                Tema::modificarTema($idTema,$nombre,$descripcion);
                header("Location:./?controlador=tema&accion=mostrartema&idU=$idUnidad&idC=$idCurso");
            }
            include_once("vistas/profesor/curso/tema/modificar.php");
        }
    }
?>