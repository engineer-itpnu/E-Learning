<?php

namespace Edu\EleraningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edu\EleraningBundle\Entity\studentlesson;
use Edu\EleraningBundle\Form\studentlessonType;

/**
 * studentlesson controller.
 *
 */
class studentlessonController extends Controller
{

    /**
     * Lists all studentlesson entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EduEleraningBundle:studentlesson')->findAll();

        return $this->render('EduEleraningBundle:studentlesson:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new studentlesson entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new studentlesson();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('studentlesson_show', array('id' => $entity->getId())));
        }

        return $this->render('EduEleraningBundle:studentlesson:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a studentlesson entity.
    *
    * @param studentlesson $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(studentlesson $entity)
    {
        $form = $this->createForm(new studentlessonType(), $entity, array(
            'action' => $this->generateUrl('studentlesson_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new studentlesson entity.
     *
     */
    public function newAction()
    {
        $entity = new studentlesson();
        $form   = $this->createCreateForm($entity);

        return $this->render('EduEleraningBundle:studentlesson:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a studentlesson entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:studentlesson')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find studentlesson entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:studentlesson:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing studentlesson entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:studentlesson')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find studentlesson entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:studentlesson:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a studentlesson entity.
    *
    * @param studentlesson $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(studentlesson $entity)
    {
        $form = $this->createForm(new studentlessonType(), $entity, array(
            'action' => $this->generateUrl('studentlesson_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing studentlesson entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:studentlesson')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find studentlesson entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('studentlesson_edit', array('id' => $id)));
        }

        return $this->render('EduEleraningBundle:studentlesson:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a studentlesson entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EduEleraningBundle:studentlesson')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find studentlesson entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('studentlesson'));
    }

    /**
     * Creates a form to delete a studentlesson entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentlesson_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
