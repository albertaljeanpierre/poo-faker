<?php


namespace Casper\Exercice3\manager;


use Casper\Exercice3\Entity\Personne;
use Faker\Factory;
use Casper\Exercice3\Connexion;


/**
 * Class PersonneManager
 * @package Casper\Exercice3\manager
 */
class PersonneManager
{
    private $connexion;

    /**
     * @return mixed
     */
    public function getConnexion()
    {
        return $this->connexion;
    }

    /**
     * @param mixed $connexion
     */
    public function setConnexion($connexion): void
    {
        $this->connexion = $connexion;
    }

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    /**
     * Fonction static de création d'un nombre de fois des personnes
     * @param $nombre
     * @return array
     */
    public static function create($nombre): array
    {
        $faker = Factory::create('fr_BE');
//        $faker = Faker\Factory::create('fr_BE');

        $personnes = [];
        for ($i = 1; $i <= $nombre; $i++) {

            $personnes[] = new Personne(
                0,
                $faker->lastName,
                $faker->firstName,
                $faker->address,
                $faker->postcode,
                $faker->country,
                $faker->company
            );

        }
        return $personnes;
    }


    /**
     * Méthode d'insertion des données en base
     * @param Personne $personne Les données d'une personne à insérer
     */
    public function insert(Personne $personne)
    {
        $stmt = $this->getConnexion()->prepare(
            'INSERT INTO faker SET nom=:nom, prenom=:prenom, adresse=:adresse, codePostal=:codePostal, pays=:pays, societe=:societe'
        );
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getAdresse());
        $stmt->bindValue(':codePostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':societe', $personne->getSociete());

        $stmt->execute();
    }

    /**
     * Méthode qui lit toutes les données en base
     * @return array Tableau d"objet Personne
     */
    public function readAll()
    {
        $personnes = [];
        $query = $this->getConnexion()->query(
            "SELECT * FROM faker"
        );

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $personnes[] = new Personne(
                $data['id'],
                $data['nom'],
                $data['prenom'],
                $data['adresse'],
                $data['codePostal'],
                $data['pays'],
                $data['societe']
            );
        }
        return $personnes;
    }

    /**
     * Méthode qui affiche une personne en particulier de la base
     * @param int $id l'id de la base de donnée
     * @return Personne Les données d'une personne
     */
    public function readById(int $id)
    {
        $sqlQuery = 'SELECT id, nom, prenom, adresse, codePostal, pays , societe FROM faker WHERE id = :id';
        $Statement = $this->getConnexion()->prepare($sqlQuery);
        $Statement->execute([
            'id' => $id
        ]);
        $data = $Statement->fetch(\PDO::FETCH_ASSOC);
        return new Personne(
            $data['id'],
            $data['nom'],
            $data['prenom'],
            $data['adresse'],
            $data['codePostal'],
            $data['pays'],
            $data['societe'],
        );
    }
}