<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "portalteste";
$conexao = mysqli_connect($host, $user, $pass, $banco)
or die ("Configuração de Banco de Dados Errada!");

$sql = "UPDATE noticias SET id='$id_novo',nome='$nome_novo',sobrenome='$sobrenome_novo',cidade='$cidade_novo',estado='$estado_novo',email='$email_novo',titulo='$titulo_novo',subtitulo='$subtitulo_novo',texto='$texto_novo',ver='$ver_novo' WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql) or die ("Não foi possível realizar a consulta ao banco de dados");
echo "<h1>Notícia alterada com sucesso!</h1>";

?>