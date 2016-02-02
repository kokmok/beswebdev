<?php

namespace SKCMS\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * InvitationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvitationRepository extends EntityRepository
{
    
    public function findMultipleById(array $idList)
    {
        $qb = $this ->createQueryBuilder('i');
        $qb->where($qb->expr()->in('i.id',$idList));
        
        return $qb->getQuery()->getResult();
                
        
    }
}