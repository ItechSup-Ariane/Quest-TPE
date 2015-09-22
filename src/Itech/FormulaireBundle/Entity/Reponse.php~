<?php

namespace Itech\FormulaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Reponse
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
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;
    
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="reponses")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reponses")
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
     * Set note
     *
     * @param string $note
     * @return Reponse
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }
    

    /**
     * Set question
     *
     * @param \Itech\FormulaireBundle\Entity\Question $question
     *
     * @return Reponse
     */
    public function setQuestion(\Itech\FormulaireBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Itech\FormulaireBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set user
     *
     * @param \Itech\FormulaireBundle\Entity\User $user
     *
     * @return Reponse
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
