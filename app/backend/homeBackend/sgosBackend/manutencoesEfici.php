<?php
include '../app/backend/homeBackend/homePainel.php';

//echo $x;

if (isset($_GET['pag'])) {
    $tipoManutencao = $_GET['pag']; // pega a string depois do dominio
}


//Tipo da manutenção

if ($tipoManutencao == 'mecanica') {
    $manutencaoNome = 'Mecânica';
    $eficienciaManutencao = $mecanica;
    $manutencaoArea = 'MEC';
    $corCard = $mec;
} elseif ($tipoManutencao == 'eletrica') {
    $manutencaoNome = 'Elétrica';
    $eficienciaManutencao = $eletrica;
    $manutencaoArea = 'ELE';
    $corCard = $ele;
} elseif ($tipoManutencao == 'instrumentacao') {
    $manutencaoNome = 'Instrumentação';
    $manutencaoArea = 'INS';
    $eficienciaManutencao = $instrumentacao;
} elseif ($tipoManutencao == 'lubrificacao') {
    $manutencaoNome = 'Lubrificação';
    $manutencaoArea = 'LUB';
    $eficienciaManutencao = $lubrificacao;
}




//ultima data do banco de dadsos 
// $datasSelect = "SELECT DISTINCT DATE_FORMAT(dt_original, '%Y-%m') AS data_formatada FROM STJ ORDER BY ordem_serv DESC LIMIT 1 ;";
// $pesq = mysqli_query($conexao, $datasSelect);
// while ($linha = mysqli_fetch_array($pesq)) {
//     $ultimaData = $linha['data_formatada'];
// }

//areas


$centroTrabalhoFilter;

$totalManutPrev;
$totalManutPrevFim;
$i = 0;

$eficienciaPrv;

$centroTrabalhoFilterCorretivas;
$totalManutCorretivas;
$totalManutCorretivasFim;
$i_Corretivas = 0;

$sql_centroTrab = "SELECT DISTINCT centro_trab AS centrotrabalho FROM stj ORDER BY centro_trab";
$sqlCentroTrab = mysqli_query($conexao, $sql_centroTrab);


