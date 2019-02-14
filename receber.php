<?php
$Separalinha  	= getFile('slinha');
$texto		    = getFile('texto');
$SeparaColuna   = getFile('SColuna');
$colunas 	    = getFile('colunas');

$linhas = explode($Separalinha, $texto);
foreach ($linhas as $linha){
    $colunas = explode($SeparaColuna, $linha);
    vardump($colunas);
}
?>