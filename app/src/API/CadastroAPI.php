<?php

namespace App\API;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class CadastroAPI
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
		array_push($_POST, array("data"=>"2000-01-01","status"=>"1") );
		unset($_POST['chave']);
		unset($_POST['mac_address']);
		$dados = $this->pdo->query("insert into cliente (nome, data_nasc, cpf, email, telefone, senha, status, data_cadastro) values (:nome, :nasc, :cpf, :email, :telefone, :senha, :status, :data)");
		$dados->execute($_POST);

		$newResponse = $response->withStatus(200)->withJson(['status' => "200", "mensagem" => "Usuario cadastrado com sucesso", "validade" => "2019-03-11"]);
		
		
		return $newResponse;
			
    }
	
	public function teste($nome1){
		print_r($nome1);
	}
}
