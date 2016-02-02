<?php

namespace SKCMS\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactMessageResponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SKCMS\ContactBundle\Entity\ContactMessageResponseRepository")
 */
class ContactMessageResponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SKCMS\UserBundle\Entity\User")
     */
    private $user;

    
    /**
     *
     * @ORM\Column(name="contactMessageId", type="integer")
     */
    private $contactMessageId;

    
    public function __construct()
    {
        $this->date = new \DateTime();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return ContactMessageResponse
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return ContactMessageResponse
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    

    /**
     * Set contactMessageId
     *
     * @param integer $contactMessageId
     * @return ContactMessageResponse
     */
    public function setContactMessageId($contactMessageId)
    {
        $this->contactMessageId = $contactMessageId;

        return $this;
    }

    /**
     * Get contactMessageId
     *
     * @return integer 
     */
    public function getContactMessageId()
    {
        return $this->contactMessageId;
    }

    /**
     * Set user
     *
     * @param \SKCMS\UserBundle\Entity\User $user
     * @return ContactMessageResponse
     */
    public function setUser(\SKCMS\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \SKCMS\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}