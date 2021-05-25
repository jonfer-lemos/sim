<?php 

$userId = $_SESSION['id'];

$sidePesq = "SELECT DISTINCT side FROM usuarios AS side WHERE id=$userId";
$sideSql = mysqli_query($conexao, $sidePesq);
while ($linha = mysqli_fetch_array($sideSql)) 
{
    $side = $linha['side'];
}


$navPesq = "SELECT DISTINCT nav FROM usuarios AS nav WHERE id=$userId";
$navSql = mysqli_query($conexao, $navPesq);
while ($linha = mysqli_fetch_array($navSql)) 
{
    $nav = $linha['nav'];
}





?>