<?php
/* Carrega a classe DOMPdf */
require_once("pdf/dompdf_config.inc.php");

/* Cria a instância */
$dompdf = new DOMPDF();

/* Carrega seu HTML */
$dompdf->load_html('<!doctype html>
<html>

<head>
<meta charset="UTF-8">
<title>Atenção, apenas um teste</title>
<style>
* { font-family: sans-serif; }
</style>
</head>

<body>

<header>
    <h1>Atenção, isso é apenas um teste</h1>
    <p>Estou dando um exemplo sobre como utilizar a dompdf. 
    Meu nome é <b>Luiz Otávio</b> E trabalho no blog 
    <a href="http://www.todoespacoonline.com/w/">todoespacoonline.com/w</a>. Minha foto segue abaixo:
    </p>
    
    <p style="text-align:center">
        <img src="foto.jpg">
    </p>
</header>

</body>

</html>');

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream(
    "saida.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
?>