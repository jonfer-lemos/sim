<?php

// processa para banco de dados mysql
include_once '../conexao.php';
///aaa
$dados = $_FILES['arquivo'];
var_dump($dados);

if (!empty($_FILES['arquivo']['tmp_name'])) {
	$arquivo = new DomDocument();
	$arquivo->load($_FILES['arquivo']['tmp_name']);
	//var_dump($arquivo);

	$linhas = $arquivo->getElementsByTagName("Row");
	//var_dump($linhas);

	$primeira_linha = true;
	



	foreach ($linhas as $linha) {
		if ($primeira_linha == false) {
			
			$ordem_serv = $linha->getElementsByTagname("Data")->item(0)->nodeValue;
			echo  '<br>' . 'O.S:' . $ordem_serv . '<hr>';
			$plano_manut = $linha->getElementsByTagname("Data")->item(1)->nodeValue;
			$bem = $linha->getElementsByTagname("Data")->item(2)->nodeValue;
			$nome_do_bem = $linha->getElementsByTagname("Data")->item(3)->nodeValue;
			$servico = $linha->getElementsByTagname("Data")->item(5)->nodeValue;
			$nome_servico = $linha->getElementsByTagname("Data")->item(4)->nodeValue;
			$dt_original = $linha->getElementsByTagname("Data")->item(5)->nodeValue;
			$tipo_manut = $linha->getElementsByTagname("Data")->item(6)->nodeValue;
			$sequencia = $linha->getElementsByTagname("Data")->item(7)->nodeValue;
			$area_manut = $linha->getElementsByTagname("Data")->item(8)->nodeValue;
			$centro_custo = $linha->getElementsByTagname("Data")->item(9)->nodeValue;				
			$situacao = $linha->getElementsByTagname("Data")->item(10)->nodeValue;
			$termino = $linha->getElementsByTagname("Data")->item(11)->nodeValue;
			$usuario_alt = $linha->getElementsByTagname("Data")->item(12)->nodeValue;
			$centro_trab = $linha->getElementsByTagname("Data")->item(13)->nodeValue;


			$result_file = "INSERT INTO `stj` (ordem_serv, plano_manut, bem, nome_do_bem, servico, 
												nome_servico, dt_original, tipo_manut, sequencia,
			 									area_manut, centro_custo, situacao, termino, usuario_alt, centro_trab)																													
										VALUES(
												'$ordem_serv',
												'$plano_manut',
												'$bem',
												'$nome_do_bem',
												'$servico',
												'$nome_servico',
												'$dt_original',												
												'$tipo_manut',
												'$sequencia',
												'$area_manut',
												'$centro_custo',												
												'$situacao',
                                                '$termino',
                                                '$usuario_alt',                                               
                                                '$centro_trab')";


			$resultado_file = mysqli_query($conexao, $result_file);
			if (!$resultado_file) {
				printf("Error: %s\n", mysqli_error($conexao));
				exit();
			}
		}

		$primeira_linha = false;
	}
}

// if (!$resultado_file) {
// 	printf("Error: %s\n", mysqli_error($conexao));
// 	exit();}


if (mysqli_affected_rows($conexao) && $resultado_file == 1) {


	echo '<script>alert("Dados incluido com sucesso!"); history.go(-1)</script> ';
	//header('Location: http://localhost/dashboard/SIM/app/index.php?pag=usuarios'); // voltar para pagina

} else {
	
	echo '<script>alert("Erro ao enviar dados!"); history.go(-1)</script> ';

}

