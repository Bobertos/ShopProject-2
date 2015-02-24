<?php
namespace Grupa\ProjektBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Movie Model
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity
 */
 
 class MovieModel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
 
    private $id;

    /**
      * @var string
      * @ORM\Column(name="title", type="string", length=255)
      */
    private $title;

    /**
      * @var string
      * @ORM\Column(name="description", type="string", length=255)
      */
    private $description;

    /**
      * @var string
      * @ORM\Column(name="review", type="string", length=255)
      */
  
    private $review;

    /**
      * @var string
      * @ORM\Column(name="price", type="decimal", scale=2)
      */
    private $price;
    /**
      * @var string
      * @ORM\Column(name="note", type="decimal", length=255)
      */
    private $note;    
    
    /**
      * @var string
      * @ORM\Column(name="actorsList", type="string", length=255)
      */
    private $actorsList;
    
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
     * Set title
     *
     * @param string $title
     * @return Movies
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Set description
     *
     * @param string $description
     * @return Movies
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Set review
     *
     * @param string $review
     * @return Movies
     */
    public function setReview($review)
    {
        $this->review = $review;
        return $this;
    }
    /**
     * Get review
     *
     * @return string 
     */
    public function getRecenzje()
    {
        return $this->review;
    }
    /**
     * Set price
     *
     * @param string $price
     * @return Movies
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * Set note
     *
     * @param string $note
     * @return Movies
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }
    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * Set actors list
     *
     * @param string $actorsList
     * @return Movies
     */
    public function setActorsList($actorsList)
    {
        $this->actorsList = $actorsList;
        return $this;
    }
    /**
     * Get actors list
     *
     * @return string 
     */
    public function getActorsList()
    {
        return $this->actorsList;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->films = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add movies
     *
     * @param \Grupa\ProjektBundle\Entity\MovieModel $films
     * @return Movie
     */
    public function addMovies(\Grupa\ProjektBundle\Entity\MovieModel $movies)
    {
        $this->movies[] = $movies;
        return $this;
    }
    /**
     * Remove movies
     *
     * @param \Grupa\ProjektBundle\Entity\MovieModel $movies
     */
    public function removeMovies(\Grupa\ProjektBundle\Entity\MovieModel $movies)
    {
        $this->movies->removeElement($movies);
    }
    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }
}