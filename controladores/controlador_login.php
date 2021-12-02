<?php
    include_once("modelos/login.php");
    include_once("modelos/alumno.php");
    include_once("modelos/profesor.php");
    include_once("modelos/clave.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorLogin{
        
        public function mostrarLogin(){
            include_once("vistas/login/acceder.php");
        }

        public function recuperarCredenciales(){
            if($_POST){
                $correo=$_POST['txtCorreo'];
                $pregunta=$_POST['txtPregunta'];
                $respuesta=$_POST['txtRespuesta'];
                $validar=Login::recuperarCredencialesAlumno($correo,$pregunta,$respuesta);
                if($validar!="No"){
                    Login::enviarCorreoAlumno($correo,$pregunta,$respuesta);
                }else{
                    $validar=Login::recuperarCredencialesProfesor($correo,$pregunta,$respuesta);
                    if($validar!="No"){
                        Login::enviarCorreoProfesor($correo,$pregunta,$respuesta);
                    }else{
                        header("Location:./?controlador=login&accion=correoNoEnviado");
                    }
                }
            }
            include_once("vistas/login/recuperar.php");
        }

        public function generarClave(){
            if($_POST){
                $uMaster=$_POST['txtUmaster'];
                $cMaster=$_POST['txtCmaster'];
                $email=$_POST['txtEmail'];
                if(($uMaster=="admin") && ($cMaster=="admin")){
                    Login::generarClave($email);
                    header("Location:./?controlador=login&accion=accesoEnviado");
                }else{
                    header("Location:./?controlador=login&accion=accesoNoEnviado");
                }
            }
            include_once("vistas/login/acceder.php");
        }

        public function confirmarClave(){
            if($_POST){
                $clave=$_POST['txtClave'];
                $verificacion=Clave::consultarClave($clave);
                if($verificacion=="Si"){
                    Clave::eliminarClave($clave);
                    header("Location:./?controlador=login&accion=claveCorrecta");
                }else{
                    header("Location:./?controlador=login&accion=claveErronea");
                }
            }
            include_once("vistas/login/acceder.php");
        }



        // función creada para verificar la credenciales de acceso del usuario
        public function confirmarPerfil(){
            if($_POST){
                // Recepción de datos del usuario atravez del formulario usando el metodo POST
                $usuario = $_POST['txtUsuario'];
                $contraseña = $_POST['txtContraseña'];
                // función que verifica que el usuario Alumno exista y las credenciales sean correctas
                $respuesta=Login::verificarAccesoAlumno($usuario,$contraseña);
                // comprobación de dicha respuesta
                if($respuesta!="No"){
                    // si el usuario es alumno se envia a su respectivo perfil
                    header("Location:./?controlador=login&accion=datosCorrectos&usu=$usuario&tipo=A");
                }else{
                    // si no es alumno, esta función verifica que el usuario Profesor exista y las credenciales sean correctas
                    $respuesta=Login::verificarAccesoProfesor($usuario,$contraseña);
                    // comprobación de dicha respuesta
                    if($respuesta!="No"){
                        // si el usuario es Profesor se envia a su respectivo perfil
                        header("Location:./?controlador=login&accion=datosCorrectos&usu=$usuario&tipo=B");
                    }else{
                        // si no es nunguno de los dos usuarios, se muestra una pantalla de datos Erroneos o inexistentes.
                        header("Location:./?controlador=login&accion=datosErroneos");
                    }
                }
            }
        }



        public function accesoPrincipal(){
            $usuario=$_GET['usu'];
            $tipo=$_GET['tipo'];
            if ($tipo == "A") {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location:./?controlador=principal&accion=iniciarSesionAlumno");
            } else {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location:./?controlador=principal&accion=iniciarSesionProfesor");
            }
        }

        public function errorSesion(){
            include_once("vistas/login/errorSesion.php");
        }

        public function datosErroneos(){
            include_once("includes/error/datosErroneos.php");
        }

        public function datosCorrectos(){
            $usuario=$_GET['usu'];
            $tipo=$_GET['tipo'];
            include_once("includes/correcto/datosCorrectos.php");
        }

        public function correoEnviado(){
            include_once("includes/correcto/correoEnviado.php");
        }

        public function correoNoEnviado(){
            include_once("includes/error/correoNoEnviado.php");
        }

        public function accesoEnviado(){
            include_once("includes/correcto/accesoEnviado.php");
        }

        public function accesoNoEnviado(){
            include_once("includes/error/accesoNoEnviado.php");
        }

        public function claveCorrecta(){
            include_once("includes/correcto/claveCorrecta.php");
        }

        public function claveErronea(){
            include_once("includes/error/claveErronea.php");
        }
    }
?>