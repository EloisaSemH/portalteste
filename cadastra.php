<?php
//Setando a linguagem e localização
setlocale(LC_ALL, 'pt_BR');
//Setando a localização do fuso horário
date_default_timezone_set('America/Sao_Paulo');

$data = date("Y-m-d");
$hora = date("H:i:s");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . "min";
?>
<h1>Sistema de Cadastro de Notícias</h1>
<hr><br>
<form  method='post'>
Nome:<input name='nome' type='text' size=30> *<br>
Sobrenome:<input name='sobrenome' type='text' size=30> *<br>
Cidade:<input name='cidade' type='text' size=30> *<br>
Estado:<i>(Exemplo: SP, RS, BA)</i><input name='estado' type='text' size=5> *<br>
Email: <i>(Exemplo: feitosac@yahoo.com)</i><input name='email' type='text' size=30><br><br>
Título do Texto:<input name='titulo' type='text' size=30> *<br>
Subtítulo do Texto:<textarea name='subtitulo' rows=5 cols=30></textarea><br>
Texto:<textarea name='texto' rows=10 cols=30></textarea> *<br>
<input name='data' type='hidden' value='<?php echo $data ?>'><input name='hora' type='hidden' value='<?php echo $hora ?>'>
<input type='submit' value='Cadastrar' name="cadastrar">
</form>
<br><hr>
<i>Campos marcados com <b>*</b> são obrigatórios no cadastro.<br>
<b>Observação</b>: Será inserido no seu cadastro a data atual, bem como a hora atual do cadastro<br>
Data: $novadata - Hora: $novahora<br>

<?php

//Vamos definir as variáveis de data e hora
//para inserção no banco de dados

//Agora com as variáveis de data e hora criadas
//vamos criar uma variável especial para a querie sql

if(filter_input(INPUT_POST, 'cadastrar' )){
    extract(filter_input_array(INPUT_POST, FILTER_DEFAULT), EXTR_OVERWRITE);
$sql = "INSERT INTO noticias (nome, sobrenome, cidade, estado, email, data, hora, titulo, subtitulo, texto) VALUES ('$nome', '$sobrenome', '$cidade', '$estado', '$email', '$data', '$hora', '$titulo', '$subtitulo', '$texto')";

//Agora é hora de contatar o mysql
            $host = "localhost";
            $user = "root";
            $pass = "";
            $banco = "portalteste";
$conexao = mysqli_connect($host, $user, $pass, $banco)
or die ("Configuração de Banco de Dados Errada!");

//Inserindo os dados

$sql = mysqli_query($conexao, $sql) 
or die ("Houve erro na gravação dos dados, por favor, clique em voltar e verifique os campos obrigatórios!" . mysqli_error($conexao));

echo "<h1>Cadastro efetuado com sucesso!</h1>";
}
?>