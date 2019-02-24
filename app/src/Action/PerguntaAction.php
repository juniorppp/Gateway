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
		
        $pergunta = $this->pdo->query("SELECT pergunta,resposta,id,status from pergunta where idchave = '".$args['id']."'");
		//$bot = $this->pdo->query("select MASK(bot_numero,'+## ## #####-####') as numero from bot where idchave = '".$args['id']."'");

		/*
		$newResponse = $response->withJson(['usuarios' => $usuarios->fetchAll()]);
		return $newResponse;
*/

        $this->view->render($response, 'pergunta.html', [
            'perguntas' => $pergunta,
			'bots' => array("numero"=>"55555555555"),
        ]);
		
        return $response;
		
    }
}
