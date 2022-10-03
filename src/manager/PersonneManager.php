<?php


namespace Casper\Exercice3\manager;


use Casper\Exercice3\Entity\Personne;
use Faker\Factory;
use Casper\Exercice3\Connexion;


/**
 * Class PersonneManager
 * @package Casper\Exercice3\manager
 */
class PersonneManager extends Personne
{
    private Connexion $connexion;

    /**
     * @return mixed
     */
    static public function getConnexion()
    {
        $connexion = new Connexion();
        return $connexion;
    }

    /**
     * @param mixed $connexion
     */
    public function setConnexion($connexion): void
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


    static public function insert(Personne $personne) {
        dd(self::getConnexion());
        $stmt = self::getConnexion()->prepare(
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

}