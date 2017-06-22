<?php

namespace TrilhasInterpretativas\Mediator;

use Exception;
abstract class AbstractMediator {
	// attr
	private $dao;
	public function __construct() {
      
	}
	
	
	abstract public function get($id);
    abstract public  function insert($json);
	abstract public  function update($id, $json);
	abstract public  function delete($id);
}