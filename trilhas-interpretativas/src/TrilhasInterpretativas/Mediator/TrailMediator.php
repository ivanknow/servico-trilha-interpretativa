<?php

namespace TrilhasInterpretativas\Mediator;

use TrilhasInterpretativas\Mediator\PointMediator;
use TrilhasInterpretativas\Entity\Trail;
use TrilhasInterpretativas\DAO\TrailDAO;
use TrilhasInterpretativas\Entity\Point;
use Exception;

class TrailMediator extends AbstractMediator{

	private  $pointMediator;

	public function __construct() {
	parent::__construct(new TrailDAO ());
      $this->pointMediator =  new PointMediator();
	}

	public function get($id=null) {

		$data = parent::get($id);
		if(!is_array($data) && $data!=null){
		$data->setPoints($this->pointMediator->getByTrail($id));
		}

		return $data;
	}

	 public function getMock($id=0){
	      $trail = new Trail(0,"Trilha dois Irmãos","Seja bem vindo");

	      $trail->setPoints($this->pointMediator->getMock());
	       return $trail;
	 }

     public  function insert($trail){

    	$this->getDao()->insert ( $trail );
			return true;
     }

	 public  function update($id, $json){}
	 public  function delete($id){}
}
