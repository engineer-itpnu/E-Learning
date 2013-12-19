<?php
namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\post;
use Edu\EleraningBundle\Entity\university;
use Edu\EleraningBundle\Entity\user;
use Edu\EleraningBundle\Form\postType;
use Edu\EleraningBundle\Form\universityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class TeacherController extends Controller {

    public function mainAction()
    {
        return $this->render('EduEleraningBundle:Teacher:main.html.twig');
    }

    public function showlessonsAction()
    {
        $em= $this->getDoctrine()->getEntityManager();

        $lessons = $em->getRepository("EduEleraningBundle:lesson")->findBy(array("teacher"=>$this->getUser()));

        return $this->render('EduEleraningBundle:Teacher:showlessons.html.twig',array('lessons' => $lessons));
    }

    public function showStudentsAction($lesid)
    {
        $em= $this->getDoctrine()->getEntityManager();

        $lesson = $em->getRepository("EduEleraningBundle:lesson")->find($lesid);

        $qb = $em->createQueryBuilder()
            ->select("user")
            ->from("EduEleraningBundle:user","user")
            ->innerJoin("user.studentlesson","sl")
            ->innerJoin("sl.lessones","l")
            ->andWhere("sl.accept = :accept")->setParameter("accept",true)
            ->andWhere("l = :lesson")->setParameter("lesson",$lesson)
            ->andWhere("user.university = :university")->setParameter("university",$this->getUser()->getUniversity());

        $students = $qb->getQuery()->getResult();

        return $this->render('EduEleraningBundle:Teacher:showStudents.html.twig',array('students' => $students));
    }

    public function showPostsAction($lesid)
    {
        $em= $this->getDoctrine()->getEntityManager();

        $lesson = $em->getRepository("EduEleraningBundle:lesson")->find($lesid);

        $posts = $em->getRepository("EduEleraningBundle:post")->findBy(array("lessones"=>$lesson),array("id"=>'desc'));

        return $this->render('EduEleraningBundle:Teacher:showPosts.html.twig',array('posts' => $posts,'lesid'=>$lesid));
    }

    public function addPostAction($lesid,Request $request)
    {
        $em= $this->getDoctrine()->getEntityManager();
        $lesson = $em->getRepository("EduEleraningBundle:lesson")->find($lesid);

        $post = new post();
        $post->setLessones($lesson);
        $post->setUseres($this->getUser());

        $form = $this->createForm(new postType(),$post)
            ->add('submit', 'submit', array('label' => 'ثبت'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database
            $em->persist($post);
            $em->flush();
            return $this->redirect($this->generateUrl('t_showposts'));
        }
        return $this->render('EduEleraningBundle:Teacher:addpost.html.twig',array('form' => $form->createView()));
    }

    public function showRequestsAction()
    {
        $em= $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder()
            ->select("sl")
            ->from("EduEleraningBundle:studentlesson","sl")
            ->innerJoin("sl.lessones","l")
            ->where("l.teacher = :teacher")->setParameter("teacher",$this->getUser())
            ->andWhere("sl.accept = :accept")->setParameter("accept",false);

        $requests = $qb->getQuery()->getResult();

        return $this->render('EduEleraningBundle:Teacher:showrequests.html.twig',array('requests' => $requests));
    }

    public function acceptRequestAction($reqid)
    {
        $em= $this->getDoctrine()->getEntityManager();
        $request = $em->getRepository("EduEleraningBundle:studentlesson")->find($reqid);
        $request->setAccept(true);
        $em->flush();

        return $this->redirect($this->generateUrl("t_showrequests"));
    }

    public function rejectRequestAction($reqid)
    {
        $em= $this->getDoctrine()->getEntityManager();
        $request = $em->getRepository("EduEleraningBundle:studentlesson")->find($reqid);
        $em->remove($request);
        $em->flush();

        return $this->redirect($this->generateUrl("t_showrequests"));
    }
} 