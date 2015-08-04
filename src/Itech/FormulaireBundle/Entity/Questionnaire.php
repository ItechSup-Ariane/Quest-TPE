<?php

namespace Itech\FormulaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Questionnaire
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Questionnaire
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * @ORM\OneToMany(targetEntity="Categorie", mappedBy="questionnaire")
     */
    private $categories;
    
    function __construct() {
        $this->categories = new ArrayCollection();
    }
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="questionnaires")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
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
     * @return Questionnaire
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
     * Add categories
     *
     * @param \Itech\FormulaireBundle\Entity\Categorie $categories
     * @return Questionnaire
     */
    public function addCategory(\Itech\FormulaireBundle\Entity\Categorie $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Itech\FormulaireBundle\Entity\Categorie $categories
     */
    public function removeCategory(\Itech\FormulaireBundle\Entity\Categorie $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set user
     *
     * @param \Itech\FormulaireBundle\Entity\User $user
     *
     * @return Questionnaire
     */
    public function setUser(\Itech\FormulaireBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Itech\FormulaireBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
