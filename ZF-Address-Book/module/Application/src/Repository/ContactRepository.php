<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 24/03/2017
 * Time: 11:45
 */

namespace Application\Repository;


use Doctrine\ORM\EntityRepository;

class ContactRepository extends EntityRepository
{
    public function findWithSociete($id) {

        $dql = 'SELECT c, s 
                FROM \Application\Entity\Contact c 
                LEFT JOIN c.societe s
                WHERE c.id = :id';

        return $this->_em
                ->createQuery($dql)
                ->setParameter('id', $id)
                ->getSingleResult();
    }
}