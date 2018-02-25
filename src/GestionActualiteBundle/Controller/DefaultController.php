<?php

namespace GestionActualiteBundle\Controller;

use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\StringType;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;
use GestionActualiteBundle\PostRepository;
use GestionActualiteBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use GestionActualiteBundle\Entity\Mail;
use GestionActualiteBundle\Entity\Post;

use GestionActualiteBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionActualiteBundle:Default:index.html.twig');
    }

    public function rechercheavanceeAction()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $dql = "SELECT post FROM GestionActualiteBundle:Post prod ORDER BY prod.nom";
        $this->param['posts'] = $em->createQuery($dql)->getResult();


        $request= $this->getRequest();

        $this->param['posta'] = false;

        $p['post']   = "tous";

        if($request->getMethod() == 'POST') {

            $this->param['posta'] = true;
            $p['post']    = $request->get('post');


            $this->param['posts']    = $em->getRepository('GestionActualiteBundle:Post')->getRechercheAvancee($p);
        }
        else {
            $this->param['posts']   = false;
        }

        $this->param['p'] = $p;

        return $this->render('GestionActualiteBundle:TemplateFT:feature-header-footer-1.html.twig', $this->param);
    }

    //


    public function allpostsAction(Request $request,$id)
    {


        ////////////////////////
        ///
        ///
        /// affichage posts
        $em = $this->getDoctrine()->getManager();

        $posts2 = $em->getRepository('GestionActualiteBundle:Post')->DQL();



        /////////////////////
        ///
        /// ajout post
        $post = new Post();
        $post ->setIdUser($id);
        $form = $this->createForm('GestionActualiteBundle\Form\PostType', $post);
        $form->handleRequest($request);


        $usr = $em->getRepository(User::class)->find($id);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $post->setIdUser($usr) ;
            $time = new \DateTime();
            $time->format('H:i:s \O\n Y-m-d');
            $post->setDate($time);

           $post->upload();

            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('details_post', array('idp' => $post->getIdPost(),'id' => $post->getIdUser()));
        }



        return $this->render('GestionActualiteBundle:TemplateFT:news-left-sidebar.html.twig', array(
            'posts' => $post,
            'post2'=> $posts2,
            'form' => $form->createView(),


        ));
    }


    public function rechercherPostAction() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $post = '';
            $motcle = $request->request->get('motcle');

            $em = $this->container->get('doctrine')->getEntityManager();

            if ($motcle != '') {
                $qb = $em->createQueryBuilder();

                $qb->select('a')
                    ->from('KodAnnuaireBundle:Contact', 'a')
                    ->where("a.nom LIKE :motcle OR a.email LIKE :motcle")
                    ->orderBy('a.nom', 'ASC')
                    ->setParameter('motcle', '%' . $motcle . '%');

                $query = $qb->getQuery();
                $contacts = $query->getResult();
            } else {
                $contacts = $em->getRepository('KodAnnuaireBundle:Contact')->findAll();
            }

            return $this->render('KodAnnuaireBundle:Repertoire:liste.html.twig', array(
                'contacts' => $contacts
            ));
        } else {
            return $this->listerAction();
        }
    }

    public function onePostAction(Request $request,$idp,$id)
    {


        $mail = new Mail();
        $form2= $this->createForm(MailType::class, $mail);
        $form2->handleRequest($request) ;
        if ( $form2->isSubmitted()&& $form2->isValid() ) {
            $message = Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('jawhar.b.a.96@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'GestionActualiteBundle:TemplateFT:email.html.twig',

                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom())

                    ),
                    'text/html'

                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));


        }



               /// affichage comment
        ///
        ///
        ///

        $em = $this->getDoctrine()->getManager();

        $comments = $em->getRepository('GestionActualiteBundle:Comment')->findAll();




        ////////////////
        // ajout d'un comment
        //

        $usr = $em->getRepository(User::class)->find($id);
        $usr=$this->getUser();
        $post = $em->getRepository(Post::class)->find($idp);
        $comment = new Comment();
        $form1 = $this->createForm('GestionActualiteBundle\Form\CommentType', $comment);
        $form1->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {
            $comment->setIdUser($usr);

            $comment->setIdPost($post);
            $time = new \DateTime();
            $time->format('H:i:s \O\n Y-m-d');
            $comment->setDate($time);

            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('details_post', array( 'idp' => $idp , 'id' =>$id ) );
        }

        return $this->render('GestionActualiteBundle:TemplateFT:single-news.html.twig', array(

            'post' => $post,
            'comments'=>$comments ,
            'comment' => $comment,
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
        ));
         }

    public function successAction(){
        return new Response("email envoyé avec succès, Merci de vérifier votre boite
mail.");
    }



}