//STR_TO_DATE(`$prev_inicio_dt`, '%d/%m/%Y'),	
//$result_file = "INSERT INTO stj (filial, ordem_serv, plano_manut, bem, nome_do_bem, servico, nome_servico, dt_original, tipo_manut, sequencia, area_manut, centro_custo, contador, custo_m_d_o, custo_troca, custo_mater, custo_subst, custo_terc, ult_man, cont_man, prev_inicio_dt, prev_inicio_h, prev_fim_dt, prev_fim_h, real_inicio_dt, real_inicio_h, real_fim_dt, real_fim_h, p_in_man_dt, p_in_man_h, p_fim_man_dt, p_fim_man_h, r_in_man_dt, r_in_man_h, r_fim_man_dt, r_fim_man_h, situacaoo, termino, usuario_alt, prioridade, centro_trab, tipo_retorno, contador_2, pos_cont, ordem_pai, bem_pai, substit_os, tipo_os, hora_cont_1, hora_cont_2, sol_serviço, cod_irreg, terceiro, quant_repr, motivo_repr, custo_ferr, os_orig) VALUES ('$filial','$ordem_serv','$plano_manut','$bem','$nome_do_bem','$servico','$nome_servico','$dt_original','$tipo_manut','$sequencia','$area_manut','$centro_custo','$contador','$custo_m_d_o','$custo_troca','$custo_mater','$custo_subst','$custo_terc','$ult_man','$cont_man','$prev_inicio_dt','$prev_inicio_h','$prev_fim_dt','$prev_fim_h','$real_inicio_dt','$real_inicio_h','$real_fim_dt','$real_fim_h','$p_in_man_dt','$p_in_man_h','$p_fim_man_dt','$p_fim_man_h','$r_in_man_dt','$r_in_man_h','$r_fim_man_dt','$r_fim_man_h','$situacaoo','$termino','$usuario_alt','$prioridade','$centro_trab','$tipo_retorno','$contador_2','$pos_cont','$ordem_pai','$bem_pai','$substit_os','$tipo_os','$hora_cont_1','$hora_cont_2','$sol_serviço','$cod_irreg','$terceiro','$quant_repr','$motivo_repr','$custo_ferr','$os_orig')";
//$result_file = "INSERT INTO stj (filial, ordem_serv, plano_manut, bem) VALUES ('$filial','$ordem_serv','$plano_manut','$bem')";




