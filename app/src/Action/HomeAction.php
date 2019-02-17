<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeAction
{
    private $view;
    private $logger;
    private $pdo;

    public function __construct(LoggerInterface $logger, Twig $view, \PDO $pdo)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->pdo = $pdo;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $bot = $this->pdo->query("SELECT SQL_CACHE MASK(b.bot_numero,'+## ## #####-####') as bot_numero,b.status,c.validade,c.serial FROM bot b inner join chave c on b.idchave=c.id where b.idcliente = '1'");
		$dados = $this->pdo->query("SELECT * FROM cliente where id = '1'");
		/*
		$newResponse = $response->withJson(['usuarios' => $usuarios->fetchAll()]);
		return $newResponse;
*/
        $this->view->render($response, 'home.html', [
            'bots' => $bot,
			'dados' => $dados,
        ]);
		
        return $response;
		
    }
}
