<?php

namespace SKCMS\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
abstract class ContactMessage
{
    /** @ORM\Column(type="integer") */
    protected $id;

    /** @ORM\Column(type="datetime") */
    protected $date;
    
    /** @ORM\Column(type="string") */
    protected $status;
    
    /** @ORM\Column(type="string") */
    protected $email;
    
    /** @ORM\Column(type="string",nullable=true) */
    protected $phone;
    /** @ORM\Column(type="string",nullable=true) */
    protected $name;
    /** @ORM\Column(type="string",nullable=true) */
    protected $fax;
    /** @ORM\Column(type="string",nullable=true) */
    protected $subject;
     /** @ORM\Column(type="text") */
    protected $message;
    
    
    const STATUS_ANSWERED = 'answered';
    const STATUS_VIEWED = 'viewed';
    const STATUS_NEW = 'new';





    public function __construct()
    {
        $this->date = new \DateTime();
        $this->status = self::STATUS_NEW;
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
     * @return ContactMessage
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
    
        
    public function setStatusViewed()
    {
        $this->status = self::STATUS_VIEWED;
    }
    public function setStatusAnswered()
    {
        $this->status = self::STATUS_ANSWERED;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    
    public function getFormattedDate($format = 'c')
    {
        return $this->getDate()->format($format);
    }
    
    /**
     * Set email
     *
     * @param string $email
     * @return ContactMessage
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    
    
    /**
     * Set message
     *
     * @param string $message
     * @return ContactMessage
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
     * Set name
     *
     * @param string $name
     * @return ContactMessage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set phone
     *
     * @param string $phone
     * @return ContactMessage
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Set fax
     *
     * @param string $fax
     * @return ContactMessage
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }
    /**
     * Set subject
     *
     * @param string $subject
     * @return ContactMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }
    
    
    
    public function __call($name, $arguments)
    {
        //dump($name);
        die();
        if (preg_match('#get([A-Z][a-zA-Z0-9])+#', $name,$matches))
        {
            
            $propery = lcfirst($matches[0][1]);
            
            if (property_exists($this, $property))
            {
                return $this->$propery;
            }
            
        }
        else if (preg_match('#set([A-Z][a-zA-Z0-9])+#', $name,$matches))
        {
            $propery = lcfirst($matches[0][1]);
            
            if (property_exists($this, $property))
            {
                $this->$propery = $arguments[0];
                return $this;
            }
            
        }
    }

}