<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "portalteste";
$conexao = mysqli_connect($host, $user, $pass, $banco)
or die ("Configuração de Banco de Dados Errada!");

@$id = $_GET['id'];

$sql = "SELECT * FROM noticias WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

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

echo "<h1>Alterar Cadastro...</h1>";
echo "<hr><br>";
echo "<form method='post'>";
echo "Código da Notícia: <input name='id_novo' type='text' value='$id' size=20><br>";
echo "Data: $novadata<br>";
echo "Hora: $novahora<br>";
echo "Nome:<input name='nome_novo' type='text' value='$nome' size=30> *<br>";
echo "Sobrenome:<input name='sobrenome_novo' type='text' value='$sobrenome' size=30> *<br>";
echo "Cidade:<input name='cidade_novo' type='text' value='$cidade' size=30> *<br>";
echo "Estado:<i>(Exemplo: SP, RS, BA)</i><input name='estado_novo' type='text' 
value='$estado' size=5> *<br>";
echo "Email: <i>(Exemplo: feitosac@yahoo.com)</i><input name='email_novo' type='text' 
value='$email' size=30><br><br>";
echo "Título do Texto:<input name='titulo_novo' type='text' value='$titulo' size=30> *<br>";
echo "Subtítulo do Texto:<textarea name='subtitulo_novo' rows=5 cols=30>$subtitulo</textarea><br>";
echo "Texto:<textarea name='texto_novo' rows=10 cols=30>$texto</textarea> *<br>";
echo "Disponibilizar? (on ou off): <input name='ver_novo' type='text' value='$ver' size=5><br>";
echo "<input type='submit' value='Alterar' name='alterar'>";
echo "</form>";
echo "<br><hr>";
}

if(filter_input(INPUT_POST, 'alterar' )){
    extract(filter_input_array(INPUT_POST, FILTER_DEFAULT), EXTR_OVERWRITE);
    $sql = "UPDATE noticias SET id='$id_novo',nome='$nome_novo',sobrenome='$sobrenome_novo'
,cidade='$cidade_novo',estado='$estado_novo',email='$email_novo',titulo='$titulo_novo'
,subtitulo='$subtitulo_novo',texto='$texto_novo',ver='$ver_novo' WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
echo "<h1>Notícia alterada com sucesso!</h1>";
}

?>
