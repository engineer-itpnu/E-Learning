<?php

namespace Edu\EleraningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EduEleraningBundle:Default:index.html.twig');
    }

    public function mainAction()
    {
        return $this->render('EduEleraningBundle::main.html.twig');
    }

    public function testAction()
    {
        return $this->render('EduEleraningBundle::layout1.html.twig');
    }
}
