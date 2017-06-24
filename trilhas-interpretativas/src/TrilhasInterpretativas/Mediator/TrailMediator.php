<?php

namespace TrilhasInterpretativas\Mediator;

use TrilhasInterpretativas\Mediator\PointMediator;
use TrilhasInterpretativas\Entity\Trail;
use TrilhasInterpretativas\Entity\Point;
use Exception;

class TrailMediator {
	
	private  $pointMediator;
	
	public function __construct() {
      $this->pointMediator =  new PointMediator();
	}
	
	
	 public function get($id){
	      $trail = new Trail(0,"Trilha dois Irmãos","Seja bem vindo");
	      
	      $trail->setPoints($this->pointMediator->get());
	      
	     
	     
	    return $trail;
	 }
     public  function insert($json){}
	 public  function update($id, $json){}
	 public  function delete($id){}
}