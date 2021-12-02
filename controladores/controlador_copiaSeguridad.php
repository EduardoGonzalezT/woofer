<?php 
    include_once("modelos/copiaSeguridad.php");
    include_once("conexion.php");
    BD::crearInstancia();
    class ControladorcopiaSeguridad{
        public function hacerCopiaSeguridad(){
            $Host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'woofer';
            $tables = '*';
            CopiaSeguridad::BackupBD($Host,$user,$pass,$dbname,$tables);
        }
    }
?>