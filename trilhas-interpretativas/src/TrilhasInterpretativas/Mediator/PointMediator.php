<?php

namespace TrilhasInterpretativas\Mediator;
use TrilhasInterpretativas\Entity\Point;
use TrilhasInterpretativas\Entity\Image;
use TrilhasInterpretativas\Entity\Local;

use Exception;
class PointMediator {
	// attr
	private $dao;
	public function __construct() {
      
	}
	
	
	 public function get($id=0){
	     
	     $points = [];
	     
	     $image = new Image(1,"res/image1.jpg");
	     
	      $images =  array($image);
	     
	     $local = new Local(0,-27.5752847,-48.5105891,0);
	     
	     $point = new Point(1,"Cozinha nossa pia sempre suja",$local,$images);
	     
	     $points[] = $point;
	     //=====================================================================
	     
	     $image = new Image(2,"res/image2.jpg");
	     
	     $images =  array($image);
	     
	     $local = new Local(0,-27.5752663,-48.510453,0);
	     
	     $point = new Point(1,"Predio 1",$local,$images);
	     
	     $points[] = $point;
	     //=====================================================================
	     
	     $image = new Image(3,"res/image3.jpg");
	     
	      $images =  array($image);
	     
	     $local = new Local(3,-27.5750697,-48.5104753,0);
	     
	     $point = new Point(1,"Predio 2",$local,$images);
	     
	     $points[] = $point;
	     //=====================================================================
	     
	      $image = new Image(4,"res/image4.jpg");
	     
	     $images =  array($image);
	     
	     $local = new Local(3,-27.5751929,-48.5105472,0.1);
	     
	     $point = new Point(1,"Predio 3",$local,$images);
	     
	     $points[] = $point;
	     //=====================================================================
	    return  $points;
	 }
     public  function insert($json){}
	 public  function update($id, $json){}
	 public  function delete($id){}
}