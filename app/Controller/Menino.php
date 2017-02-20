<?php
namespace App\Controller;

class Menino
{

    public function mensagem($nome)
    {
        return "Seha bem vindo ao meu sistema ". $nome;
    }

    public function somarValores($valor1, $valor2)
    {
    	return $valor1 + $valor2;
    }
}