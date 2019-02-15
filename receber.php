<?php

session_start();

$eparaLinha  	= getOpcao(getPost('sLinha'));
$texto		    = getPost('texto');
$eparaColuna    = getOpcao(getPost('sColuna'));
$colunas 	    = getPost('colunas');

$a = '';
$b = '';
$c = '';
for ($i = 1; $i <= intval($colunas); $i++){
    $a .= setTh('Coluna_'.$i);
}

foreach (explode($eparaLinha, $texto) as $linha) {
    foreach (explode($eparaColuna, $linha) as $coluna) {
        $b .= setTd($coluna);
    }
    $c .= setTr($b);
    $b = '';
}

$_SESSION['tabela'] = setTable(setHead(setTr($a)), setBody($c));
header("Location:index.php");

function setTable($header, $body){
    return '<table class="tablesorter">'.$header.$body.'</table>';
}

function setHead($valor){
    return '<thead>'.$valor.'</thead>';
}
function setBody($valor){
    return '<tbody>'.$valor.'</tbody>';
}

function setTh($valor){
    return '<th>'.$valor.'</th>';
}

function setTd($valor){
    return <<<EOD
        <td> $valor </td>
EOD;
}

function setTr($valor){
    return <<<TOD
        <tr> $valor </tr>
TOD;
}

function getOpcao($numero){
    switch($numero){
        case '0': return ',';
        case '1': return '-';
        case '2': return '/';
        case '3': return chr(32);
        case '4': return '    ';
        case '5': return '.';
        case '6': return ';';
    }
}


function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

/*
$linhas = explode($Separalinha, $texto);
foreach ($linhas as $linha){
    $colunas = explode($SeparaColuna, $linha);
    var_dump($colunas);
}

echo setTable(
    setHead(
        setTr(
            setTd('Coluna1').
            setTd('Coluna2')
        )
    ),
    setBody(
        setTr(
            setTd('Valores').
            setTd('Valores')
        ).
        setTr(
            setTd('Valores').
            setTd('Valores')
        )
    )
);

*/
?>
