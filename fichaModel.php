<?php

require_once 'ConexaoMysql.php';
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}
if (@$_POST['enviarFormulario']) {
    $nomeCompleto = $_POST['nomeCompleto'];
    $cpf1 = $_POST['cpf'];
    $cpf = limpar_texto($cpf1);
    $dataNascimento = $_POST['dataNascimento'];
    $nacionalidade = $_POST['nacionalidade'];
    $endereco = $_POST['endereco'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $respostaWPP = $_POST['respostaWPP'];
    $telefone = $_POST['telefone'];
    $sexo = "tESTE";
    $dataAtual = "2020-04-04";
    $dataPrimeiroS =  $_POST['dataPrimeiroS'];
    if (@$_POST['febre'] == 'SIM') {
        $febre = 'SIM';
    } else {
        $febre = 'NÃO';
    }
    if (@$_POST['tosse'] == 'SIM') {
        $tosse = 'SIM';
    } else {
        $tosse = 'NÃO';
    }
    if (@$_POST['dorGarganta'] == 'SIM') {
        $dorGarganta = 'SIM';
    } else {
        $dorGarganta = 'NÃO';
    }
    if (@$_POST['difRespirar'] == 'SIM') {
        $difRespirar = 'SIM';
    } else {
        $difRespirar = 'NÃO';
    }
    if (@$_POST['diarreia'] == 'SIM') {
        $diarreia = 'SIM';
    } else {
        $diarreia = 'NÃO';
    }
    if (@$_POST['vomito'] == 'SIM') {
        $vomito = 'SIM';
    } else {
        $vomito = 'NÃO';
    }
    if (@$_POST['dorCabeca'] == 'SIM') {
        $dorCabeca = 'SIM';
    } else {
        $dorCabeca = 'NÃO';
    }
    if (@$_POST['coriza'] == 'SIM') {
        $coriza = 'SIM';
    } else {
        $coriza = 'NÃO';
    }
    if (@$_POST['confusao'] == 'SIM') {
        $confusao = 'SIM';
    } else {
        $confusao = 'NÃO';
    }
    if (@$_POST['fraqueza'] == 'SIM') {
        $fraqueza = 'SIM';
    } else {
        $fraqueza = 'NÃO';
    }
    if (@$_POST['Calafrios'] == 'SIM') {
        $Calafrios = 'SIM';
    } else {
        $Calafrios = 'NÃO';
    }
    if (@$_POST['congestaoNasal'] == 'SIM') {
        $congestaoNasal = 'SIM';
    } else {
        $congestaoNasal = 'NÃO';
    }

    if (@$_POST['difDegludir'] == 'SIM') {
        $difDegludir = 'SIM';
    } else {
        $difDegludir = 'NÃO';
    }

    if (@$_POST['dispneia'] == 'SIM') {
        $dispneia = 'SIM';
    } else {
        $dispneia = 'NÃO';
    }
    $outrosSintomas = $_POST['outrosSintomas'];
    $temperaturaAferidaPaciente = $_POST['temperaturaAferidaPaciente'];
    $viajouPaciente = $_POST['viajouPaciente'];
    $paisViajado = $_POST['paisViajado'];
    $contatosuspeitoPaciente = $_POST['contatosuspeitoPaciente'];
    $contatoconfirmadoPaciente = $_POST['contatoconfirmadoPaciente'];
    $visitaUbsPaciente = $_POST['visitaUbsPaciente'];
    echo $ubsVistada = $_POST['ubsVistada'];

    $conexao = new ConexaoMysql();
    $conexao->Conecta();

    echo $sql = "INSERT INTO `formulariopacientes`(
        `cpfPaciente`,
        `nomePaciente`,
        `sexoPaciente`,
        `dataNascPaciente`,
        `nacionalidadePaciente`,
        `municipioPaciente`,
        `estadoPaciente`,
        `paisPaciente`,
        `respostaWhatsApp`,
        `telefonePaciente`,
        `enderecoPaciente`,
        `dataCadastroPaciente`,
        `dataPrimSintomasPaciente`,
        `febrePaciente`,
        `tossePaciente`,
        `dorGargantaPaciente`,
        `dificuldadeRespirarPaciente`,
        `diarreiaPaciente`,
        `nauseaVomitosPaciente`,
        `dorCabecaPaciente`,
        `corizaPaciente`,
        `confusaoPaciente`,
        `fraquesaPaciente`,
        `calafriosPaciente`,
        `congestaonasalPaciente`,
        `deglutirPaciente`,
        `dispneiaPaciente`,
        `sintomasExtraPaciente`,
        `temperaturaAferidaPaciente`,
        `viajouPaciente`,
        `paisViajado`,
        `contatosuspeitoPaciente`,
        `contatoconfirmadoPaciente`,
        `visitaUbsPaciente`,
        `ondeVisitou`
    )
    VALUES(
        '$cpf',
        '$nomeCompleto ',
        '$sexo',
        '$dataNascimento',
        '$nacionalidade',
        '$municipio',
        '$estado',
        '$pais',
        '$respostaWPP',
        '$telefone',
        '$endereco',
        '$dataAtual',
        '$dataPrimeiroS',
        '$febre',
        '$tosse',
        '$dorGarganta',
        '$difRespirar',
        '$diarreia',
        '$vomito',
        '$dorCabeca',
        '$coriza',
        '$confusao',
        '$fraqueza',
        '$Calafrios',
        '$congestaoNasal',
        '$difDegludir',
        '$dispneia',
        '$outrosSintomas',
        '$temperaturaAferidaPaciente',
        '$viajouPaciente',
        '$paisViajado',
        '$contatosuspeitoPaciente',
        '$contatoconfirmadoPaciente',
        '$visitaUbsPaciente',
        '$ubsVistada')";

    $conexao->Executa($sql);
    $conexao->Desconecta();
    $msg = md5('enviado');
    header('location:ficha.php?msg=' . $msg);
}
