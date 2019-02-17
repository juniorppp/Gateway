<?php

$app->get('/', App\Action\HomeAction::class);
$app->post('/api/v1/change_stage', App\Action\ApiAction::class);



//ACESSAR A FUNCTION teste() DENTRO DE ApiAction.php
//$app->get('/api/v1/{nome}', 'App\Action\ApiAction::teste');

//https://php.docow.com/slim-framework-rotas-e-controladores.html
