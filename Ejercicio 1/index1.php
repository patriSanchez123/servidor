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
//requiere el documento a no ser que el archivo haya sido ya incluido
require_once './DefinicionSudokus.inc.php';
require_once './FuncionesSudokus.inc.php';
if(!isset($_POST['elegir'])&& empty($_POST['sudoku'])){
    
    
?>    
    <div id="tablas">
        <div class="tbl">
            <p><?php echo $titulosSudokus[0];?></p>
        <table>
            <?php mostrarSudoku($sudokuFacil);?>
        </table> 
        <!--añado aqui los formularios para cuando se amplie o disminuya la
        pagina siempre esten en el mismo sitio-->
        <div class="formularios">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="facil">
            <input type="radio" id="facil" value="1" name="sudoku" checked/>  Fácil  </label>
            <label for="Medio">
            <input type="radio" id="facil" value="2" name="sudoku" />  Medio  </label>
            <label for="dificil">
            <input type="radio" id="dificil" value="3" name="sudoku"/>  Difícil  </label>
            <input type="submit" value="Elegir" name="elegir"/>
            </form>
    </div>
        </div>
        <div class="tbl">
        <p><?php echo $titulosSudokus[1];?></p>
        <table>
                <?php mostrarSudoku($sudokuFacil);?>
        </table> 
        </div>
        <div class="tbl">
        <p><?php echo $titulosSudokus[2];?></p>
        <table> 
            <?php mostrarSudoku($sudokuFacil);?>
        </table>
    </div>

        </div>
    
    <?php }else{?>
        <div class="tb">
    <p><?php echo $titulosSudokus[$_POST['sudoku']-1];?></p>
    <table> 
    <?php mostrarSudoku(sudokuSeleccionado())?>
    </table>
    </div>

   <?php }?>

</body>
</html>