//resultados Preventivas
while ($linha = mysqli_fetch_array($sqlCentroTrab)) {
    $manutencaoTotalPrev = ("SELECT COUNT(situacao) AS total FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = '$manutencaoArea' 
                                AND	tipo_manut = 'PRV'
                                AND centro_trab = '$linha[centrotrabalho]'
                                AND dt_original LIKE '%$x%'");
    $consultaManutencoesPrev = mysqli_query($conexao, $manutencaoTotalPrev);
    //$totalOsManutencoes = mysqli_fetch_array($consultaManutencoesPrev);

    $manutencoesFinalizadoPrev = ("SELECT COUNT(situacao) AS total3 FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = '$manutencaoArea'
                                AND centro_trab = '$linha[centrotrabalho]'
                                AND	tipo_manut = 'PRV'
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

           // echo '<br>';
            //echo $i . '----' . $centroTrabalhoFilter[$i] . '----' . $totalManutPrev[$i] . ' ----' .  $totalManutPrevFim[$i] . ' ----' .  $eficienciaPrv[$i];

           // echo '<br>';
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
            if (
                $centroTrabalhoFilter[$i] == 40 or $centroTrabalhoFilter[$i] == 110
                or $centroTrabalhoFilter[$i] == 43 or $centroTrabalhoFilter[$i] == 56
                or $centroTrabalhoFilter[$i] == 41 or $centroTrabalhoFilter[$i] == 42
                or $centroTrabalhoFilter[$i] == 0
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



$sql_centroTrabCor = "SELECT DISTINCT centro_trab AS centrotrabalho FROM stj ORDER BY centro_trab";
$sqlCentroTrabCor = mysqli_query($conexao, $sql_centroTrabCor);

while ($linhaCorretivas = mysqli_fetch_array($sqlCentroTrabCor)) {
    $manutencaoTotalCorretivas = ("SELECT COUNT(situacao) AS totalCorretivas FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = '$manutencaoArea' 
                                AND	tipo_manut = 'COR'
                                AND centro_trab = '$linhaCorretivas[centrotrabalho]'
                                AND dt_original LIKE '%$x%'");
    $consultaManutencoesCorretivas = mysqli_query($conexao, $manutencaoTotalCorretivas);
    //$totalOsManutencoes = mysqli_fetch_array($consultaManutencoesCorretivas);

    $manutencoesFinalizadoCorretivas = ("SELECT COUNT(situacao) AS totalCorretivas3 FROM stj
                                WHERE situacao = 'Liberado' 
                                AND area_manut = '$manutencaoArea'
                                AND centro_trab = '$linhaCorretivas[centrotrabalho]'
                                AND	tipo_manut = 'COR'                                
                                AND termino ='Sim' 
                                AND dt_original LIKE '%$x%'");
    $consultaManutencoesCorretivasFinalizado = mysqli_query($conexao, $manutencoesFinalizadoCorretivas);



    while ($linhaCorretivas2 = mysqli_fetch_array($consultaManutencoesCorretivas)) {
        while ($linhaCorretivas3 = mysqli_fetch_array($consultaManutencoesCorretivasFinalizado)) {

            $centroTrabalhoFilterCorretivas[$i_Corretivas] =  $linhaCorretivas['centrotrabalho'];
            $totalManutCorretivas[$i_Corretivas] = $linhaCorretivas2['totalCorretivas'];
            $totalManutCorretivasFim[$i_Corretivas] = $linhaCorretivas3['totalCorretivas3'];
           
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 30 or $centroTrabalhoFilter[$i_Corretivas] == 31
                or $centroTrabalhoFilter[$i_Corretivas] == 34
            ) {
                $combustiveisTotalCorretivas =  $totalManutCorretivas[$i_Corretivas];
                $combustiveisTotalCorretivas = + $combustiveisTotalCorretivas;
                $combustiveisTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $combustiveisTotalCorretivasFinalizada = + $combustiveisTotalCorretivasFinalizada;
            }
            if ($centroTrabalhoFilter[$i_Corretivas] == 1 or $centroTrabalhoFilter[$i_Corretivas] == 4) {
                $britagemTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $britagemTotalCorretivas = + $britagemTotalCorretivas;
                $britagemTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $britagemTotalCorretivasFinalizada = + $britagemTotalCorretivasFinalizada;
            }
            if ($centroTrabalhoFilter[$i_Corretivas] == 2 or $centroTrabalhoFilter[$i_Corretivas] == 10) {
                $preHomoTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $preHomoTotalCorretivas = +$preHomoTotalCorretivas;
                $preHomoTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $preHomoTotalCorretivasFinalizada = + $preHomoTotalCorretivasFinalizada;
            }
            if ($centroTrabalhoFilter[$i_Corretivas] == 3 or $centroTrabalhoFilter[$i_Corretivas] == 11) {
                $galpaoMateriaPrimaTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $galpaoMateriaPrimaTotalCorretivas = + $galpaoMateriaPrimaTotalCorretivas;
                $galpaoMateriaPrimaTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $galpaoMateriaPrimaTotalCorretivasFinalizada = +$galpaoMateriaPrimaTotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 12 or $centroTrabalhoFilter[$i_Corretivas] == 13
                or $centroTrabalhoFilter[$i_Corretivas] == 14
            ) {
                $moagemCruTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $moagemCruTotalCorretivas = +$moagemCruTotalCorretivas;
                $moagemCruTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $moagemCruTotalCorretivasFinalizada = +$moagemCruTotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 21 or $centroTrabalhoFilter[$i_Corretivas] == 20
                or $centroTrabalhoFilter[$i_Corretivas] == 22 or $centroTrabalhoFilter[$i_Corretivas] == 23
                or $centroTrabalhoFilter[$i_Corretivas] == 50
            ) {
                $cliquerizacaoTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $cliquerizacaoTotalCorretivas = +$cliquerizacaoTotalCorretivas;
                $cliquerizacaoTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $cliquerizacaoTotalCorretivasFinalizada = + $cliquerizacaoTotalCorretivasFinalizada;
            }
            if ($centroTrabalhoFilter[$i_Corretivas] == 51 or $centroTrabalhoFilter[$i_Corretivas] == 52) {
                $moagemCimentoTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $moagemCimentoTotalCorretivas = +$moagemCimentoTotalCorretivas;
                $moagemCimentoTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $moagemCimentoTotalCorretivasFinalizada = +$moagemCimentoTotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 53 or $centroTrabalhoFilter[$i_Corretivas] == 61
                or $centroTrabalhoFilter[$i_Corretivas] == 62 or $centroTrabalhoFilter[$i_Corretivas] == 63
                or $centroTrabalhoFilter[$i_Corretivas] == 54
            ) {
                $silo2_17_MilCorretivas = $totalManutCorretivas[$i_Corretivas];
                $silo2_17_MilCorretivas = +$silo2_17_MilCorretivas;
                $silo2_17_MilCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $silo2_17_MilCorretivasFinalizada = +$silo2_17_MilCorretivasFinalizada;
            }
            // if ($centroTrabalhoFilter[$i_Corretivas] == 53 or $centroTrabalhoFilter[$i_Corretivas] == 61) {
            //     $silo2000TotalCorretivas = $totalManutCorretivas[$i_Corretivas];
            //     $silo2000TotalCorretivas = +$silo2000TotalCorretivas;
            //     $silo2000TotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
            //     $silo2000TotalCorretivasFinalizada = +$silo2000TotalCorretivasFinalizada;
            // }
            // if (
            //     $centroTrabalhoFilter[$i_Corretivas] == 62 or $centroTrabalhoFilter[$i_Corretivas] == 54
            //     or $centroTrabalhoFilter[$i_Corretivas] == 63
            // ) {
            //     $silo17000TotalCorretivas = $totalManutCorretivas[$i_Corretivas];
            //     $silo17000TotalCorretivas = +$silo17000TotalCorretivas;
            //     $silo17000TotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
            //     $silo17000TotalCorretivasFinalizada = +$silo17000TotalCorretivasFinalizada;
            // }
            if ($centroTrabalhoFilter[$i_Corretivas] == 70 or $centroTrabalhoFilter[$i_Corretivas] == 71) {
                $ensacadeiraPaletizadoraTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $ensacadeiraPaletizadoraTotalCorretivas = +$ensacadeiraPaletizadoraTotalCorretivas;
                $ensacadeiraPaletizadoraTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $ensacadeiraPaletizadoraTotalCorretivasFinalizada = +$ensacadeiraPaletizadoraTotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 81 or $centroTrabalhoFilter[$i_Corretivas] == 80
                or $centroTrabalhoFilter[$i_Corretivas] == 82
            ) {
                $moagemCruL2TotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $moagemCruL2TotalCorretivas = +$moagemCruL2TotalCorretivas;
                $moagemCruL2TotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $moagemCruL2TotalCorretivasFinalizada = +$moagemCruL2TotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 94 or $centroTrabalhoFilter[$i_Corretivas] == 100
                or $centroTrabalhoFilter[$i_Corretivas] == 100
            ) {
                $combustiveisL2TotalCorretivas =  $totalManutCorretivas[$i_Corretivas];
                $combustiveisL2TotalCorretivas = +$combustiveisL2TotalCorretivas;
                $combustiveisL2TotalCorretivasFinalizada =  $totalManutCorretivasFim[$i_Corretivas];
                $combustiveisL2TotalCorretivasFinalizada = +$combustiveisL2TotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 90 or $centroTrabalhoFilter[$i_Corretivas] == 91
                or $centroTrabalhoFilter[$i_Corretivas] == 92 or $centroTrabalhoFilter[$i_Corretivas] == 93
                or $centroTrabalhoFilter[$i_Corretivas] == 120
            ) {
                $cliquerizacaoL2TotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $cliquerizacaoL2TotalCorretivas = +$cliquerizacaoL2TotalCorretivas;
                $cliquerizacaoL2TotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $cliquerizacaoL2TotalCorretivasFinalizada = +$cliquerizacaoL2TotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 121 or $centroTrabalhoFilter[$i_Corretivas] == 122
            ) {
                $moagemCimentoL2TotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $moagemCimentoL2TotalCorretivas = +$moagemCimentoL2TotalCorretivas;
                $moagemCimentoL2TotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $moagemCimentoL2TotalCorretivasFinalizada = +$moagemCimentoL2TotalCorretivasFinalizada;
            }
           
            if ($centroTrabalhoFilter[$i_Corretivas] == 130 or $centroTrabalhoFilter[$i_Corretivas] == 131) {
                $ensacadeiraPaletizadoraL2TotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $ensacadeiraPaletizadoraL2TotalCorretivas = +$ensacadeiraPaletizadoraL2TotalCorretivas;
                $ensacadeiraPaletizadoraL2TotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $ensacadeiraPaletizadoraL2TotalCorretivasFinalizada = +$ensacadeiraPaletizadoraL2TotalCorretivasFinalizada;
            }
            if (
                $centroTrabalhoFilter[$i_Corretivas] == 40 or $centroTrabalhoFilter[$i_Corretivas] == 110
                or $centroTrabalhoFilter[$i_Corretivas] == 43 or $centroTrabalhoFilter[$i_Corretivas] == 56
                or $centroTrabalhoFilter[$i_Corretivas] == 41 or $centroTrabalhoFilter[$i_Corretivas] == 42
                or $centroTrabalhoFilter[$i_Corretivas] == 0
            ) {
                $outrosTotalCorretivas = $totalManutCorretivas[$i_Corretivas];
                $outrosTotalCorretivas = +$outrosTotalCorretivas;
                $outrosTotalCorretivasFinalizada = $totalManutCorretivasFim[$i_Corretivas];
                $outrosTotalCorretivasFinalizada = +$outrosTotalCorretivasFinalizada;
            }
        }
    }
    $i_Corretivas++;
}



// echo '<br>';
// echo '-----------------------------';
// echo '<br>';
// echo  'Combutíveis' . '----' . $combustiveisTotalPrev . ' ----' .  $combustiveisTotalPrevFinalizada . ' ----';
// echo '<br>';
// echo  'Britagem' . '----' . $britagemTotalPrev . ' ----' .  $britagemTotalPrevFinalizada . '----';
// echo '<br>';
// echo  'Pré Homo' . '----' . $preHomoTotalPrev . ' ----' .  $preHomoTotalPrevFinalizada . '----';
// echo '<br>';
// echo  'GALPAO DE MATERIA' . '----' . $galpaoMateriaPrimaTotalPrev . ' ----' .  $galpaoMateriaPrimaTotalPrevFinalizada . '----';
// echo '<br>';
// echo  'Combutíveis' . '----' . $totalManutPrev[16] . ' ----' .  $totalManutPrevFim[16]. ' ----' .  $eficienciaPrv[16];
// echo '<br>';



