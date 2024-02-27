<?php

require_once 'DB.php';

abstract class User extends DB{
    
    protected $tabela;
    public $nome;
    public $email;
            
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }







}
