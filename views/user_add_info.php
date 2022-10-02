<?php

include __ROOT__."/views/header.html";

echo "Nom =". $data['nom'];
echo "<br>";
echo "Prénom =". $data['prenom'];
echo "<br>";
echo "Email =". $data['email'];
echo "<br>";
echo "Mdp =". $data['mdp'];
echo "<br>";
echo "dateDeNaissance =". $data['dateDeNaissance'];
echo "<br>";
if (!empty($POST(['sexe']))){
    echo "Sexe = "$data['sexe']; 
}
echo "<br>";
echo "Taille =". $data['taille'];
echo "<br>";
echo "Poids =". $data['poids'];
echo "<br>";
include __ROOT__."/views/footer.html";
?>
