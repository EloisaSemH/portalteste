<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "portalteste";
$conexao = mysqli_connect($host, $user, $pass, $banco)
or die ("Configuração de Banco de Dados Errada!");

$sql = "SELECT * FROM noticias ORDER BY id DESC";

$resultado = mysqli_query($conexao, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

echo "<table width=740 border=1 cellpadding=1 cellspacing=1>";
echo "<tr>";
echo "<th width=15>ID:</th>";
echo "<th width=100>Nome:</th>";
echo "<th width=100>Sobrenome:</th>";
echo "<th width=100>Cidade:</th>";
echo "<th width=15>UF:</th>";
echo "<th width=100>Email:</th>";
echo "<th width=30>Data:</th>";
echo "<th width=30>Hora:</th>";
echo "<th width=100>Título:</th>";
echo "<th width=50>Disponível?</th>";
echo "<th width=50>Alterar</th>";
echo "<th width=50>Excluir</th>";
echo "</tr>";

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
$ver = $linha["ver"];

$novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . "min";


echo "<tr>";
echo "<th width=15>$id<br></th>";
echo "<th width=100>$nome<br></th>";
echo "<th width=100>$sobrenome<br></th>";
echo "<th width=100>$cidade<br></th>";
echo "<th width=15>$estado<br></th>";
echo "<th width=100>$email<br></th>";
echo "<th width=30>$novadata<br></th>";
echo "<th width=30>$novahora<br></th>";
echo "<th width=100>$titulo<br></th>";
echo "<th width=50>$ver<br></th>";
?>
<th width=50><a href='alterar.php?&id=<?php echo $id ?>'>Alterar</a><br></th>
<th width=50><a href='excluir.php?&id=<?php echo $id ?>'>Excluir</a><br></th>
</tr>
<br>

<?php
}

echo "</table>";

?>
