<?php
//incluimos un fichero requerido
require_once './DefinicionSudokus.inc.php';
//Constante que uso en diferentes archivos
$titulosSudokus=array("Fácil","Medio","Difícil");

/**
 * Función donde muestra los array, 
 * y comprueba que las variables existas y no sean nulas
 * para poder enviar los datos a otro documento
 */
function mostrarSudoku($sudoku){
    //Comprueba que exista la variable elegir, sudoku y comprueba que no este vacio
   if(isset($_POST['elegir']) && isset($_POST['sudoku']) && !empty($_POST['sudoku'])){
recorrerArrayModificar($sudoku);
   }else{
    
    recorrerArrayModificar($sudoku);
}
}
 
/**
 * Función donde recorre los sudokus
 * Modifica el valor "0" por "."
 * Modifica el color del td
 * Tiene integrado los tr y td
 */
function recorrerArrayModificar($sudoku){
    foreach($sudoku as $clave=>$valorSudoku){
        echo "<tr>";//creamos colunma 
    foreach($valorSudoku as $indice => $valor) {
        //Condición para cambiar valor de "0" a "."
        if($valor==0){
            $valor=($sudoku[$clave][$indice]='.');    
        }
    // Creación de fila donde le ponemos color al valor dependiendo de su valor 
        echo "<td style='color:" . color($valor)."'>".$valor."</td>";
    }
    }
    //cerramos la fila
    echo "</tr>";

}
/**
 * Función donde cambia el color dependiendo
 * del valor(".")
 */
function color($valor){
    if($valor=="."){
        $color='blue';
        return $color;

    }
    else{
        $color='red';
        return $color;
    }
}
/**
 * Funcion que retorna un sudoku cuando es
 * es enviado el formulario
 */
function sudokuSeleccionado(){
    global $sudokuFacil,$sudokuDificil,$sudokuMedio;
    
 switch($_POST["sudoku"]){
    
case 1: 
    $devolverSudoku=$sudokuFacil;
    return $devolverSudoku;
    break;
case 2: 
    $devolverSudoku=$sudokuMedio;
    return $devolverSudoku;
    break;
case 3: 
    $devolverSudoku=$sudokuDificil;
    return $devolverSudoku;
    break;

 }
        
}