<?php

namespace Itech\FormulaireBundle\Controller;

use Itech\FormulaireBundle\Entity\Questionnaire;
use Itech\FormulaireBundle\Entity\Formation;
use Itech\FormulaireBundle\Entity\Categorie;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/test/{fname}/{lname}/")
     * @Template()
     */
    public function indexAction($fname, $lname)
    {   
        $quest = new Questionnaire();
        $quest->setTitle("questionnaire test");
        
        $form = new Formation();
        $form->setLibelle("formation test");
        $form->setPromotion("promo 2015/2016");
        
        $cate = new Categorie();
        $cate->setLibelle("categorie test");
        
        return array(
            'title' => $quest->getTitle(),
            'formLib' => $form->getLibelle(),
            'formProm' => $form->getPromotion(),
            'cate' => $cate->getLibelle(),
            'fname' => $fname, 
            'lname' => $lname,); 
    }
}
