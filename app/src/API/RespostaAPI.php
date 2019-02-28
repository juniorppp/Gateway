<?php

namespace App\API;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class RespostaAPI
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
		$Respostas = $this->pdo->prepare("SELECT resposta FROM pergunta where status = '1' and idcliente = '".$_POST['idcliente']."' and idchave = '".$_POST['idchave']."'");
		$Respostas->execute();
		
		if($Respostas->rowCount() == 0){
			$mensagem = "Desculpa não entendi a pergunta.";
		}else{
			$linha = $Respostas->fetch();
			$mensagem = $linha['resposta'];
		}
		
		return $newResponse = $response->withJson(["status"=>"200","mensagem"=>$mensagem]);
			
    }
}
