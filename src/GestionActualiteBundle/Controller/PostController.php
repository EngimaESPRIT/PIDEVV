<?php

namespace GestionActualiteBundle\Controller;



use GestionActualiteBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('GestionActualiteBundle:Post')->findAll();

        return $this->render('GestionActualiteBundle:TemplateFT:news-left-sidebar.html.twig', array(
            'posts' => $posts,
        ));
    }

    public function index2Action()
    {
        $em = $this->getDoctrine()->getManager();

        $posts2 = $em->getRepository('GestionActualiteBundle:Post')->findAll();

        return $this->render('GestionActualiteBundle:TemplateBK:Posts.html.twig', array(
            'posts2' => $posts2,
        ));
    }

    /**
     * Creates a new post entity.
     *
     */
    public function newAction(Request $request )
    {
        $em = $this->getDoctrine()->getManager();

        $posts2 = $em->getRepository('GestionActualiteBundle:Post')->findAll();





        /////////////////////
        $post = new Post();
        $form = $this->createForm('GestionActualiteBundle\Form\PostType', $post);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getIdPost()));
        }


        return $this->render('GestionActualiteBundle:TemplateFT:single-news.html.twig', array(
            'posts' => $post,
            'post2'=> $posts2,
            'form' => $form->createView(),
        ));
    }



    /**
     * Finds and displays a post entity.
     *
     */
    public function showAction(Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);

        return $this->render('GestionActualiteBundle:TemplateFT:single-news.html.twig', array(
            'post' => $post,

        ));
    }

    /**
     * Displays a form to edit an existing post entity.
     *
     */
    public function editAction(Request $request, $idP, $id)
    {
        $post = $this->getDoctrine()->getRepository('GestionActualiteBundle:Post')->find($idP);
        $img = $post->getImg1();
        $post->setImg1('');
        $deleteForm = $this->createDeleteForm($post);
        $editForm = $this->createForm('GestionActualiteBundle\Form\PostType', $post);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $post->upload();
            $this->getDoctrine()->getManager()->flush();

            $usr = $this->getDoctrine()->getRepository('MyAppUserBundle:User')->find($id);

            return $this->redirectToRoute('details_post', array('idp' => $post->getIdPost(),'id'=>$usr));
        }
$post->setImg1($img);
        return $this->render('GestionActualiteBundle:TemplateFT:news-no-sidebar.html.twig', array(
            'post' => $post,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }




    /**
     * Deletes a post entity.
     *
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('post_index');
    }


    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getIdPost())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

