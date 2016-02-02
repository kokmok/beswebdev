<?php

namespace BES\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BES\CoreBundle\Entity\PageRepository")
 */
class Page extends \SKCMS\CoreBundle\Entity\SKBasePage
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
     *
     * @ORM\Column(name="summary",type="text")
     */
    protected $summary;
    
    /**
     *
     * @ORM\Column(name="content",type="text")
     */
    protected $content;
    
    /**
     *
     * @ORM\Column(name="subtitle",type="text")
     */
    protected $subtitle;
    
    /**
     * @ORM\ManyToOne(targetEntity="\SKCMS\CoreBundle\Entity\MenuElement")
     */
    protected $menu;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="SKCMS\CoreBundle\Entity\SKImage", cascade={"all"})
     * 
     */
    private $picture;
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getSummary()
    {
        return $this->summary;
    }
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
    public function getSubtitle()
    {
        return $this->subtitle;
    }
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }
    
    public function getMenu()
    {
        return $this->menu;
    }
    public function setMenu(\SKCMS\CoreBundle\Entity\MenuElement $menu)
    {
        $this->menu = $menu;
    }
    
    /**
     * Set picture
     *
     * @param \SKCMS\CoreBundle\Entity\SKImage $picture
     * @return Cours
     */
    public function setPicture(\SKCMS\CoreBundle\Entity\SKImage $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \SKCMS\CoreBundle\Entity\SKImage 
     */
    public function getPicture()
    {
        return $this->picture;
    }
}

