<?php
namespace Inovarnaweb\Service;

abstract class CrudBase implements Icrud
{
	protected $nameEntity;
	protected $entityManager;

	public function __construct($entityManager, $nameEntity)
	{		
		$this->entityManager = $entityManager;
		$this->nameEntity = $nameEntity;
	}	
	
	public function Salvar($obj)
	{
		$this->entityManager->persist($obj);
  		$this->entityManager->flush();
  		return $obj->getId();

	}
	public function Alterar($obj)
	{
		$this->entityManager->persist($obj);
  		$this->entityManager->flush();
	}
	public function Remover($obj)
	{
		$this->entityManager->remove($obj);
  		$this->entityManager->flush();
	}
	public function BuscarPorId($id)
	{
		return $this->entityManager->find( $this->nameEntity , $id);
	}
	public function BuscarTodos()
	{
		return $this->entityManager->createQuery('SELECT u FROM '. $this->nameEntity .' u')->getResult(); 	
	}
	public function Buscar($query)
	{
		return $this->entityManager->createQuery($query)->getArrayResult();  		
	}

}

?>