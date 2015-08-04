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

    public function __construct()
    {
        parent::__construct();
        $this->questionnaires = new ArrayCollection();
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
}
