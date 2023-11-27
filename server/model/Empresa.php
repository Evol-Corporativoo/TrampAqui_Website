<?php

class Empresa {
    private $id;
    private $nome;
    private $cnpj;
    private $localSede;
    private $areaAtuacao;
    private $telefone;
    private $cep;
    private $cidade;
    private $uf;
    private $bairro;
    private $logradouro;
    private $numero;
    private $complemento;
    private $idUsuario;

    // Getter e Setter para $cep
    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    // Getter e Setter para $cidade
    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    // Getter e Setter para $uf
    public function getUf() {
        return $this->uf;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    // Getter e Setter para $bairro
    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    // Getter e Setter para $logradouro
    public function getLogradouro() {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    // Getter e Setter para $numero
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    // Getter e Setter para $complemento
    public function getComplemento() {
        return $this->complemento;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    // Getter para $cnpj
    public function getCnpj(){
        return $this->cnpj;
    }

    // Setter para $cnpj
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
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

    // Getter para $localSede
    public function getLocalSede() {
        return $this->localSede;
    }

    // Setter para $localSede
    public function setLocalSede($localSede) {
        $this->localSede = $localSede;
    }

    // Getter para $areaAtuacao
    public function getAreaAtuacao() {
        return $this->areaAtuacao;
    }

    // Setter para $areaAtuacao
    public function setAreaAtuacao($areaAtuacao) {
        $this->areaAtuacao = $areaAtuacao;
    }

    // Getter para $telefone
    public function getTelefone() {
        return $this->telefone;
    }

    // Setter para $telefone
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    // Getter para $idUsuario
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    // Setter para $idUsuario
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
}

?>