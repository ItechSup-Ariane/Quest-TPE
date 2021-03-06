<?php

namespace Itech\FormulaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categorie
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
     * @ORM\Column(name="libelle", type="string", length=255) 
     */
    private $libelle;
    
    /**
     * @ORM\ManyToOne(targetEntity="Questionnaire", inversedBy="categories")
     * @ORM\JoinColumn(name="questionnaire_id", referencedColumnName="id", nullable=false)
     */
    private $questionnaire;
    
    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="categorie")
     */
    private $questions;
    
    function __construct() {
        $this->questions = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Categorie
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set questionnaire
     *
     * @param \Itech\FormulaireBundle\Entity\Questionnaire $questionnaire
     * @return Categorie
     */
    public function setQuestionnaire(\Itech\FormulaireBundle\Entity\Questionnaire $questionnaire = null)
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    /**
     * Get questionnaire
     *
     * @return \Itech\FormulaireBundle\Entity\Questionnaire 
     */
    public function getQuestionnaire()
    {
        return $this->questionnaire;
    }

    /**
     * Add question
     *
     * @param \Itech\FormulaireBundle\Entity\Question $question
     *
     * @return Categorie
     */
    public function addQuestion(\Itech\FormulaireBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \Itech\FormulaireBundle\Entity\Question $question
     */
    public function removeQuestion(\Itech\FormulaireBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
