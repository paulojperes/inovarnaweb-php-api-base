<?php
namespace Inovarnaweb\Service;

class CategoriaService extends CrudBase implements ICrud
{
	public function __construct($entityManager)
	{		
		parent::__construct($entityManager, 'Inovarnaweb\Model\Categoria');
	}
}

?>