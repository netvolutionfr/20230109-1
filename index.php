<?php
Class Utilisateur
{
    public string $nom = "";
    public string $prenom = "";
    public string $email = "";
    public int $annee_naissance = 0;
    public int $score = 0;
}

$utilisateur = new Utilisateur();
$utilisateur->nom = "Doe";
$utilisateur->prenom = "John";
$utilisateur->email = "toto@titi.com";
$utilisateur->annee_naissance = 1980;
$utilisateur->score = 100;

echo $utilisateur->nom;