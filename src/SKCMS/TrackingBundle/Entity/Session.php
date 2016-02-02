<?php

namespace SKCMS\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SKCMS\TrackingBundle\Entity\SessionRepository")
 */
class Session
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
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="SKCMS\UserBundle\Entity\User",inversedBy="postViews")
     */
    private $user;
    
    /**
     *
     * @ORM\Column(name="referrer", type="string",length=255,nullable=true)
     */
    private $referrer;

    
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
     * Set ip
     *
     * @param string $ip
     * @return Session
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Session
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
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set user
     *
     * @param \SKCMS\UserBundle\Entity\User $user
     * @return PostView
     */
    public function setUser(\SKCMS\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Set referrer
     *
     * @param string $referrer
     * @return Session
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;
    
        return $this;
    }

    /**
     * Get referrer
     *
     * @return string 
     */
    public function getReferrer()
    {
        return $this->referrer;
    }
}