<?php

namespace GestionActualiteBundle\Controller;



use GestionActualiteBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller
{
    /**
     * Lists all comment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comments = $em->getRepository('GestionActualiteBundle:Comment')->findAll();

        return $this->render('@GestionActualite/TemplateFT/single-news.html.twig', array(
            'comments' => $comments,
        ));
    }
    /**
     * Lists all comment entities.
     *
     */
    public function index2Action()
    {
        $em = $this->getDoctrine()->getManager();

        $comments = $em->getRepository('GestionActualiteBundle:Comment')->findAll();

        return $this->render('@GestionActualite/TemplateBK/comments.html.twig', array(
            'comments' => $comments,
        ));
    }
    /**
     * Creates a new comment entity.
     *
     */
    public function newAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm('GestionActualiteBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('comment_show', array('id' => $comment->getId()));
        }

        return $this->render('GestionActualiteBundle:TemplateFT:single-news.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comment entity.
     *
     */
    public function showAction(Comment $comment)
    {
        $deleteForm = $this->createDeleteForm($comment);

        return $this->render('GestionActualiteBundle:TemplateFT:single-news.html.twig', array(
            'comment' => $comment,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing comment entity.
     *
     */
    public function editAction(Request $request, Comment $comment)
    {
        $deleteForm = $this->createDeleteForm($comment);
        $editForm = $this->createForm('GestionActualiteBundle\Form\CommentType', $comment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comment_edit', array('id' => $comment->getIdComment()));
        }

        return $this->render('@GestionActualite/TemplateFT/news-no-sidebar.html.twig', array(
            'comment' => $comment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comment entity.
     *
     */
    public function deleteAction(Request $request, Comment $comment , $idp , $id)
    {
        $form = $this->createDeleteForm($comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comment);
            $em->flush();
        }

        return $this->redirectToRoute('one_post', array(
            'idp'=> $comment->getIdPost(),
            'id'=>$comment->getIdUser()));
    }


    private function createDeleteForm(Comment $comment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comment_delete', array('id' => $comment->getIdComment())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

