<?php

$app->get('/', App\Action\HomeAction::class);
$app->get('/pergunta/{id}', App\Action\PerguntaAction::class);
$app->get('/login', App\Action\LoginAction::class);

$app->post('/api/v1/change_stage', App\API\ChangeStageAPI::class);
$app->post('/api/v1/validade_chave', App\API\ValidaChaveAPI::class);
$app->post('/api/v1/cadastro', App\API\CadastroAPI::class);
$app->post('/api/v1/qrcode_scan', App\API\QRCodeAPI::class);
$app->post('/api/v1/resposta', App\API\RespostaAPI::class);

//OPERADORES PERGUSNTA
$app->delete('/api/v1/pergunta/{id:[0-9]+}', 'App\Action\ApiAction::deletar');
$app->post('/api/v1/pergunta', 'App\Action\ApiAction::cadastrar');
$app->put('/api/v1/pergunta', 'App\Action\ApiAction::editar');

$app->post('/modal/qrcode', App\Modal\QRCodeModal::class);


//ACESSAR A FUNCTION teste() DENTRO DE ApiAction.php
//$app->get('/api/v1/{nome}', 'App\Action\ApiAction::teste');

//https://php.docow.com/slim-framework-rotas-e-controladores.html
