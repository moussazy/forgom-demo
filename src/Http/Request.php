<?php

namespace Demo\Http;

class Request
{

	function __construct()
	{
		//Variables servidor
		foreach ($_SERVER as $key => $value) {
			$this->{$this->toCamelCase($key)} = $value;
		}

		//Construccion de variable enviadas por el form method POST
		foreach ($_POST as $key => $value) {
			$this->{$key} = $value;
		}
	}


	private function toCamelCase($string)
	{
		$result = strtolower($string);

		preg_match_all('/_[a-z]/', $result, $matches);

		foreach ($matches[0] as $match) {
			$c = str_replace('_', '', strtoupper($match));
			$result = str_replace($match, $c, $result);
		}

		return $result;
	}
}
