<?php
require_once ("conexao.class.php");
class noticiasDAO {

    private $not_email;

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(noticias $entnoticias) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO noticias (not_autor, not_email, not_data, not_hora, not_titulo, not_subtitulo, not_texto) VALUES (:not_autor, :not_email, :not_data, :not_hora, :not_titulo, :not_subtitulo, :not_texto)");
            $param = array(
                ":not_autor" => $entnoticias->getNot_autor(),
                ":not_email" => $entnoticias->getNot_email(),
                ":not_data" => date("Y/m/d"),
                ":not_hora" => date("H:i:s"),
                ":not_titulo" => $entnoticias->getNot_titulo(),
                ":not_subtitulo" => $entnoticias->getNot_subtitulo(),
                ":not_texto" => $entnoticias->getNot_texto(),
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 01: {$ex->getMessage()}";
        }
    }

    function consultarCodNoticias($not_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_email = :not_email");
            $param = array(":not_email" => $not_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['not_cod'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 02: {$ex->getMessage()}";
        }
    }

    function consultarEmail($not_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_email = :not_email");
            $param = array(":not_email" => $not_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
    
    function login($not_email, $se_senha) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias INNER JOIN senha ON senha.noticias_not_cod = noticias.not_cod WHERE noticias.not_email = :not_email AND senha.se_senha = :se_senha");
            $param = array(
                ":not_email" => $not_email,
                ":se_senha" => md5($se_senha)
            );
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){

                $this->not_email = $not_email;

                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
        }
    }

    function consultarTiponoticias($not_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT not_tipo FROM noticias WHERE not_email = :not_email");
            $param = array(":not_email" => $not_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['not_tipo'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 05: {$ex->getMessage()}";
        }
    }
#######################################
    function pegarInfos(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_email = :not_email");
            $param = array(":not_email" => $this->not_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 05: {$ex->getMessage()}";
        }
    }
}
?>