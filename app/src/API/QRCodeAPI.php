<?php

namespace App\API;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class QRCodeAPI
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
		$serial = $this->pdo->query("update chave set qrcode = '".$_POST['qrcode']."' where serial = '".$_POST['chave']."' and idcliente = '".$_POST['idcliente']."'");
		$status = $serial->rowCount() == 0 ? 404 : 200;
		
		return $newResponse = $response->withJson(["status"=>(int) $status]);
			
    }
}
