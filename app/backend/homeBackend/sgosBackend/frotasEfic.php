<?php
include '../app/backend/homeBackend/homePainel.php';

//echo $x;



$manutencaoNome = 'Frotas';
$eficienciaManutencao = $frotas;


//Frotas
            $frotasMecTotal = "SELECT COUNT(nome_servico) AS mec_frotas_total FROM stj 
                                WHERE nome_servico LIKE'%FROTAS%'
                                AND nome_servico LIKE'%MECANICA%'
                                AND nome_servico LIKE'%PREVENTIVA%'
                                AND dt_original LIKE '%$x%'
                                AND situacao = 'Liberado'";
            $consultaFrotasMecPreventiva = mysqli_query($conexao, $frotasMecTotal);
            $totalOsFrotasMecPreventivaGeradas = mysqli_fetch_array($consultaFrotasMecPreventiva);
            $frotasMecGeradas = number_format($totalOsFrotasMecPreventivaGeradas['mec_frotas_total']);



            $frotasMecTotalFinalizadas = "SELECT COUNT(nome_servico) AS mec_frotas_total_Finalizadas FROM stj 
                                            WHERE nome_servico LIKE'%FROTAS%'
                                            AND nome_servico LIKE'%MECANICA%'
                                            AND nome_servico LIKE'%PREVENTIVA%'
                                            AND dt_original LIKE '%$x%'
                                            AND situacao = 'Liberado'
                                            AND termino = 'Sim'";
            $consultaFrotasMecFinalizadas = mysqli_query($conexao, $frotasMecTotalFinalizadas);
            $totalOsFrotasEleGeradasFinalizadas = mysqli_fetch_array($consultaFrotasMecFinalizadas);
            $frotasMecGeradasFinalizadas = number_format($totalOsFrotasEleGeradasFinalizadas['mec_frotas_total_Finalizadas']);


            $frotasLubTotal = "SELECT COUNT(nome_servico) AS lub_frotas_total FROM stj 
                                WHERE nome_servico LIKE'%FROTAS%'
                                AND nome_servico LIKE'%LUBRIFICACAO%'
                                AND dt_original LIKE '%$x%'
                                AND  situacao = 'Liberado'";
            $consultaFrotasLubPreventiva = mysqli_query($conexao, $frotasLubTotal);
            $totalOsFrotasLubPreventivaGeradas = mysqli_fetch_array($consultaFrotasLubPreventiva);
            $frotasLubGeradas = number_format($totalOsFrotasLubPreventivaGeradas['lub_frotas_total']);



            $frotasLubTotalFinalizadas = "SELECT COUNT(nome_servico) AS lub_frotas_total_Finalizadas FROM stj 
                                            WHERE nome_servico LIKE'%FROTAS%'
                                            AND nome_servico LIKE'%LUBRIFICACAO%'
                                            AND dt_original LIKE '%$x%'
                                            AND situacao = 'Liberado'
                                            AND termino = 'Sim'";
            $consultaFrotasLubFinalizadas = mysqli_query($conexao, $frotasLubTotalFinalizadas);
            $totalOsFrotasEleGeradasFinalizadas = mysqli_fetch_array($consultaFrotasLubFinalizadas);
            $frotasLubGeradasFinalizadas = number_format($totalOsFrotasEleGeradasFinalizadas['lub_frotas_total_Finalizadas']);

           
            $frotasCorretivasTotal = "SELECT COUNT(nome_servico) AS corretivas_frotas_total FROM stj 
                                        WHERE nome_servico LIKE'%FROTAS%'
                                        AND nome_servico LIKE'%CORRETIVA%'
                                        AND dt_original LIKE '%$x%'
                                        AND  situacao = 'Liberado'";
            $consultaFrotasCorretivas = mysqli_query($conexao, $frotasCorretivasTotal);
            $totalOsFrotasCorretivasGeradas = mysqli_fetch_array($consultaFrotasCorretivas);
            $frotasCorretivasGeradas = number_format($totalOsFrotasCorretivasGeradas['corretivas_frotas_total']);



            $frotasCorretivasTotalFinalizadas = "SELECT COUNT(nome_servico) AS corretivas_frotas_total_Finalizadas FROM stj 
                                                    WHERE nome_servico LIKE'%FROTAS%'
                                                    AND nome_servico LIKE'%CORRETIVA%'
                                                    AND dt_original LIKE '%$x%'
                                                    AND situacao = 'Liberado'
                                                    AND termino = 'Sim'";
            $consultaFrotasMecFinalizadas = mysqli_query($conexao, $frotasCorretivasTotalFinalizadas);
            $totalOsFrotasEleGeradasFinalizadas = mysqli_fetch_array($consultaFrotasMecFinalizadas);
            $frotasCorretivasGeradasFinalizadas = number_format($totalOsFrotasEleGeradasFinalizadas['corretivas_frotas_total_Finalizadas']);