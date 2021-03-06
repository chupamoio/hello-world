<?php

namespace App\Controller\crm;

use App\Entity\crm\Tramite;
use App\Form\crm\TramiteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\crm\Cliente;

class TramiteController extends Controller {

	/**
	 *
	 * @Route("/crm/tramite/form")
	 */
	public function save(Request $request) {
		$tramite = new Tramite();
		
		
// 		$tramite->setDescricao("NOVO PEDIDO DE CAMISETAS DA FRISIA");
// 		$tramite->setDtEntrada(new \DateTime('yesterday'));
		
		$tramite->setInserted(new \DateTime('now'));
		$tramite->setUpdated(new \DateTime('now'));
		
		$form = $this->createForm(TramiteType::class, $tramite);
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			// $form->getData() holds the submitted values
			// but, the original `$task` variable has also been updated
			$tramite = $form->getData();
			
			// ... perform some action, such as saving the task to the database
			// for example, if Task is a Doctrine entity, save it!
			// $entityManager = $this->getDoctrine()->getManager();
			// $entityManager->persist($task);
			// $entityManager->flush();
			
			return $this->redirectToRoute('task_success');
		} else {
			$form->getErrors(true, false);
		}
		
		return $this->render('crm/tramiteForm.html.twig', array (
				'form' => $form->createView() 
		));
	}
}