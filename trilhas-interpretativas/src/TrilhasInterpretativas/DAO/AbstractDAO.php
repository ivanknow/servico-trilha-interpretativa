<?php

namespace TrilhasInterpretativas\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class AbstractDAO {
	public $entityManager;
	public $entityPath;

	public function __construct($entityPath) {
			$this->entityPath = $entityPath;
			$this->entityManager = $this->createEntityManager ();
		}
	public function createEntityManager() {
		$path = array (
		    'TrilhasInterpretativas/Entity'
		);
		$devMode = true;
		$config = Setup::createAnnotationMetadataConfiguration ( $path, $devMode );
		$connectionOptions =  array (
		    'dbname' => 'trilha',
		    'user' => 'root',
		    'password' => '',
		    'host' => 'localhost',
		    'driver' => 'pdo_mysql'
		);
		//Passo 3 - Objeto de persistencia
		return EntityManager::create ( $connectionOptions, $config );
	}
	public function insert($obj){
		$this->entityManager->persist($obj);
		$this->entityManager->flush();
	}
	public function update($obj){
		$this->entityManager->merge($obj);
		$this->entityManager->flush();
	}
	public function delete($obj){
		$this->entityManager->remove($obj);
		$this->entityManager->flush();
	}
	public function findById($id){
		return $this->entityManager ->find ( $this->entityPath ,$id) ;
	}
	public function findAll(){
		$collection = $this->entityManager ->getRepository ( $this->entityPath )->findAll ();
		$data = array ();
		foreach ( $collection as $obj ) {
			$data [] = $obj;
		}
		return $data;
	}
}
