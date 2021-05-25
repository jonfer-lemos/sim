<?php
include '../app/backend/homeBackend/homePainel.php';

//echo $x;



$manutencaoNome = 'Lubrificação';
$manutencaoArea = 'LUB';
$eficienciaManutencao = $lubrificacao;


//lubrificaçao por manutenções
    $lubMecanicaTotal = "SELECT COUNT(nome_servico) AS lub_mec FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%MECANICA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaLubMecanica = mysqli_query($conexao, $lubMecanicaTotal);
    $totalOsLubMecGeradas = mysqli_fetch_array($consultaLubMecanica);
    $lubMecanicaGeradas = number_format($totalOsLubMecGeradas['lub_mec']);



    $lubMecanicaTotalFinalizadas = "SELECT COUNT(nome_servico) AS lub_mec_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%MECANICA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaLubMecanicaFinalizadas = mysqli_query($conexao, $lubMecanicaTotalFinalizadas);
    $totalOsLubMecGeradasFinalizadas = mysqli_fetch_array($consultaLubMecanicaFinalizadas);
    $lubMecanicaGeradasFinalizadas = number_format($totalOsLubMecGeradasFinalizadas['lub_mec_Finalizadas']);

    $lubEletricaTotal = "SELECT COUNT(nome_servico) AS lub_ele FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%ELETRICA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaLubEletrica = mysqli_query($conexao, $lubEletricaTotal);
    $totalOsLubMecGeradas = mysqli_fetch_array($consultaLubEletrica);
    $lubEletricaGeradas = number_format($totalOsLubMecGeradas['lub_ele']);


    $lubEletricaTotalFinalizadas = "SELECT COUNT(nome_servico) AS lub_ele_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%ELETRICA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaLubEletricaFinalizadas = mysqli_query($conexao, $lubEletricaTotalFinalizadas);
    $totalOsLubMecGeradasFinalizadas = mysqli_fetch_array($consultaLubEletricaFinalizadas);
    $lubEletricaGeradasFinalizadas = number_format($totalOsLubMecGeradasFinalizadas['lub_ele_Finalizadas']);

    $lubFrotasTotal = "SELECT COUNT(nome_servico) AS lub_fro FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%FROTAS%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaLubFrotas = mysqli_query($conexao, $lubFrotasTotal);
    $totalOsLubMecGeradas = mysqli_fetch_array($consultaLubFrotas);
    $lubFrotasGeradas = number_format($totalOsLubMecGeradas['lub_fro']);


    $lubFrotasTotalFinalizadas = "SELECT COUNT(nome_servico) AS lub_fro_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%FROTAS%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaLubFrotasFinalizadas = mysqli_query($conexao, $lubFrotasTotalFinalizadas);
    $totalOsLubMecGeradasFinalizadas = mysqli_fetch_array($consultaLubFrotasFinalizadas);
    $lubFrotasGeradasFinalizadas = number_format($totalOsLubMecGeradasFinalizadas['lub_fro_Finalizadas']);



    $lubGrandeParadaTotal = "SELECT COUNT(nome_servico) AS lub_Gp FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%GRANDE PARADA%'
                            AND dt_original LIKE '%$x%'
                            AND  situacao = 'Liberado'";
    $consultaLubGrandeParada = mysqli_query($conexao, $lubGrandeParadaTotal);
    $totalOsLubMecGeradas = mysqli_fetch_array($consultaLubGrandeParada);
    $lubGrandeParadaGeradas = number_format($totalOsLubMecGeradas['lub_Gp']);


    $lubGrandeParadaTotalFinalizadas = "SELECT COUNT(nome_servico) AS lub_Gp_Finalizadas FROM stj 
                            WHERE nome_servico LIKE'%LUBRIFICACAO%'
                            AND nome_servico LIKE'%GRANDE PARADA%'
                            AND dt_original LIKE '%$x%'
                            AND situacao = 'Liberado'
                            AND termino = 'Sim'";
    $consultaLubGrandeParadaFinalizadas = mysqli_query($conexao, $lubGrandeParadaTotalFinalizadas);
    $totalOsLubMecGeradasFinalizadas = mysqli_fetch_array($consultaLubGrandeParadaFinalizadas);
    $lubGrandeParadaGeradasFinalizadas = number_format($totalOsLubMecGeradasFinalizadas['lub_Gp_Finalizadas']);
