<?php

namespace SKCMS\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * PostView
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SKCMS\TrackingBundle\Entity\ViewRepository")
 */
class View
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
     * @ORM\Column(name="datein", type="datetime")
     */
    private $datein;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateout", type="datetime")
     */
    private $dateout;
    
    

    /**
     * @ORM\Column(name="locale",type="string",length=255)
     */
    private $locale;
    
    /**
     * @ORM\Column(name="path",type="string",length=255)
     */
    private $path;
    
    /**
     * @ORM\Column(name="route",type="string",length=255)
     */
    private $route;
    
    /**
     * @ORM\Column(name="routeParams",type="array")
     */
    private $routeParams;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="SKCMS\TrackingBundle\Entity\Session")
     */
    private $session;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->datein = new \DateTime();
        $this->dateout = new \DateTime();
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
     * Set datein
     *
     * @param \DateTime $datein
     * @return PostView
     */
    public function setDatein($datein)
    {
        $this->datein = $datein;
    
        return $this;
    }

    /**
     * Get datein
     *
     * @return \DateTime 
     */
    public function getDatein()
    {
        return $this->datein;
    }

    /**
     * Set dateout
     *
     * @param \DateTime $dateout
     * @return PostView
     */
    public function setDateout($dateout)
    {
        $this->dateout = $dateout;
    
        return $this;
    }

    /**
     * Get dateout
     *
     * @return \DateTime 
     */
    public function getDateout()
    {
        return $this->dateout;
    }
    
    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPost()
    {
        return $this->post;
    }

    
    public function getEntity()
    {
        return $this->entity;
    }
    
    public function setEntity(\SKCMS\CoreBundle\Entity\SKBaseEntity $entity)
    {
        $this->entity = $entity;
        return $this;
    }
    
    public function getDateTimestamp()
    {
        return $this->datein->getTimestamp();
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return View
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return View
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return View
     */
    public function setRoute($route)
    {
        $this->route = $route;
    
        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set routeParams
     *
     * @param array $routeParams
     * @return View
     */
    public function setRouteParams($routeParams)
    {
        $this->routeParams = $routeParams;
    
        return $this;
    }

    /**
     * Get routeParams
     *
     * @return array 
     */
    public function getRouteParams()
    {
        return $this->routeParams;
    }

    /**
     * Set session
     *
     * @param \SKCMSTrackingBundle\Entity\Session $session
     * @return View
     */
    public function setSession(\SKCMS\TrackingBundle\Entity\Session $session = null)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \SKCMSTrackingBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }
}