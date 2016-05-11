<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Message;
use Symfony\Component\HttpFoundation\RedirectResponse;
class MailboxController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    public function messagerieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $iduser= $user->getId();
        $tab = [];
        $tabenvoi = [];
        $listerecus = $em->getRepository('AppBundle:Message')->findByIdDestinataire($iduser);
        foreach ($listerecus as $msg)
        {
            $thisAuteur = $em->getRepository('AppBundle:User')->findOneById($msg->getIdExpediteur());
            $tab[] = array(
                'auteur' => $thisAuteur->getUsername(),
                'message' => $msg->getContenu(),            
            );
        }
        $listeenvoyes = $em->getRepository('AppBundle:Message')->findByIdExpediteur($iduser);
        foreach ($listeenvoyes as $msg)
        {
            $thisDestinataire = $em->getRepository('AppBundle:User')->findOneById($msg->getIdDestinataire());
            $tabenvoi[] = array(
                'auteur' => $thisDestinataire->getUsername(),
                'message' => $msg->getContenu(),            
            );
        }
        return $this->render('mailbox/messagerie.html.twig', array( 
            'tab'=> $tab,
            'tabenvoi'=> $tabenvoi,
        ));
    }
    public function messagerieNewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $message = $request->request->get('message');
        $destinataire = $request->request->get('destinataire');
        
        $requestmessage = $em->getRepository('AppBundle:User')->findOneByUsername($destinataire);
        $idDest = $requestmessage->getId();
        $object = new Message();
        $object->setContenu($message);
        $object->setIdExpediteur($user->getId());
        $object->setIdDestinataire($idDest);
        $em->persist($object);
        $em->flush();
        $url = $this->generateUrl('messagerie');
        $response = new RedirectResponse($url);
        return $response;
    }
}