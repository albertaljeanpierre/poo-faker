<?php


namespace Casper\Exercice3\Entity;


/**
 * Class Personne
 * @package Casper\Exercice3\Entity
 */
class Personne
{
    protected int $id = 0;

    /**
     * @var string
     */
    protected string $nom;
    /**
     * @var string
     */
    protected string $prenom;
    /**
     * @var string
     */
    protected string $adresse;
    /**
     * @var string
     */
    protected string $codePostal;
    /**
     * @var string
     */
    protected string $pays;
    /**
     * @var string
     */
    protected string $societe;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * @param mixed $societe
     */
    public function setSociete($societe): void
    {
        $this->societe = $societe;
    }

    /**
     * Personne constructor.
     * @param int $id
     * @param string $nom
     * @param string $prenom
     * @param string $adresse
     * @param string $codePostal
     * @param string $pays
     * @param string $societe
     */
    public function __construct(int $id, string $nom, string $prenom, string $adresse, string $codePostal, string $pays, string $societe)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->pays = $pays;
        $this->societe = $societe;
    }

    public function __toString()
    {
        return $this->getId() . ") ". $this->getNom() . " , " . $this->getPrenom() . " , " . $this->getAdresse() . " , " . $this->getCodePostal() . " , " . $this->getPays() . " , " . $this->getSociete() . " <br> ";
    }
}