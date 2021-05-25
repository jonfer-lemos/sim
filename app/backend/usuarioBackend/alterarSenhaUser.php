<?php
   include '../conexao.php';

    $id = $_POST['id_user'];
    //$novaSenha = $_POST['novaSenha']; 
    $novaSenha = password_hash($_POST['novaSenha'], PASSWORD_DEFAULT);
   

   $result_usuario = ("UPDATE usuarios SET senha='$novaSenha' WHERE id='$id'");
   $con = mysqli_query($conexao, $result_usuario) or die ("Erro no envio");
    
  


    if(mysqli_affected_rows($conexao) && $con == 1 ){
       
        
       echo '<script>alert("atulizado com sucesso!"); history.go(-2)</script> ';
        //header('Location: http://localhost/dashboard/SIM/app/index.php?pag=usuarios'); // voltar para pagina

    }else{

        echo '<script>alert("não alterado!"); history.go(-1)</script> ';

    
    }