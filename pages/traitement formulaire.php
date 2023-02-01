<?php
    if (isset($_GET['formulaire'])) {
    echo "Coucou";
    $xml = new DOMDocument();
    $xml->load('./lib/XML/produits.xml');


$utilisateurs = $xml->createElement('utilisateurs');
$utilisateur = $xml->createElement('utilisateur');
$nom2 = $xml->createElement('Nom', $name);
$prenom2 = $xml->createElement('Prenom', $prenom);
$mdp2 = $xml->createElement('Mot de passe', $mdp);
$email2 = $xml->createElement('Email', $email);
$age2 = $xml->createElement('Age', $age);
$sexe2 = $xml->createElement('Sexe', $sexe);
$langue2 = $xml->createElement('Langue', $langue);
$games = $xml->createElement('Jeux');

$game = $xml->createElement('Jeu', $jeux1);


$xml->appendChild($utilisateurs);
$utilisateurs->appendChild($utilisateur);
$utilisateur->appendChild($nom2);
$utilisateur->appendChild($prenom2);
$utilisateur->appendChild($mdp2);
$utilisateur->appendChild($email2);
$utilisateur->appendChild($age2);
$utilisateur->appendChild($sexe2);
$utilisateur->appendChild($langue2);

echo $xml->save('./lib/XML/utilisateurs.xml');
}else{
echo "salut";
}

?>
