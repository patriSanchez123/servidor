<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("./APP/models/modelo_pokemon.php");

$modeloPokemon= new ModeloPokemon();
$modeloPokemon->GetPOkemon();

?>