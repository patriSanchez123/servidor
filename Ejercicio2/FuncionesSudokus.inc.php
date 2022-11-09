<?php
//incluimos un fichero requerido
require_once './DefinicionSudokus.inc.php';
//Constante que uso en diferentes archivos
$titulosSudokus=array("Fácil","Medio","Difícil");
$juegoActual=array();
const INDICE_MAXIMO=8;
$devolverSudoku=array();
$tituloSudoku;
$sudoku_;


function mostrarSudoku($el_sudoku){
    $html_output = '<table>';
    foreach($el_sudoku as $clave => $valorSudoku){
        $html_output.= '<tr>';
        foreach($valorSudoku as $indice => $valor){
            $html_output.= '<td>'.$valor.'</td>';
        }
    }
    $html_output .= '</tr>';
    $html_output .='</table>';
    
    return $html_output;
    
    }

/**
 * Función donde muestra los array, 
 * y comprueba que las variables existas y no sean nulas
 * para poder enviar los datos a otro documento
 */
function mostrarSudokuDeprecated($sudoku){
    global $sudoku_;

    //Comprueba que exista la variable elegir, sudoku y comprueba que no este vacio
   if(isset($_POST['elegir']) && !empty($_POST['elegir']) && isset($_POST['sudoku']) && !empty($_POST['sudoku'])){
    $tituloSudoku="hola";
    recorrerArrayModificar($sudoku);

   }elseif(isset($_POST['insertar'])&& isset($POST['fila']) && !empty($POST['fila'])
   && isset($POST['columna']) && !empty($POST['columna']) && 
   isset($POST['numero']) && !empty($POST['numero'])&& 
   isset($_POST['sudoku']) && !empty($_POST['sudoku'])){
    recorrerArrayModificar($sudoku);
    

   }
   
   
   else{ 
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
    global $sudokuFacil,$sudokuDificil,$sudokuMedio,$titulosSudokus,$tituloSudoku,$devolverSudoku,$sudoku_;
 if( isset($_POST['sudoku']) && !empty($_POST['sudoku']))  {
 switch($_POST['sudoku']){
    
case 1:
    $sudoku_=0; 
    $devolverSudoku=$sudokuFacil;


    return $devolverSudoku;
    break;
case 2: 
    $sudoku_=1;
    $devolverSudoku=$sudokuMedio;
    return $devolverSudoku;
    break;
case 3: 
    $sudoku_=3;
    $titulosSudoku=$titulosSudokus[2];
    $devolverSudoku=$sudokuDificil;
    return $devolverSudoku;
    break;
 }

}elseif((isset($_POST['insertar']))){
switch($sudoku_){       
case 1: 
    $devolverSudoku=$sudokuFacil;
    return $devolverSudoku;
    break;
case 2: 
    $sudoku_=1;
    $devolverSudoku=$sudokuMedio;
    return $devolverSudoku;
    break;
case 3: 

    $devolverSudoku=$sudokuDificil;
    return $devolverSudoku;
    break;
 }
}


 }
      

/**
 * Función que serializa el array para enviarlo por
 * método post dentro del value de elegir. 
 */
function serializarSudoku(){
        
        $serializarSudoku = base64_encode(serialize(sudokuSeleccionado()));

        return $serializarSudoku;
    }

    /**
     * Función que deserializa una cadena para crear un nuevo array
     * donde tenemos ek nuevo tablero actual
     */
function desSerializar(){
    global $juegoActual;
    $juegoActual=unserialize(base64_decode(serializarSudoku()));

    return $juegoActual;

}function insertarNumero(){
    global $juegoActual;
if(comprobarPosiscionesOriginales()==true){
    $juegoActual[$_POST['columna']-1][$_POST['fila']-1]=$_POST['numero'];

}else{
    return "Esa posición no se puede modificar";
}

    

} 

function comprobarPosiscionesOriginales(){
$comprobarSudokuOriginal=true;    
$sudokuOriginal=sudokuSeleccionado();
if($sudokuOriginal[$_POST['columna']-1][$_POST['fila']-1]=='.'){

return $comprobarSudokuOriginal;
}
else{
    $comprobarSudokuOriginal=false;
    return $comprobarSudokuOriginal;
}
    
}


function comprobarFila(){
    global $juegoActual;
    $comprobarFila=true;
    for ($i=0; $i <=INDICE_MAXIMO ; $i++) { 
        if($juegoActual[$_POST['columna']][$i]==$_POST['numero']){
            $comprobarFila=false;

        }
    }
    return $comprobarFila;

}

function comprobarColumna(){
    global $juegoActual;
    $comprobarColumna=true;
    for ($i=0; $i <=INDICE_MAXIMO ; $i++) { 
        if($juegoActual[$i][$_POST['fila']]==$_POST['numero']){
            $comprobarFila=false;

        }
    }
    return $comprobarColumna;

}







