<?php
    include_once("modelos/subtema.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorSubtema{
        public function mostrarSubtema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            $subtema=Subtema::consultarSubtemas($idTema);
            include_once("vistas/profesor/curso/subtema/consultar.php");
        }

        public function agregarSubtema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            if($_POST){
                $idTema=$_POST['txtidTema'];
                $nombre=$_POST['txtNombre'];
                Subtema::agregarSubtema($idTema,$nombre);
                header("Location:./?controlador=subtema&accion=mostrarSubtema&idT=$idTema&idC=$idCurso&idU=$idUnidad");
            }
        }

        public function borrarSubtema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idSubtema=$_GET['idSub'];
            $idTema=$_GET['idT'];
            Subtema::borrarSubtema($idSubtema);
            header("Location:./?controlador=subtema&accion=mostrarSubtema&idT=$idTema&idC=$idCurso&idU=$idUnidad");
        }

        public function modificarSubtema(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idSubtema=$_GET['idSub'];
            $idTema=$_GET['idT'];
            $subtema=Subtema::buscarSubtemaEspecifico($idSubtema);
            if($_POST){
                $nombre=$_POST['txtNombre'];
                Subtema::modificarSubtema($idSubtema,$nombre);
                header("Location:./?controlador=subtema&accion=mostrarSubtema&idT=$idTema&idC=$idCurso&idU=$idUnidad");
            }
            include_once("vistas/profesor/curso/subtema/modificar.php");
        }
    }
?>