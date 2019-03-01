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
		$serial = $this->pdo->query("select validade from chave where serial = '".$_POST['chave']."' and idcliente = '".$_POST['idcliente']."'");
		if($serial->rowCount() == 0){
			// Não existe a chave
			$newResponse = $response->withJson(["status"=>"200","mensagem"=>"","validade"=>"2019-02-28"]);
		}else{
			$linha = $serial->fetch();
			$newResponse = $response->withJson(["status"=>"200","mensagem"=>"","validade"=>$linha['validade']]);
		}

		return $newResponse;
			
    }
	
	public function teste($nome1){
		print_r($nome1);
	}
}
