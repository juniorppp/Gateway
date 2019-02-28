<?php

namespace App\API;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class CadastroAPI
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
	
	private function SalvaChave(array $Parametros ){		
		$SalvaChave = $this->pdo->prepare("insert into chave (serial, validade, status, idcliente, mac_address, qrcode) values (:chave,:validade,:status,:idcliente,:mac,:qrcode)");
		$SalvaChave->execute($Parametros);	
		return $this->pdo->lastInsertId();
	}
	
	private function SalvarBot(){
		
	}

    public function __invoke(Request $request, Response $response, $args)
    {
		//ARMAZENANDO DADOS
		$Chave = $_POST["chave"];
		$Mac = $_POST["mac_address"];
		
		$Complemento = array("data"=>date("Y-m-d"),"status"=>"1");
		$Teste = array_merge($_POST, $Complemento);
		
		unset($Teste['chave']);
		unset($Teste['mac_address']);

		$dados = $this->pdo->prepare("insert into cliente (nome, data_nasc, cpf, email, telefone, senha, status, data_cadastro) values (:nome, :nasc, :cpf, :email, :telefone, :senha, :status, :data)");
		$dados->execute($Teste);
		
		$IDCliente = $this->pdo->lastInsertId();
		
		$ValidadeChave = date('Y-m-d', strtotime("+1 days",strtotime(date("Y-m-d"))));
		$Keys = array("chave"=>$Chave,"validade"=>$ValidadeChave,"status"=>"1","idcliente"=>$IDCliente,"mac"=>$Mac,"qrcode"=>"");
		
		$IDChave = self::SalvaChave($Keys);
		$StatusResposta = $IDChave ? "200" : "400";
		
		$newResponse = $response->withStatus(200)->withJson(['status' => $StatusResposta, "mensagem" => "Usuario cadastrado com sucesso".$IDChave, "validade" => $ValidadeChave, "id"=>$IDCliente, "idchave"=>$IDChave]);
		
		return $newResponse;
			
    }
	
	public function teste($nome1){
		print_r($nome1);
	}
}
