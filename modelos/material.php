<?php 
    class Material{
        public $idMaterial;
        public $nombre;
        public $descripcion;
        public $archivo;
        public $extension;
        public $idSubtema;

        public function __construct($idMaterial,$nombre,$descripcion,$archivo,$extension,$idSubtema){
            $this->idMaterial=$idMaterial;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->archivo=$archivo;
            $this->extension=$extension;
            $this->idSubtema=$idSubtema;
        }

        public static function consultarMaterial($idSubtema){
            $materiales=[];
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->query("SELECT * FROM archivos");
            foreach($sql->fetchAll() as $iterador){
                if($idSubtema==$iterador['id_Subtema']){
                    $materiales[]=new Material($iterador['id_Archivo'],$iterador['nombre_Archivo'],$iterador['descripcion_Archivo'],$iterador['archivo'],$iterador['extension'],$iterador['id_Subtema']);
                }
            }
            return $materiales;
        }

        public static function agregarMaterial($idSubtema,$nombre,$descripcion,$tipo,$nombreMaterial,$tmpMaterial){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("INSERT INTO archivos(nombre_Archivo,descripcion_Archivo,Archivo,extension,id_Subtema) VALUES (?,?,?,?,?)");
            $fecha=new DateTime();
            $nombreArchivo=($nombreMaterial!="")?$fecha->getTimestamp()."_".$nombreMaterial:"imagen.jpg";
            move_uploaded_file($tmpMaterial,"material/".$nombreArchivo);
            $sql->execute(array($nombre,$descripcion,$nombreArchivo,$tipo,$idSubtema));
        }

        public static function borrarMaterial($idMaterial){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT archivo FROM archivos WHERE id_Archivo=?");
            $sql2->execute(array($idMaterial));
            $material=$sql2->fetch(PDO::FETCH_LAZY);
            if(isset($material['archivo']) && ($material['archivo']!="imagen.jpg")){
                if(file_exists("material/".$material['archivo'])){
                    unlink("material/".$material['archivo']);
                }
            }
            $sql=$conexionBD->prepare("DELETE FROM archivos WHERE id_Archivo=?");
            $sql->execute(array($idMaterial));
        }

        public static function consultarMaterialEspecifico($idMaterial){
            $conexionBD=BD::crearInstancia();
            $sql=$conexionBD->prepare("SELECT * FROM archivos WHERE id_Archivo=?");
            $sql->execute(array($idMaterial));
            $material=$sql->fetch();
            return new Material($material['id_Archivo'],$material['nombre_Archivo'],$material['descripcion_Archivo'],$material['archivo'],$material['extension'],$material['id_Subtema']);
        }

        public static function editarMaterial($idMaterial,$idSubtema,$nombre,$descripcion,$tipo,$nombreMaterial,$tmpMaterial){
            $conexionBD=BD::crearInstancia();
            $sql2=$conexionBD->prepare("SELECT archivo FROM archivos WHERE id_Archivo=?");
            $sql2->execute(array($idMaterial));
            $material=$sql2->fetch(PDO::FETCH_LAZY);
            if($nombreMaterial==""){
                $sql=$conexionBD->prepare("UPDATE archivos SET nombre_Archivo=?, descripcion_Archivo=?,archivo=?,extension=?,id_Subtema=? WHERE id_Archivo=?");
                $sql->execute(array($nombre,$descripcion,$material['archivo'],$tipo,$idSubtema,$idMaterial));
            }else{
                if(isset($material['archivo']) && ($material['archivo']!="imagen.jpg")){
                    if(file_exists("material/".$material['archivo'])){
                        unlink("material/".$material['archivo']);
                    }
                }
                $fecha=new DateTime();
                $nombreArchivo=($nombreMaterial!="")?$fecha->getTimestamp()."_".$nombreMaterial:"imagen.jpg";
                move_uploaded_file($tmpMaterial,"material/".$nombreArchivo);
                $sql=$conexionBD->prepare("UPDATE archivos SET nombre_Archivo=?, descripcion_Archivo=?,archivo=?,extension=?,id_Subtema=? WHERE id_Archivo=?");
                $sql->execute(array($nombre,$descripcion,$nombreArchivo,$tipo,$idSubtema,$idMaterial));
            }
        }
    }
?>