//fim lubrificaçao por manutenções

$centroTrabalhoFilter;

$totalManutPrev;
$totalManutPrevFim;
$i = 0;


//lubrificacao por area
    $sql_centroTrab = "SELECT DISTINCT centro_trab AS centrotrabalho FROM stj ORDER BY centro_trab";
    $sqlCentroTrab = mysqli_query($conexao, $sql_centroTrab);


    
    while ($linha = mysqli_fetch_array($sqlCentroTrab)) {
        $manutencaoTotalPrev = ("SELECT COUNT(situacao) AS total FROM stj
                                    WHERE situacao = 'Liberado' 
                                    AND nome_servico LIKE'%LUBRIFICACAO%'
                                    AND centro_trab = '$linha[centrotrabalho]'
                                    AND dt_original LIKE '%$x%'");
        $consultaManutencoesPrev = mysqli_query($conexao, $manutencaoTotalPrev);
        //$totalOsManutencoes = mysqli_fetch_array($consultaManutencoesPrev);

        $manutencoesFinalizadoPrev = ("SELECT COUNT(situacao) AS total3 FROM stj
                                    WHERE situacao = 'Liberado' 
                                    AND nome_servico LIKE'%LUBRIFICACAO%'
                                    AND centro_trab = '$linha[centrotrabalho]'                                    
                                    AND termino ='Sim' 
                                    AND dt_original LIKE '%$x%'");
        $consultaManutencoesPrevFinalizado = mysqli_query($conexao, $manutencoesFinalizadoPrev);



        while ($linha2 = mysqli_fetch_array($consultaManutencoesPrev)) {
            while ($linha3 = mysqli_fetch_array($consultaManutencoesPrevFinalizado)) {

                $centroTrabalhoFilter[$i] =  $linha['centrotrabalho'];
                $totalManutPrev[$i] = $linha2['total'];
                $totalManutPrevFim[$i] = $linha3['total3'];

                if ($totalManutPrev[$i] == 0 && $totalManutPrevFim[$i] == 0) {
                    $ef = 0;
                } else {
                    $ef = ($totalManutPrevFim[$i] * 100) / $totalManutPrev[$i];
                }

                $ef = number_format($ef);
                $eficienciaPrv[$i] = $ef;

         
                if (
                    $centroTrabalhoFilter[$i] == 30 or $centroTrabalhoFilter[$i] == 31
                    or $centroTrabalhoFilter[$i] == 34
                ) {
                    $combustiveisTotalPrev =  $totalManutPrev[$i];
                    $combustiveisTotalPrev = + $combustiveisTotalPrev;
                    $combustiveisTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $combustiveisTotalPrevFinalizada = + $combustiveisTotalPrevFinalizada;
                }
                if ($centroTrabalhoFilter[$i] == 1 or $centroTrabalhoFilter[$i] == 4) {
                    $britagemTotalPrev = $totalManutPrev[$i];
                    $britagemTotalPrev = + $britagemTotalPrev;
                    $britagemTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $britagemTotalPrevFinalizada = + $britagemTotalPrevFinalizada;
                }
                if ($centroTrabalhoFilter[$i] == 2 or $centroTrabalhoFilter[$i] == 10) {
                    $preHomoTotalPrev = $totalManutPrev[$i];
                    $preHomoTotalPrev = +$preHomoTotalPrev;
                    $preHomoTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $preHomoTotalPrevFinalizada = + $preHomoTotalPrevFinalizada;
                }
                if ($centroTrabalhoFilter[$i] == 3 or $centroTrabalhoFilter[$i] == 11) {
                    $galpaoMateriaPrimaTotalPrev = $totalManutPrev[$i];
                    $galpaoMateriaPrimaTotalPrev = + $galpaoMateriaPrimaTotalPrev;
                    $galpaoMateriaPrimaTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $galpaoMateriaPrimaTotalPrevFinalizada = +$galpaoMateriaPrimaTotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 12 or $centroTrabalhoFilter[$i] == 13
                    or $centroTrabalhoFilter[$i] == 14
                ) {
                    $moagemCruTotalPrev = $totalManutPrev[$i];
                    $moagemCruTotalPrev = +$moagemCruTotalPrev;
                    $moagemCruTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $moagemCruTotalPrevFinalizada = +$moagemCruTotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 21 or $centroTrabalhoFilter[$i] == 20
                    or $centroTrabalhoFilter[$i] == 22 or $centroTrabalhoFilter[$i] == 23
                    or $centroTrabalhoFilter[$i] == 50
                ) {
                    $cliquerizacaoTotalPrev = $totalManutPrev[$i];
                    $cliquerizacaoTotalPrev = +$cliquerizacaoTotalPrev;
                    $cliquerizacaoTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $cliquerizacaoTotalPrevFinalizada = + $cliquerizacaoTotalPrevFinalizada;
                }
                if ($centroTrabalhoFilter[$i] == 51 or $centroTrabalhoFilter[$i] == 52) {
                    $moagemCimentoTotalPrev = $totalManutPrev[$i];
                    $moagemCimentoTotalPrev = +$moagemCimentoTotalPrev;
                    $moagemCimentoTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $moagemCimentoTotalPrevFinalizada = +$moagemCimentoTotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 53 or $centroTrabalhoFilter[$i] == 61
                    or $centroTrabalhoFilter[$i] == 62 or $centroTrabalhoFilter[$i] == 63
                    or $centroTrabalhoFilter[$i] == 54
                ) {
                    $silo2_17_MilPrev = $totalManutPrev[$i];
                    $silo2_17_MilPrev = +$silo2_17_MilPrev;
                    $silo2_17_MilPrevFinalizada = $totalManutPrevFim[$i];
                    $silo2_17_MilPrevFinalizada = +$silo2_17_MilPrevFinalizada;
                }
                // if ($centroTrabalhoFilter[$i] == 53 or $centroTrabalhoFilter[$i] == 61) {
                //     $silo2000TotalPrev = $totalManutPrev[$i];
                //     $silo2000TotalPrev = +$silo2000TotalPrev;
                //     $silo2000TotalPrevFinalizada = $totalManutPrevFim[$i];
                //     $silo2000TotalPrevFinalizada = +$silo2000TotalPrevFinalizada;
                // }
                // if (
                //     $centroTrabalhoFilter[$i] == 62 or $centroTrabalhoFilter[$i] == 54
                //     or $centroTrabalhoFilter[$i] == 63
                // ) {
                //     $silo17000TotalPrev = $totalManutPrev[$i];
                //     $silo17000TotalPrev = +$silo17000TotalPrev;
                //     $silo17000TotalPrevFinalizada = $totalManutPrevFim[$i];
                //     $silo17000TotalPrevFinalizada = +$silo17000TotalPrevFinalizada;
                // }
                if ($centroTrabalhoFilter[$i] == 70 or $centroTrabalhoFilter[$i] == 71) {
                    $ensacadeiraPaletizadoraTotalPrev = $totalManutPrev[$i];
                    $ensacadeiraPaletizadoraTotalPrev = +$ensacadeiraPaletizadoraTotalPrev;
                    $ensacadeiraPaletizadoraTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $ensacadeiraPaletizadoraTotalPrevFinalizada = +$ensacadeiraPaletizadoraTotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 81 or $centroTrabalhoFilter[$i] == 80
                    or $centroTrabalhoFilter[$i] == 82
                ) {
                    $moagemCruL2TotalPrev = $totalManutPrev[$i];
                    $moagemCruL2TotalPrev = +$moagemCruL2TotalPrev;
                    $moagemCruL2TotalPrevFinalizada = $totalManutPrevFim[$i];
                    $moagemCruL2TotalPrevFinalizada = +$moagemCruL2TotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 94 or $centroTrabalhoFilter[$i] == 100
                    or $centroTrabalhoFilter[$i] == 100
                ) {
                    $combustiveisL2TotalPrev =  $totalManutPrev[$i];
                    $combustiveisL2TotalPrev = +$combustiveisL2TotalPrev;
                    $combustiveisL2TotalPrevFinalizada =  $totalManutPrevFim[$i];
                    $combustiveisL2TotalPrevFinalizada = +$combustiveisL2TotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 90 or $centroTrabalhoFilter[$i] == 91
                    or $centroTrabalhoFilter[$i] == 92 or $centroTrabalhoFilter[$i] == 93
                    or $centroTrabalhoFilter[$i] == 120
                ) {
                    $cliquerizacaoL2TotalPrev = $totalManutPrev[$i];
                    $cliquerizacaoL2TotalPrev = +$cliquerizacaoL2TotalPrev;
                    $cliquerizacaoL2TotalPrevFinalizada = $totalManutPrevFim[$i];
                    $cliquerizacaoL2TotalPrevFinalizada = +$cliquerizacaoL2TotalPrevFinalizada;
                }
                if (
                    $centroTrabalhoFilter[$i] == 121 or $centroTrabalhoFilter[$i] == 122
                ) {
                    $moagemCimentoL2TotalPrev = $totalManutPrev[$i];
                    $moagemCimentoL2TotalPrev = +$moagemCimentoL2TotalPrev;
                    $moagemCimentoL2TotalPrevFinalizada = $totalManutPrevFim[$i];
                    $moagemCimentoL2TotalPrevFinalizada = +$moagemCimentoL2TotalPrevFinalizada;
                }
            
                if ($centroTrabalhoFilter[$i] == 130 or $centroTrabalhoFilter[$i] == 131) {
                    $ensacadeiraPaletizadoraL2TotalPrev = $totalManutPrev[$i];
                    $ensacadeiraPaletizadoraL2TotalPrev = +$ensacadeiraPaletizadoraL2TotalPrev;
                    $ensacadeiraPaletizadoraL2TotalPrevFinalizada = $totalManutPrevFim[$i];
                    $ensacadeiraPaletizadoraL2TotalPrevFinalizada = +$ensacadeiraPaletizadoraL2TotalPrevFinalizada;
                }

                // if (
                //     $centroTrabalhoFilter[$i] == 1000 or $centroTrabalhoFilter[$i] == 1003
                //     or $centroTrabalhoFilter[$i] == 1009
                // ) {
                //     $frotasTotalPrev = $totalManutPrev[$i];
                //     $frotasTotalPrev = + $frotasTotalPrev;
                //     $frotasTotalPrevFinalizada = $totalManutPrevFim[$i];
                //     $frotasTotalPrevFinalizada = + $frotasTotalPrevFinalizada;
                // }

                if (
                    $centroTrabalhoFilter[$i] == 40 or $centroTrabalhoFilter[$i] == 110
                    or $centroTrabalhoFilter[$i] == 43 or $centroTrabalhoFilter[$i] == 56
                    or $centroTrabalhoFilter[$i] == 41 or $centroTrabalhoFilter[$i] == 42
                    or $centroTrabalhoFilter[$i] == 0 or $centroTrabalhoFilter[$i] == 1000
                    or $centroTrabalhoFilter[$i] == 1003 or $centroTrabalhoFilter[$i] == 1009
                ) {
                    $outrosTotalPrev = $totalManutPrev[$i];
                    $outrosTotalPrev = +$outrosTotalPrev;
                    $outrosTotalPrevFinalizada = $totalManutPrevFim[$i];
                    $outrosTotalPrevFinalizada = +$outrosTotalPrevFinalizada;
                }
            }
        }
        $i++;
    }
//fim lubrificacao por area