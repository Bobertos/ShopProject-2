<?php

namespace AAKR\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Route;
use AAKR\StoreBundle\Entity\Film;
use AAKR\StoreBundle\Entity\Recenzja;
use AAKR\StoreBundle\Entity\Koszyk;
use AAKR\StoreBundle\Entity\User;

/**
 * Description of LoginClass
 *
 * @author Robert
 */
class LoginController extends Controller {
   
    public function zalogoujAction(\Symfony\Component\HttpFoundation\Request $request){
        $user = new User();
        $user->setName('');
        $user->getPassword('');

        
        $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('password', 'text')
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $response = $this->forward('AAKRStoreBundle:Film:pokazFilmy', array(
            'komunikat'  => 'Zalogowano',
            'idUzytkownika' => 10,
            ));
            
            
//            $route = new Route('/ShopProject/web/app_dev.php/', array('komunikat' => 'Zalogowano'));
//            return $this->redirect($route);
//            return $this->redirect($this->generateUrl('/ShopProject/web/app_dev.php/', 301));
            return $response;
        }
        
        return $this->render('AAKRStoreBundle:Default:zaloguj.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
