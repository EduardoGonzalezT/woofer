<?php 
    class MisCursos{
        
        public static function buscarMiscursos($idAlumno){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM registro_curso WHERE id_Alumno=?");
            $registros=[];
            $sql->execute(array($idAlumno));
            foreach($sql->fetchAll() as $iterador){
                $registros[]=new RegistroCursos($iterador['id_Registro'],$iterador['fecha_Registro'],$iterador['id_Alumno'],$iterador['id_Curso']);
            }
                return $registros;
        }

        public static function buscarCursoRegistro($idCurso){
            $conexionBD=BD::crearInstancia();
            $cursos=[];
            $sql=$conexionBD->prepare("SELECT * FROM cursos WHERE id_Curso=?");
            $sql->execute(array($idCurso));
            foreach($sql->fetchAll() as $iterador){
                $cursos[]=new CursoAlumno($iterador['id_Curso'],$iterador['nombre_Curso'],$iterador['descripcion_Curso'],$iterador['duracion_Curso'],$iterador['imagen_Curso'],$iterador['id_Profesor'],$iterador['cantidad_Unidades']);
            }
                return $cursos;
        }
    }
?>