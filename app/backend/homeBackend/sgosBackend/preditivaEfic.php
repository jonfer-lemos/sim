<?php
include '../app/backend/homeBackend/homePainel.php';

//echo $x;



$manutencaoNome = 'Preditivas';
$eficienciaManutencao = $preditiva;


//Inspecao
    $preditivaMecanicaTotal = "SELECT COUNT(situacao) AS preditiva_mec FROM stj 
                            WHERE nome_servico LIKE'%PREDITIVA%'
                            AND nome_servico LIKE'%MECANICA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaPreditivabMecanica = mysqli_query($conexao, $preditivaMecanicaTotal);
    $totalOsPreditivaMecGeradas = mysqli_fetch_array($consultaPreditivabMecanica);
    $preditivaMecanicaGeradas = number_format($totalOsPreditivaMecGeradas['preditiva_mec']);



    $preditivaMecanicaTotalFinalizadas = "SELECT COUNT(situacao) AS preditiva_mec_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%PREDITIVA%'
                            AND nome_servico LIKE'%MECANICA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaPreditivaMecanicaFinalizadas = mysqli_query($conexao, $preditivaMecanicaTotalFinalizadas);
    $totalOsPreditivaEleGeradasFinalizadas = mysqli_fetch_array($consultaPreditivaMecanicaFinalizadas);
    $preditivaMecanicaGeradasFinalizadas = number_format($totalOsPreditivaEleGeradasFinalizadas['preditiva_mec_Finalizadas']);

    $preditivaEletricaTotal = "SELECT COUNT(nome_servico) AS preditiva_ele FROM stj 
                            WHERE nome_servico LIKE'%PREDITIVA%'
                            AND nome_servico LIKE'%ELETRICA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaPreditivaEletrica = mysqli_query($conexao, $preditivaEletricaTotal);
    $totalOsPreditivaMecGeradas = mysqli_fetch_array($consultaPreditivaEletrica);
    $preditivaEletricaGeradas = number_format($totalOsPreditivaMecGeradas['preditiva_ele']);


    $preditivaEletricaTotalFinalizadas = "SELECT COUNT(nome_servico) AS preditiva_ele_Finalizadas FROM stj 
                             WHERE nome_servico LIKE'%PREDITIVA%'
                            AND nome_servico LIKE'%ELETRICA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaPreditivaEletricaFinalizadas = mysqli_query($conexao, $preditivaEletricaTotalFinalizadas);
    $totalOsPreditivaEleGeradasFinalizadas = mysqli_fetch_array($consultaPreditivaEletricaFinalizadas);
    $preditivaEletricaGeradasFinalizadas = number_format($totalOsPreditivaEleGeradasFinalizadas['preditiva_ele_Finalizadas']);

    



   
   
    