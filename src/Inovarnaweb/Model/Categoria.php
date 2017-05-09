<?php
namespace Inovarnaweb\Model;
/**
 * 
 * @Entity
 * @Table(name="Categoria")
 */
class Categoria extends EntityBase
{
	/**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
	protected $id;

	/**
     * @Column(type="string", name="nome")
     */
	protected $nome;

	public function getId()
	{
	    return $this->id;
	}
	
	public function getNome()
	{
	    return $this->nome;
	}
	
	public function setNome($nome)
	{
	    return $this->nome = $nome;
	}	

}


?>