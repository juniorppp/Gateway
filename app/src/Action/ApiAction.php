<?php

namespace App\Action;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ApiAction
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {

		$dados = $this->pdo->query("update bot set status = '0'");
		$dados->execute();
		
		$newResponse = $response->withJson(['usuarios' => "Atualizado com sucesso."]);
		return $newResponse;
		

        
		
    }
	
	public function teste($nome1){
		print_r($nome1);
	}
}
