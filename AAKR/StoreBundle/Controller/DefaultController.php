<?php

namespace AAKR\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AAKR\StoreBundle\Entity\Film;
use AAKR\StoreBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AAKRStoreBundle:Film')->findAll();
//        return $this-?render('array('entities' => $entities);
      
        return $this->render('AAKRStoreBundle:Default:add.html.twig', array('entities' => $entities));
    }
    public function dodajFilmAction()
    {
        $film = new Film();
        $film->setTitle($title);
        
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit')
            ->getForm();

        
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            return $this->redirect($this->generateUrl('task_success'));
        }
        
        return $this->render('AAKRStoreBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    public function zapiszFilmAction(){
        
        
        $film = new \AAKR\StoreBundle\Entity\Film();
        $film->setTitle($title);
        $film->setPrice($price);
        $film->setDescription($description);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($film);
        $em->flush();
        
        return $this->render('AAKRStoreBundle:Default:add.html.twig', array('text' => 'Dodalem do bazy'));
    }
}
