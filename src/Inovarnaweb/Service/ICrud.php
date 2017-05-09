<?php
namespace Inovarnaweb\Service;

interface ICrud 
{
	public function Salvar($obj);
	public function Alterar($obj);
	public function Remover($obj);
	public function BuscarPorId($id);
	public function BuscarTodos();
	public function Buscar($query);
}


?>