<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Routing\Annotation\Route;

class FormController extends Controller {

    /**
     *
     * @Route("/new")
     */
	public function new(Request $request) {
		// creates a task and gives it some dummy data for this example
		$task = new Task();
		$task->setTask('Write a blog post');
// 		$task->setDueDate(new \DateTime('tomorrow'));
		
		$form = $this->createFormBuilder($task)
					->add('task', TextType::class)
					->add('dueDate', DateType::class, array('widget' => 'single_text', 'required' => false))
					->add('save', SubmitType::class, array (
							'label' => 'Create Task'))
					->getForm();
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			// $form->getData() holds the submitted values
			// but, the original `$task` variable has also been updated
			$task = $form->getData();
			
			// ... perform some action, such as saving the task to the database
			// for example, if Task is a Doctrine entity, save it!
			// $entityManager = $this->getDoctrine()->getManager();
			// $entityManager->persist($task);
			// $entityManager->flush();
			
			return $this->redirectToRoute('task_success');
		}
		
		return $this->render('form/new.html.twig', array(
				'form' => $form->createView(),
		));
	}
}