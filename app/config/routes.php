<?php

$app->get('/', App\Action\HomeAction::class);
$app->post('/api/v1/change_stage', App\API\ChangeStageAPI::class);
$app->get('/api/v1/validade_chave', App\API\ValidaChaveAPI::class);

//ACESSAR A FUNCTION teste() DENTRO DE ApiAction.php
//$app->get('/api/v1/{nome}', 'App\Action\ApiAction::teste');

//https://php.docow.com/slim-framework-rotas-e-controladores.html
