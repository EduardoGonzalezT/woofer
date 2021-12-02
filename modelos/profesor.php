<?php 
    class Profesor{
        public $idProfesor;
        public $nombreProfesor;
        public $apellidoPaterno;
        public $apellidoMaterno;
        public $fechaNacimiento;
        public $correo;
        public $usuario;
        public $contraseña;
        public $cedula;
        public $pregunta;
        public $respuesta;
        public $imagen;

        public function __construct($idProfesor,$nombreProfesor,$apellidoPaterno,$apellidoMaterno,$fechaNacimiento,$correo,$usuario,$contraseña,$cedula,$pregunta,$respuesta,$imagen){
            $this->idProfesor=$idProfesor;
            $this->nombreProfesor=$nombreProfesor;
            $this->apellidoPaterno=$apellidoPaterno;
            $this->apellidoMaterno=$apellidoMaterno;
            $this->fechaNacimiento=$fechaNacimiento;
            $this->correo=$correo;
            $this->usuario=$usuario;
            $this->contraseña=$contraseña;
            $this->cedula=$cedula;
            $this->pregunta=$pregunta;
            $this->respuesta=$respuesta;
            $this->imagen=$imagen;
        }

        public static function buscarProfesores(){
            $conexionBD=BD::crearInstancia();
            $profesores=[];
            $sql=$conexionBD->query("SELECT * FROM usuario_profesor");
            foreach($sql->fetchAll() as $iterador){
                $profesores[]=new Profesor($iterador['id_Profesor'],$iterador['nombre_Profesor'],$iterador['apellido_Pat'],$iterador['apellido_Mat'],$iterador['fecha_Nac'],$iterador['correo'],$iterador['usuario'],$iterador['contrasenia'],$iterador['cedula'],$iterador['pregunta'],$iterador['respuesta'],$iterador['imagen']);
            }
                return $profesores;
        }

        

        public static function registrarProfesor($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$correo,$usuario,$contraseña,$cedula,$pregunta,$respuesta,$nombreFoto,$tmpFoto){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO usuario_profesor(nombre_Profesor,apellido_Pat,apellido_Mat,fecha_Nac,correo,usuario,contrasenia,cedula,pregunta,respuesta,imagen) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $fecha2=new DateTime();
            $nombreArchivo=($nombreFoto!="")?$fecha2->getTimestamp()."_".$nombreFoto:"imagen.jpg";
            move_uploaded_file($tmpFoto,"img\profesor/".$nombreArchivo);
            $sql->execute(array($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$correo,$usuario,$contraseña,$cedula,$pregunta,$respuesta,$nombreArchivo));
        }

        public static function buscarIdProfesor($cuentaPro){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM usuario_profesor WHERE usuario=?");
            $sql->execute(array($cuentaPro));
            $iterador=$sql->fetch();
            return new Profesor($iterador['id_Profesor'],$iterador['nombre_Profesor'],$iterador['apellido_Pat'],$iterador['apellido_Mat'],$iterador['fecha_Nac'],$iterador['correo'],$iterador['usuario'],$iterador['contrasenia'],$iterador['cedula'],$iterador['pregunta'],$iterador['respuesta'],$iterador['imagen']);
        }

        public static function editarProfesor($usuario,$contraseña,$pregunta,$respuesta,$nombreFoto,$tmpFoto){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT imagen FROM usuario_profesor WHERE usuario=?");
            $sql2->execute(array($usuario));
            $img=$sql2->fetch(PDO::FETCH_LAZY);
            if($nombreFoto==""){
                $sql=$conexionBD->prepare("UPDATE usuario_profesor SET contrasenia=?,pregunta=?,respuesta=?,imagen=? WHERE usuario=?");
                $sql->execute(array($contraseña,$pregunta,$respuesta,$img['imagen'],$usuario));
            }else{
                if(isset($img['imagen']) && ($img["imagen"]!="imagen.jpg")){
                    if(file_exists("img\profesor/".$img["imagen"])){
                        unlink("img\profesor/".$img["imagen"]);
                    }
                }
                $fecha=new DateTime();
                $nombreArchivo=($nombreFoto!="")?$fecha->getTimestamp()."_".$nombreFoto:"imagen.jpg";
                move_uploaded_file($tmpFoto,"img\profesor/".$nombreArchivo);
                $sql=$conexionBD->prepare("UPDATE usuario_profesor SET contrasenia=?,pregunta=?,respuesta=?,imagen=? WHERE usuario=?");
                $sql->execute(array($contraseña,$pregunta,$respuesta,$nombreArchivo,$usuario));
            }
        }
    }
?>