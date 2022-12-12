<?php

namespace App;

use src\Request;

class Controller 
{
	public $request;
 
    public function __construct()
    {
        $this->request = new Request;
    }
 
    public function view($arquivo, $array = null)
    {
        if (!is_null($array)) {
            foreach ($array as $var => $value) {
                ${$var} = $value;
            }
        }

		$filename = '../views/' . $arquivo . '.php';

        ob_start();
        include "{$filename}";
        ob_flush();
    }
}
