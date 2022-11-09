<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reiniciar base de datos</title>
</head>
<body>
<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once('./config.inc.php');
    $retval=array();
    $errorExec=array();

    @ $conexion= new mysqli('localhost', 'root', '');
    
    $error=$conexion->connect_errno;

    if($error !=0){

        echo '<span style="color:red">Error en la conexión el la base de datos</span>';
        echo $conexion->connect_error;

    }
    else{

    if(isset($_GET['reiniciar'])){
        
       
  /**
   * exec es una función que realiza una sentencia en la terminal.Incluye dos variables para el control
   * de errores,$retval retorna la última linea de la sentencia,$errorExec retorna true si ocurre un error
   */       
      exec('cd '.$configuracion['ruta archivo'].' && '.$configuracion['ruta destino']. ' -u root < '.$configuracion['nombre archivo'],$retval,$errorExec);
    }
    //
    /**
     * Si es 0 indica que ha se ha realizado correcta,si es distinta a 0 indica que hay algun problema.
     * Inserto !empty en !=0 por que si no siempre me entra en la condición por que se encuentra vacía,
     * en ===0 no le puedo poner !empty ya que si no no me muestra nada(no lo entiendo el porque)
     */
    if($errorExec===0){
        echo '<span style="color:green">La base de datos se ha insertado correctamente</span>';
    }if($errorExec!==0 && !empty($errorExec)){
        echo '<span style="color:red">Ha dado un error al insertar la base de datos</span>';
        print_r($errorExec); 
    }
    
?>
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="submit" value="Reiniciar base de datos" name="reiniciar">
    </form>
    <?php 
    $conexion->close();
    }
    ?>
</body>
</html>