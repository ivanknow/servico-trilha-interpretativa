<?php 

namespace TrilhasInterpretativas\Entity;

use Doctrine\ORM\Mapping;
use TrilhasInterpretativas\Entity\Entity;

/**
 * @Entity
 * @Table(name="image")
 */
class Image extends Entity{

private $id;
private $src;
public function __construct($id = 0,$src= 0.0){
$this->id = $id;
$this->src = $src;

}

public static function construct($array){
$obj = new Image();
$obj->setId( $array['id']);
$obj->setSrc( $array['src']);
return $obj;

}

public function getId(){
return $this->id;
}

public function setId($id){
 $this->id=$id;
}

public function getSrc(){
return $this->src;
}

public function setSrc($src){
 $this->src=$src;
}
public function equals($object){
if($object instanceof Image){

if($this->id!=$object->id){
return false;

}

if($this->src!=$object->src){
return false;

}

return true;

}
else{
return false;
}

}
public function toString(){

 return "  [id:" .$this->id. "]  [src:" .$this->src. "]  " ;
}

}