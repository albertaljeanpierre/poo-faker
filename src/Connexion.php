<?php

namespace Casper\Exercice3;

// Fichier de configuration
/////////////////////////////
class Connexion {
    static public function getConnexion() {
        return new \PDO('mysql:host=localhost;dbname=poo2022', 'root', '', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }
}







