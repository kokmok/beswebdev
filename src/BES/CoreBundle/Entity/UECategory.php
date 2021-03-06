<?php

namespace BES\CoreBundle\Entity;

use BES\FrontBundle\Entity\Cours;
use Doctrine\ORM\Mapping as ORM;

/**
 * UECategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BES\CoreBundle\Repository\UECategoryRepository")
 */
class UECategory extends \SKCMS\CoreBundle\Entity\SKBaseEntity
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Cours
     * @ORM\OneToMany(targetEntity="BES\FrontBundle\Entity\Cours",mappedBy="category")
     */
    private $cours;


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
     * Set name
     *
     * @param string $name
     * @return UECategory
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
     * Add cours
     *
     * @param \BES\FrontBundle\Entity\Cours $cours
     * @return UECategory
     */
    public function addCour(\BES\FrontBundle\Entity\Cours $cours)
    {
        $this->cours[] = $cours;

        return $this;
    }

    /**
     * Remove cours
     *
     * @param \BES\FrontBundle\Entity\Cours $cours
     */
    public function removeCour(\BES\FrontBundle\Entity\Cours $cours)
    {
        $this->cours->removeElement($cours);
    }

    /**
     * Get cours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCours()
    {
        return $this->cours;
    }
}
