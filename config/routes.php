<?php


//rotas
$app->get('/', function(){ 	

	return "Inicio"; 

});
//padrão de autenticação
$app->mount('/autentica', new Inovarnaweb\Controller\AutenticaController());

$app->mount('/categorias', new Inovarnaweb\Controller\CategoriaController());

