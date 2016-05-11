<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use AppBundle\Entity\DataUser;
use FOS\UserBundle\Model\UserInterface;


/**
 * User controller.
 *
 */
class UserController extends Controller
{
	// public function userAction(Request $request)
 //    {
 //        // replace this example code with whatever you need
 //        return $this->render('modifyuser/modifyUser.html.twig', array(
 //        ));
 //    }

	    public function modifyUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $biographie = $request->request->get('biographie');
        $profilTwitter = $request->request->get('profilTwitter');
        $profilLinkedIn = $request->request->get('profilLinkedIn');
        $profilGithub = $request->request->get('profilGithub');
        $profilDoYouBuzz = $request->request->get('profilDoYouBuzz');

        
        $object = $em->getRepository('AppBundle:DataUser')->findOneByIdUser($user->getId());
        $object->setBiographie($biographie);
        $object->setProfilTwitter($profilTwitter);
        $object->setProfilLinkedIn($profilLinkedIn);
        $object->setProfilGithub($profilGithub);
        $object->setProfilDoYouBuzz($profilDoYouBuzz);
        $userid = $user -> getId();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:DataUser');
        $datauser = $repository->findOneById_user($userid);

        $em->persist($object);
        $em->flush();

        return $this->render('modifyuser/modifyUser.html.twig', array(
            'user'=>$user,
            'datauser'=>$datauser,
        ));
    }
    public function showProfilAction (Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this -> getUser();
        $userid = $user -> getId();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:DataUser');
        $datauser = $repository->findOneById_user($userid);
        return $this->render('default/profil.html.twig', array(
            'user'=>$user,
            'datauser'=>$datauser,
        ));
    }
}