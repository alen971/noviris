<?php
namespace NO\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NO\FrontBundle\Entity\Internaute;
use NO\FrontBundle\Form\Type\InternauteType;
use Symfony\Component\Validator\Constraints\DateTime;

//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class DefaultController extends Controller
{
    public function indexAction()
    {	
	
        $request = $this->get('request');

/*	Entite régissant l'internaute au sein de la BDD*/		
		$internaute = new Internaute();

/*	Formulaire + Traitement de sa saisie	*/
	    $form = $this->get('form.factory')->create(new InternauteType(), $internaute);

/*	Sur une action POST	*/		
		if ($request->getMethod() == 'POST') {
			$form->handleRequest($request);
/*	Si la saisie est valide	*/		
			if ($form->isValid()) {
/*	Sauvegarde	*/		
				$internaute->setDatedenaissance(new \DateTime($internaute->getDatedenaissance()));
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($internaute);
				$em->flush();
/*	Redirection	*/		
				$url = $this->generateUrl('_added', array('id'=>$internaute->getId()));
				return $this->redirect($url);
			}
		}
/*	Formulaire + Traitement de sa saisie	*/
		
/*	Chercher en BDD les internautes les plus agés	*/		
		$oldest_internautes = $this->getDoctrine()->getEntityManager()
		->getRepository('NOFrontBundle:Internaute')->getInternautesLesPlusAges(3);
		
/*	Renvoyer la vue	*/		
        return $this->render('NOFrontBundle:Default:index.html.twig',array('form' => $form->createView(), 'internaute' => $internaute, 'oldest_internautes' => $oldest_internautes));
    }
	
/*	quand on a saisie un internaute	*/		
	public function addedAction($id)
	{
/*	Renvoyer l'internaute a partir de son id, bien evidemment il faudrais baliser si jamais $internaute ne renvoie rien mais pas demande et pas le temps	*/		
		$internaute = $this->getDoctrine()->getRepository('NOFrontBundle:Internaute')->find($id);
/*	url pour une petite redirection rapide */
		$url = $this->generateUrl('_index');
        return $this->render('NOFrontBundle:Default:added.html.twig',array('prenom' => $internaute->getPrenom(),'url' => $url));
	}
	
	public function adminAction()
	{
		$all_internautes = $this->getDoctrine()->getEntityManager()
		->getRepository('NOFrontBundle:Internaute')->gettAllInternautes();
        return $this->render('NOFrontBundle:Default:admin.html.twig',array('all_internautes' => $all_internautes));
	}
	
}
