<?php
    include_once("modelos/examenProfesor.php");
    include_once("modelos/opcion.php");
    include_once("modelos/preguntas.php");
    include_once("modelos/principal.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorExamenProfesor{
        public function mostrarExamen(){
            $usuario=Principal::iniciarSesionProfesor();
            $idUnidad=$_GET['idU'];
            include_once("vistas/profesor/examen/consultar.php");
        }

        public function registrarExamen(){
            $usuario=Principal::iniciarSesionProfesor();
            if($_POST){
                $idUnidad=$_POST['idUnidad'];
                $titulo=$_POST['txtTitulo'];
                $numeroPreguntas=$_POST['txtPreguntaNumero'];
                $valorVerdadero=$_POST['txtValorVerdadero'];
                $tiempo=$_POST['txtTiempo'];
                $etiqueta=$_POST['txtEtiqueta'];
                $descripcion=$_POST['txtDescripcion'];
                ExamenProfesor::registrarExamen($titulo,$numeroPreguntas,$valorVerdadero,$tiempo,$etiqueta,$descripcion,$idUnidad);
                $examen=ExamenProfesor::buscarExamen($titulo);
                header("Location:./?controlador=examenProfesor&accion=mostrarAgregarPreguntas&ex=$examen->idExamen&nPre=$numeroPreguntas");
            }
        }

        public function mostrarAgregarPreguntas(){
            $usuario=Principal::iniciarSesionProfesor();
            $idExamen=$_GET['ex'];
            $numeroPreguntas=$_GET['nPre'];
            include_once("vistas/profesor/examen/agregarPreguntas.php");
        }

        public function registrarPreguntas(){
            $usuario=Principal::iniciarSesionProfesor();
            $idExamen=$_GET['ex'];
            $numeroPreguntas=$_GET['nPre'];
            if($_POST){
                for($i = 1; $i <= $numeroPreguntas; $i++){
                    $pregunta = $_POST['txtPregunta'.$i];
                    ExamenProfesor::insertarPregunta($idExamen,$pregunta,4,$i);
                    $idPregunta=Preguntas::buscarIdPregunta($pregunta);
                    $a = $_POST[$i.'1'];
                    $b = $_POST[$i.'2'];
                    $c = $_POST[$i.'3'];
                    $d = $_POST[$i.'4'];
                    ExamenProfesor::insertarOpciones($idPregunta->idPregunta,$a,$i);
                    ExamenProfesor::insertarOpciones($idPregunta->idPregunta,$b,$i);
                    ExamenProfesor::insertarOpciones($idPregunta->idPregunta,$c,$i);
                    ExamenProfesor::insertarOpciones($idPregunta->idPregunta,$d,$i);
                    $respuesta = $_POST['txtRespuesta'.$i];
                    switch ($respuesta) {
                        case 'a':
                            $idRespuesta = Opcion::buscarIdOpcion($a);
                            break;
                        case 'b':
                            $idRespuesta = Opcion::buscarIdOpcion($b);
                            break;
                        case 'c':
                            $idRespuesta = Opcion::buscarIdOpcion($c);
                            break;
                        case 'd':
                            $idRespuesta = Opcion::buscarIdOpcion($d);
                            break;
                        default:
                            echo 'alert("error selecion no valida")';
                    }
                    ExamenProfesor::insertarRespuesta($idPregunta->idPregunta,$idRespuesta->idOpcion);
                }
                header("Location:./?controlador=principal&accion=iniciarSesionProfesor");
            }
        }

        // public function editarExamen(){
        //     $idUnidad=$_GET['idU'];
        //     ExamenProfesor::actualizardisponibilidadExamen($idUnidad);
        //     header("Location:./?controlador=principal&accion=iniciarSesionProfesor");
        // }
    }
?>