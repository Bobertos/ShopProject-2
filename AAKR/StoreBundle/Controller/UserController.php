<?php

namespace AAKR\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AAKR\StoreBundle\Entity\User;

/**
 * Description of UserController
 *
 * @author Robert
 */
class UserController extends Controller {
    
    public function dodajUserAction(\Symfony\Component\HttpFoundation\Request $request){
    
        $user = new User();
        $user->setName('');
        $user->setPassword('');
        
        $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('password', 'text')
            //->add('save', 'submit')
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
                        
            $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('password', 'text')
            ->getForm();
            
            return $this->render('AAKRStoreBundle:Default:user.html.twig', array(
                'form' => $form->createView(),
            ));
        
        }
        
        return $this->render('AAKRStoreBundle:Default:user.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    
}
