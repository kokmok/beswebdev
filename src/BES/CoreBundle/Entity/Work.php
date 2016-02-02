<?php

namespace BES\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Work
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BES\CoreBundle\Entity\WorkRepository")
 */
class Work extends \SKCMS\CoreBundle\Entity\SKBaseEntity
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="student", type="string", length=255)
     */
    private $student;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="SKCMS\CoreBundle\Entity\SKImage", cascade={"all"})
     * 
     */
    private $picture;
    
    /**
     *
     * @ORM\Column(name="content",type="text")
     */
    protected $content;


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
     * Set title
     *
     * @param string $title
     * @return Work
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set student
     *
     * @param string $student
     * @return Work
     */
    public function setStudent($student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return string 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Work
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Work
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Set content
     *
     * @param string $content
     * @return Work
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
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
