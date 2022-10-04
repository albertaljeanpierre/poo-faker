<?php

require '../vendor/autoload.php';
//require_once '../vendor/fzaninotto/faker/src/autoload.php';

//require_once '../src/Entity/Personne.php';
//require_once '../src/manager/PersonneManager.php';

use Casper\Exercice3\manager\PersonneManager;
use Casper\Exercice3\Connexion;

//$faker = Faker\Factory::create('fr_BE');
//echo $faker->name;


//$personneManager = new PersonneManager($faker);
//$personnes = $personneManager->create(3);

$listePersonnes =   PersonneManager::create(10);
 // var_dump($listePersonnes);

?>
<h1>Générer des données de la librairie fzaninotto\faker</h1>
<h2>Liste de données générée à la volée</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Pays</th>
        <th>Société</th>
    </tr>
    <?php
    foreach ($listePersonnes as $personne) {
        ?>
        <tr>
            <td><?php echo $personne->getNom();   ?></td>
            <td><?php  echo $personne->getPrenom() ; ?></td>
            <td><?php echo $personne->getAdresse();  ?></td>
            <td><?php  echo $personne->getCodePostal(); ?></td>
            <td><?php  echo $personne->getPays(); ?></td>
            <td><?php  echo $personne->getSociete() ; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php

$unePersonne = PersonneManager::create(1);
//dd( $unePersonne[0] ); // objet personne

$personneManager = new PersonneManager(Connexion::getConnexion());
// insertion des données en base
// $personneManager->insert($unePersonne[0]);

// Lecture des informations en base
$listePersonnesDb = $personneManager->readAll();

echo "<h2>Liste de données provenant de la base</h2>";
foreach ($listePersonnesDb as $personne) {
    echo $personne;
}

echo "<h2>Une donnée précise provenant de la base</h2>";
echo $personneManager->readById(4);

// Suppression d'une entrée en base
$personneManager->delete(5);


?>


