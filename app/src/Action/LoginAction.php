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
/*
	public function Conectar(Request $request, Response $response, $args){
		print_r($this->view);
		$serial = $this->pdo->query("select * from cliente");
		if($serial->rowCount() == 0){
			$newResponse = $response->withJson(["status"=>"404","mensagem"=>"Usúario ou senha não encontrado na base de dados."]);
			$_SESSION['nome'] = "junior";
			$_SESSION['email'] = "junior.ppp@gmail.com";
			$this->view->getEnvironment()->addGlobal('usuario', $_SESSION);
			
		}else{
			$newResponse = $response->withJson(["status"=>"200","mensagem"=>"Conectando ao painel..."]);
		}

			return $newResponse;
		
	}
	*/
}
