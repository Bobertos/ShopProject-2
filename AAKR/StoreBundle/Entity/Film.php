<?php

namespace AAKR\StoreBundle\Entity;

class Film {
    
    protected $id;
    protected $tytul;
    protected $gatunek;
    protected $aktorzy;
    protected $cena;
   


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
     * Set tytul
     *
     * @param string $tytul
     * @return Film
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
    }

    /**
     * Get tytul
     *
     * @return string 
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Set gatunek
     *
     * @param string $gatunek
     * @return Film
     */
    public function setGatunek($gatunek)
    {
        $this->gatunek = $gatunek;

        return $this;
    }

    /**
     * Get gatunek
     *
     * @return string 
     */
    public function getGatunek()
    {
        return $this->gatunek;
    }

    /**
     * Set aktorzy
     *
     * @param string $aktorzy
     * @return Film
     */
    public function setAktorzy($aktorzy)
    {
        $this->aktorzy = $aktorzy;

        return $this;
    }

    /**
     * Get aktorzy
     *
     * @return string 
     */
    public function getAktorzy()
    {
        return $this->aktorzy;
    }

    /**
     * Set cena
     *
     * @param string $cena
     * @return Film
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
}
