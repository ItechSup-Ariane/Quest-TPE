<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Itech\FormulaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Itech\FormulaireBundle\Entity\Reponse;

/**
 * Admin controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * Call the Default index view with
     * the list of survey 
     * The view show the configuration menu 
     * 
     * @Route("/" , name ="index_admin")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaires = $em->getRepository('ItechFormulaireBundle:Questionnaire')->findAll();
        if (!$questionnaires) {
            throw $this->createNotFoundException('Aucun questionnaire n\'a été trouvé');
        }
        return $this->render('ItechFormulaireBundle:Admin:index.html.twig', array(
              'questionnaires' => $questionnaires,
        ));
    }
    /**
     * Call the Admin resume view which
     * show the average note of questions for 
     * each survey
     * 
     * @Route("/resume/{id}", name="resumeQuestionnaire")
     * 
     */
    public function resumeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaire = $em->getRepository('ItechFormulaireBundle:Questionnaire')->find($id);
        if (!$questionnaire) {
            throw $this->createNotFoundException('Impossible de trouver ce questionnaire');
        }
        return $this->render('ItechFormulaireBundle:Admin:resume.html.twig', array(
              'questionnaire' => $questionnaire,
        ));
    }
}
