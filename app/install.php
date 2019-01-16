<?php


    // Añadir aqui para que traiga los datos del otro instalador

    $bdNombre = $_POST['NombreBD'];// "alimentos";
    $bdUsuario = $_POST['UsuarioBD'];//"root";
    $bdPass = $_POST['PassBD'];//"mysql";


    $config = 
            "<?php"                                                             . "\n" .
            "   class Config"                                                   . "\n" .
            "       {"                                                          . "\n" .
                 '      static public $mvc_bd_hostname = "localhost";'          . "\n" .
                 '      static public $mvc_bd_nombre   = "' . $bdNombre . '";'  . "\n" .
                 '      static public $mvc_bd_usuario  = "' . $bdUsuario . '";' . "\n" .
                 '      static public $mvc_bd_clave    = "' . $bdPass . '";'    . "\n" .
                 '      static public $mvc_vis_css     = "estilo.css";'         . "\n" .
            "       }"                                                          . "\n" .
            "?>";

    // Fichero
     $f1=fopen("Config.php","w");

     fwrite($f1,"\n".$config);

     fclose($f1);



     // Base de datos
    $con = new mysqli("localhost",$bdUsuario,$bdPass);

    if ( $con->connect_error ) {
        die('Error de Conexión (' . $con->connect_errno . ') '. $con->connect_error);
    }
    else{

        if ( $con->query("CREATE DATABASE " . $bdNombre ) === TRUE ) {
            echo "Se ha creado la base de datos " . $bdNombre . " correctamente.<br>";
        }
        if ( $con->query("USE ". $bdNombre) === TRUE ) {
            
            echo "Usando la base de datos " . $bdNombre . ".<br>";
        }

        // Crea la estructua de la tabla (Solo debe usarse la primera vez)
        include("sentencias.sql.php");
        if ( $con->multi_query($sentenciasql) === TRUE ) {
            echo "Se crean las tablas en " . $bdNombre . "<br>";
        }
    }

    $con->close();

?>
