<?php

namespace BES\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SKCMS\ContactBundle\Entity\ContactMessage as BaseMessage;

/**
 * ContactMessage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BES\ContactBundle\Entity\ContactMessageRepository")
 */
class ContactMessage extends BaseMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
