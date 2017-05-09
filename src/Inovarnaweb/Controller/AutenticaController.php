<?php
namespace Inovarnaweb\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Silex\ControllerProviderInterface;
use Silex\Application;

use Inovarnaweb\Service\Utils\JWT as JWT;
use Inovarnaweb\Service\Utils\Logger as Logger;


class AutenticaController implements ControllerProviderInterface
{
	
  private $token_key = "inovarnaweb-app-teste";

	public function connect(Application $app) 
	{
    	$factory=$app['controllers_factory'];
 		
  		$factory->get('/logout','Inovarnaweb\Controller\AutenticaController::logout');				

  		$factory->post('/','Inovarnaweb\Controller\AutenticaController::login');

  		$factory->post('/check','Inovarnaweb\Controller\AutenticaController::check');								
		
 		 return $factory;
  } 


  public function login(Request $request, Application $app)
  {
  		try 
  		{

  			$json = $request->getContent();
  			$data = (array) json_decode($json);

  			if ($data['username'] == "paulo" && $data["password"] == "123456")
  			{

          $usuario = '{"nome": "paulo", "perfil": 1}';
  				return '{"token": "'. JWT::encode($usuario, $this->token_key) . '"}';
  			}
  			else 
  			{
  				return '{"mensagem": "Usuario ou senha incorreta"}';
  			}

  			

  		} catch (Exception $e) 
  		{
  			$log = new Logger();
  			$log->log($e->getMessage());
  			return '{"mensagem": "Error - '. $e->getMessage() .'"}';
  		}
  }

  public function logout(Request $request, Application $app)
  {
  		try 
  		{
  			$json = $request->getContent();
			$data = (array) json_decode($json);

  		} 
  		catch (Exception $e) 
  		{
  		  	$log = new Logger();
  			$log->log($e->getMessage());

  		  	return '{"mensagem": "Error - '. $e->getMessage() .'"}';
  		}  	
  }

  public function check(Request $request, Application $app)
  {
  		try 
  		{
  			$json = $request->getContent();
			   $data = (array) json_decode($json);

			   return JWT::decode($data['token'], $this->token_key );

  		} 
  		catch (Exception $e) 
  		{
  		  	$log = new Logger();
  			  $log->log($e->getMessage());

  		  	return '{"mensagem": "Error - '. $e->getMessage() .'"}';
  		}  	
  }

}