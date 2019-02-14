<?php

$linhas = explode($Separalinha, $texto);

foreach ($linhas as $linha){

    $colunas = explode($SeparaColuna, $linha);
    vardump($colunas);
}
?>