<?php

namespace App\Modal;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class QRCodeModal
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
		$serial = $this->pdo->query("select qrcode from chave where serial = '".$_POST['chave']."' and idcliente = '".$_POST['idcliente']."'");
		$linha = $serial->fetch();
		return $newResponse = $response->withJson(["status"=>"200","qrcode"=>$linha['qrcode']]);
			
    }

}
