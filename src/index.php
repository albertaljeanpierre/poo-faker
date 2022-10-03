<?php

require '../vendor/autoload.php';
//require_once '../vendor/fzaninotto/faker/src/autoload.php';

//require_once '../src/Entity/Personne.php';
//require_once '../src/manager/PersonneManager.php';

use Casper\Exercice3\manager\PersonneManager;


//$faker = Faker\Factory::create('fr_BE');
//echo $faker->name;


//$personneManager = new PersonneManager($faker);
//$personnes = $personneManager->create(3);

$listePersonnes =   PersonneManager::create(10);
// var_dump($listePersonnes);

?>
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
//dd($unePersonne[0]); // objet personne

PersonneManager::insert($unePersonne[0]);


?>


