<?php
Class Utilisateur
{
    public string $nom = "";
    public string $prenom = "";
    public string $email = "";
    public int $annee_naissance = 0;
    public int $score = 0;
    public string $ville = "";
    public array $historique_scores = [];
    public string $password = "";

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
            <p>Historique des scores : ";
        echo "<ul>";
        foreach ($this->historique_scores as $score) {
            echo "<li>$score</li>";
        }
        echo "</ul>
        </div>";

    }

    public function incrementeScore() {
        $this->score++;
    }

    public function ajouterScore() {
        $this->historique_scores[] = $this->score;
        // Réinitialisation du score
        $this->score = 0;
    }

    public function afficherJson() {
        echo json_encode($this);
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function checkPassword($password) {
        return password_verify($password, $this->password);
    }
}



$utilisateur = new Utilisateur();
$utilisateur->nom = "Doe";
$utilisateur->prenom = "John";
$utilisateur->email = "toto@titi.com";
$utilisateur->annee_naissance = 1980;
$utilisateur->score = 100;
$utilisateur->ville = "Paris";

$utilisateur->incrementeScore();
$utilisateur->ajouterScore();

$utilisateur->score = 42;
$utilisateur->ajouterScore();

$utilisateur->score = 123;
$utilisateur->ajouterScore();

$utilisateur->setPassword("123456");

if ($utilisateur->checkPassword("flkgjdlkgfj")) {
    echo "Mot de passe correct";
} else {
    echo "Mot de passe incorrect";
}

echo "<pre>";
$utilisateur->afficherJson();
echo "</pre>";