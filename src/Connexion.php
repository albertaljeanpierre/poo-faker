<?php

namespace Casper\Exercice3;

class Connexion
{
    public function __construct()
    {
        try {
           return $connexion = new \PDO('mysql:host=localhost;dbname=poo2022', 'root', '', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);

        } catch (Exception $exc) {
            die('Erreur : ' . $exc->getMessage());
        }
    }


}



