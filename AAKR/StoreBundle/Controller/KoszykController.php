<?php

namespace AAKR\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AAKR\StoreBundle\Entity\Film;
use AAKR\StoreBundle\Entity\Recenzja;
use AAKR\StoreBundle\Entity\Koszyk;
 

/**
 * Description of KoszykController
 *
 * @author Robert
 */
class KoszykController extends Controller {
    
   public function dodajDoKoszykaAction($idFilmu, $idUzytkownika, $cena){
        
     
       
        $koszyk = new Koszyk();
        $koszyk->setIdFilmu($idFilmu);
        $koszyk->setIdUzytkownika($idUzytkownika);
        $koszyk->setCena($cena);
        $koszyk->setZrealizowano(false);
            
        $em = $this->getDoctrine()->getManager();
        $em->persist($koszyk);
        $em->flush();

        $response = $this->forward('AAKRStoreBundle:Film:pokazFilmy', array(
        'komunikat'  => 'Dodalem do koszyka',
        'idUzytkownika' => $idUzytkownika,
        ));
        return $response;
    }
    
    public function pokazKoszykAction($idUzytkownika){
        
        
        
        $indexyFilmow = $this->getDoctrine()
        ->getRepository('AAKRStoreBundle:Koszyk')
        ->findAll();
        
//        $tablicaIndexow;
        for($i=0; $i < count($indexyFilmow);$i++){
            $tablicaIndexow[$i] = $indexyFilmow[$i]->getIdFilmu();
        }
        
        for($i=0; $i < count($tablicaIndexow);$i++){
            $film = $this->getDoctrine()
            ->getRepository('AAKRStoreBundle:Film')
            ->find($tablicaIndexow[$i]);
            $filmy[$i] = $film; 
        }

        if (!$filmy) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return $this->render('AAKRStoreBundle:Default:koszyk.html.twig', array(
            'filmy' => $filmy,
            'komunikat' => '',
            'idUzytkownika' => $idUzytkownika,
        ));
    }
}
