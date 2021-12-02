<?php
    include_once("modelos/unidad.php");
    include_once("modelos/cursoProfesor.php");
    include_once("modelos/profesor.php");
    include_once("modelos/principal.php");
    include_once("modelos/estatusUnidad.php");
    include_once("modelos/verificacionExamen.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorUnidad{
        public function mostrarUnidad(){
            $usuario=Principal::iniciarSesionProfesor();
            $profesor=Profesor::buscarIdProfesor($usuario);
            $idCurso=$_GET['idC'];
            $unidades=Unidad::consultarUnidades($idCurso);
            $verificacionExamen=Unidad::verficarExamenUnico($profesor->idProfesor,$idCurso);
            include_once("vistas/profesor/curso/unidad/consultar.php");
        }

        public function agregarUnidad(){
            $usuario=Principal::iniciarSesionProfesor();
            if($_POST){
                $idCurso=$_POST['txtidCurso'];
                $curso=CursoProfesor::buscarUnidadesNumeradas($idCurso);
                $ban=0;
                $ban=($curso->cantidadUnidades)+1;
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                $fecha=$_POST['txtFecha'];
                CursoProfesor::actualizarUnidades($ban,$idCurso);
                Unidad::agregarUnidad($idCurso,$nombre,$descripcion,$fecha,$ban);
                $unidad=Unidad::obtenerUnidadEspecifica($nombre);
                estatusUnidad::insertarUnidad($unidad->idUnidad);
                header("Location:./?controlador=unidad&accion=mostrarUnidad&idC=$idCurso");
            }
        }

        public function borrarUnidad(){
            $usuario=Principal::iniciarSesionProfesor();
            $idUnidad=$_GET['idU'];
            $idCurso=$_GET['idC'];
            Unidad::borrarUnidad($idUnidad);
            header("Location:./?controlador=unidad&accion=mostrarUnidad&idC=$idCurso");
        }

        public function modificarUnidad(){
            $usuario=Principal::iniciarSesionProfesor();
            $idUnidad=$_GET['idU'];
            $idCurso=$_GET['idC'];
            $unidad=Unidad::buscarUnidadEspecifica($idUnidad);
            if($_POST){
                $nombre=$_POST['txtNombre'];
                $descripcion=$_POST['txtDescripcion'];
                $fecha=$_POST['txtFecha'];
                Unidad::modificarUnidad($idUnidad,$nombre,$descripcion,$fecha);
                header("Location:./?controlador=unidad&accion=mostrarUnidad&idC=$idCurso");
            }
            include_once("vistas/profesor/curso/unidad/modificar.php");
        }

        public function desbloquearUnidades(){
            $idCurso=$_GET['idC'];
            $curso=CursoProfesor::consultarCursoEspecifico($idCurso);
            $unidades=Unidad::consultarUnidades($idCurso);
            $estatusUnidad=estatusUnidad::consultarEstatus();
            include_once("vistas/profesor/curso/unidad/desbloquear.php");
        }

        public function cambioEstado(){
            $idCurso=$_GET['idC'];
            $cambioEstado=$_GET['estado'];
            $idUnidad=$_GET['idU'];
            estatusUnidad::actualizarEstado($cambioEstado,$idUnidad);
            header("Location:./?controlador=unidad&accion=desbloquearUnidades&idC=$idCurso");
        }
    }
?>