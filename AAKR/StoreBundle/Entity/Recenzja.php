<?php

namespace AAKR\StoreBundle\Entity;

/**
 * Description of Recenzja
 *
 * @author Robert
 */
class Recenzja {
   
//    private $id;
//    private $id_Filmu;
//    private $recenzja;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $id_Filmu;

    /**
     * @var string
     */
    private $recenzja;


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
     * @return Recenzja
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
     * Set recenzja
     *
     * @param string $recenzja
     * @return Recenzja
     */
    public function setRecenzja($recenzja)
    {
        $this->recenzja = $recenzja;

        return $this;
    }

    /**
     * Get recenzja
     *
     * @return string 
     */
    public function getRecenzja()
    {
        return $this->recenzja;
    }
}
