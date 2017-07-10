<?php

namespace TrilhasInterpretativas\Entity;

use Doctrine\ORM\Mapping;
use TrilhasInterpretativas\Entity\Entity;

/**
 * @Entity
 * @Table(name="trail")
 */
class Trail extends Entity{

 /**
  *	@var integer @Id
  *      @Column(name="id", type="integer")
  *      @GeneratedValue(strategy="AUTO")
  */
private $id;
/**
 *
 * @var string @Column(type="string", length=255)
 */
private $title;
/**
 *
 * @var string @Column(type="string", length=255)
 */
private $descr;
  /**
     * One Product has Many Features.
     * @OneToMany(targetEntity="Point", mappedBy="trail")
     */
private $points;
public function __construct($id = 0,$title= "" ,$descr="",$points= array()){
$this->id = $id;
$this->title = $title;
$this->descr = $descr;
$this->points = $points;

}

public static function construct($array){
$obj = new Trail();
$obj->setId( $array['id']);
$obj->setTitle( $array['title']);
$obj->setDescr( $array['descr']);
 //$obj->setPoints( $array['points']);
return $obj;

}

public function getId(){
return $this->id;
}

public function setId($id){
 $this->id=$id;
}

public function getTitle(){
return $this->title;
}

public function setTitle($title){
 $this->title=$title;
}

public function getDescr(){
return $this->descr;
}

public function setDescr($descr){
 $this->descr=$descr;
}

public function getPoints(){
return $this->points;
}

public function setPoints($points){
 $this->points=$points;
}
public function equals(Trail $object){
if($object instanceof Trail){

if($this->id!=$object->id){
return false;

}

if($this->title!=$object->title){
return false;

}

if($this->points!=$object->points){
return false;

}

return true;

}
else{
return false;
}

}
public function toString(){

 return "  [id:" .$this->id. "]  [title:" .$this->title. "]  [points:" .$this->points. "]  " ;
}

}
