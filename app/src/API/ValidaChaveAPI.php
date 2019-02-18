<?php

namespace App\API;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ValidaChaveAPI
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {

		//$dados = $this->pdo->query("update bot set status = '0'");
		//$dados->execute();

		$newResponse = $response->withStatus(200)->withJson(['status' => "200", "mensagem" => "Usuario autenticado", "validade" => "2019-03-11"]);
		return $newResponse;
			
    }
	
	public function teste($nome1){
		print_r($nome1);
	}
}
