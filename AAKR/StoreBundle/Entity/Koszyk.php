<?php

namespace AAKR\StoreBundle\Entity;

/**
 * Description of Koszyk
 *
 * @author Robert
 */
class Koszyk {
    
    private $id;
    private $id_Filmu;
    private $id_Uzytkownika;
    private $cena;
    private $zrealizowano;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id_Filmu
     *
     * @param integer $idFilmu
     * @return Koszyk
     */
    public function setIdFilmu($idFilmu)
    {
        $this->id_Filmu = $idFilmu;

        return $this;
    }

    /**
     * Get id_Filmu
     *
     * @return integer 
     */
    public function getIdFilmu()
    {
        return $this->id_Filmu;
    }

    /**
     * Set id_Uzytkownika
     *
     * @param integer $idUzytkownika
     * @return Koszyk
     */
    public function setIdUzytkownika($idUzytkownika)
    {
        $this->id_Uzytkownika = $idUzytkownika;

        return $this;
    }

    /**
     * Get id_Uzytkownika
     *
     * @return integer 
     */
    public function getIdUzytkownika()
    {
        return $this->id_Uzytkownika;
    }

    /**
     * Set cena
     *
     * @param string $cena
     * @return Koszyk
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return string 
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set zrealizowano
     *
     * @param boolean $zrealizowano
     * @return Koszyk
     */
    public function setZrealizowano($zrealizowano)
    {
        $this->zrealizowano = $zrealizowano;

        return $this;
    }

    /**
     * Get zrealizowano
     *
     * @return boolean 
     */
    public function getZrealizowano()
    {
        return $this->zrealizowano;
    }
}
