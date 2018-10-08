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
Email: <i>(Exemplo: feitosac@yahoo.com)</i><input name='email' type='text' size=30><br><br>
Título do Texto:<input name='titulo' type='text' size=30> *<br>
Subtítulo do Texto:<textarea name='subtitulo' rows=5 cols=30></textarea><br>
Texto:<textarea name='texto' rows=10 cols=30></textarea> *<br>
<input name='data' type='hidden' value='<?php echo $data ?>'><input name='hora' type='hidden' value='<?php echo $hora ?>'>
<input type='submit' value='Enviar notícia' name="enviar">
</form>
<br><hr>
<i>Campos marcados com <b>*</b> são obrigatórios no cadastro.<br>
<b>Observação</b>: Será inserido no seu cadastro a data atual, bem como a hora atual do cadastro<br>
Data: $novadata - Hora: $novahora<br>

<?php
if (isset($_POST["enviar"])) {
    $usuario->setUs_nome($_POST["usNome"]);
    $usuario->setUs_email($_POST["usEmail"]);
    $usuario->setUs_sexo($_POST["slSexo"]);
    if (!$usuarioDAO->consultarEmail($_POST['usEmail'])) {
        if ($usuarioDAO->cadastrar($usuario)) {
            $codUsu = $usuarioDAO->consultarCodUsuario($_POST['usEmail']);
            $senha->setSe_senha($_POST['usSenhaRep']);
            $senha->setUs_cod($codUsu);
            if ($senhaDAO->cadastrar($senha)) {
                ?>
                <script type="text/javascript">
                    alert("Cadastrado com sucesso!");
                    document.location.href = "index.php?&pg=login";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Erro ao cadastrar");
                </script>
                <?php
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("O E-mail informado jรก foi cadastrado");
        </script>
        <?php
    }
}
?>