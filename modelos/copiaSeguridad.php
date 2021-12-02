<?php 
    class CopiaSeguridad{

        public static function BackupBD($Host,$user,$pass,$dbname,$tables){
            $link = mysqli_connect($Host, $user, $pass, $dbname);
            if (mysqli_connect_errno()) {
                echo "Error al conectar con MySQL: " . mysqli_connect_error();
                exit;
            }
            mysqli_query($link, "SET NAMES 'utf8'");
            if ($tables == '*') {
                $tables = array();
                $result = mysqli_query($link, 'SHOW TABLES');
                while ($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', $tables);
            }
            $return = '';
            foreach ($tables as $table) {
                $result = mysqli_query($link, 'SELECT * FROM ' . $table);
                $num_fields = mysqli_num_fields($result);
                $num_rows = mysqli_num_rows($result);
                $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
                $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE ' . $table));
                $return .= "\n\n" . $row2[1] . ";\n\n";
                $counter = 1;
                for ($i = 0; $i < $num_fields; $i++) {
                    while ($row = mysqli_fetch_row($result)) {
                        if ($counter == 1) {
                            $return .= 'INSERT INTO ' . $table . ' VALUES(';
                        } else {
                            $return .= '(';
                        }
                        for ($j = 0; $j < $num_fields; $j++) {
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = str_replace("\n", "\\n", $row[$j]);
                            if (isset($row[$j])) {
                                $return .= '"' . $row[$j] . '"';
                            } else {
                                $return .= '""';
                            }
                            if ($j < ($num_fields - 1)) {
                                $return .= ',';
                            }
                        }
                        if ($num_rows == $counter) {
                            $return .= ");\n";
                        } else {
                            $return .= "),\n";
                        }
                        ++$counter;
                    }
                }
                $return .= "\n\n\n";
            }
            $fileName = 'WooferBackup.sql';
            $handle = fopen($fileName, 'w+');
            fwrite($handle, $return);
            if (file_exists('C:/WooferBackup')) {
                echo "Backup Realizado";
            } else {
                mkdir('C:/WooferBackup');
                echo "Carpeta Creada";
            }
            $fichero = $fileName;
            $nuevo_fichero = 'C:/WooferBackup/WooferBackup' . "_" . date("Y-m-d") . "_" . time() . '.sql';
            if (!copy($fichero, $nuevo_fichero)) {
                echo "Error al copiar $fichero...\n";
            }
            unlink($fichero);
            if (fclose($handle)) {
                header("Location:?controlador=principal&accion=iniciarSesionProfesor");
            }
        }
    }
?>