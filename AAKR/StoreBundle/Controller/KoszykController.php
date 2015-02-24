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
        ->findAll($idUzytkownika);
        
        $tablica=array('jeden','dwa','trzy');
	$nieTablica="cztery";
	if(is_array($indexyFilmow)) 
	{ 
		echo 'To jest tablica <br/>'; 
	} 
	else 
	{ 
		echo'To nie jest tablica </br>'; 
	}
	if(is_array($nieTablica)) 
	{ 
		echo 'To jest tablica <br/>'; 
	} 
	else 
	{ 
		echo' To nie jest tablica </br>'; 
	}
        
        $ind = $indexyFilmow[0]->getIdFilmu();
        $ind = $indexyFilmow[1]->getIdFilmu();
        $ind = $indexyFilmow[0]->getIdFilmu();
        
//        $repository = $this->getDoctrine()
//        ->getRepository('AAKRStoreBundle:Koszyk');
//
//        $query = $repository->createQueryBuilder('id_Uzytkownika')
//            ->where('id_Uzytkownikap.price > :price')
//            ->setParameter('price', '19.99')
//            ->orderBy('p.price', 'ASC')
//            ->getQuery();
//
//$products = $query->getResult();
        
//        $indexyFilmow = $this->get('doctrine_mongodb')
//                ->getManager()
//                ->createQueryBuilder('AAKRStoreBundle:Koszyk')
//                ->field('id_Filmu')
//                ->getQuery()
//                ->execute();
        
//        foreach ($tab as $klucz => $wartosc)
//		echo "tab['".$klucz."'] ==". $wartosc;
//        
//        list ($klucz, $wartosc) = each ($tablica);
        
        
        
        for($i=0; $i < count($indexyFilmow);$i++){
            $koszyk = $indexyFilmow;
            
            $wartosc = $koszyk['id_Filmu'];
            $wartosc = $koszyk["id_Filmu"];
            $wartosc = $koszyk["id_Filmu"];
            
            list ($klucz, $wartosc) = each ($koszyk);
            
            
            $indeksy[$i] = $koszyk->getIdFilmu();
            $indeksy[$i] = $koszyk->getIdFilmu();
            foreach ($koszyk as $klucz => $wartosc){
		echo "tab['".$klucz."'] ==". $wartosc;
                echo "tab['".$klucz."'] ==". $wartosc;
            }
        }
        
        foreach( $indexyFilmow as $id_Filmu => $aValue )
        {
            $film = $this->getDoctrine()
            ->getRepository('AAKRStoreBundle:Film')
            ->findAll($aValue);
            $array[$i] = $film;
            $i++;
        }        
                
        
        
        
        $id_Filmow = array_keys($indexyFilmow, 'id_Filmu');
        
        $i=0;
        for (; $i<3;$i++){
            $tab[$i] = $indexyFilmow[$i][1];
        }
        foreach( $indexyFilmow as $id_Filmu => $aValue )
        {
            $film = $this->getDoctrine()
            ->getRepository('AAKRStoreBundle:Film')
            ->findAll($aValue);
            $array[$i] = $film;
            $i++;
        }
        
        $filmy = $array;

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
