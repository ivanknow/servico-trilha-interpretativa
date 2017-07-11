<?php

namespace TrilhasInterpretativas\Mediator;
use TrilhasInterpretativas\Entity\Point;
use TrilhasInterpretativas\Entity\Image;
use TrilhasInterpretativas\Entity\Local;
use TrilhasInterpretativas\DAO\PointDAO;

use Exception;
class PointMediator extends AbstractMediator{
	// attr

	public function __construct() {
       parent::__construct(new PointDAO ());
	}


	 public function getMock($id=0){

	     $points = [];

	     $image = new Image(1,"image1.jpg");

	      $images =  array($image);

	     $local = new Local(0,-27.5749595,-48.5103458,0);

	     $point = new Point(1,"McFadyen","McFadyen",$local,$images);

	     $points[] = $point;
	     //=====================================================================

	     $image = new Image(2,"image2.jpg");

	     $images =  array($image);

	     $local = new Local(0,-27.5758803,-48.5083286,0);

	     $point = new Point(2,"Escola","Escola",$local,$images);

	     $points[] = $point;
	     //=====================================================================

	     $image = new Image(3,"image3.jpg");

	      $images =  array($image);

	     $local = new Local(3,-27.5792366,-48.504707,0);

	     $point = new Point(3,"Acai","Acai",$local,$images);

	     $points[] = $point;
	     //=====================================================================

	      $image = new Image(4,"image4.jpg");

	     $images =  array($image);

	     $local = new Local(3,-27.5818267,-48.5039379,0.1);

	     $point = new Point(4,"Udesc","Udesc",$local,$images);

	     $points[] = $point;
	     //=====================================================================

		  $image = new Image(5,"image5.jpg");

	      $images =  array($image);

	     $local = new Local(5,-27.5837748,-48.4996094,0);

	     $point = new Point(5,"Padaria que nunca comi","Nunca comi aqui e a única vez que tentei não tinha pão de queijo. O que me resta?",$local,$images);

	     $points[] = $point;
	     //=====================================================================

	      $image = new Image(6,"image6.jpg");

	     $images =  array($image);

	     $local = new Local(6,-27.5862805,-48.4971682,0.0);

	     $point = new Point(6,"Quase em casa","Na subida do morrinho, onde o ar se esvai",$local,$images);

	     $points[] = $point;
	     //=====================================================================
	    return  $points;
	 }
     public  function insert($point){
			 $this->getDao()->insert ( $point );
			 return true;
		 }

		 public function getByTrail($trailid) {
	 	 	$data = $this->getDao()->getByTrail($trailid);
	 		return $data;
	 	}
	 public  function update($id, $json){}
	 public  function delete($id){}
}
