<?php

namespace Edu\EleraningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edu\EleraningBundle\Entity\user;
use Edu\EleraningBundle\Form\userType;

/**
 * user controller.
 *
 */
class userController extends Controller
{

    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EduEleraningBundle:user')->findAll();

        return $this->render('EduEleraningBundle:user:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new user entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new user();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return $this->render('EduEleraningBundle:user:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a user entity.
    *
    * @param user $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(user $entity)
    {
        $form = $this->createForm(new userType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new user entity.
     *
     */
    public function newAction()
    {
        $entity = new user();
        $form   = $this->createCreateForm($entity);

        return $this->render('EduEleraningBundle:user:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:user')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find user entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:user:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:user')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find user entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:user:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a user entity.
    *
    * @param user $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(user $entity)
    {
        $form = $this->createForm(new userType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing user entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:user')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find user entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }

        return $this->render('EduEleraningBundle:user:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EduEleraningBundle:user')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find user entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a user entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function studentAction()
    {
        return $this->render('EduEleraningBundle:Student:studentpanet.html.twig');
    }

    public function teacherAction()
    {
        return $this->render('EduEleraningBundle:Teacher:teacherpanel.html.twig');
    }
}
