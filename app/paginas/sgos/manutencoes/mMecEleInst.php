<?php

include '../app/backend/homeBackend/sgosBackend/manutencoesEfici.php';

?>



<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $manutencaoNome ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><?php echo $eficienciaManutencao; ?>%</a></li>
                    <li class="breadcrumb-item active"><?php echo date('M-Y', strtotime($x)); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-6">
        <div class="card bg-gradient-navy" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
            <div class="card-header">
                <h3 class="card-title">PLANO (PRV)</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Área</th>
                            <th scope="col">Geradas</th>
                            <th scope="col">Baixadas</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Combustíveis L1'; ?></td>
                        <td><?php echo $combustiveisTotalPrev; ?></td>
                        <td><?php echo $combustiveisTotalPrevFinalizada; ?></td>
                        <?php
                        if ($combustiveisTotalPrev == 0 or $combustiveisTotalPrevFinalizada == 0) {
                            $combustiveisPrev = 0;
                        } else {
                            $combustiveisPrev = number_format(($combustiveisTotalPrevFinalizada * 100) / $combustiveisTotalPrev);
                        }
                        ?>
                        <td><?php echo $combustiveisPrev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Britagem'; ?></td>
                        <td><?php echo $britagemTotalPrev; ?></td>
                        <td><?php echo $britagemTotalPrevFinalizada; ?></td>
                        <?php
                        if ($britagemTotalPrev == 0 or $britagemTotalPrevFinalizada == 0) {
                            $britagemPrev = 0;
                        } else {
                            $britagemPrev = number_format(($britagemTotalPrevFinalizada * 100) / $britagemTotalPrev);
                        }
                        ?>
                        <td><?php echo $britagemPrev; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Pré Homo'; ?></td>
                        <td><?php echo $preHomoTotalPrev; ?></td>
                        <td><?php echo $preHomoTotalPrevFinalizada; ?></td>
                        <?php
                        if ($preHomoTotalPrev == 0 or $preHomoTotalPrevFinalizada == 0) {
                            $preHomoPrev = 0;
                        } else {
                            $preHomoPrev = number_format(($preHomoTotalPrevFinalizada * 100) / $preHomoTotalPrev);
                        }
                        ?>
                        <td><?php echo $preHomoPrev; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Galpão'; ?></td>
                        <td><?php echo $galpaoMateriaPrimaTotalPrev; ?></td>
                        <td><?php echo $galpaoMateriaPrimaTotalPrevFinalizada; ?></td>
                        <?php
                        if ($galpaoMateriaPrimaTotalPrev == 0 or $galpaoMateriaPrimaTotalPrevFinalizada == 0) {
                            $galpaoPrev = 0;
                        } else {
                            $galpaoPrev = number_format(($galpaoMateriaPrimaTotalPrevFinalizada * 100) / $galpaoMateriaPrimaTotalPrev);
                        }
                        ?>
                        <td><?php echo $galpaoPrev; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cru L1'; ?></td>
                        <td><?php echo $moagemCruTotalPrev; ?></td>
                        <td><?php echo $moagemCruTotalPrevFinalizada; ?></td>
                        <?php
                        if ($moagemCruTotalPrev == 0 or $moagemCruTotalPrevFinalizada == 0) {
                            $moagemCruPrev = 0;
                        } else {
                            $moagemCruPrev  = number_format(($moagemCruTotalPrevFinalizada * 100) / $moagemCruTotalPrev);
                        }
                        ?>
                        <td><?php echo $moagemCruPrev; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Clinquerização L1'; ?></td>
                        <td><?php echo $cliquerizacaoTotalPrev; ?></td>
                        <td><?php echo $cliquerizacaoTotalPrevFinalizada; ?></td>
                        <?php
                        if ($cliquerizacaoTotalPrev == 0 or $cliquerizacaoTotalPrevFinalizada == 0) {
                            $clinquerizacaoPrev = 0;
                        } else {
                            $clinquerizacaoPrev = number_format(($cliquerizacaoTotalPrevFinalizada * 100) / $cliquerizacaoTotalPrev);
                        }
                        ?>
                        <td><?php echo $clinquerizacaoPrev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cimento L1'; ?></td>
                        <td><?php echo $moagemCimentoTotalPrev; ?></td>
                        <td><?php echo $moagemCimentoTotalPrevFinalizada; ?></td>
                        <?php
                        if ($moagemCimentoTotalPrev == 0 or $moagemCimentoTotalPrevFinalizada == 0) {
                            $moagemCimentoPrev = 0;
                        } else {
                            $moagemCimentoPrev = number_format(($moagemCimentoTotalPrevFinalizada * 100) / $moagemCimentoTotalPrev);
                        }
                        ?>
                        <td><?php echo $moagemCimentoPrev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Silo 2/17 Mil'; ?></td>
                        <td><?php echo $silo2_17_MilPrev; ?></td>
                        <td><?php echo $silo2_17_MilPrevFinalizada; ?></td>
                        <?php
                        if ($silo2_17_MilPrev == 0 or $silo2_17_MilPrevFinalizada == 0) {
                            $silo2_17_Mil = 0;
                        } else {
                            $silo2_17_Mil = number_format(($silo2_17_MilPrevFinalizada * 100) / $silo2_17_MilPrev);
                        }
                        ?>
                        <td><?php echo $silo2_17_Mil ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Ensac/Palet. L1'; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraTotalPrev; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraTotalPrevFinalizada; ?></td>
                        <?php
                        if ($ensacadeiraPaletizadoraTotalPrev == 0 or $ensacadeiraPaletizadoraTotalPrevFinalizada == 0) {
                            $ensacPaletizadoraPrev = 0;
                        } else {
                            $ensacPaletizadoraPrev = number_format(($ensacadeiraPaletizadoraTotalPrevFinalizada * 100) / $ensacadeiraPaletizadoraTotalPrev);
                        }
                        ?>
                        <td><?php echo $ensacPaletizadoraPrev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cru L2'; ?></td>
                        <td><?php echo $moagemCruL2TotalPrev; ?></td>
                        <td><?php echo $moagemCruL2TotalPrevFinalizada; ?></td>
                        <?php
                        if ($moagemCruL2TotalPrev == 0 or $moagemCruL2TotalPrevFinalizada == 0) {
                            $moagemCruL1Prev = 0;
                        } else {
                            $moagemCruL1Prev  = number_format(($moagemCruL2TotalPrevFinalizada * 100) / $moagemCruL2TotalPrev);
                        }
                        ?>
                        <td><?php echo $moagemCruL1Prev; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Combustíveis L2'; ?></td>
                        <td><?php echo $combustiveisL2TotalPrev; ?></td>
                        <td><?php echo $combustiveisL2TotalPrevFinalizada; ?></td>
                        <?php
                        if ($combustiveisL2TotalPrev == 0 or $combustiveisL2TotalPrevFinalizada == 0) {
                            $combustiveisL2Prev = 0;
                        } else {
                            $combustiveisL2Prev = number_format(($combustiveisL2TotalPrevFinalizada * 100) / $combustiveisL2TotalPrev);
                        }
                        ?>
                        <td><?php echo $combustiveisL2Prev ?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Clinquerização L2'; ?></td>
                        <td><?php echo $cliquerizacaoL2TotalPrev; ?></td>
                        <td><?php echo $cliquerizacaoL2TotalPrevFinalizada; ?></td>
                        <?php
                        if ($cliquerizacaoL2TotalPrev == 0 or $cliquerizacaoL2TotalPrevFinalizada == 0) {
                            $clinquerizacaoL2Prev = 0;
                        } else {
                            $clinquerizacaoL2Prev = number_format(($cliquerizacaoL2TotalPrevFinalizada * 100) / $cliquerizacaoL2TotalPrev);
                        }
                        ?>
                        <td><?php echo $clinquerizacaoL2Prev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cimento L2'; ?></td>
                        <td><?php echo $moagemCimentoL2TotalPrev; ?></td>
                        <td><?php echo $moagemCimentoL2TotalPrevFinalizada; ?></td>
                        <?php
                        if ($moagemCimentoL2TotalPrev == 0 or $moagemCimentoL2TotalPrevFinalizada == 0) {
                            $moagemCimentoL2Prev = 0;
                        } else {
                            $moagemCimentoL2Prev = number_format(($moagemCimentoL2TotalPrevFinalizada * 100) / $moagemCimentoL2TotalPrev);
                        }
                        ?>
                        <td><?php echo $moagemCimentoL2Prev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Ensac/Palet. L2'; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraL2TotalPrev; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraL2TotalPrevFinalizada; ?></td>
                        <?php
                        if ($ensacadeiraPaletizadoraL2TotalPrev == 0 or $ensacadeiraPaletizadoraL2TotalPrevFinalizada == 0) {
                            $ensacPaletizadoraL2Prev = 0;
                        } else {
                            $ensacPaletizadoraL2Prev = number_format(($ensacadeiraPaletizadoraL2TotalPrevFinalizada * 100) / $ensacadeiraPaletizadoraL2TotalPrev);
                        }
                        ?>
                        <td><?php echo $ensacPaletizadoraL2Prev ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Outros'; ?></td>
                        <td><?php echo $outrosTotalPrev; ?></td>
                        <td><?php echo $outrosTotalPrevFinalizada; ?></td>
                        <?php
                        if ($outrosTotalPrev == 0 or $outrosTotalPrevFinalizada == 0) {
                            $outrosPrev = 0;
                        } else {
                            $outrosPrev = number_format(($outrosTotalPrevFinalizada * 100) / $outrosTotalPrev);
                        }
                        ?>
                        <td><?php echo $outrosPrev ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- /.card -->
    </div>

    <div class="col-md-6">
        <div class="card bg-gradient-gray-dark" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
            <div class="card-header">
                <h3 class="card-title">Corretivas (COP+COR)</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Área</th>
                            <th scope="col">Geradas</th>
                            <th scope="col">Baixadas</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Combustíveis L1'; ?></td>
                        <td><?php echo $combustiveisTotalCorretivas; ?></td>
                        <td><?php echo $combustiveisTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($combustiveisTotalCorretivas == 0 or $combustiveisTotalCorretivasFinalizada == 0) {
                            $combustiveisCorretivas = 0;
                        } else {
                            $combustiveisCorretivas = number_format(($combustiveisTotalCorretivasFinalizada * 100) / $combustiveisTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $combustiveisCorretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Britagem'; ?></td>
                        <td><?php echo $britagemTotalCorretivas; ?></td>
                        <td><?php echo $britagemTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($britagemTotalCorretivas == 0 or $britagemTotalCorretivasFinalizada == 0) {
                            $britagemCorretivas = 0;
                        } else {
                            $britagemCorretivas = number_format(($britagemTotalCorretivasFinalizada * 100) / $britagemTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $britagemCorretivas; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Pré Homo'; ?></td>
                        <td><?php echo $preHomoTotalCorretivas; ?></td>
                        <td><?php echo $preHomoTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($preHomoTotalCorretivas == 0 or $preHomoTotalCorretivasFinalizada == 0) {
                            $preHomoCorretivas = 0;
                        } else {
                            $preHomoCorretivas = number_format(($preHomoTotalCorretivasFinalizada * 100) / $preHomoTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $preHomoCorretivas; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Galpão'; ?></td>
                        <td><?php echo $galpaoMateriaPrimaTotalCorretivas; ?></td>
                        <td><?php echo $galpaoMateriaPrimaTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($galpaoMateriaPrimaTotalCorretivas == 0 or $galpaoMateriaPrimaTotalCorretivasFinalizada == 0) {
                            $galpaoCorretivas = 0;
                        } else {
                            $galpaoCorretivas = number_format(($galpaoMateriaPrimaTotalCorretivasFinalizada * 100) / $galpaoMateriaPrimaTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $galpaoCorretivas; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cru L1'; ?></td>
                        <td><?php echo $moagemCruTotalCorretivas; ?></td>
                        <td><?php echo $moagemCruTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($moagemCruTotalCorretivas == 0 or $moagemCruTotalCorretivasFinalizada == 0) {
                            $moagemCruCorretivas = 0;
                        } else {
                            $moagemCruCorretivas  = number_format(($moagemCruTotalCorretivasFinalizada * 100) / $moagemCruTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $moagemCruCorretivas; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Clinquerização L1'; ?></td>
                        <td><?php echo $cliquerizacaoTotalCorretivas; ?></td>
                        <td><?php echo $cliquerizacaoTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($cliquerizacaoTotalCorretivas == 0 or $cliquerizacaoTotalCorretivasFinalizada == 0) {
                            $clinquerizacaoCorretivas = 0;
                        } else {
                            $clinquerizacaoCorretivas = number_format(($cliquerizacaoTotalCorretivasFinalizada * 100) / $cliquerizacaoTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $clinquerizacaoCorretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cimento L1'; ?></td>
                        <td><?php echo $moagemCimentoTotalCorretivas; ?></td>
                        <td><?php echo $moagemCimentoTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($moagemCimentoTotalCorretivas == 0 or $moagemCimentoTotalCorretivasFinalizada == 0) {
                            $moagemCimentoCorretivas = 0;
                        } else {
                            $moagemCimentoCorretivas = number_format(($moagemCimentoTotalCorretivasFinalizada * 100) / $moagemCimentoTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $moagemCimentoCorretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Silo 2/17 Mil'; ?></td>
                        <td><?php echo $silo2_17_MilCorretivas; ?></td>
                        <td><?php echo $silo2_17_MilCorretivasFinalizada; ?></td>
                        <?php
                        if ($silo2_17_MilCorretivas == 0 or $silo2_17_MilCorretivasFinalizada == 0) {
                            $silo2_17_Mil = 0;
                        } else {
                            $silo2_17_Mil = number_format(($silo2_17_MilCorretivasFinalizada * 100) / $silo2_17_MilCorretivas);
                        }
                        ?>
                        <td><?php echo $silo2_17_Mil ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Ensac/Palet. L1'; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraTotalCorretivas; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($ensacadeiraPaletizadoraTotalCorretivas == 0 or $ensacadeiraPaletizadoraTotalCorretivasFinalizada == 0) {
                            $ensacPaletizadoraCorretivas = 0;
                        } else {
                            $ensacPaletizadoraCorretivas = number_format(($ensacadeiraPaletizadoraTotalCorretivasFinalizada * 100) / $ensacadeiraPaletizadoraTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $ensacPaletizadoraCorretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cru L2'; ?></td>
                        <td><?php echo $moagemCruL2TotalCorretivas; ?></td>
                        <td><?php echo $moagemCruL2TotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($moagemCruL2TotalCorretivas == 0 or $moagemCruL2TotalCorretivasFinalizada == 0) {
                            $moagemCruL1Corretivas = 0;
                        } else {
                            $moagemCruL1Corretivas  = number_format(($moagemCruL2TotalCorretivasFinalizada * 100) / $moagemCruL2TotalCorretivas);
                        }
                        ?>
                        <td><?php echo $moagemCruL1Corretivas; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Combustíveis L2'; ?></td>
                        <td><?php echo $combustiveisL2TotalCorretivas; ?></td>
                        <td><?php echo $combustiveisL2TotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($combustiveisL2TotalCorretivas == 0 or $combustiveisL2TotalCorretivasFinalizada == 0) {
                            $combustiveisL2Corretivas = 0;
                        } else {
                            $combustiveisL2Corretivas = number_format(($combustiveisL2TotalCorretivasFinalizada * 100) / $combustiveisL2TotalCorretivas);
                        }
                        ?>
                        <td><?php echo $combustiveisL2Corretivas ?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Clinquerização L2'; ?></td>
                        <td><?php echo $cliquerizacaoL2TotalCorretivas; ?></td>
                        <td><?php echo $cliquerizacaoL2TotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($cliquerizacaoL2TotalCorretivas == 0 or $cliquerizacaoL2TotalCorretivasFinalizada == 0) {
                            $clinquerizacaoL2Corretivas = 0;
                        } else {
                            $clinquerizacaoL2Corretivas = number_format(($cliquerizacaoL2TotalCorretivasFinalizada * 100) / $cliquerizacaoL2TotalCorretivas);
                        }
                        ?>
                        <td><?php echo $clinquerizacaoL2Corretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'M. Cimento L2'; ?></td>
                        <td><?php echo $moagemCimentoL2TotalCorretivas; ?></td>
                        <td><?php echo $moagemCimentoL2TotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($moagemCimentoL2TotalCorretivas == 0 or $moagemCimentoL2TotalCorretivasFinalizada == 0) {
                            $moagemCimentoL2Corretivas = 0;
                        } else {
                            $moagemCimentoL2Corretivas = number_format(($moagemCimentoL2TotalCorretivasFinalizada * 100) / $moagemCimentoL2TotalCorretivas);
                        }
                        ?>
                        <td><?php echo $moagemCimentoL2Corretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Ensac/Palet. L2'; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraL2TotalCorretivas; ?></td>
                        <td><?php echo $ensacadeiraPaletizadoraL2TotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($ensacadeiraPaletizadoraL2TotalCorretivas == 0 or $ensacadeiraPaletizadoraL2TotalCorretivasFinalizada == 0) {
                            $ensacPaletizadoraL2Corretivas = 0;
                        } else {
                            $ensacPaletizadoraL2Corretivas = number_format(($ensacadeiraPaletizadoraL2TotalCorretivasFinalizada * 100) / $ensacadeiraPaletizadoraL2TotalCorretivas);
                        }
                        ?>
                        <td><?php echo $ensacPaletizadoraL2Corretivas ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo 'Outros'; ?></td>
                        <td><?php echo $outrosTotalCorretivas; ?></td>
                        <td><?php echo $outrosTotalCorretivasFinalizada; ?></td>
                        <?php
                        if ($outrosTotalCorretivas == 0 or $outrosTotalCorretivasFinalizada == 0) {
                            $outrosCorretivas = 0;
                        } else {
                            $outrosCorretivas = number_format(($outrosTotalCorretivasFinalizada * 100) / $outrosTotalCorretivas);
                        }
                        ?>
                        <td><?php echo $outrosCorretivas ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>

    <div class="col-md-12">
        <div class="card card-navy card-outline">
            <div class="card-header">
                <h3 class="card-title">PREVENTIVAS</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="chartPrev" height="400" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                            <h5 class="description-header"></h5>
                            <span class="description-text"></span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-12">
        <div class="card card-gray-dark card-outline">
            <div class="card-header">
                <h3 class="card-title">CORRETIVAS</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="chartCorretivas" height="400" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>





<script>
    var ctx = document.getElementById('chartPrev');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Combustíveis L1', 'Britagem', 'Pré Homo', 'Galpão', 'M. Cru L1', 'Clinquerização L1', 'M. Cimento L1',
                'Silo 2/17 Mil', 'Ensac/Palet. L1', 'M. Cru L2', 'Combustíveis L2', 'Clinquerização L2', 'M. Cimento L2', 'Ensac/Palet. L2',
                'Outros'
            ],
            datasets: [{
                    label: '',
                    backgroundColor: 'rgba(37, 159, 255, 0.37)',
                    borderColor: 'rgba(37, 159, 255, 0.37)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo $combustiveisTotalPrev ?>,
                        <?php echo $britagemTotalPrev ?>,
                        <?php echo $preHomoTotalPrev ?>,
                        <?php echo $galpaoMateriaPrimaTotalPrev ?>,
                        <?php echo $moagemCruTotalPrev ?>,
                        <?php echo $cliquerizacaoTotalPrev ?>,
                        <?php echo $moagemCimentoTotalPrev ?>,
                        <?php echo $silo2_17_MilPrev ?>,
                        <?php echo $ensacadeiraPaletizadoraTotalPrev ?>,
                        <?php echo $moagemCruL2TotalPrev ?>,
                        <?php echo $combustiveisL2TotalPrev ?>,
                        <?php echo $cliquerizacaoL2TotalPrev ?>,
                        <?php echo $moagemCimentoL2TotalPrev ?>,
                        <?php echo $ensacadeiraPaletizadoraL2TotalPrev ?>,
                        <?php echo $outrosTotalPrev ?>

                    ]
                },


            ]
        },

        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<script>
    var ctx = document.getElementById('chartCorretivas');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Combustíveis L1', 'Britagem', 'Pré Homo', 'Galpão', 'M. Cru L1', 'Clinquerização L1', 'M. Cimento L1',
                'Silo 2/17 Mil', 'Ensac/Palet. L1', 'M. Cru L2', 'Combustíveis L2', 'Clinquerização L2', 'M. Cimento L2', 'Ensac/Palet. L2',
                'Outros'
            ],
            datasets: [{
                    label: '',
                    backgroundColor: 'rgba(255, 0, 0, 0.44)',
                    borderColor: 'rgba(255, 0, 0, 0.44)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo $combustiveisTotalCorretivas ?>,
                        <?php echo $britagemTotalCorretivas ?>,
                        <?php echo $preHomoTotalCorretivas ?>,
                        <?php echo $galpaoMateriaPrimaTotalCorretivas ?>,
                        <?php echo $moagemCruTotalCorretivas ?>,
                        <?php echo $cliquerizacaoTotalCorretivas ?>,
                        <?php echo $moagemCimentoTotalCorretivas ?>,
                        <?php echo $silo2_17_MilCorretivas ?>,
                        <?php echo $ensacadeiraPaletizadoraTotalCorretivas ?>,
                        <?php echo $moagemCruL2TotalCorretivas ?>,
                        <?php echo $combustiveisL2TotalCorretivas ?>,
                        <?php echo $cliquerizacaoL2TotalCorretivas ?>,
                        <?php echo $moagemCimentoL2TotalCorretivas ?>,
                        <?php echo $ensacadeiraPaletizadoraL2TotalCorretivas ?>,
                        <?php echo $outrosTotalCorretivas ?>

                    ]
                },


            ]
        },

        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>