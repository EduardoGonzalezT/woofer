<?php
    include_once("modelos/misCursos.php");
    include_once("modelos/alumno.php");
    include_once("modelos/registroCursos.php");
    include_once("modelos/cursoAlumno.php");
    include_once("modelos/material.php");
    include_once("modelos/unidad.php");
    include_once("modelos/tema.php");
    include_once("modelos/subtema.php");
    include_once("modelos/principal.php");
    include_once("modelos/estatus.php");
    include_once("modelos/estatusUnidad.php");
    include_once("modelos/estadisticasAlumno.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorMisCursos{
        public function mostrarMisCursos(){
            $usuario=Principal::iniciarSesionAlumno();
            $idAlumno=$_GET['idA'];
            $registro=MisCursos::buscarMiscursos($idAlumno);
            $cursos=CursoAlumno::consultarCursos();
            include_once("vistas/alumno/misCursos/consultar.php");
        }

        public function mostrarContenido(){
            $usuario=Principal::iniciarSesionAlumno();
            $idCurso=$_GET['idC'];
            $curso=CursoAlumno::consultarCurso($idCurso);
            $listaUnidades=CursoAlumno::consultarUnidad($idCurso);
            $listaTemas=CursoAlumno::consultarTema();
            $listaSubtemas=CursoAlumno::consultarSubtemas();
            $listaMaterial=CursoAlumno::consultarMaterial();
            $estatusUnidad=estatusUnidad::consultarEstatus();
            include_once("vistas/alumno/misCursos/contenido.php");
        }

        public function mostrarMateriales(){
            $usuario=Principal::iniciarSesionAlumno();
            $idCurso=$_GET['idC'];
            $idMaterial=$_GET['idM'];
            $material=Material::consultarMaterialEspecifico($idMaterial);
            include_once("vistas/alumno/misCursos/material.php");
        }

        public function iniciarUnidad(){
            $usuario=Principal::iniciarSesionAlumno();
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            $idUnidad=$_GET['idU'];
            $idCurso=$_GET['idC'];
            $nUnidad=$_GET['nUnidad'];
            Estatus::insertarEstatus($alumno->idAlumno,$idUnidad,$nUnidad);
            header("Location:./?controlador=misCursos&accion=mostrarContenido&idC=$idCurso");
        }
    }
?>