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
error_reporting(E_ALL);
ini_set('display_errors', 1);
//requiere el documento a no ser que el archivo haya sido ya incluido
require_once './DefinicionSudokus.inc.php';
require_once './FuncionesSudokus.inc.php';
//cambiar varible por dificultad
if(isset($_POST['sudoku'])&& !empty($_POST['sudoku'])){
switch($_POST['sudoku'])
{
    case 1:
        echo mostrarSudoku($sudokuFacil);
    break; 
    case 2:
        echo mostrarSudoku($sudokuMedio);
    break;
    case 3:
        echo mostrarSudoku($sudokuDificil);
    break;




}

}

elseif(isset($_POST['insertar'])){



}

elseif(isset($_POST['eliminar'])){


    
}
elseif(isset($_POST['candidatos'])){



}
?>  
<!--Mostramos titulo y el sudoku seleccinado, con la duncion mostar sudoku
donde le pasamos por parametro la función sudoku seleccionado que da como return un sudoku-->
    <div class="tb">
        <!--El titulo lo tengo que modificar-->
    <p><?php global $tituloSudoku;echo $tituloSudoku;?></p>
    <table> 
    <?php $sudokuSeleccionado=desSerializar();
    mostrarSudoku($sudokuSeleccionado)?>
    </table>
    </div>

    <div class=form>
    <form action="./index2.php" method="post">
<label for="numero">Número
    <input type="text" name="numero" id="numero">                                                             
</label>
<br>
<label for="fila">Fila
    <input type="text" name="fila" id="fila"> </label>    
<br>
<label for="columna">Columna
    <input type="text" name="columna" id="columna"></label>
    <br>
    <input type="submit" value="Insertar" name="insertar"><br>
    <input type="submit" value="Eliminar" name="Eliminar"><br>
    <input type="submit" value="Candidatos" name="candidatos"><br>
    <input id="sudokuElegido" name="sudokuElegido" type="hidden" value="">
    <br>
    
</label>

    </form>

    </div>
    
</body>
</html>
