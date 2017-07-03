<?php
namespace TrilhasInterpretativas\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use TrilhasInterpretativas\DAO\AbstractDAO;


class PointDAO extends AbstractDAO{
public function __construct() {
		parent::__construct('TrilhasInterpretativas\Entity\Point');
	}
}