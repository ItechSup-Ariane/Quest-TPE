<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acme\DemoBundle\Controller;

/**
 * Description of RandomController
 *
 * @author Thomas
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;

class RandomController extends Controller {
    
    public function indexAction($limit)
    {       
        $number = rand(1, $limit);

        return $this->render(
                'AcmeDemoBundle:Random:index.html.twig',
                array('number' => $number));
    }
}
