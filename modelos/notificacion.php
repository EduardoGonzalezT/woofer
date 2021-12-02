<?php 
    class Notificacion{
        public static function consultarPendientes($profesor){
            $notificacionProfesor=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM notificacion_profesor");
            foreach($sql->fetchAll() as $iterador){
                if($profesor->idProfesor==$iterador['id_Profesor'] && $iterador['estatus']=="Pendiente"){
                    $notificacionProfesor[]=new notificacionProfesor($iterador['id_notificacionProfesor'],$iterador['nombre_Alumno'],$iterador['matricula_Alumno'],$iterador['nombre_Curso'],$iterador['estatus'],$iterador['id_Profesor']);
                }
            }
            return $notificacionProfesor;
        }
        
        public static function accionSolicitud($valor,$idPendiente,$nombreAlumno,$matriculaAlumno,$nombreCurso){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT id_Alumno FROM usuario_alumno WHERE matricula=?");
            $sql2->execute(array($matriculaAlumno));
            $alumno=$sql2->fetch();
            if($valor=="Aceptado"){
                $sql=$conexionBD->prepare("UPDATE notificacion_profesor SET estatus=? WHERE id_notificacionProfesor=?");
                $sql->execute(array("Aceptado",$idPendiente));
                $sqlAlumno=$conexionBD->prepare("INSERT INTO notificacion_Alumno(nombre_Alumno,matricula_Alumno,nombre_Curso,estatus,id_Alumno) VALUES (?,?,?,?,?)");
                $sqlAlumno->execute(array($nombreAlumno,$matriculaAlumno,$nombreCurso,"Aceptado",$alumno['id_Alumno']));
                $sql3=$conexionBD->prepare("SELECT * FROM cursos WHERE nombre_Curso=?");
                $sql3->execute(array($nombreCurso));
                $curso=$sql3->fetch();
                $sqlRegistro_Curso=$conexionBD->prepare("INSERT INTO registro_curso(fecha_Registro,id_Alumno,id_Curso) VALUES (?,?,?)");
                $sqlRegistro_Curso->execute(array(date('y-m-d'),$alumno['id_Alumno'],$curso['id_Curso']));





                // $cursoCompleto=CursoProfesor::consultarCursoEspecifico($curso['id_Curso']);
                // $sqlEstadisticas=$conexionBD->prepare("INSERT INTO estadisticas_alumno(nombre_Curso,estatus,calificacion,fecha_registro,id_Alumno) VALUES (?,?,?,?,?)");
                // $sqlEstadisticas->execute(array($cursoCompleto->nombre,"NO iniciado","Nula",date('y-m-d'),$alumno['id_Alumno']));
            }else{
                $sql=$conexionBD->prepare("UPDATE notificacion_profesor SET estatus=? WHERE id_notificacionProfesor=?");
                $sql->execute(array("Rechazado",$idPendiente));
                $sqlAlumno=$conexionBD->prepare("INSERT INTO notificacion_Alumno(nombre_Alumno,matricula_Alumno,nombre_Curso,estatus,id_Alumno) VALUES (?,?,?,?,?)");
                $sqlAlumno->execute(array($nombreAlumno,$matriculaAlumno,$nombreCurso,"Rechazado",$alumno['id_Alumno']));
            }
        }

        public static function consultarCompletos($profesor){
            $completo=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM notificacion_profesor");
            foreach($sql->fetchAll() as $iterador){
                if(($profesor->idProfesor==$iterador['id_Profesor'] && $iterador['estatus']=="Aceptado") || ($profesor->idProfesor==$iterador['id_Profesor'] && $iterador['estatus']=="Rechazado")){
                    $completo[]=new notificacionProfesor($iterador['id_notificacionProfesor'],$iterador['nombre_Alumno'],$iterador['matricula_Alumno'],$iterador['nombre_Curso'],$iterador['estatus'],$iterador['id_Profesor']);
                }
            }
            return $completo;
        }

        public static function borrarSolicitud($idPendiente){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("DELETE FROM notificacion_profesor WHERE id_notificacionProfesor=?");
            $sql->execute(array($idPendiente));
        }

        public static function notifiacionAlumno($alumno){
            $notificacion=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM notificacion_alumno");
            foreach($sql->fetchAll() as $iterador){
                if(($alumno->matricula==$iterador['matricula_Alumno'] && $iterador['estatus']=="Aceptado") || ($alumno->matricula==$iterador['matricula_Alumno'] && $iterador['estatus']=="Rechazado")){
                    $notificacion[]=new notificacionAlumno($iterador['id_notificacionAlumno'],$iterador['nombre_Alumno'],$iterador['matricula_Alumno'],$iterador['nombre_Curso'],$iterador['estatus'],$iterador['id_Alumno']);
                }
            }
            return $notificacion;
        }

        public static function eliminarNotificacion($idPendiente){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("DELETE FROM notificacion_alumno WHERE id_notificacionAlumno=?");
            $sql->execute(array($idPendiente));
        }
    }
?>