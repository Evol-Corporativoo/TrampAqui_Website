<?php

class Usuario {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $acesso;

    
    // Getter para $cpf
    public function getCpf(){
        return $this->cpf;
    }

    // Setter para $cpf
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    // Getter para $id
    public function getId() {
        return $this->id;
    }

    // Setter para $id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter para $nome
    public function getNome() {
        return $this->nome;
    }

    // Setter para $nome
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Getter para $email
    public function getEmail() {
        return $this->email;
    }

    // Setter para $email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter para $senha
    public function getSenha() {
        return $this->senha;
    }

    // Setter para $senha
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    // Getter para $acesso
    public function getAcesso() {
        return $this->acesso;
    }

    // Setter para $acesso
    public function setAcesso($acesso) {
        $this->acesso = $acesso;
    }
}

?>