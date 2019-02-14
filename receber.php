<?php
$Separalinha  	= getOpcao(getPost('sLinha'));
$texto		    = getPost('texto');
$SeparaColuna   = getOpcao(getPost('sColuna'));
$colunas 	    = getPost('colunas');

$linhas = explode($Separalinha, $texto);
foreach ($linhas as $linha){
    $colunas = explode($SeparaColuna, $linha);
    var_dump($colunas);
}

function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function setHeader($valor){
   for ($i = 1; $i <= $valor; $i++){
       $colunas += '<th>Coluna'.$valor.'</th>';
    }
    return $colunas;
}

function setColumn($valor){
    return <<<EOD
        <td>$valor</td>
EOD;
}

function setRow($valor){
    return <<<EOD
        <tr>$valor</tr>
EOD;
}

function getOpcao($numero){
    switch($numero){
        case '0':
        return ',';
        case '1':
        return '-';
        case '2':
        return '/';
        case '3':
        return chr(32);
        case '4':
        return '    ';
        case '5':
        return '.';
        case '6':
        return ';';
    }
}
?>