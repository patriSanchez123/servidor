<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sudoku seleccionado</title>
</head>
<body>
<?php

//requiere el documento a no ser que el archivo haya sido ya incluido
require_once './DefinicionSudokus.inc.php';
require_once './FuncionesSudokus.inc.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>  
<!--Mostramos titulo y el sudoku seleccinado, con la duncion mostar sudoku
donde le pasamos por parametro la función sudoku seleccionado que da como return un sudoku-->
    <div class="tb">
    <p><?php echo $titulosSudokus[$_POST['sudoku']-1];?></p>
    <table> 
    <?php mostrarSudoku(sudokuSeleccionado())?>
    </table>
    </div>
</body>
</html>


