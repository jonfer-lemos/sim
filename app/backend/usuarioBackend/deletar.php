
<?php
   include '../conexao.php';

    $id = $_POST['id_user'];
    $nome = $_POST['nome']; 
    

   $result_usuario = ("DELETE FROM usuarios WHERE id='$id' ");
   $con = mysqli_query($conexao, $result_usuario) or die ("Erro no envio");
    

    if(mysqli_affected_rows($conexao) && $con == 1 ){
       
        
        echo '<script>alert("Usúario: '.$nome.' deletado com sucesso!"); history.go(-2)</script> ';
        //header('Location: http://localhost/dashboard/SIM/app/index.php?pag=usuarios'); // voltar para pagina

    }else{

        echo '<script>alert("Usúario: '.$nome.' não alterado!"); history.go(-1)</script> ';

    
    }

    
