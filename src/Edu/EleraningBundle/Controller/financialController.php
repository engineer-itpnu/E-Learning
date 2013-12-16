<?php

namespace Edu\EleraningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edu\EleraningBundle\Entity\financial;
use Edu\EleraningBundle\Form\financialType;

/**
 * financial controller.
 *
 */
class financialController extends Controller
{

    /**
     * Lists all financial entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EduEleraningBundle:financial')->findAll();

        return $this->render('EduEleraningBundle:financial:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new financial entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new financial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('financial_show', array('id' => $entity->getId())));
        }

        return $this->render('EduEleraningBundle:financial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a financial entity.
    *
    * @param financial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(financial $entity)
    {
        $form = $this->createForm(new financialType(), $entity, array(
            'action' => $this->generateUrl('financial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new financial entity.
     *
     */
    public function newAction()
    {
        $entity = new financial();
        $form   = $this->createCreateForm($entity);

        return $this->render('EduEleraningBundle:financial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a financial entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:financial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find financial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:financial:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing financial entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:financial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find financial entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EduEleraningBundle:financial:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a financial entity.
    *
    * @param financial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(financial $entity)
    {
        $form = $this->createForm(new financialType(), $entity, array(
            'action' => $this->generateUrl('financial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing financial entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EduEleraningBundle:financial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find financial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('financial_edit', array('id' => $id)));
        }

        return $this->render('EduEleraningBundle:financial:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a financial entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EduEleraningBundle:financial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find financial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('financial'));
    }

    /**
     * Creates a form to delete a financial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('financial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
