<?php
$Separalinha  	= getPost('slinha');
$texto		    = getPost('texto');
$SeparaColuna   = getPost('SColuna');
$colunas 	    = getPost('colunas');

$linhas = explode($Separalinha, $texto);
foreach ($linhas as $linha){
    $colunas = explode($SeparaColuna, $linha);
    vardump($colunas);
}

function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}
?>