<?php
namespace Inovarnaweb\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Silex\ControllerProviderInterface;
use Silex\Application;

use Inovarnaweb\Service\Utils\JsonUtil as JsonUtil;
use Inovarnaweb\Service\CategoriaService as CategoriaService;
use Inovarnaweb\Model\Categoria as Categoria;

class CategoriaController implements ControllerProviderInterface
{	

	public function connect(Application $app) 
	{
    	$factory=$app['controllers_factory'];
 		
		$factory->get('/','Inovarnaweb\Controller\CategoriaController::buscarTodos');				

		$factory->post('/','Inovarnaweb\Controller\CategoriaController::salvar');

		$factory->get('/{id}','Inovarnaweb\Controller\CategoriaController::buscarPorId');

		$factory->put('/{id}','Inovarnaweb\Controller\CategoriaController::alterar');

		$factory->delete('/{id}','Inovarnaweb\Controller\CategoriaController::remover');
		
 		return $factory;
  	} 

	public function salvar(Request $request, Application $app)
	{
		try 
		{
			$json = $request->getContent();
			$data = (array) json_decode($json);		

			$categoria = new Categoria();
			$categoria->setNome($data['nome']);

			$cs = new CategoriaService($app['orm.em']);
			$retorno = $cs->Salvar($categoria);		

		  	return  '{"id": '. $retorno .', "mensagem" = "Cadastro Realizado com sucesso", "type": "success"}';
		} 
		catch (Exception $e) 
		{
			return  '{"mensagem" = "'. $e->getMessage() .'", , "type": "error"}';
		}

		
	}

	public function alterar(Request $request, Application $app, $id) 
	{
		try 
		{
			$json = $request->getContent();
			$data = (array) json_decode($json);
			
			$cs = new CategoriaService($app['orm.em']);

			$categoria = $cs->buscarPorId($id);
			$categoria->setNome($data['nome']);

			$cs->Alterar($categoria);

		  	return '{"mensagem": "Alterado com sucesso", "type": "success"}';	
		} 
		catch (Exception $e) 
		{
			return  '{"mensagem" = "'. $e->getMessage() .'", , "type": "error"}';
		}
		
	}

	public function remover(Request $request, Application $app, $id) 
	{
		try 
		{
			$json = $request->getContent();
			$data = (array) json_decode($json);
			
			$cs = new CategoriaService($app['orm.em']);

			$categoria = $cs->buscarPorId($id);		

			$cs->Remover($categoria);

		  	return '{"mensagem": "Removido com sucesso", "type": "success"}';
		} 
		catch (Exception $e) 
		{
			return  '{"mensagem" = "'. $e->getMessage() .'", , "type": "error"}';
		}

	  	
	}

	public function buscarPorId($id, Application $app) 
	{
		try 
		{
			$cs = new CategoriaService($app['orm.em']);
			$categoria = $cs->buscarPorId($id);
	  		return $app->Json($categoria->toArray());
		} 
		catch (Exception $e) 
		{
			return  '{"mensagem" = "'. $e->getMessage() .'", , "type": "error"}';
		}
		
	}

	public function buscarTodos(Application $app) 
	{	
		try 
		{
			$cs = new CategoriaService($app['orm.em']);
			$retorno = $cs->buscarTodos();		
		  	$json = new JsonUtil();
		  	return $json->listToJson($retorno);	
		} 
		catch (Exception $e) 
		{
			return  '{"mensagem" = "'. $e->getMessage() .'", , "type": "error"}';
		}		
	}	

}

?>