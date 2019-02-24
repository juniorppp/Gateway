<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LoginAction
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
        
        $this->view->render($response, 'login.html', [
			'dados' => array("NomeSistema"=>"Gateway Whatsapp","Tema"=>"red"),
        ]);
		
        return $response;
		
    }
}
