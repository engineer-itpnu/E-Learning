<?php
namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\lesson;
use Edu\EleraningBundle\Entity\post;
use Edu\EleraningBundle\Entity\studentlesson;
use Edu\EleraningBundle\Form\postType;
use Edu\EleraningBundle\Form\studentlessonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller {

    public function mainAction()
    {
        return $this->render('EduEleraningBundle:Student:main.html.twig');
    }

    public function showlessonsAction()
    {
        $em= $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder()
            ->select("ll")
            ->from("EduEleraningBundle:lesson","ll")
            ->innerJoin("ll.studentlesson","sl")
            ->innerJoin("sl.useres","user")
            ->where("user = :student")->setParameter("student",$this->getUser())
            ->andWhere("sl.accept = :true")->setParameter("true",true);

        $lessons = $qb->getQuery()->getResult();

        return $this->render('EduEleraningBundle:Student:showlessons.html.twig',array('lessons' => $lessons));
    }

    public function showPostsAction($lesid)
    {
        $em= $this->getDoctrine()->getEntityManager();

        $lesson = $em->getRepository("EduEleraningBundle:lesson")->find($lesid);

        $posts = $em->getRepository("EduEleraningBundle:post")->findBy(array("lessones"=>$lesson),array("id"=>'desc'));

        return $this->render('EduEleraningBundle:Student:showPosts.html.twig',array('posts' => $posts,'lesid'=>$lesid));
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

        if($request->isMethod("POST"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database
                $em->persist($post);
                $em->flush();
                return $this->redirect($this->generateUrl('s_showposts',array("lesid"=>$lesid)));
            }
        }
        return $this->render('EduEleraningBundle:Student:addpost.html.twig',array('form' => $form->createView()));
    }

    public function addRequestlessonAction(Request $request)
    {
        $form = $this->createForm(new studentlessonType($this->getUser()))
            ->add('submit', 'submit', array('label' => 'ثبت'));

        if($request->isMethod("POST"))
        {
            $form->handleRequest($request);

            $em= $this->getDoctrine()->getManager();
            $data = $form->getData();
            $lesson = $data['lessones'];
            $lessonPass = $lesson->getPassword();
            if($lessonPass != $data['password'])
                $form->get('password')->addError(new FormError("پسورد اشتباه است"));

            if ($form->isValid()) {
                $sl = new studentlesson();
                $sl->setUseres($this->getUser());
                $sl->setLessones($data['lessones']);
                $sl->setAccept(false);
                // perform some action, such as saving the task to the database
                $em->persist($sl);
                $em->flush();
                return $this->redirect($this->generateUrl('s_main'));
            }
        }
        return $this->render('EduEleraningBundle:Student:addrequest.html.twig',array('form' => $form->createView()));
    }
} 