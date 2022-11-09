<?php
require './FuncionesSudokus.php';
$sudokuFacil = array(
    array(0,0,1,9,4,8,5,0,0),
    array(0,0,3,7,0,6,1,0,0),
    array(0,5,0,0,0,0,0,7,0),
    array(1,0,6,0,3,0,8,0,5),
    array(0,0,0,0,0,0,0,0,0),
    array(3,0,2,0,9,0,6,0,7),
    array(0,6,0,0,0,0,0,1,0),
    array(0,0,7,1,0,9,4,0,0),
    array(0,0,5,8,6,3,7,0,0)
);

$serializarSudoku = base64_encode(serialize($sudokuFacil));
$desSerializar = unserialize(base64_decode($serializarSudoku));
    
?>
<?php
    global $desSerializar;
    mostrarSudoku($desSerializar)
?>
