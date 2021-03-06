<?php

namespace BES\FrontBundle\Entity;

use BES\CoreBundle\Entity\UECategory;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Cours
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BES\FrontBundle\Entity\CoursRepository")
 */
class Cours extends \SKCMS\CoreBundle\Entity\SKBaseEntity
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
     * @Gedmo\Slug(fields={"title"},updatable=false)
     * @Gedmo\Translatable
     * @ORM\Column(length=128)
     * 
     */
    protected $slug; 

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text",nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255,nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text",nullable=true)
     */
    private $content;
    /**
     * @var string
     *
     * @ORM\Column(name="periodes", type="integer")
     */
    private $periodes;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="SKCMS\CoreBundle\Entity\SKImage", cascade={"all"})
     */
    private $picture;

    /**
     * @var UECategory
     * @ORM\ManyToOne(targetEntity="BES\CoreBundle\Entity\UECategory", inversedBy="cours")
     */
    private $category;


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
     * Set summary
     *
     * @param string $summary
     * @return Cours
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     * @return Cours
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Cours
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    
    public function getPeriodes()
    {
        return $this->periodes;
    }
    public function setPeriodes($periodes)
    {
        $this->periodes = $periodes;
        return $this;
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

   

    /**
     * Set category
     *
     * @param \BES\CoreBundle\Entity\UECategory $category
     * @return Cours
     */
    public function setCategory(\BES\CoreBundle\Entity\UECategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BES\CoreBundle\Entity\UECategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
