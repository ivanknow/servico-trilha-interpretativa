<?php
namespace TrilhasInterpretativas\Entity;

use Doctrine\ORM\Mapping;
use TrilhasInterpretativas\Entity\Entity;

/**
 * @Entity
 * @Table(name="local")
 */
class Local extends Entity{

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
private $latitude;
/**
 *
 * @var string @Column(type="string", length=255)
 */
private $longitude;
/**
 *
 * @var string @Column(type="string", length=255)
 */
private $altitude;
public function __construct($id = 0,$latitude= 0.0,$longitude= 0.0,$altitude= 0.0){
$this->id = $id;
$this->latitude = $latitude;
$this->longitude = $longitude;
$this->altitude = $altitude;

}

public static function construct($array){
$obj = new Local();
$obj->setId( $array['id']);
$obj->setLatitude( $array['latitude']);
$obj->setLongitude( $array['longitude']);
$obj->setAltitude( $array['altitude']);
return $obj;

}

public function getId(){
return $this->id;
}

public function setId($id){
 $this->id=$id;
}

public function getLatitude(){
return $this->latitude;
}

public function setLatitude($latitude){
 $this->latitude=$latitude;
}

public function getLongitude(){
return $this->longitude;
}

public function setLongitude($longitude){
 $this->longitude=$longitude;
}

public function getAltitude(){
return $this->altitude;
}

public function setAltitude($altitude){
 $this->altitude=$altitude;
}
public function equals($object){
if($object instanceof Local){

if($this->id!=$object->id){
return false;

}

if($this->latitude!=$object->latitude){
return false;

}

if($this->longitude!=$object->longitude){
return false;

}

if($this->altitude!=$object->altitude){
return false;

}

return true;

}
else{
return false;
}

}
public function toString(){

 return "  [id:" .$this->id. "]  [latitude:" .$this->latitude. "]  [longitude:" .$this->longitude. "]  [altitude:" .$this->altitude. "]  " ;
}
public function __toString(){

return "  [id:" .$this->id. "]  [latitude:" .$this->latitude. "]  [longitude:" .$this->longitude. "]  [altitude:" .$this->altitude. "]  " ;
}

}
