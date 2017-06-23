<?php
namespace TrilhasInterpretativas\Entity;

use Doctrine\ORM\Mapping;
use TrilhasInterpretativas\Entity\Entity;

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
private $descricao;
/**
     * @OneToOne(targetEntity="Local")
     * @JoinColumn(name="local_id", referencedColumnName="id")
     */
private $local;

  /**
     
     * @OneToMany(targetEntity="Image", mappedBy="point")
     */
private $images;
    /**
     * Many Features have One Product.
     * @ManyToOne(targetEntity="trail", inversedBy="points")
     * @JoinColumn(name="trail_id", referencedColumnName="id")
     */
     
     private $trail;
public function __construct($id = 0,$descricao= "" ,$local= null ,$images= array()){
$this->id = $id;
$this->descricao = $descricao;
$this->local = $local;
$this->images = $images;

}

public static function construct($array){
$obj = new Point();
$obj->setId( $array['id']);
$obj->setDescricao( $array['descricao']);
$obj->setLocal( $array['local']);
$obj->setImages( $array['images']);
return $obj;

}

public function getId(){
return $this->id;
}

public function setId($id){
 $this->id=$id;
}

public function getDescricao(){
return $this->descricao;
}

public function setDescricao($descricao){
 $this->descricao=$descricao;
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

if($this->descricao!=$object->descricao){
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

 return "  [id:" .$this->id. "]  [descricao:" .$this->descricao. "]  [local:" .$this->local. "]  [images:" .$this->images. "]  " ;
}

}