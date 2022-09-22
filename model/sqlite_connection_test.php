<table>
    <thead>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de naissance</th>
        <th>Sexe</th>
        <th>Taille</th>
        <th>Poids</th>
        <th>Email</th>
    </thead>
<?php
require_once 'UserDAO.php';

$result = UtilisateurDAO::getInstance() -> findAll();

var_dump($result);

$table = '</td><td>';

foreach ($result as $row) {
    echo "<tbody><td>" . $row['nom'] . $table . $row['prenom'] . $table . $row['dateDeNaissance'] . $table . $row['sexe'] . $table . $row['taille'] . $table . $row['poids'] . $table . $row['email'] . "</td></tbody>";
}
?>
</table>