//Processa para Manco de dados MariaDB
//include_once("../conexao.php");
	// include_once '../conexao.php';

	// $dados = $_FILES['arquivo'];
	// var_dump($dados);

	// if (!empty($_FILES['arquivo']['tmp_name'])) {
	// 	$arquivo = new DomDocument();
	// 	$arquivo->load($_FILES['arquivo']['tmp_name']);
	// 	//var_dump($arquivo);

	// 	$linhas = $arquivo->getElementsByTagName("Row");
	// 	//var_dump($linhas);

	// 	$primeira_linha = true;

						

	// 	foreach ($linhas as $linha) {
	// 		if ($primeira_linha == false) {
	// 			//getElementsByTagname
	// 			$filial = $linha->getElementsByTagName("Data")->item(0)->nodeValue;

				
	// 			$ordem_serv = $linha->getElementsByTagname("Data")->item(1)->nodeValue;
	// 			echo  '<br>'. 'O.S:' . $ordem_serv .'<hr>';

	// 			$plano_manut = $linha->getElementsByTagname("Data")->item(2)->nodeValue;


	// 			$bem = $linha->getElementsByTagname("Data")->item(3)->nodeValue;
				

	// 			$nome_do_bem = $linha->getElementsByTagname("Data")->item(4)->nodeValue;

	// 			$servico = $linha->getElementsByTagname("Data")->item(5)->nodeValue;

	// 			$nome_servico = $linha->getElementsByTagname("Data")->item(6)->nodeValue;
	// 			$dt_original = $linha->getElementsByTagname("Data")->item(7)->nodeValue;
	// 			$tipo_manut = $linha->getElementsByTagname("Data")->item(8)->nodeValue;
	// 			$sequencia = $linha->getElementsByTagname("Data")->item(9)->nodeValue;
	// 			$area_manut = $linha->getElementsByTagname("Data")->item(10)->nodeValue;
	// 			$centro_custo = $linha->getElementsByTagname("Data")->item(11)->nodeValue;
	// 			$contador = $linha->getElementsByTagname("Data")->item(12)->nodeValue;
	// 			$custo_m_d_o = $linha->getElementsByTagname("Data")->item(13)->nodeValue;
	// 			$custo_troca = $linha->getElementsByTagname("Data")->item(14)->nodeValue;
	// 			$custo_mater = $linha->getElementsByTagname("Data")->item(15)->nodeValue;
	// 			$custo_subst = $linha->getElementsByTagname("Data")->item(16)->nodeValue;
	// 			$custo_terc = $linha->getElementsByTagname("Data")->item(17)->nodeValue;
	// 			$ult_man = $linha->getElementsByTagname("Data")->item(18)->nodeValue;
	// 			$cont_man = $linha->getElementsByTagname("Data")->item(19)->nodeValue;
	// 			$prev_inicio_dt = $linha->getElementsByTagname("Data")->item(20)->nodeValue;
	// 			$prev_inicio_h = $linha->getElementsByTagname("Data")->item(21)->nodeValue;
	// 			$prev_fim_dt = $linha->getElementsByTagname("Data")->item(22)->nodeValue;
	// 			$prev_fim_h = $linha->getElementsByTagname("Data")->item(23)->nodeValue;
	// 			$real_inicio_dt = $linha->getElementsByTagname("Data")->item(24)->nodeValue;
	// 			$real_inicio_h = $linha->getElementsByTagname("Data")->item(25)->nodeValue;
	// 			$real_fim_dt = $linha->getElementsByTagname("Data")->item(26)->nodeValue;
	// 			$real_fim_h = $linha->getElementsByTagname("Data")->item(27)->nodeValue;
	// 			$p_in_man_dt = $linha->getElementsByTagname("Data")->item(28)->nodeValue;
	// 			$p_in_man_h = $linha->getElementsByTagname("Data")->item(29)->nodeValue;
	// 			$p_fim_man_dt = $linha->getElementsByTagname("Data")->item(30)->nodeValue;
	// 			$p_fim_man_h = $linha->getElementsByTagname("Data")->item(31)->nodeValue;
	// 			$r_in_man_dt = $linha->getElementsByTagname("Data")->item(32)->nodeValue;
	// 			$r_in_man_h = $linha->getElementsByTagname("Data")->item(33)->nodeValue;
	// 			$r_fim_man_dt = $linha->getElementsByTagname("Data")->item(34)->nodeValue;
	// 			$r_fim_man_h = $linha->getElementsByTagname("Data")->item(35)->nodeValue;
	// 			$situacaoo = $linha->getElementsByTagname("Data")->item(36)->nodeValue;
	// 			$termino = $linha->getElementsByTagname("Data")->item(37)->nodeValue;
	// 			$usuario_alt = $linha->getElementsByTagname("Data")->item(38)->nodeValue;
	// 			$prioridade = $linha->getElementsByTagname("Data")->item(39)->nodeValue;
	// 			$centro_trab = $linha->getElementsByTagname("Data")->item(40)->nodeValue;
	// 			$tipo_retorno = $linha->getElementsByTagname("Data")->item(41)->nodeValue;
	// 			$contador_2 = $linha->getElementsByTagname("Data")->item(42)->nodeValue;
	// 			$pos_cont = $linha->getElementsByTagname("Data")->item(43)->nodeValue;
	// 			$ordem_pai = $linha->getElementsByTagname("Data")->item(44)->nodeValue;
	// 			$bem_pai = $linha->getElementsByTagname("Data")->item(45)->nodeValue;
	// 			//$substit_os = $linha->getElementsByTagname("Data")->item(46)->nodeValue;
	// 			//$tipo_os = $linha->getElementsByTagname("Data")->item(47)->nodeValue;
	// 			// $hora_cont_1 = $linha->getElementsByTagname("Data")->item(48)->nodeValue;
	// 			// $hora_cont_2 = $linha->getElementsByTagname("Data")->item(49)->nodeValue;
	// 			// $sol_serviço = $linha->getElementsByTagname("Data")->item(50)->nodeValue;
	// 			// $cod_irreg = $linha->getElementsByTagname("Data")->item(51)->nodeValue;
	// 			// $terceiro = $linha->getElementsByTagname("Data")->item(52)->nodeValue;
	// 			// $quant_repr = $linha->getElementsByTagname("Data")->item(53)->nodeValue;
	// 			// $motivo_repr = $linha->getElementsByTagname("Data")->item(54)->nodeValue;
	// 			// $custo_ferr = $linha->getElementsByTagname("Data")->item(55)->nodeValue;
	// 			// $os_orig = $linha->getElementsByTagname("Data")->item(56)->nodeValue;

							
						
	// 			//$result_file = "INSERT INTO `stj` (`filial`, `ordem_serv`, `plano_manut`, `bem`, `nome_do_bem`, `servico`, `nome_servico`, `dt_original`, `tipo_manut`, `sequencia`, `area_manut`, `centro_custo`, `contador`, `custo_m_d_o`, `custo_troca`, `custo_mater`, `custo_subst`, `custo_terc`, `ult_man`, `cont_man`, `prev_inicio_dt`, `prev_inicio_h`, `prev_fim_dt`, `prev_fim_h`, `real_inicio_dt`, `real_inicio_h`, `real_fim_dt`, `real_fim_h`, `p_in_man_dt`, `p_in_man_h`, `p_fim_man_dt`, `p_fim_man_h`, `r_in_man_dt`, `r_in_man_h`, `r_fim_man_dt`, `r_fim_man_h`, `situacaoo`, `termino`, `usuario_alt`, `prioridade`, `centro_trab`, `tipo_retorno`, `contador_2`, `pos_cont`, `ordem_pai`, `bem_pai`, `substit_os`, `tipo_os`, `hora_cont_1`, `hora_cont_2`, `sol_servico`, `cod_irreg`, `terceiro`, `quant_repr`, `motivo_repr`, `custo_ferr`, `os_orig`)
	// 			//Inserir
	// 			// $result_file = "INSERT INTO `stj`
	// 			// 							(filial,
	// 			// 							ordem_serv, 
	// 			// 							plano_manut, 
	// 			// 							bem,
	// 			// 							nome_do_bem,
	// 			// 							servico,
	// 			// 							nome_servico,
	// 			// 							dt_original, 
	// 			// 							tipo_manut, 
	// 			// 							sequencia, 
	// 			// 							area_manut, 
	// 			// 							centro_custo, 
	// 			// 							contador,
	// 			// 							custo_m_d_o,
	// 			//                             custo_troca, 
	// 			//                             custo_mater,
	// 			// 							custo_subst, 
	// 			//                             custo_terc, 
	// 			//                             ult_man,
	// 			// 							cont_man,
	// 			// 							prev_inicio_dt, 
	// 			//                             prev_inicio_h, 
	// 			//                             prev_fim_dt,
	// 			//                             prev_fim_h,
	// 			// 							   real_inicio_dt,
	// 			//                             real_inicio_h, 
	// 			//                             real_fim_dt, 
	// 			//                             real_fim_h, 
	// 			//                             p_in_man_dt, 
	// 			//                             p_in_man_h,
	// 			//                             p_fim_man_dt, 
	// 			//                             p_fim_man_h, 
	// 			//                             r_in_man_dt, 
	// 			//                             r_in_man_h, 
	// 			//                             r_fim_man_dt, 
	// 			//                             r_fim_man_h,
	// 			// 							   situacaoo, 
	// 			//                             termino, 
	// 			//                             usuario_alt, 
	// 			//                             prioridade, 
	// 			//                             centro_trab, 
	// 			//                             tipo_retorno, 
	// 			//                             contador_2, 
	// 			//                             pos_cont, 
	// 			//                             ordem_pai, 
	// 			//                             bem_pai)
	// $result_file = "INSERT INTO `stj` (filial, ordem_serv, plano_manut, bem, nome_do_bem, servico, nome_servico, dt_original, tipo_manut, sequencia, area_manut, centro_custo, contador, custo_m_d_o, custo_troca, custo_mater, custo_subst, custo_terc, ult_man, cont_man, prev_inicio_dt, prev_inicio_h, prev_fim_dt, prev_fim_h, real_inicio_dt, real_inicio_h, real_fim_dt, real_fim_h, p_in_man_dt, p_in_man_h, p_fim_man_dt, p_fim_man_h, r_in_man_dt, r_in_man_h, r_fim_man_dt, r_fim_man_h, situacaoo, termino, usuario_alt, prioridade, centro_trab, tipo_retorno, contador_2, pos_cont, ordem_pai, bem_pai)																													
	// 										VALUES( '$filial',
	// 												'$ordem_serv',
	// 												'$plano_manut',
	// 												'$bem',
	// 												'$nome_do_bem',
	// 												'$servico',
	// 												'$nome_servico',
	// 												'$dt_original',
	// 												'$tipo_manut',
	// 												'$sequencia',
	// 												'$area_manut',
	// 												'$centro_custo',
	// 												'$contador',
	// 												'$custo_m_d_o',
	// 												'$custo_troca',
	// 												'$custo_mater',
	// 												'$custo_subst',
	// 												'$custo_terc',
	// 												'$ult_man',
	// 												'$cont_man',
	// 												'$prev_inicio_dt',
	// 												'$prev_inicio_h',
	// 												'$prev_fim_dt',
	// 												'$prev_fim_h',
	// 												'$real_inicio_dt',
	// 												'$real_inicio_h',
	// 												'$real_fim_dt',
	// 												'$real_fim_h',
	// 												'$p_in_man_dt',
	// 												'$p_in_man_h',
	// 												'$p_fim_man_dt',
	// 												'$p_fim_man_h',
	// 												'$r_in_man_dt',
	// 												'$r_in_man_h',
	// 												'$r_fim_man_dt',
	// 												'$r_fim_man_h',
	// 												'$situacaoo',
	// 												'$termino',
	// 												'$usuario_alt',
	// 												'$prioridade',
	// 												'$centro_trab',
	// 												'$tipo_retorno',
	// 												'$contador_2',
	// 												'$pos_cont',
	// 												'$ordem_pai',
	// 												'$bem_pai')";																																																																						
													

	// 			$resultado_file = mysqli_query($conexao, $result_file);
	// 			if (!$resultado_file) {
	// 				printf("Error: %s\n", mysqli_error($conexao));
	// 				exit();
	// 			}
				
	// 		}
			
	// 		$primeira_linha = false;
	// 	}
	// }

	// if (mysqli_affected_rows($conexao) && $resultado_file == 1) {
		

	// 	echo '<script>alert("Dados incluido com sucesso!"); history.go(-1)</script> ';
	// 	//header('Location: http://localhost/dashboard/SIM/app/index.php?pag=usuarios'); // voltar para pagina

	// } else {

	// 	echo '<script>alert("Erro ao enviar dados!"); history.go(-1)</script> ';
		
	// }


	// //$result_file = "INSERT INTO stj (filial, ordem_serv, plano_manut, bem, nome_do_bem, servico, nome_servico, dt_original, tipo_manut, sequencia, area_manut, centro_custo, contador, custo_m_d_o, custo_troca, custo_mater, custo_subst, custo_terc, ult_man, cont_man, prev_inicio_dt, prev_inicio_h, prev_fim_dt, prev_fim_h, real_inicio_dt, real_inicio_h, real_fim_dt, real_fim_h, p_in_man_dt, p_in_man_h, p_fim_man_dt, p_fim_man_h, r_in_man_dt, r_in_man_h, r_fim_man_dt, r_fim_man_h, situacaoo, termino, usuario_alt, prioridade, centro_trab, tipo_retorno, contador_2, pos_cont, ordem_pai, bem_pai, substit_os, tipo_os, hora_cont_1, hora_cont_2, sol_serviço, cod_irreg, terceiro, quant_repr, motivo_repr, custo_ferr, os_orig) VALUES ('$filial','$ordem_serv','$plano_manut','$bem','$nome_do_bem','$servico','$nome_servico','$dt_original','$tipo_manut','$sequencia','$area_manut','$centro_custo','$contador','$custo_m_d_o','$custo_troca','$custo_mater','$custo_subst','$custo_terc','$ult_man','$cont_man','$prev_inicio_dt','$prev_inicio_h','$prev_fim_dt','$prev_fim_h','$real_inicio_dt','$real_inicio_h','$real_fim_dt','$real_fim_h','$p_in_man_dt','$p_in_man_h','$p_fim_man_dt','$p_fim_man_h','$r_in_man_dt','$r_in_man_h','$r_fim_man_dt','$r_fim_man_h','$situacaoo','$termino','$usuario_alt','$prioridade','$centro_trab','$tipo_retorno','$contador_2','$pos_cont','$ordem_pai','$bem_pai','$substit_os','$tipo_os','$hora_cont_1','$hora_cont_2','$sol_serviço','$cod_irreg','$terceiro','$quant_repr','$motivo_repr','$custo_ferr','$os_orig')";

	// //$result_file = "INSERT INTO stj (filial, ordem_serv, plano_manut, bem) VALUES ('$filial','$ordem_serv','$plano_manut','$bem')";



	// 										// substit_os, 
	// 										// tipo_os, 
	// 										// hora_cont_1, 
	// 										// hora_cont_2, 
	// 										// sol_serviço, 
	// 										// cod_irreg, 
	// 										// terceiro, 
	// 										// quant_repr, 
	// 										// motivo_repr, 
	// 										// custo_ferr, 
	// 										// os_orig			
	// 											// 		   '$substit_os',
	// 											//         '$tipo_os',
	// 											//         '$hora_cont_1',
	// 											//         '$hora_cont_2',
	// 											//         '$sol_serviço',
	// 											//         '$cod_irreg',
	// 											//         '$terceiro',
	// 											//         '$quant_repr',
	// 											//         '$motivo_repr',
	// 											//         '$custo_ferr',
	// 											//         '$os_orig',		
