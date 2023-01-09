<?php
Class Utilisateur
{
    public string $nom = "";
    public string $prenom = "";
    public string $email = "";
    public int $annee_naissance = 0;
    public int $score = 0;
    public string $ville = "";

    public function age()
    {
        return date("Y") - $this->annee_naissance;
    }

    public function afficher()
    {
        $age = $this->age();

        echo "<div class=\"utilisateur\">
            <h1>Utilisateur</h1>
            <p>Nom : $this->nom</p>
            <p>Prénom : $this->prenom</p>
            <p>Ville : $this->ville</p>
            <p>Mail : $this->email</p>
            <p>Score : $this->score</p>
            <p>Age : $age ans</p>
        </div>";

    }
}



$utilisateur = new Utilisateur();
$utilisateur->nom = "Doe";
$utilisateur->prenom = "John";
$utilisateur->email = "toto@titi.com";
$utilisateur->annee_naissance = 1980;
$utilisateur->score = 100;
$utilisateur->ville = "Paris";

$utilisateur->afficher();
