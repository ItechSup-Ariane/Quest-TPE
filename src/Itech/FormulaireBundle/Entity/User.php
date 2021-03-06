<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Itech\FormulaireBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Questionnaire", mappedBy="user")
     */
    private $questionnaires;
    
    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="user")
     */
    private $reponses;

    public function __construct()
    {
        parent::__construct();
        $this->questionnaires = new ArrayCollection();
        $this->reponses = new ArrayCollection();
    }

    /**
     * Add questionnaire
     *
     * @param \Itech\FormulaireBundle\Entity\Questionnaire $questionnaire
     *
     * @return User
     */
    public function addQuestionnaire(\Itech\FormulaireBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaires[] = $questionnaire;

        return $this;
    }

    /**
     * Remove questionnaire
     *
     * @param \Itech\FormulaireBundle\Entity\Questionnaire $questionnaire
     */
    public function removeQuestionnaire(\Itech\FormulaireBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaires->removeElement($questionnaire);
    }

    /**
     * Get questionnaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionnaires()
    {
        return $this->questionnaires;
    }

    /**
     * Add reponse
     *
     * @param \Itech\FormulaireBundle\Entity\Reponse $reponse
     *
     * @return User
     */
    public function addReponse(\Itech\FormulaireBundle\Entity\Reponse $reponse)
    {
        $this->reponses[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \Itech\FormulaireBundle\Entity\Reponse $reponse
     */
    public function removeReponse(\Itech\FormulaireBundle\Entity\Reponse $reponse)
    {
        $this->reponses->removeElement($reponse);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponses()
    {
        return $this->reponses;
    }
}
