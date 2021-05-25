<?php

   include '../conexao.php';

    $userId = $_POST['user'];
    $nav = $_POST['nav'];

   $result_usuario = ("UPDATE usuarios SET nav='$nav' WHERE id='$userId'");
   $con = mysqli_query($conexao, $result_usuario) or die ("Erro no envio");
    
  


    if(mysqli_affected_rows($conexao) && $con == 1 ){
       
        
        echo '<script>alert("atulizado com sucesso!"); history.go(-1)</script> ';
        //header('Location: http://localhost/dashboard/SIM/app/index.php?pag=usuarios'); // voltar para pagina

    }else{

       echo '<script>alert("não alterado!"); history.go(-1)</script> ';

    
    }

    
