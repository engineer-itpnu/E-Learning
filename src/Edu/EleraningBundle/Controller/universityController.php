<?php

namespace Edu\EleraningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edu\EleraningBundle\Entity\university;
use Edu\EleraningBundle\Form\universityType;

/**
 * university controller.
 *
 */
class universityController extends Controller
{

    /**
     * Lists all university entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EduEleraningBundle:university')->findAll();

        return $this->render('EduEleraningBundle:university:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new university entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new university();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('university_show', array('id' => $entity->getId())));
        }

        return $this->render('EduEleraningBundle:university:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a university entity.
    *
    * @param university $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(university $entity)
    {
        $form = $this->createForm(new universityType(), $entity, array(
            'action' => $this->generateUrl('university_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new university entity.
     *
     */
    public function newAction()
    {
        $entity = new university();
        $form   = $this->createCreateForm($entity);

        return $this->render('EduEleraningBundle:university:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a university entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:university')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find university entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:university:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing university entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:university')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find university entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:university:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a university entity.
    *
    * @param university $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(university $entity)
    {
        $form = $this->createForm(new universityType(), $entity, array(
            'action' => $this->generateUrl('university_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing university entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:university')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find university entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('university_edit', array('id' => $id)));
        }

        return $this->render('EduEleraningBundle:university:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a university entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EduEleraningBundle:university')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find university entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('university'));
    }

    /**
     * Creates a form to delete a university entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('university_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
