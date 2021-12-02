<?php 
    class Alumno{
        public $idAlumno;
        public $nombreAlumno;
        public $apellidoPaterno;
        public $apellidoMaterno;
        public $fechaNacimiento;
        public $correo;
        public $usuario;
        public $contraseña;
        public $matricula;
        public $pregunta;
        public $respuesta;
        public $imagen;

        public function __construct($idAlumno,$nombreAlumno,$apellidoPaterno,$apellidoMaterno,$fechaNacimiento,$correo,$usuario,$contraseña,$matricula,$pregunta,$respuesta,$imagen){
            $this->idAlumno=$idAlumno;
            $this->nombreAlumno=$nombreAlumno;
            $this->apellidoPaterno=$apellidoPaterno;
            $this->apellidoMaterno=$apellidoMaterno;
            $this->fechaNacimiento=$fechaNacimiento;
            $this->correo=$correo;
            $this->usuario=$usuario;
            $this->contraseña=$contraseña;
            $this->matricula=$matricula;
            $this->pregunta=$pregunta;
            $this->respuesta=$respuesta;
            $this->imagen=$imagen;
        }

        public static function RegistrarAlumno($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$correo,$usuario,$contraseña,$matricula,$pregunta,$respuesta,$nombreFoto,$tmpFoto){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO usuario_alumno(nombre_Alumno,apellido_Pat,apellido_Mat,fecha_Nac,correo,usuario,contrasenia,matricula,pregunta,respuesta,imagen) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $fecha2=new DateTime();
            $nombreArchivo=($nombreFoto!="")?$fecha2->getTimestamp()."_".$nombreFoto:"imagen.jpg";
            move_uploaded_file($tmpFoto,"img\alumno/".$nombreArchivo);
            $sql->execute(array($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$correo,$usuario,$contraseña,$matricula,$pregunta,$respuesta,$nombreArchivo));
        }

        public static function buscarAlumnos(){
            $conexionBD=BD::crearInstancia();
            $alumnos=[];
            $sql=$conexionBD->query("SELECT * FROM usuario_alumno");
            foreach($sql->fetchAll() as $iterador){
                $alumnos[]=new Alumno($iterador['id_Alumno'],$iterador['nombre_Alumno'],$iterador['apellido_Pat'],$iterador['apellido_Mat'],$iterador['fecha_Nac'],$iterador['correo'],$iterador['usuario'],$iterador['contrasenia'],$iterador['matricula'],$iterador['pregunta'],$iterador['respuesta'],$iterador['imagen']);
            }
                return $alumnos;
        }

        

        public static function buscarMatriculaAlumno($cuentaAlumno){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_alumno WHERE usuario=?");
            $sql->execute(array($cuentaAlumno));
            $iterador=$sql->fetch();
            return new Alumno($iterador['id_Alumno'],$iterador['nombre_Alumno'],$iterador['apellido_Pat'],$iterador['apellido_Mat'],$iterador['fecha_Nac'],$iterador['correo'],$iterador['usuario'],$iterador['contrasenia'],$iterador['matricula'],$iterador['pregunta'],$iterador['respuesta'],$iterador['imagen']);
        }

        public static function editarAlumno($usuario,$contraseña,$pregunta,$respuesta,$nombreFoto,$tmpFoto){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT imagen FROM usuario_alumno WHERE usuario=?");
            $sql2->execute(array($usuario));
            $img=$sql2->fetch(PDO::FETCH_LAZY);
            if($nombreFoto==""){
                $sql=$conexionBD->prepare("UPDATE usuario_alumno SET contrasenia=?,pregunta=?,respuesta=?,imagen=? WHERE usuario=?");
                $sql->execute(array($contraseña,$pregunta,$respuesta,$img['imagen'],$usuario));
            }else{
                if(isset($img['imagen']) && ($img["imagen"]!="imagen.jpg")){
                    if(file_exists("img\alumno/".$img["imagen"])){
                        unlink("img\alumno/".$img["imagen"]);
                    }
                }
                $fecha=new DateTime();
                $nombreArchivo=($nombreFoto!="")?$fecha->getTimestamp()."_".$nombreFoto:"imagen.jpg";
                move_uploaded_file($tmpFoto,"img\alumno/".$nombreArchivo);
                $sql=$conexionBD->prepare("UPDATE usuario_alumno SET contrasenia=?,pregunta=?,respuesta=?,imagen=? WHERE usuario=?");
                $sql->execute(array($contraseña,$pregunta,$respuesta,$nombreArchivo,$usuario));
            }
        }
    }
?>