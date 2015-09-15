<?php

namespace Itech\FormulaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Itech\FormulaireBundle\Entity\Reponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    /**
     * Call the Default index view with
     * the list of available survey and the user  
     * 
     * @Route("/" , name ="index")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $userName = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $questionnaires = $em->getRepository('ItechFormulaireBundle:Questionnaire')->findAllIsNotComplete($user->getId());
        if (!$questionnaires) {
            return $this->render('ItechFormulaireBundle:Default:index.html.twig', array(
                  'name' => $userName,
            ));
        }
        return $this->render('ItechFormulaireBundle:Default:index.html.twig', array(
              'questionnaires' => $questionnaires,
              'name' => $userName,
        ));
    }
    /**
     * Call the Default afficher view which
     * display the selected survey
     * 
     * @Route("/user/questionnaire/{id}", name="afficher_questionnaire")
     * 
     */
    public function afficherAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaire = $em->getRepository('ItechFormulaireBundle:Questionnaire')->find($id);
        if (!$questionnaire) {
            throw $this->createNotFoundException('Impossible de trouver ce questionnaire');
        }
        return $this->render('ItechFormulaireBundle:Default:afficher.html.twig', array(
              'questionnaire' => $questionnaire,
        ));
    }
    /**
     * Get responses of the user and call the function insertRep 
     * 
     * @Route("/soumission/{id}", name="soumission")
     * @Method({"POST"})
     */
    public function validationAction($id)
    {
        $request = Request::createFromGlobals();
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository('ItechFormulaireBundle:Question')->findAllByQuestionnaire($id, $user->getId());
        foreach ($questions as $question) {
            $this->insertRep($question, $request->request->get($question->getId()), $user);
        }
        return $this->redirect($this->generateUrl('index'));
    }
    /**
     * insert response in database
     * 
     * 
     * @param question $question
     * @param string $value
     * @param etudiant $user
     * 
     */
    public function insertRep($question, $value, $user)
    {
        $reponse = new Reponse();
        $reponse->setNote($value);
        $reponse->setQuestion($question);
        $reponse->setUser($user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($reponse);
        $em->flush();
    }
}
