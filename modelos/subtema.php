<?php 
    class Subtema{
        public $idSubtema;
        public $nombre;
        public $idTema;

        public function __construct($idSubtema,$nombre,$idTema){
            $this->idSubtema=$idSubtema;
            $this->nombre=$nombre;
            $this->idTema=$idTema;
        }

        public static function consultarSubtemas($idTema){
            $subtemas=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM subtemas");
            foreach($sql->fetchAll() as $iterador){
                if($idTema==$iterador['id_Tema']){
                    $subtemas[]=new Subtema($iterador['id_Subtema'],$iterador['nombre_Subtema'],$iterador['id_Tema']);
                }
            }
            return $subtemas;
        }

        public static function agregarSubtema($idTema,$nombre){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO subtemas(nombre_Subtema,id_Tema) VALUES (?,?)");
            $sql->execute(array($nombre,$idTema));
        }

        public static function borrarSubtema($idSubtema){
            $conexionBD=BD::crearInstancia();
            $sqlArchivos=$conexionBD->prepare("SELECT archivo FROM subtemas INNER JOIN archivos ON archivos.id_Subtema = subtemas.id_Subtema WHERE subtemas.id_Subtema=?");
            $sqlArchivos->execute(array($idSubtema));
            $idArchivos=$sqlArchivos->fetchAll();
            foreach($idArchivos as $iterador){
                if(isset($iterador['archivo']) && ($iterador['archivo']!="imagen.jpg")){
                    if(file_exists("material/".$iterador['archivo'])){
                        unlink("material/".$iterador['archivo']);
                    }
                }
            }
            $sql=$conexionBD->prepare("DELETE FROM subtemas WHERE id_Subtema=?");
            $sql->execute(array($idSubtema));
        }

        public static function buscarSubtemaEspecifico($idSubtema){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM subtemas WHERE id_Subtema=?");
            $sql->execute(array($idSubtema));
            $subtema=$sql->fetch();
            return new Subtema($subtema['id_Subtema'],$subtema['nombre_Subtema'],$subtema['id_Tema']);
        }

        public static function modificarSubtema($idSubtema,$nombre){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("UPDATE subtemas SET nombre_Subtema=? WHERE id_Subtema=?");
            $sql->execute(array($nombre,$idSubtema));
        }
    }
?>