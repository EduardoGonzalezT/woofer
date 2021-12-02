<?php
    class Login{

        public static function verificarAccesoProfesor($usuario,$contraseña){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_profesor WHERE usuario=? AND contrasenia=?");
            $sql->execute(array($usuario,$contraseña));
            $iterador=$sql->fetch();
            if($iterador!=NULL){
                return "Si";
            }else{
                return "No";
            }
        }

        // función que verifica que el usuario Alumno exista y sus datos sean correctos
        public static function verificarAccesoAlumno($usuario,$contraseña){
            // conexión a la base de datos
            $conexionBD=BD::crearInstancia();
            // Consulta en la base de datos, tabla usuario Alumno
            $sql=$conexionBD->prepare("SELECT * FROM usuario_alumno WHERE usuario=? AND contrasenia=?");
            $sql->execute(array($usuario,$contraseña));
            $iterador=$sql->fetch();
            // determinamos si existe o no la consulta y regresamos una respuesta.
            if($iterador!=NULL){
                return "Si";
            }else{
                return "No";
            }
        }

        public static function recuperarCredencialesAlumno($correo,$pregunta,$respuesta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_alumno WHERE correo=? AND pregunta=? AND respuesta=?");
            $sql->execute(array($correo,$pregunta,$respuesta));
            $iterador=$sql->fetch();
            if($iterador!=NULL){
                return "Si";
            }else{
                return "No";
            }
        }

        public static function recuperarCredencialesProfesor($correo,$pregunta,$respuesta){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_profesor WHERE correo=? AND pregunta=? AND respuesta=?");
            $sql->execute(array($correo,$pregunta,$respuesta));
            $iterador=$sql->fetch();
            if($iterador!=NULL){
                return "Si";
            }else{
                return "No";
            }
        }

        public static function enviarCorreoAlumno($correo,$pregunta,$respuesta){
            $conexionBD = BD::crearInstancia();
            $sql = $conexionBD->prepare("SELECT * FROM usuario_alumno WHERE correo=? AND pregunta=? AND respuesta=?");
            $sql->execute(array($correo, $pregunta, $respuesta));
            $iterador = $sql->fetch();
            $to = $iterador['correo'];
            $subject = 'Credenciales de Acceso';
            $message = '
            <html>
            <head>
                <title>Credenciales de Acceso</title>
            </head>
            <body>
                <header>
                    <div style="background: #8638eb; border-radius: 3px; color:white; background: linear-gradient(to right,#9c88ff,#8c7ae6); text-align: center;">
                        <h1>Woofer</h1>
                    </div>
                </header>
                <div style="background: white; color:black;">
                    <h1 style="color: black; text-align: center; font-family: arial; font-size: 2.6rem; font-weight:bold; ">Recuperación de credenciales de acceso</h1>
                    <p style="font-family: arial; text-align: center; font-size: 1.5rem;">Aqui te entregamos tus datos personales de acceso a la plataforma:</p>
                    <p>
                        <ul style="text-align: center; list-style:none;">
                            <li style="font-family: arial; font-size: 1.5rem;">Correo Electronico: '.$iterador['correo'].'</li>
                            <li style="font-family: arial; font-size: 1.5rem;">Usuario: '.$iterador['usuario'].'</li>
                            <li style="font-family: arial; font-size: 1.55rem;">Contraseña: '.$iterador['contrasenia'].'</li>
                        </ul>
                    </p>
                    <p style="text-align: center; font-family: arial; font-size: 1.5rem;">Esperamos que puedas seguir acompañandonos, así mismo seguir aprendiendo y mejorando cada dia más.</p>
                </div>
                <footer>
                    <div style="background: #8638eb; border-radius: 3px; color:white; background: linear-gradient(to right,#9c88ff,#8c7ae6); text-align: center;">
                        <h3>Tutor Virtual</h3>
                    </div>
                </footer>
            </body>
            </html>
            ';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'To: '.$iterador['correo'];
            $headers[] = 'From: ecmo181797@upemor.edu.mx';
            $headers[] = 'Cc: '.$iterador['correo'];
            mail($to, $subject, $message, implode("\r\n", $headers));
            header("Location:./?controlador=login&accion=correoEnviado");
        }

        public static function enviarCorreoProfesor($correo,$pregunta,$respuesta){
            $conexionBD = BD::crearInstancia();
            $sql = $conexionBD->prepare("SELECT * FROM usuario_profesor WHERE correo=? AND pregunta=? AND respuesta=?");
            $sql->execute(array($correo, $pregunta, $respuesta));
            $iterador = $sql->fetch();
            $to = $iterador['correo'];
            $subject = 'Credenciales de Acceso';
            $message = '
            <html>
            <head>
                <title>Credenciales de Acceso</title>
            </head>
            <body>
                <header>
                    <div style="background: #8638eb; border-radius: 3px; color:white; background: linear-gradient(to right,#9c88ff,#8c7ae6); text-align: center;">
                        <h1>Woofer</h1>
                    </div>
                </header>
                <div style="background: white; color:black;">
                    <h1 style="color: black; text-align: center; font-family: arial; font-size: 2.6rem; font-weight:bold; ">Recuperación de credenciales de acceso</h1>
                    <p style="font-family: arial; text-align: center; font-size: 1.5rem;">Aqui te entregamos tus datos personales de acceso a la plataforma:</p>
                    <p>
                        <ul style="text-align: center; list-style:none;">
                            <li style="font-family: arial; font-size: 1.5rem;">Correo Electronico: '.$iterador['correo'].'</li>
                            <li style="font-family: arial; font-size: 1.5rem;">Usuario: '.$iterador['usuario'].'</li>
                            <li style="font-family: arial; font-size: 1.55rem;">Contraseña: '.$iterador['contrasenia'].'</li>
                        </ul>
                    </p>
                    <p style="text-align: center; font-family: arial; font-size: 1.5rem;">Esperamos que puedas seguir acompañandonos, así mismo seguir aprendiendo y mejorando cada dia más.</p>
                </div>
                <footer>
                    <div style="background: #8638eb; border-radius: 3px; color:white; background: linear-gradient(to right,#9c88ff,#8c7ae6); text-align: center;">
                        <h3>Tutor Virtual</h3>
                    </div>
                </footer>
            </body>
            </html>
            ';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'To: '.$iterador['correo'];
            $headers[] = 'From: ecmo181797@upemor.edu.mx';
            $headers[] = 'Cc: '.$iterador['correo'];
            mail($to, $subject, $message, implode("\r\n", $headers));
            header("Location:./?controlador=login&accion=correoEnviado");
        }
        
        // public static function recuperarCredenciales($correo,$pregunta,$respuesta,$alumnos,$profesores){
        //     foreach($alumnos as $iterador){
        //         if(($correo==$iterador->correo) && ($pregunta==$iterador->pregunta) && ($respuesta==$iterador->respuesta)){
        //             $para=$iterador->correo;
        //             $asunto= 'Recuperación de Credenciales de Acceso';
        //             $mensaje="
        //             Nombre de Usuario: ".$iterador->usuario."
        //             Correo electronico: ".$iterador->correo."
        //             Contraseña: ".$iterador->contraseña;
        //             $cabeceras= 'De: ecmo181797@upemor.edu.mx' . "\r\n" .
        //                 'Replica : ecmo181797@upemor.edu.mx' . "\r\n" .
        //                 'X-Mailer: PHP/' . phpversion();
        //             mail($para, $asunto, $mensaje, $cabeceras);
        //             header("Location:./?controlador=login&accion=mostrarLogin");
        //         }
        //     }
        //     foreach($profesores as $iterador){
        //         if(($correo==$iterador->correo) && ($pregunta==$iterador->pregunta) && ($respuesta==$iterador->respuesta)){
        //             $para=$iterador->correo;
        //             $asunto= 'Recuperación de Credenciales de Acceso';
        //             $mensaje="
        //             Nombre de Usuario: ".$iterador->usuario."
        //             Correo electronico: ".$iterador->correo."
        //             Contraseña: ".$iterador->contraseña;
        //             $cabeceras= 'De: ecmo181797@upemor.edu.mx' . "\r\n" .
        //                 'Replica : ecmo181797@upemor.edu.mx' . "\r\n" .
        //                 'X-Mailer: PHP/' . phpversion();
        //             mail($para, $asunto, $mensaje, $cabeceras);
        //             header("Location:./?controlador=login&accion=mostrarLogin");
        //         }
        //     }
        // }

    
        public static function generarClave($email){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO claveacceso(clave) VALUES (?)");
            $clave=new DateTime();

            $to = $email;
            $subject = 'Clave de Acceso';
            $message = '
            <html>
            <head>
                <title>Clave de Acceso</title>
            </head>
            <body>
                <header>
                    <div style="background: #8638eb; border-radius: 3px; color:white; background: linear-gradient(to right,#9c88ff,#8c7ae6); text-align: center;">
                        <h1>Woofer</h1>
                    </div>
                </header>
                <div style="background: white; color:black;">
                    <h1 style="color: black; text-align: center; font-family: arial; font-size: 2.6rem; font-weight:bold; ">Clave de acceso</h1>
                    <p style="font-family: arial; text-align: center; font-size: 1.5rem;">Aqui te entregamos tú clave de acceso para acceder al formulario de registro para profesores:</p>
                    <p>
                        <ul style="text-align: center; list-style:none;">
                            <li style="font-family: arial; font-size: 1.5rem;">Clave de Acceso: '.$clave->getTimestamp().'</li>
                        </ul>
                    </p>
                    <p style="text-align: center; font-family: arial; font-size: 1.5rem;">Esperamos que puedas seguir acompañandonos, así mismo seguir aprendiendo y mejorando cada dia más.</p>
                </div>
                <footer>
                    <div style="background: #8638eb; border-radius: 3px; color:white; background: linear-gradient(to right,#9c88ff,#8c7ae6); text-align: center;">
                        <h3>Tutor Virtual</h3>
                    </div>
                </footer>
            </body>
            </html>
            ';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'To: '.$email;
            $headers[] = 'From: ecmo181797@upemor.edu.mx';
            $headers[] = 'Cc: '.$email;
            mail($to, $subject, $message, implode("\r\n", $headers));
            $sql->execute(array($clave->getTimestamp()));

            // $para=$email;
            // $asunto= 'Clave de Acceso a Registro';
            // $mensaje="
            // Clave de Registro: ".$clave->getTimestamp();
            // $cabeceras= 'De: ecmo181797@upemor.edu.mx' . "\r\n" .
            // 'Replica : ecmo181797@upemor.edu.mx' . "\r\n" .
            // 'X-Mailer: PHP/' . phpversion();
            // mail($para, $asunto, $mensaje, $cabeceras);
            // $sql->execute(array($clave->getTimestamp()));
        }
    }
?>