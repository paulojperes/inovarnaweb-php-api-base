<?php
require_once __DIR__.'/vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//iniciando o contexto da application 
$app = new Application();

//ativando o debug
$app['debug'] = true;

//incluindo as configurações padrões
$config = require_once __DIR__ . '/config/config.php';

//testando se houve erro no config
if (!$config) {
    throw new \Exception("Error Processing Config", 1);
}

//configurações dos providers
require_once __DIR__ . '/config/providers.php';

//configurações das rotas
require_once __DIR__ . '/config/routes.php';

