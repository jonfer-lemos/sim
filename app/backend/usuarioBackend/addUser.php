
    <?php
    include '../conexao.php';
    $email = $_POST['email'];

    //echo $email;
    
    $listaUser = "SELECT COUNT(email_autenticado) AS total FROM emails WHERE email_autenticado = '$email'";
    $consultaListaUser = mysqli_query($conexao, $listaUser);
    $total = mysqli_fetch_array($consultaListaUser);

    //echo $total['total'];

    if ($total['total'] >= 1) {
        echo '<script>alert("Usuário Existente"); history.go(-1)</script> ';
    } else {
        $result_usuario = "INSERT INTO  emails (email_autenticado) VALUES('$email')";
        $con = mysqli_query($conexao, $result_usuario) or die("Erro no envio");

        if (mysqli_affected_rows($conexao) && $con == 1) {

            echo '<script>alert("Usúario adcionado com sucesso!"); history.go(-1)</script> ';
        } else {
            echo '<script>alert("Erro"); history.go(-1)</script> ';
        }
    }
