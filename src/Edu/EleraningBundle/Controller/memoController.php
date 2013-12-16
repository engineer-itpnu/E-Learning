<?php

namespace Edu\EleraningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edu\EleraningBundle\Entity\memo;
use Edu\EleraningBundle\Form\memoType;

/**
 * memo controller.
 *
 */
class memoController extends Controller
{

    /**
     * Lists all memo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EduEleraningBundle:memo')->findAll();

        return $this->render('EduEleraningBundle:memo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new memo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new memo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('memo_show', array('id' => $entity->getId())));
        }

        return $this->render('EduEleraningBundle:memo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a memo entity.
    *
    * @param memo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(memo $entity)
    {
        $form = $this->createForm(new memoType(), $entity, array(
            'action' => $this->generateUrl('memo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new memo entity.
     *
     */
    public function newAction()
    {
        $entity = new memo();
        $form   = $this->createCreateForm($entity);

        return $this->render('EduEleraningBundle:memo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:memo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find memo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:memo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing memo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:memo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find memo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:memo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a memo entity.
    *
    * @param memo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(memo $entity)
    {
        $form = $this->createForm(new memoType(), $entity, array(
            'action' => $this->generateUrl('memo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing memo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:memo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find memo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('memo_edit', array('id' => $id)));
        }

        return $this->render('EduEleraningBundle:memo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a memo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EduEleraningBundle:memo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find memo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('memo'));
    }

    /**
     * Creates a form to delete a memo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
