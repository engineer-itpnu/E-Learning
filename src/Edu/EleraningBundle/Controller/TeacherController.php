<?php
namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\university;
use Edu\EleraningBundle\Entity\user;
use Edu\EleraningBundle\Form\universityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class TeacherController extends Controller {

    public function mainAction()
    {
        return $this->render('EduEleraningBundle:Teacher:main.html.twig');
    }

} 