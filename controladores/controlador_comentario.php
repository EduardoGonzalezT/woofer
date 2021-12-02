<?php
    include_once("modelos/comentario.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorComentario{
        public function mostrarComentario(){
            $usuario=Principal::iniciarSesionAlumno();
            $idCurso=$_GET['idC'];
            $consultaComentario=Comentario::consultarComentarios($idCurso);
            include_once("vistas/alumno/comentarios/registroComentario.php");
        }

        public function registrarComentario(){
            $usuario=Principal::iniciarSesionAlumno();
            $idCurso=$_GET['idC'];
            if($_POST){
                $comentario=$_POST['txtComentario'];
                $valoracion=$_POST['txtValoracion'];
                Comentario::registrarComentario($usuario,$comentario,$valoracion,$idCurso);
            }
            header("Location:./?controlador=comentario&accion=mostrarComentario&idC=$idCurso");
        }
    }
?>