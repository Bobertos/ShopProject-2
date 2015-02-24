<?php

namespace Bronowicki\SampleBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Shop User Model
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Bronowicki\SampleBundle\Entity\ShopUserModelRepository")
 */
class ShopUserModel extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $clientID;
    /**
      * @ORM\Column(type="string", length=40)
      */
    protected $surname;

    /**
      * @ORM\Column(type="string", length=40)
      */
    protected $name;

    /**
      * @ORM\Column(type="string", length=11)
      */
    protected $pesel;

    /**
      * @ORM\Column(type="string", length=40)
      */
    protected $userType;
    /**
      * @ORM\Column(type="string", length=40)
      */

    #protected $email;

    /**
      * @ORM\Column(type="decimal", scale=2)
      */
    protected $borrowsNumber;

    /**
      * @ORM\Column(type="string", length=40)
      */
    protected $phone;

    /**
      * @ORM\Column(type="string", length=40)
      */
    #protected $password;

    /**
     * Get ID
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setImie($surname)
    {
        $this->surname = $surname;
        return $this;
    }
    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }
    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set Pesel
     *
     * @param string $pesel
     * @return User
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;
        return $this;
    }
    /**
     * Get Pesel
     *
     * @return string 
     */
    public function getPesel()
    {
        return $this->pesel;
    }
    /**
     * Set user type
     *
     * @param string $userType
     * @return User
     */
    public function setTypUsera($userType)
    {
        $this->userType = $userType;
        return $this;
    }
    /**
     * Get user type
     *
     * @return string 
     */
    public function getUserType()
    {
        return $this->userType;
    }
    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set borrows number
     *
     * @param string $borrowsNumber
     * @return User
     */
    public function setBorrowsNumber($borrowsNumber)
    {
        $this->borrowsNumber = $borrowsNumber;
        return $this;
    }
    /**
     * Get borrows number
     *
     * @return string 
     */
    public function getBorrowsNumber()
    {
        return $this->borrowsNumber;
    }
    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Get client ID
     *
     * @return integer 
     */
    public function getClientID()
    {
        return $this->clientID;
    }
    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}