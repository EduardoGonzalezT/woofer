<?php
    include_once("modelos/examenAlumno.php");
    include_once("modelos/alumno.php");
    include_once("modelos/preguntas.php");
    include_once("modelos/opcion.php");
    include_once("modelos/respuestas.php");
    include_once("modelos/historial.php");
    include_once("modelos/principal.php");
    include_once("modelos/estatus.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorExamenAlumno{
        public function mostrarExamenAlumno(){
            $usuario=Principal::iniciarSesionAlumno();
            $idUnidad=$_GET['idU'];
            $examen = ExamenAlumno::consultarExamen($idUnidad);
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            include_once("vistas/alumno/examen/consultarExamen.php");
        }

        public function realizarExamen(){
            $usuario=Principal::iniciarSesionAlumno();
            $idExamen=$_GET['ex'];
            $numeroPregunta=$_GET['pre'];
            $totalPreguntas=$_GET['nPre'];
            $preguntas=ExamenAlumno::buscarPreguntas($idExamen,$numeroPregunta);
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            echo '<div class="panel" style="margin:5%">';
            $numPregunta =$preguntas->numeroPreguntas;
            $idPregunta =$preguntas->idPregunta;
            echo '<b>Pregunta &nbsp;' . $numPregunta. '&nbsp;::<br />' . $preguntas->pregunta . '</b><br /><br />';
            $opciones=ExamenAlumno::buscarOpciones($idPregunta,$numeroPregunta);
            echo '<form action="?controlador=examenAlumno&accion=actualizarExamen&ex=' . $idExamen . '&pre=' . $numeroPregunta . '&nPre=' . $totalPreguntas . '&idPre=' . $idPregunta . '" method="POST"  class="form-horizontal"><br />';
            foreach($opciones as $iterador){
                echo '<input type="radio" name="respuesta" value="' . $iterador->idOpcion . '">' . $iterador->opcion . '<br /><br />';
            }
            echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div>';
            include_once("vistas/alumno/examen/realizarExamen.php");
        }

        public function actualizarExamen(){
            $usuario=Principal::iniciarSesionAlumno();
            $alumno=Alumno::buscarMatriculaAlumno($usuario);
            $idExamen=$_GET['ex'];
            $numeroPregunta=$_GET['pre'];
            $totalPreguntas=$_GET['nPre'];
            $idPregunta=$_GET['idPre'];
            if($_POST){
                $respuesta = $_POST['respuesta'];
                $respuestas=ExamenAlumno::respuestas($idPregunta);
                $idRespuesta = $respuestas->respuesta;
                if ($respuesta == $idRespuesta) {
                    $examen = ExamenAlumno::buscarExamen($idExamen);
                    $valorVerdadero = $examen->valorVerdadero;
                    if ($numeroPregunta == 1) {
                        ExamenAlumno::insertarHistorial($idExamen, $alumno->idAlumno);
                    }
                    $historial = ExamenAlumno::consultarHistorial($idExamen);
                    $calificacion = $historial->calificacion;
                    $valor = $historial->valorVerdadero;
                    $valor++;
                    $calificacion = $calificacion + $valorVerdadero;
                    ExamenAlumno::actualizarHistorial($calificacion, $numeroPregunta, $valor, $idExamen);
                }else{
                    if ($numeroPregunta == 1) {
                        ExamenAlumno::insertarHistorial($idExamen, $alumno->idAlumno);
                    }
                    $historial = ExamenAlumno::consultarHistorial($idExamen);
                    $calificacion = $historial->calificacion;
                    $valor_F = $historial->valorFalso;
                    $valor_F++;
                    ExamenAlumno::actualizarHistorialFalso($calificacion, $numeroPregunta, $valor_F, $idExamen);
                }
                if($numeroPregunta != $totalPreguntas){
                    $numeroPregunta++;
                    header("Location:./?controlador=examenAlumno&accion=realizarExamen&ex=$idExamen&pre=$numeroPregunta&nPre=$totalPreguntas");
                }else{
                    $examen=ExamenAlumno::buscarExamen($idExamen);
                    $ponderacion=$totalPreguntas*$examen->valorVerdadero;
                    $valorPregunta=$examen->valorVerdadero;
                    $historial=ExamenAlumno::consultarHistorial($idExamen);
                    $respuestaCorrectas=(($historial->valorVerdadero)*$valorPregunta);
                    $calificacion=(($respuestaCorrectas*10)/$ponderacion);
                    ExamenAlumno::insertarCalificacion($calificacion,$idExamen);
                    Estatus::actualizarEstatus($examen->idUnidad,$alumno->idAlumno);


                    
                    header("Location:./?controlador=principal&accion=iniciarSesionAlumno");
                }
            }
        }
    }
?>