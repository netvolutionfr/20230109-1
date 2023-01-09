<?php
Class Utilisateur
{
    public string $nom = "";
    public string $prenom = "";
    public string $email = "";
    public int $annee_naissance = 0;
    public int $score = 0;
    public string $ville = "";
}



$utilisateur = new Utilisateur();
$utilisateur->nom = "Doe";
$utilisateur->prenom = "John";
$utilisateur->email = "toto@titi.com";
$utilisateur->annee_naissance = 1980;
$utilisateur->score = 100;
$utilisateur->ville = "Paris";
$annee = date("Y");
$age = $annee - $utilisateur->annee_naissance;

echo "<div class=\"utilisateur\">
    <h1>Utilisateur</h1>
    <p>Nom : $utilisateur->nom</p>
    <p>Prénom : $utilisateur->prenom</p>
    <p>Ville : $utilisateur->ville</p>
    <p>Mail : $utilisateur->email</p>
    <p>Score : $utilisateur->score</p>
    <p>Age : $age ans</p>
</div>";
