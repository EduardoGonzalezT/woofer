<?php
    include_once("modelos/material.php");
    include_once("conexion.php");
    include_once("modelos/principal.php");
    BD::crearInstancia();
    class ControladorMaterial{
        public function mostrarMaterial(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            $idSubtema=$_GET['idSub'];
            $material=Material::consultarMaterial($idSubtema);
            include_once("vistas/profesor/curso/material/consultar.php");
        }

        public function agregarMaterial(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            if($_POST){
                $idSubtema=$_POST['txtidSubtema'];
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                $tipo=$_POST['txtExtension'];
                $nombreMaterial=(isset($_FILES['Material']['name']))?$_FILES['Material']['name']:"";
                $tmpMaterial=$_FILES["Material"]["tmp_name"];
                Material::agregarMaterial($idSubtema,$nombre,$descripcion,$tipo,$nombreMaterial,$tmpMaterial);
                header("Location:./?controlador=material&accion=mostrarMaterial&idSub=$idSubtema&idC=$idCurso&idU=$idUnidad&idT=$idTema");
            }
        }

        public function borrarMaterial(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            $idSubtema=$_GET['idSub'];
            $idMaterial=$_GET['idM'];
            Material::borrarMaterial($idMaterial);
            header("Location:./?controlador=material&accion=mostrarMaterial&idSub=$idSubtema&idC=$idCurso&idU=$idUnidad&idT=$idTema");
        }

        public function modificarMaterial(){
            $usuario=Principal::iniciarSesionProfesor();
            $idCurso=$_GET['idC'];
            $idUnidad=$_GET['idU'];
            $idTema=$_GET['idT'];
            $idSubtema=$_GET['idSub'];
            $idMaterial=$_GET['idM'];
            $material=Material::consultarMaterialEspecifico($idMaterial);
            if($_POST){
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                $tipo=$_POST['txtExtension'];
                $nombreMaterial=(isset($_FILES['Material']['name']))?$_FILES['Material']['name']:"";
                $tmpMaterial=$_FILES["Material"]["tmp_name"];
                Material::editarMaterial($idMaterial,$idSubtema,$nombre,$descripcion,$tipo,$nombreMaterial,$tmpMaterial);
                header("Location:./?controlador=material&accion=mostrarMaterial&idSub=$idSubtema&idM=$idMaterial&idC=$idCurso&idU=$idUnidad&idT=$idTema");
            }
            include_once("vistas/profesor/curso/material/modificar.php");
        }
    }
?>