<?php
namespace Inovarnaweb\Model;

/**
* 
*/
abstract class EntityBase
{
	
	public function toArray() {
        return get_object_vars($this);
    }
}
