
<?php
   include '../conexao.php';

    $mes = $_POST['mes'];
  
    

   $result_mes = "DELETE FROM stj  WHERE dt_original LIKE '%$mes%'";
   $con = mysqli_query($conexao, $result_mes) or die ("Erro no envio");
    

    if(mysqli_affected_rows($conexao) && $con == 1 ){
       
        
        echo '<script>alert("Dados: '.$mes.' deletado com sucesso!"); history.go(-2)</script> ';
        //header('Location: http://localhost/dashboard/SIM/app/index.php?pag=usuarios'); // voltar para pagina

    }else{

        echo '<script>alert("Dados: '.$mes.' não Deletados!"); history.go(-1)</script> ';

    
    }

    
