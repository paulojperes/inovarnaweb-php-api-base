<?php
return array(
	'swiftmailer.options' => array(
	    'host' => 'smtp.gmail.com',
	    'port' => '465',
	    'username' => 'xxxx@gmail.com',
	    'password' => '',
	    'encryption' => 'ssl',
	    'auth_mode' => 'login'
	),
	'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'user' => 'root',
        'password' => '',
        'dbname' => 'doctrinedb',
        'cache' => 'array' // array, apc, xcache...
    ),
    'bitly' => array( //usado para compartilhar. o /share é obrigatório
    	'url' => 'http://server/share/',
    	'token' => 'TOKEN'
    )
);
