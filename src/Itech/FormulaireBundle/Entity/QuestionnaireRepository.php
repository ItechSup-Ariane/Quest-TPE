<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Itech\FormulaireBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Description of QuestionnaireRepository
 *
 * @author Thomas
 */
class QuestionnaireRepository extends EntityRepository 
{
    /**
     * Select questionnaires which are not complete by this user
     * 
     * @param int $user
     * @return string
     */
    public function findAllIsNotComplete($user)
    {
        $query = $this->getEntityManager()
                ->createQuery('
            SELECT quest FROM ItechFormulaireBundle:Questionnaire quest
            WHERE quest.id NOT IN(
            SELECT DISTINCT q.id FROM ItechFormulaireBundle:Reponse r
            JOIN r.question qt
            JOIN qt.categorie c
            JOIN c.questionnaire q
            WHERE r.user = :idUser)'
                )->setParameter('idUser', $user);
        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}