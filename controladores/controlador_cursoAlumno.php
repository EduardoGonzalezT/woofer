<?php
    include_once("modelos/cursoAlumno.php");
    include_once("modelos/unidad.php");
    include_once("modelos/tema.php");
    include_once("modelos/subtema.php");
    include_once("modelos/alumno.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorCursoAlumno{
        public function mostrarCursoAlumno(){
            $usuario=Principal::iniciarSesionAlumno();
            $cursos=CursoAlumno::consultarCursos();
            include_once("vistas/alumno/curso/consultar.php");
        }

        public function detallesCurso(){
            $usuario=Principal::iniciarSesionAlumno();
            $idCurso=$_GET['idC'];
            $curso=CursoAlumno::consultarCurso($idCurso);
            $unidades=CursoAlumno::consultarUnidad($idCurso);
            $temas=CursoAlumno::consultarTema();
            $subtemas=CursoAlumno::consultarSubtemas();
            include_once("vistas/alumno/curso/detalles.php");
        }

        public function solicitudIngresarCurso(){
            $usuario=Principal::iniciarSesionAlumno();
            $identificador=$_SESSION['usuario'];
            $alumno=CursoAlumno::recuperarNombreCompleto($identificador);
            $nombreCurso=$_GET['nC'];
            $idProfesor=$_GET['idP'];
            CursoAlumno::inscribirseCurso($alumno,$nombreCurso,$idProfesor);
            header("Location:./?controlador=principal&accion=iniciarSesionAlumno");
        }
    }
?>