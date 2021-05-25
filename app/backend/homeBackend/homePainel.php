<?php
//error_reporting(0);

// recebe o mes pelo metodo post no input mês/ano
$datasSelect = "SELECT DATE_FORMAT(dt_original, '%Y-%m') AS data_formatada FROM stj ORDER BY dt_original DESC LIMIT 1";
$pesq = mysqli_query($conexao, $datasSelect);
    while ($linha = mysqli_fetch_array($pesq)) {
        $varDatas = $linha['data_formatada'];
}

$x = $_POST['datasFiltro'];
//echo $x;

if ($x >= $varDatas) {
    $x = $varDatas;    
} elseif ($x == '') {
    $x = $varDatas;
}

// variveis para meses ateriores ao atual 
 //echo '<br>';
$antepenultimo = date('Y-m', strtotime('-2 month', strtotime($x)));
 //echo '<br>';
$penultimo = date('Y-m', strtotime('-1 month', strtotime($x)));
//SQL dados eficiencia por manutenção 
    //Mec
        $mecTotal = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'MEC' 
                                AND dt_original LIKE '%$x%'");
        $consultaMec = mysqli_query($conexao, $mecTotal);
        $totalOsMec = mysqli_fetch_array($consultaMec);
      
        $mecFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'MEC'
                                AND termino ='Sim' 
                                AND dt_original LIKE '%$x%'");
        $consultaMecFinalizado = mysqli_query($conexao, $mecFinalizado);
        $totalOsMecFinalizado = mysqli_fetch_array($consultaMecFinalizado);
        $mecanica = ($totalOsMecFinalizado['total'] * 100) / $totalOsMec['total'];
        $mecanica = number_format($mecanica);
       

    //Mec fim

    //Ele
        $eleTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'ELE' 
                                AND dt_original LIKE '%$x%'");
        $consultaEle = mysqli_query($conexao, $eleTotalOs);
        $totalOsEle = mysqli_fetch_array($consultaEle);

        $eleFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'ELE'
                                AND termino ='Sim' 
                                AND dt_original LIKE '%$x%'");
        $consultaEleFinalizado = mysqli_query($conexao, $eleFinalizado);
        $totalOsEleFinalizado = mysqli_fetch_array($consultaEleFinalizado);
        $eletrica = ($totalOsEleFinalizado['total'] * 100) / $totalOsEle['total'];
        $eletrica = number_format($eletrica);
    //Ele fim

    //Instrumentacao
        $insTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'INS' 
                                AND dt_original LIKE '%$x%'");
        $consultaIns = mysqli_query($conexao, $insTotalOs);
        $totalOsIns = mysqli_fetch_array($consultaIns);

        $insFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'INS'
                                AND termino ='Sim' 
                                AND dt_original LIKE '%$x%'");
        $consultaInsFinalizado = mysqli_query($conexao, $insFinalizado);
        $totalOsInsFinalizado = mysqli_fetch_array($consultaInsFinalizado);
        $instrumentacao = ($totalOsInsFinalizado['total'] * 100) / $totalOsIns['total'];
        $instrumentacao = number_format($instrumentacao);

    //Instr fim

    //Lub 
        $lubTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND nome_servico LIKE '%LUBRIFICACAO%' 
                                AND dt_original LIKE '%$x%'");
        $consultaLub = mysqli_query($conexao, $lubTotalOs);
        $totalOsLub = mysqli_fetch_array($consultaLub);

        $lubFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND nome_servico LIKE '%LUBRIFICACAO%' 
                                AND termino ='Sim' 
                                AND dt_original LIKE '%$x%'");
        $consultaLubFinalizado = mysqli_query($conexao, $lubFinalizado);
        $totalOsLubFinalizado = mysqli_fetch_array($consultaLubFinalizado);
        $lubrificacao = ($totalOsLubFinalizado['total'] * 100) / $totalOsLub['total'];
        $lubrificacao = number_format($lubrificacao);
    //Lub Fim



    //inspecao
        $inspecaoTotalOs = ("SELECT COUNT(situacao) AS total FROM stj 
                                WHERE situacao = 'Liberado' 
                                AND nome_servico LIKE'%INSPECAO%'
                                AND dt_original LIKE'%$x%'");
        $consultaInspecao = mysqli_query($conexao, $inspecaoTotalOs);
        $totalOsInspecao = mysqli_fetch_array($consultaInspecao);

        $inspecaoFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado'
                                AND nome_servico LIKE'%INSPECAO%'
                                AND dt_original LIKE '%$x%'
                                AND termino ='Sim'");
        $consultaInspecaoFinalizado = mysqli_query($conexao, $inspecaoFinalizado);
        $totalOsInspecaoFinalizado = mysqli_fetch_array($consultaInspecaoFinalizado);
        $inspecao = ($totalOsInspecaoFinalizado['total'] * 100) / $totalOsInspecao['total'];
        $inspecao = number_format($inspecao);if($inspecao>100){$inspecao = 100;}
    //inspecao fim

    //Preditiva
        $preditivaTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                    WHERE situacao = 'Liberado'
                    AND nome_servico LIKE'%PREDITIVA%'
                    AND dt_original LIKE '%$x%'");
        $consultaPreditiva = mysqli_query($conexao, $preditivaTotalOs);
        $totalOsPreditiva = mysqli_fetch_array($consultaPreditiva);


        $preditivaFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                    WHERE situacao = 'Liberado'
                    AND nome_servico LIKE'%PREDITIVA%'
                    AND dt_original LIKE '%$x%'
                    AND termino ='Sim'");
        $consultaPreditivaFinalizado = mysqli_query($conexao, $preditivaFinalizado);
        $totalOsPreditivaFinalizado = mysqli_fetch_array($consultaPreditivaFinalizado);
        $preditiva = ($totalOsPreditivaFinalizado['total'] * 100) / $totalOsPreditiva['total'];
        $preditiva = number_format($preditiva);if($preditiva>100){$preditiva = 100;}

    //Preditiva fim

    //Frotas
        $frotaTotal = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'FRO' 
                                AND dt_original LIKE '%$x%'");
        $consultaFrota = mysqli_query($conexao, $frotaTotal);
        $totalOsFrota = mysqli_fetch_array($consultaFrota);

        $frotaFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = 'FRO'
                                AND termino ='Sim' 
                                AND dt_original LIKE '%$x%'");
        $consultaFrotaFinalizado = mysqli_query($conexao, $frotaFinalizado);
        $totalOsFrotaFinalizado = mysqli_fetch_array($consultaFrotaFinalizado);
        $frotas = ($totalOsFrotaFinalizado['total'] * 100) / $totalOsFrota['total'];
        $frotas = number_format($frotas);if($frotas>100){$frotas = 100;}
    //Frotas Fim

    //Eficiencia 
        $eficienciaGeral = ($mecanica + $eletrica + $instrumentacao + $lubrificacao + $inspecao + $preditiva + $frotas) / 7;
        $eficienciaGeral = number_format($eficienciaGeral);
        $totalOsGeradas = $totalOsMec['total']+$totalOsEle['total']+$totalOsIns['total']+$totalOsLub['total']+$totalOsInspecao['total']+$totalOsPreditiva['total']+$totalOsFrota['total'];
        $totalOsFinalizadas = $totalOsMecFinalizado['total']+$totalOsEleFinalizado['total']+$totalOsInsFinalizado['total']+$totalOsLubFinalizado['total']+$totalOsInspecaoFinalizado['total']+$totalOsPreditivaFinalizado['total']+$totalOsFrotaFinalizado['total'];

    //Eficiencia fim

    // variaveis para cores
        $mec = '';
        $ele = '';
        $inst = '';
        $lub = '';
        $insp = '';
        $pred = '';
        $fro = '';
    //cores
        if ($mecanica <= 50 && $mecanica >= 1) {
            $mec = 'bg-danger';
        } elseif ($mecanica >= 51 && $mecanica <= 69) {
            $mec = 'bg-warning';
        } elseif ($mecanica >= 70 && $mecanica <= 89) {
            $mec = 'bg-primary';
        } elseif ($mecanica >= 90) {
            $mec = 'bg-success';
        } else {
            $mec = 'bg-dark';
        }
        if ($eletrica <= 50) {
            $ele = 'bg-danger';
        } elseif ($eletrica >= 51 && $eletrica <= 69) {
            $ele = 'bg-warning';
        } elseif ($eletrica >= 70 && $eletrica <= 89) {
            $ele = 'bg-primary';
        } elseif ($eletrica >= 90) {
            $ele = 'bg-success';
        } else {
            $ele = 'bg-dark';
        }
        if ($instrumentacao <= 50) {
            $inst = 'bg-danger';
        } elseif ($instrumentacao >= 51 && $instrumentacao <= 69) {
            $inst = 'bg-warning';
        } elseif ($instrumentacao >= 70 && $instrumentacao <= 89) {
            $inst = 'bg-primary';
        } elseif ($instrumentacao >= 90) {
            $inst = 'bg-success';
        } else {
            $inst = 'bg-dark';
        }
        if ($lubrificacao <= 50) {
            $lub = 'bg-danger';
        } elseif ($lubrificacao >= 51 && $lubrificacao <= 69) {
            $lub = 'bg-warning';
        } elseif ($lubrificacao >= 70 && $lubrificacao <= 89) {
            $lub = 'bg-primary';
        } elseif ($lubrificacao >= 90) {
            $lub = 'bg-success';
        } else {
            $lub = 'bg-dark';
        }
        if ($inspecao <= 50) {
            $insp = 'bg-danger';
        } elseif ($inspecao >= 51 && $inspecao <= 69) {
            $insp = 'bg-warning';
        } elseif ($inspecao >= 70 && $inspecao <= 89) {
            $insp = 'bg-primary';
        } elseif ($inspecao >= 90) {
            $insp = 'bg-success';
        } else {
            $insp = 'bg-dark';
        }
        if ($preditiva <= 50) {
            $pred = 'bg-danger';
        } elseif ($preditiva >= 51 && $preditiva <= 69) {
            $pred = 'bg-warning';
        } elseif ($preditiva >= 70 && $preditiva <= 89) {
            $pred = 'bg-primary';
        } elseif ($preditiva >= 90) {
            $pred = 'bg-success';
        } else {
            $pred = 'bg-dark';
        }
        if ($frotas <= 50) {
            $fro = 'bg-danger';
        } elseif ($frotas >= 51 && $frotas <= 69) {
            $fro = 'bg-warning';
        } elseif ($frotas >= 70 && $frotas <= 89) {
            $fro = 'bg-primary';
        } elseif ($frotas >= 90) {
            $fro = 'bg-success';
        } else {
            $fro = 'bg-dark';
        }
        if ($eficienciaGeral <= 50) {
            $efic = 'bg-danger';
        } elseif ($eficienciaGeral >= 51 && $eficienciaGeral <= 69) {
            $efic = 'bg-warning';
        } elseif ($eficienciaGeral >= 70 && $eficienciaGeral <= 89) {
            $efic = 'bg-primary';
        } elseif ($eficienciaGeral >= 90) {
            $efic = 'bg-success';
        } else {
            $efic = 'bg-dark';
        }





//SQL dados penúltimo mês
    //Mec $penultimototalOsMec['total'] = 1;
    $penultimomecTotal = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'MEC' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaMec = mysqli_query($conexao, $penultimomecTotal);
    $penultimototalOsMec = mysqli_fetch_array($penultimoconsultaMec);
    if($penultimototalOsMec['total'] == 0 ){$penultimototalOsMec['total'] = 1;}
    $penultimomecFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'MEC'
                            AND termino ='Sim' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaMecFinalizado = mysqli_query($conexao, $penultimomecFinalizado);
    $penultimototalOsMecFinalizado = mysqli_fetch_array($penultimoconsultaMecFinalizado);
    if($penultimototalOsMecFinalizado['total'] == 0 ){$penultimototalOsMecFinalizado['total'] = 1;}
    $penultimomecanica = ($penultimototalOsMecFinalizado['total'] * 100) / $penultimototalOsMec['total'];
    $penultimomecanica = number_format($penultimomecanica);
    //Mec fim

    //Ele
    $penultimoeleTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'ELE' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaEle = mysqli_query($conexao, $penultimoeleTotalOs);
    $penultimototalOsEle = mysqli_fetch_array($penultimoconsultaEle);
        if($penultimototalOsEle['total'] == 0 ){$penultimototalOsEle['total'] = 1;}
    $penultimoeleFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'ELE'
                            AND termino ='Sim' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaEleFinalizado = mysqli_query($conexao, $penultimoeleFinalizado);
    $penultimototalOsEleFinalizado = mysqli_fetch_array($penultimoconsultaEleFinalizado);
        if($penultimototalOsEleFinalizado['total'] == 0 ){$penultimototalOsEleFinalizado['total'] = 1;}
    $penultimoeletrica = ($penultimototalOsEleFinalizado['total'] * 100) / $penultimototalOsEle['total'];
    $penultimoeletrica = number_format($penultimoeletrica);
    //Ele fim

    //Instu
    $penultimoinsTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'INS' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaIns = mysqli_query($conexao, $penultimoinsTotalOs);
    $penultimototalOsIns = mysqli_fetch_array($penultimoconsultaIns);
        if($penultimototalOsIns['total'] == 0 ){$penultimototalOsIns['total'] = 1;}
    $penultimoinsFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'INS'
                            AND termino ='Sim' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaInsFinalizado = mysqli_query($conexao, $penultimoinsFinalizado);
    $penultimototalOsInsFinalizado = mysqli_fetch_array($penultimoconsultaInsFinalizado);
        if($penultimototalOsInsFinalizado['total'] == 0 ){$penultimototalOsInsFinalizado['total'] = 1;}
    $penultimoinstrumentacao = ($penultimototalOsInsFinalizado['total'] * 100) / $penultimototalOsIns['total'];
    $penultimoinstrumentacao = number_format($penultimoinstrumentacao);

    //Instr fim

    //Lub 
    $penultimolubTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'LUB' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaLub = mysqli_query($conexao, $penultimolubTotalOs);
    $penultimototalOsLub = mysqli_fetch_array($penultimoconsultaLub);
        if($penultimototalOsLub['total'] == 0 ){$penultimototalOsLub['total'] = 1;}
    $penultimolubFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'LUB'
                            AND termino ='Sim' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaLubFinalizado = mysqli_query($conexao, $penultimolubFinalizado);
    $penultimototalOsLubFinalizado = mysqli_fetch_array($penultimoconsultaLubFinalizado);
        if($penultimototalOsLubFinalizado['total'] == 0 ){$penultimototalOsLubFinalizado['total'] = 1;}
    $penultimolubrificacao = ($penultimototalOsLubFinalizado['total'] * 100) / $penultimototalOsLub['total'];
    $penultimolubrificacao = number_format($penultimolubrificacao);
    //Lub Fim



    //inspecao
    $penultimoinspecaoTotalOs = ("SELECT COUNT(situacao) AS total FROM stj 
                            WHERE situacao = 'Liberado' 
                            AND nome_servico LIKE'%INSPECAO%'
                            AND dt_original LIKE'%$penultimo%'");
    $penultimoconsultaInspecao = mysqli_query($conexao, $penultimoinspecaoTotalOs);
    $penultimototalOsInspecao = mysqli_fetch_array($penultimoconsultaInspecao);
        if($penultimototalOsInspecao['total'] == 0 ){$penultimototalOsInspecao['total'] = 1;}
    $penultimoinspecaoFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado'
                            AND nome_servico LIKE'%INSPECAO%'
                            AND dt_original LIKE '%$penultimo%'
                            AND termino ='Sim'");
    $penultimoconsultaInspecaoFinalizado = mysqli_query($conexao, $penultimoinspecaoFinalizado);
    $penultimototalOsInspecaoFinalizado = mysqli_fetch_array($penultimoconsultaInspecaoFinalizado);
        if($penultimototalOsInspecaoFinalizado['total'] == 0 ){$penultimototalOsInspecaoFinalizado['total'] = 1;}
    $penultimoinspecao = ($penultimototalOsInspecaoFinalizado['total'] * 100) / $penultimototalOsInspecao['total'];
    $penultimoinspecao = number_format($penultimoinspecao);if($penultimoinspecao>100){$penultimoinspecao = 100;}
    //inspecao fim

    //Preditiva
    $penultimopreditivaTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
                WHERE situacao = 'Liberado'
                AND tipo_manut LIKE'%PRD%'
                AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaPreditiva = mysqli_query($conexao, $penultimopreditivaTotalOs);
    $penultimototalOsPreditiva = mysqli_fetch_array($penultimoconsultaPreditiva);
        if($penultimototalOsPreditiva['total'] == 0 ){$penultimototalOsPreditiva['total'] = 1;}
    $penultimopreditivaFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                WHERE situacao = 'Liberado'
                AND tipo_manut LIKE'%PRD%'
                AND dt_original LIKE '%$penultimo%'
                AND termino ='Sim'");
    $penultimoconsultaPreditivaFinalizado = mysqli_query($conexao, $penultimopreditivaFinalizado);
    $penultimototalOsPreditivaFinalizado = mysqli_fetch_array($penultimoconsultaPreditivaFinalizado);
        if($penultimototalOsPreditivaFinalizado['total'] == 0 ){$penultimototalOsPreditivaFinalizado['total'] = 1;}
    $penultimopreditiva = ($penultimototalOsPreditivaFinalizado['total'] * 100) / $penultimototalOsPreditiva['total'];
    $penultimopreditiva = number_format($penultimopreditiva);if($penultimopreditiva>100){$penultimopreditiva = 100;}

    //Preditiva fim

    //Frotas
    $penultimofrotaTotal = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'FRO' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaFrota = mysqli_query($conexao, $penultimofrotaTotal);
    $penultimototalOsFrota = mysqli_fetch_array($penultimoconsultaFrota);
         if($penultimototalOsFrota['total'] == 0 ){$penultimototalOsFrota['total'] = 1;}
    $penultimofrotaFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
                            WHERE situacao = 'Liberado' 
                            AND area_manut = 'FRO'
                            AND termino ='Sim' 
                            AND dt_original LIKE '%$penultimo%'");
    $penultimoconsultaFrotaFinalizado = mysqli_query($conexao, $penultimofrotaFinalizado);
    $penultimototalOsFrotaFinalizado = mysqli_fetch_array($penultimoconsultaFrotaFinalizado);
        if($penultimototalOsFrotaFinalizado['total'] == 0 ){$penultimototalOsFrotaFinalizado['total'] = 1;}
    $penultimofrotas = ($penultimototalOsFrotaFinalizado['total'] * 100) / $penultimototalOsFrota['total'];
    $penultimofrotas = number_format($penultimofrotas);if($penultimofrotas>100){$penultimofrotas = 100;}





    // SQL dados antepenúltimo mês com if
$antepenultimomecTotal = ("SELECT COUNT(situacao) AS total FROM stj
    WHERE situacao = 'Liberado' 
    AND area_manut = 'MEC' 
    AND dt_original LIKE '%$antepenultimo%'");
    $antepenultimoconsultaMec = mysqli_query($conexao, $antepenultimomecTotal);
    $antepenultimototalOsMec = mysqli_fetch_array($antepenultimoconsultaMec);
    if($antepenultimototalOsMec['total'] == 0 ){$antepenultimototalOsMec['total'] = 1;}
    $antepenultimomecFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
    WHERE situacao = 'Liberado' 
    AND area_manut = 'MEC'
    AND termino ='Sim' 
    AND dt_original LIKE '%$antepenultimo%'");
    $antepenultimoconsultaMecFinalizado = mysqli_query($conexao, $antepenultimomecFinalizado);
    $antepenultimototalOsMecFinalizado = mysqli_fetch_array($antepenultimoconsultaMecFinalizado);
    if($antepenultimototalOsMecFinalizado['total'] == 0 ){$antepenultimototalOsMecFinalizado['total'] = 1;}
    $antepenultimomecanica = ($antepenultimototalOsMecFinalizado['total'] * 100) / $antepenultimototalOsMec['total'];
    $antepenultimomecanica = number_format($antepenultimomecanica);
//Mec fim

//Ele
$antepenultimoeleTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'ELE' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaEle = mysqli_query($conexao, $antepenultimoeleTotalOs);
$antepenultimototalOsEle = mysqli_fetch_array($antepenultimoconsultaEle);
if($antepenultimototalOsEle['total'] == 0 ){$antepenultimototalOsEle['total'] = 1;}
$antepenultimoeleFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'ELE'
AND termino ='Sim' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaEleFinalizado = mysqli_query($conexao, $antepenultimoeleFinalizado);
$antepenultimototalOsEleFinalizado = mysqli_fetch_array($antepenultimoconsultaEleFinalizado);
if($antepenultimototalOsEleFinalizado['total'] == 0 ){$antepenultimototalOsEleFinalizado['total'] = 1;}
$antepenultimoeletrica = ($antepenultimototalOsEleFinalizado['total'] * 100) / $antepenultimototalOsEle['total'];
$antepenultimoeletrica = number_format($antepenultimoeletrica);
//Ele fim

//Instu
$antepenultimoinsTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'INS' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaIns = mysqli_query($conexao, $antepenultimoinsTotalOs);
$antepenultimototalOsIns = mysqli_fetch_array($antepenultimoconsultaIns);
if($antepenultimototalOsIns['total'] == 0 ){$antepenultimototalOsIns['total'] = 1;}
$antepenultimoinsFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'INS'
AND termino ='Sim' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaInsFinalizado = mysqli_query($conexao, $antepenultimoinsFinalizado);
$antepenultimototalOsInsFinalizado = mysqli_fetch_array($antepenultimoconsultaInsFinalizado);
if($antepenultimototalOsInsFinalizado['total'] == 0 ){$antepenultimototalOsInsFinalizado['total'] = 1;}
$antepenultimoinstrumentacao = ($antepenultimototalOsInsFinalizado['total'] * 100) / $antepenultimototalOsIns['total'];
$antepenultimoinstrumentacao = number_format($antepenultimoinstrumentacao);

//Instr fim

//Lub 
$antepenultimolubTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'LUB' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaLub = mysqli_query($conexao, $antepenultimolubTotalOs);
$antepenultimototalOsLub = mysqli_fetch_array($antepenultimoconsultaLub);
if($antepenultimototalOsLub['total'] == 0 ){$antepenultimototalOsLub['total'] = 1;}
$antepenultimolubFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'LUB'
AND termino ='Sim' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaLubFinalizado = mysqli_query($conexao, $antepenultimolubFinalizado);
$antepenultimototalOsLubFinalizado = mysqli_fetch_array($antepenultimoconsultaLubFinalizado);
if($antepenultimototalOsLubFinalizado['total'] == 0 ){$antepenultimototalOsLubFinalizado['total'] = 1;}
$antepenultimolubrificacao = ($antepenultimototalOsLubFinalizado['total'] * 100) / $antepenultimototalOsLub['total'];
$antepenultimolubrificacao = number_format($antepenultimolubrificacao);
//Lub Fim



//inspecao
$antepenultimoinspecaoTotalOs = ("SELECT COUNT(situacao) AS total FROM stj 
WHERE situacao = 'Liberado' 
AND nome_servico LIKE'%INSPECAO%'
AND dt_original LIKE'%$antepenultimo%'");
$antepenultimoconsultaInspecao = mysqli_query($conexao, $antepenultimoinspecaoTotalOs);
$antepenultimototalOsInspecao = mysqli_fetch_array($antepenultimoconsultaInspecao);
if($antepenultimototalOsInspecao['total'] == 0 ){$antepenultimototalOsInspecao['total'] = 1;}
$antepenultimoinspecaoFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado'
AND nome_servico LIKE'%INSPECAO%'
AND dt_original LIKE '%$antepenultimo%'
AND termino ='Sim'");
$antepenultimoconsultaInspecaoFinalizado = mysqli_query($conexao, $antepenultimoinspecaoFinalizado);
$antepenultimototalOsInspecaoFinalizado = mysqli_fetch_array($antepenultimoconsultaInspecaoFinalizado);
if($antepenultimototalOsInspecaoFinalizado['total'] == 0 ){$antepenultimototalOsInspecaoFinalizado['total'] = 1;}
$antepenultimoinspecao = ($antepenultimototalOsInspecaoFinalizado['total'] * 100) / $antepenultimototalOsInspecao['total'];
$antepenultimoinspecao = number_format($antepenultimoinspecao);if($antepenultimoinspecao>100){$antepenultimoinspecao = 100;}
//inspecao fim

//Preditiva
$antepenultimopreditivaTotalOs = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado'
AND tipo_manut LIKE'%PRD%'
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaPreditiva = mysqli_query($conexao, $antepenultimopreditivaTotalOs);
$antepenultimototalOsPreditiva = mysqli_fetch_array($antepenultimoconsultaPreditiva);
if($antepenultimototalOsPreditiva['total'] == 0 ){$antepenultimototalOsPreditiva['total'] = 1;}
$antepenultimopreditivaFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado'
AND tipo_manut LIKE'%PRD%'
AND dt_original LIKE '%$antepenultimo%'
AND termino ='Sim'");
$antepenultimoconsultaPreditivaFinalizado = mysqli_query($conexao, $antepenultimopreditivaFinalizado);
$antepenultimototalOsPreditivaFinalizado = mysqli_fetch_array($antepenultimoconsultaPreditivaFinalizado);
if($antepenultimototalOsPreditivaFinalizado['total'] == 0 ){$antepenultimototalOsPreditivaFinalizado['total'] = 1;}
$antepenultimopreditiva = ($antepenultimototalOsPreditivaFinalizado['total'] * 100) / $antepenultimototalOsPreditiva['total'];
$antepenultimopreditiva = number_format($antepenultimopreditiva);if($antepenultimopreditiva>100){$antepenultimopreditiva = 100;}

//Preditiva fim

//Frotas
$antepenultimofrotaTotal = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'FRO' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaFrota = mysqli_query($conexao, $antepenultimofrotaTotal);
$antepenultimototalOsFrota = mysqli_fetch_array($antepenultimoconsultaFrota);
if($antepenultimototalOsFrota['total'] == 0 ){$antepenultimototalOsFrota['total'] = 1;}
$antepenultimofrotaFinalizado = ("SELECT COUNT(situacao) AS total FROM stj
WHERE situacao = 'Liberado' 
AND area_manut = 'FRO'
AND termino ='Sim' 
AND dt_original LIKE '%$antepenultimo%'");
$antepenultimoconsultaFrotaFinalizado = mysqli_query($conexao, $antepenultimofrotaFinalizado);
$antepenultimototalOsFrotaFinalizado = mysqli_fetch_array($antepenultimoconsultaFrotaFinalizado);
if($antepenultimototalOsFrotaFinalizado['total'] == 0 ){$antepenultimototalOsFrotaFinalizado['total'] = 1;}
$antepenultimofrotas = ($antepenultimototalOsFrotaFinalizado['total'] * 100) / $antepenultimototalOsFrota['total'];
$antepenultimofrotas = number_format($antepenultimofrotas);if($antepenultimofrotas>100){$antepenultimofrotas = 100;}
















































//códigos para apoio 





//$datasSelect = "SELECT DISTINCT DATE_FORMAT(dt_original, '%Y-%m') AS data_formatada FROM stj";
//$datasSelect = "SELECT DISTINCT DATE_FORMAT(dt_original, '%Y-%m') AS data_formatada FROM stj ORDER BY dt_original DESC LIMIT 1";


//verificar se tem erro na pesquisa 
// if (!$pesq) {
//     printf("Error: %s\n", mysqli_error($conexao));
//     exit();
// }

