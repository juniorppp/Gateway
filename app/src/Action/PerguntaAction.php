<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class PerguntaAction
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
		
        $pergunta = $this->pdo->query("SELECT SQL_CACHE pergunta,resposta,id,status from pergunta");

		/*
		$newResponse = $response->withJson(['usuarios' => $usuarios->fetchAll()]);
		return $newResponse;
*/

        $this->view->render($response, 'pergunta.html', [
            'perguntas' => $pergunta,
			'bot' => array("teste"=>"+55 (12) 98810-1019"),
        ]);
		
        return $response;
		
    }
}
