<?php

//Vamos precisar contar o MySQL novamente
$host = "localhost";
$user = "root";
$pass = "";
$banco = "portalteste";
$conexao = mysqli_connect($host, $user, $pass, $banco)
or die ("Configuração de Banco de Dados Errada!");

//Agora é realizar a querie de busca no banco de dados

$sql = "SELECT * FROM noticias WHERE ver = 'on' ORDER BY id DESC LIMIT 15";

// Irá selecionar as últimas 15 notícias inseridas

// O curioso aqui, é que ele só irá selecionar os campos onde
// estiver o ver=on, isto foi discutido logo atrás, como um 
// controle de notícias pelo webmaster
// Por padrão o MySQL colocou off, mas o webmaster terá que 
// revisar as notícias e alterar o campo ver para as que quiser validar.

$resultado = mysqli_query($conexao, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

// Agora iremos "pegar" cada campo da notícia
// e organizar no HTML

while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["id"];
$nome = $linha["nome"];
$sobrenome = $linha["sobrenome"];
$cidade = $linha["cidade"];
$estado = $linha["estado"];
$email = $linha["email"];
$data = $linha["data"];
$hora = $linha["hora"];
$titulo = $linha["titulo"];
$subtitulo = $linha["subtitulo"];
$texto = $linha["texto"];
$ver = $linha["ver"];

$novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . "min";

echo "<b>Código da Notícia</b>: $id";
echo "<br>";
echo "Autor: $nome $sobrenome - ($email)";
echo "<br>";
echo "Cidade: $cidade - Estado: $estado";
echo "<br>";
echo "Data: $novadata - Horário: $novahora";
echo "<br>";
echo "Título da Notícia: $titulo";
echo "<br>";
echo "Subtítulo da Notícia: <i> $subtitulo </i>";
echo "<br>";
echo "Notícia: $texto";
echo "<br>";
echo "Validado pelo Webmaster: ";
if ($ver='on') { echo "Sim"; } else { echo "Não"; }
echo "<hr>";

}

?>
