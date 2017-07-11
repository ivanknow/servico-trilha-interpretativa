<?php
namespace TrilhasInterpretativas\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use TrilhasInterpretativas\DAO\AbstractDAO;
use Exception;

class PointDAO extends AbstractDAO{
public function __construct() {
		parent::__construct('TrilhasInterpretativas\Entity\Point');
	}

	public function insert($obj){
		$trailPersisted = $this->entityManager ->find ("TrilhasInterpretativas\Entity\Trail" , $obj->getTrail()->getId());
		if($trailPersisted==null)
			throw new Exception("Trail not found", 1);
		$obj->setTrail($trailPersisted);
		$this->entityManager->persist($obj);
		$this->entityManager->flush();
	}


	public function getByTrail($trailid){
			$query = $this->entityManager->createQuery("SELECT t,p FROM TrilhasInterpretativas\Entity\Trail t JOIN t.points p WHERE t.id = ?1 ");
			$query->setParameter(1, $trailid);

		$collection = $query->getResult();
		//$collection = $this->entityManager ->getRepository ( $this->entityPath )->findAll ();
		$data = array ();
		foreach ( $collection as $obj ) {
			$data [] = $obj;
		}
		return $data;
	}
}
