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
