<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "portalteste";
$conexao = mysqli_connect($host, $user, $pass, $banco)
or die ("Configuração de Banco de Dados Errada!");
@$id = $_GET['id'];
$sql = "DELETE FROM noticias WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql)
or die ("Não foi possível realizar a exclusão dos dados.");
echo "<h1>A notícia foi excluída com êxito!</h1>";

?>