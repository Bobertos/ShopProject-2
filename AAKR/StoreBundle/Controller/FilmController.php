<?php

namespace AAKR\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AAKR\StoreBundle\Entity\Film;
use AAKR\StoreBundle\Entity\Recenzja;
use AAKR\StoreBundle\Entity\Koszyk;

class FilmController extends Controller
{
    
    public function dodajFilmAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $film = new Film();
        $film->setTytul('');
        $film->setGatunek('');
        $film->setAktorzy('');
        $film->setCena('');
        
        $form = $this->createFormBuilder($film)
            ->add('tytul', 'text')
            ->add('gatunek', 'text')
            ->add('aktorzy', 'text')
            ->add('cena', 'text')    
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
            
            $film->setTytul('');
            $film->setGatunek('');
            $film->setAktorzy('');
            $film->setCena('');
            
            $form = $this->createFormBuilder($film)
            ->add('tytul', 'text')
            ->add('gatunek', 'text')
            ->add('aktorzy', 'text')
            ->add('cena', 'text')    
            ->getForm();
            
            return $this->render('AAKRStoreBundle:Default:dodaj_film.html.twig', array(
            'form' => $form->createView(),
        ));
        }
        
        return $this->render('AAKRStoreBundle:Default:film.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    public function dodajRecenzjeAction($id, $tytul, \Symfony\Component\HttpFoundation\Request $request){
        
        
        $recenzja = new Recenzja();
        $recenzja->setIdFilmu($id);
        
//        $recenzja->setRecenzja('');
        
        $form = $this->createFormBuilder($recenzja)
            ->add('recenzja', 'textarea')
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($recenzja);
            $em->flush();
                        
            return $this->pokazFilmyAction($komunikat = "Zapisałem recenzje!");
        
            
        }
        
        return $this->render('AAKRStoreBundle:Default:dodaj_recenzje.html.twig', array(
            'form' => $form->createView(),
            'id' => $id,
            'tytul' => $tytul,
        ));
        
    }
    
    public function zapiszRecenzjeAction(\Symfony\Component\HttpFoundation\Request $request){
        
        $recenzja = new Recenzja();
        $form = $this->createFormBuilder($recenzja)
            ->add('recenzja', 'textarea')
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($recenzja);
            $em->flush();
                        
            return $this->render('AAKRStoreBundle:Default:zapisalem_recenzje.html.twig', array(
                'form' => $form->createView(),
            ));
        }
        
        return $this->render('AAKRStoreBundle:Default:film.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }


    public function pokazFilmyAction($komunikat = "", $idUzytkownika = 1){
        
        $filmy = $this->getDoctrine()
        ->getRepository('AAKRStoreBundle:Film')
        ->findAll();

        if (!$filmy) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return $this->render('AAKRStoreBundle:Default:index.html.twig', array(
            'filmy' => $filmy,
            'komunikat' => $komunikat,
            'idUzytkownika' => $idUzytkownika,
        ));
    }
    
    public function pokazFilmAction($id, $idUzytkownika){

        $film = $this->getDoctrine()
        ->getRepository('AAKRStoreBundle:Film')
        ->find($id);

        $wszystkieRecenzje = $this->getDoctrine()
        ->getRepository('AAKRStoreBundle:Recenzja')
        ->findAll();
        

        for($i=0; $i < count($wszystkieRecenzje);$i++){
            if($wszystkieRecenzje[$i]->getIdFilmu()== $id){
                $recenzjeFilmu[$i] = $wszystkieRecenzje[$i]->getRecenzja();
            }
        }
        
        
        
        if (!$recenzjeFilmu) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        return $this->render('AAKRStoreBundle:Default:pokaz_film.html.twig', array(
           'film' => $film,
           'recenzjeFilmu' => $recenzjeFilmu,
           'idUzytkownika' => $idUzytkownika,
        ));
    }
    
    
}


