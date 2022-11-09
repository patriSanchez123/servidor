<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección de sudoku</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Añadimos el archivo donde lo requiere a no ser que el archivo haya sido ya incluido
require_once './DefinicionSudokus.inc.php';
require_once './FuncionesSudokus.inc.php';


    
    ?>
    sdsf
    <div id="tablas">
        <div class="tbl">
            <p><?php  echo $titulosSudokus[0];?></p>
            <?php echo mostrarSudoku($sudokuFacil);?>
        <!--añado aqui los formularios para cuando se amplie o disminuya la
        pagina siempre esten en el mismo sitio-->
        <div class="formularios">
            <form action="./index2.php" method="post">
            <label for="facil">
            <input type="radio" id="facil" value="1" name="sudoku" checked/>  Fácil  </label>
            <label for="Medio">
            <input type="radio" id="facil" value="2" name="sudoku" />  Medio  </label>
            <label for="dificil">
            <input type="radio" id="dificil" value="3" name="sudoku"/>  Difícil  </label>
            <input type="submit" name="elegir">
    
            </form>
    </div>
        </div>
        <div class="tbl">
        <p><?php echo $titulosSudokus[1];?></p>
        
                <?php echo mostrarSudoku($sudokuMedio);?>

        </div>
        <div class="tbl">
        <p><?php echo $titulosSudokus[2];?></p>
            <?php echo mostrarSudoku($sudokuDificil);?>
        
    </div>

        </div>

</body>
</html>