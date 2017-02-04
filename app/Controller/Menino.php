<?php
namespace App\Controller;

class Menino
{

    public function mensagem($nome)
    {
        return "Seha bem vindo ao meu sistema ". $nome;
    }
}