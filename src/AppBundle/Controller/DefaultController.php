<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('index/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    public function postAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $iduser= $user->getId();
        $tab = [];
        $listerecus = $em->getRepository('AppBundle:Post')->findAll();
        foreach ($listerecus as $pst)
        {
            $thisAuteur = $em->getRepository('AppBundle:User')->findOneById($pst->getAuteur());
            $tab[] = array(
                'auteur' => $thisAuteur->getUsername(),
                'contenu' => $pst->getContenu(),            
            );
        }
        return $this->render('index/index.html.twig', array( 
            'tab'=> $tab,
        ));
    }
    public function postNewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $contenu = $request->request->get('contenu');
        
        
        $object = new Post();
        $object->setContenu($contenu);
        $object->setAuteur($user->getId());
        $em->persist($object);
        $em->flush();
        
        $url = $this->generateUrl('post');
        $response = new RedirectResponse($url);
        return $response;
    }
}
