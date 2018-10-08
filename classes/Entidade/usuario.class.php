<?php
#Criação da classe usuário
class noticias {
    //Criação dos atributos (variávies)
    private $not_cod;
    private $not_autor;
    private $not_email;
    private $not_data;
    private $not_hora;
    private $not_titulo;
    private $not_subtitulo;
    private $not_texto;
    private $not_ativo;

    
    function getNot_cod() {
        return $this->not_cod;
    }

    function getNot_autor() {
        return $this->not_autor;
    }

    function getNot_email() {
        return $this->not_email;
    }

    function getNot_data() {
        return $this->not_data;
    }

    function getNot_hora() {
        return $this->not_hora;
    }

    function getNot_titulo() {
        return $this->not_titulo;
    }

    function getNot_subtitulo() {
        return $this->not_subtitulo;
    }

    function getNot_texto() {
        return $this->not_texto;
    }

    function getNot_ativo() {
        return $this->not_ativo;
    }

    function setNot_cod($not_cod) {
        $this->not_cod = $not_cod;
    }

    function setNot_autor($not_autor) {
        $this->not_autor = $not_autor;
    }

    function setNot_email($not_email) {
        $this->not_email = $not_email;
    }

    function setNot_data($not_data) {
        $this->not_data = $not_data;
    }

    function setNot_hora($not_hora) {
        $this->not_hora = $not_hora;
    }

    function setNot_titulo($not_titulo) {
        $this->not_titulo = $not_titulo;
    }

    function setNot_subtitulo($not_subtitulo) {
        $this->not_subtitulo = $not_subtitulo;
    }

    function setNot_texto($not_texto) {
        $this->not_texto = $not_texto;
    }

    function setNot_ativo($not_ativo) {
        $this->not_ativo = $not_ativo;
    }


}