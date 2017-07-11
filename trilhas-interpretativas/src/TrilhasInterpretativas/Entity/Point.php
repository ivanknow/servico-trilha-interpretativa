<?php
namespace TrilhasInterpretativas\Entity;

use Doctrine\ORM\Mapping;
use TrilhasInterpretativas\Entity\Entity;
use TrilhasInterpretativas\Entity\Local;
use TrilhasInterpretativas\Entity\Image;

/**
 * @Entity
 * @Table(name="point")
 */
class Point extends Entity{

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
     * @OneToOne(targetEntity="Local",cascade={"persist","remove"})
     * @JoinColumn(name="local_id", referencedColumnName="id")
     */
private $local;

  /**

     * @OneToMany(targetEntity="Image", mappedBy="point",cascade={"persist","remove"})
     */
private $images;
    /**
     * Many Features have One Product.
     * @ManyToOne(targetEntity="trail", inversedBy="points",cascade={"detach"})
     * @JoinColumn(name="trail_id", referencedColumnName="id")
     */


     private $trail;
public function __construct($id = 0,$title="",$descr= "" ,$local= null ,$images= array()){
$this->id = $id;
$this->title = $title;
$this->descr = $descr;
$this->local = $local;
$this->images = $images;

}

public static function construct($array){
$obj = new Point();
$obj->setId( $array['id']);
$obj->setTitle( $array['title']);
$obj->setDescr( $array['descr']);

$objLocal = Local::construct($array['local']);
$obj->setLocal($objLocal);
if(array_key_exists ('images',$array ))
$obj->setImages( $array['images']);
else {
  $obj->setImages( array());
}
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

public function getLocal(){
return $this->local;
}

public function setLocal($local){
 $this->local=$local;
}

public function getTrail(){
return $this->trail;
}

public function setTrail($trail){
 $this->trail=$trail;
}


public function getImages(){
return $this->images;
}

public function setImages($images){
 $this->images=$images;
}
public function equals($object){
if($object instanceof Ponto){

if($this->id!=$object->id){
return false;

}

if($this->descr!=$object->descr){
return false;

}

if($this->local!=$object->local){
return false;

}

if($this->images!=$object->images){
return false;

}

return true;

}
else{
return false;
}

}

public function toString(){

 return "  [id:" .$this->id. "]  [descr:" .$this->descr. "]  [local:" .$this->local. "]  [images:" .$this->images. "]  " ;
}

public function __toString(){

 return "  [id:" .$this->id. "]  [descr:" .$this->descr. "]  [local:" .$this->local. "]  " ;
}

public function getAvoidedFields() {
  $returned = parent::getAvoidedFields();
  $returned[] = "trail";
		return $returned;
	}

}
