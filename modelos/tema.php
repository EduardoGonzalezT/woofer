<?php
    class Tema{
        public $idTema;
        public $nombre;
        public $descripcion;
        public $idUnidad;

        public function __construct($idTema,$nombre,$descripcion,$idUnidad){
            $this->idTema=$idTema;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->idUnidad=$idUnidad;
        }

        public static function consultarTemas($idUnidad){
            $temas=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM temas");
            foreach($sql->fetchAll() as $iterador){
                if($idUnidad==$iterador['id_Unidad']){
                    $temas[]=new Tema($iterador['id_Tema'],$iterador['nombre_Tema'],$iterador['descripcion_Tema'],$iterador['id_Unidad']);
                }
            }
            return $temas;
        }

        public static function agregarTema($idUnidad,$nombre,$descripcion){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO temas(nombre_Tema,descripcion_Tema,id_Unidad) VALUES (?,?,?)");
            $sql->execute(array($nombre,$descripcion,$idUnidad));
        }

        public static function borrarTema($idTema){
            $conexionBD=BD::crearInstancia();
            $sqlArchivos=$conexionBD->prepare("SELECT archivo FROM temas INNER JOIN subtemas ON subtemas.id_Tema = temas.id_Tema INNER JOIN archivos ON archivos.id_Subtema = subtemas.id_Subtema WHERE temas.id_Tema =?");
            $sqlArchivos->execute(array($idTema));
            $idArchivos=$sqlArchivos->fetchAll();
            foreach($idArchivos as $iterador){
                if(isset($iterador['archivo']) && ($iterador['archivo']!="imagen.jpg")){
                    if(file_exists("material/".$iterador['archivo'])){
                        unlink("material/".$iterador['archivo']);
                    }
                }
            }
            $sql=$conexionBD->prepare("DELETE FROM temas WHERE id_Tema=?");
            $sql->execute(array($idTema));
        }

        public static function buscarTemaEspecifico($idTema){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM temas WHERE id_Tema=?");
            $sql->execute(array($idTema));
            $tema=$sql->fetch();
            return new Tema($tema['id_Tema'],$tema['nombre_Tema'],$tema['descripcion_Tema'],$tema['id_Unidad']);
        }

        public static function modificarTema($idTema,$nombre,$descripcion){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE temas SET nombre_Tema=?,descripcion_Tema=? WHERE id_Tema=?");
            $sql->execute(array($nombre,$descripcion,$idTema));
        }
    }
?>