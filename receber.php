<?php
$Separalinha  	= getOpcao(getPost('sLinha'));
$texto		    = getPost('texto');
$SeparaColuna   = getOpcao(getPost('sColuna'));
$colunas 	    = getPost('colunas');

$linhas = explode($Separalinha, $texto);
foreach ($linhas as $linha){
    $colunas = explode($SeparaColuna, $linha);
    vardump($colunas);
}

function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function getOpcao($numero){
    switch(){
        case: 0
        return ',';
        case: 1
        return '-';
        case: 2
        return '/';
        case: 3
        return chr(32);
        case: 4
        return '    ';
        case: 5
        return '.';
        case: 6
        return ';';
    }

}
?>