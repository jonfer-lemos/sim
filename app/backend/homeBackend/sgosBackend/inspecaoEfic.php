<?php
include '../app/backend/homeBackend/homePainel.php';

//echo $x;



$manutencaoNome = 'Inspeções';
$eficienciaManutencao = $inspecao;


//Inspecao
    $inspecaoMecanicaTotal = "SELECT COUNT(nome_servico) AS inspecao_mec FROM stj 
                            WHERE nome_servico LIKE'%INSPECAO%'
                            AND nome_servico LIKE'%MECANICA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaLubMecanica = mysqli_query($conexao, $inspecaoMecanicaTotal);
    $totalOsLubMecGeradas = mysqli_fetch_array($consultaLubMecanica);
    $inspecaoMecanicaGeradas = number_format($totalOsLubMecGeradas['inspecao_mec']);



    $inspecaoMecanicaTotalFinalizadas = "SELECT COUNT(nome_servico) AS inspecao_mec_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%INSPECAO%'
                            AND nome_servico LIKE'%MECANICA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaLubMecanicaFinalizadas = mysqli_query($conexao, $inspecaoMecanicaTotalFinalizadas);
    $totalOsLubMecGeradasFinalizadas = mysqli_fetch_array($consultaLubMecanicaFinalizadas);
    $inspecaoMecanicaGeradasFinalizadas = number_format($totalOsLubMecGeradasFinalizadas['inspecao_mec_Finalizadas']);

    $inspecaoEletricaTotal = "SELECT COUNT(nome_servico) AS inspecao_ele FROM stj 
                            WHERE nome_servico LIKE'%INSPECAO%'
                            AND nome_servico LIKE'%ELETRICA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaLubEletrica = mysqli_query($conexao, $inspecaoEletricaTotal);
    $totalOsLubMecGeradas = mysqli_fetch_array($consultaLubEletrica);
    $inspecaoEletricaGeradas = number_format($totalOsLubMecGeradas['inspecao_ele']);


    $inspecaoEletricaTotalFinalizadas = "SELECT COUNT(nome_servico) AS inspecao_ele_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%INSPECAO%'
                            AND nome_servico LIKE'%ELETRICA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaLubEletricaFinalizadas = mysqli_query($conexao, $inspecaoEletricaTotalFinalizadas);
    $totalOsLubMecGeradasFinalizadas = mysqli_fetch_array($consultaLubEletricaFinalizadas);
    $inspecaoEletricaGeradasFinalizadas = number_format($totalOsLubMecGeradasFinalizadas['inspecao_ele_Finalizadas']);

    



   
   
