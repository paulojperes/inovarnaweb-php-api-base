<?php
namespace Inovarnaweb\Service\Utils;

/**
* 
*/
class JsonUtil
{
	
	public function listToJson($lista)
	{
		$retorno = "[";
		$i = 0;

		foreach ($lista as $objeto) {
			if ($i == 0)
			{
				$retorno .= json_encode( $objeto->toArray() );
			}
			else 
			{
				$retorno .= ", " . json_encode( $objeto->toArray() );	
			}
			$i++;	
		}

		$retorno .= "]";

		return $retorno;

	}
}