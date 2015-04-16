<?php

namespace NO\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Internaute
 */
class Internaute
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $prenom;

    /**
     * @var string
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */	 
    private $email;

    /**
     * @var \DateTime
     * @Assert\Date()
     */
    private $datedenaissance;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $marque;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $modele;


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
     * Set nom
     *
     * @param string $nom
     * @return Internaute
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Internaute
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Internaute
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
     * Set datedenaissance
     *
     * @param \DateTime $datedenaissance
     * @return Internaute
     */
    public function setDatedenaissance($datedenaissance)
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    /**
     * Get datedenaissance
     *
     * @return \DateTime 
     */
    public function getDatedenaissance()
    {
        return $this->datedenaissance;
    }

    /**
     * Set marque
     *
     * @param string $marque
     * @return Internaute
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string 
     */
    public function getMarque()
    {
        return $this->marque;
    }
    /**
     * Get marquelabel
     *
     * @return string 
     */
    public function getMarquelabel()
    {
		//Cela devrais sortir de la base de données directement soit via ID en int soit enum à voir
		$label = array(1=>"Peugeot", 2=>"Renault", 3=>"Fiat");
        return $label[$this->marque];
    }
    /**
     * Set modele
     *
     * @param string $modele
     * @return Internaute
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string 
     */
    public function getModele()
    {
        return $this->modele;
    }
    /**
     * Get modelelabel
     *
     * @return string 
     */
    public function getModelelabel($marque)
    {
		//Cela devrais sortir de la base de données directement soit via ID en int soit enum à voir
		$label = array(1=>"Peugeot", 2=>"Renault", 3=>"Fiat");
		$label[1]=array(1=>"206", 2=>"508");
		$label[2]=array(1=>"Clio", 2=>"Megane");
		$label[3]=array(1=>"Punto");
		
        return $label[$marque][$this->modele];
    }
    public function getDatedenaissancelabel()
    {
        return date_format($this->datedenaissance,"d/m/Y");
    }	
}
