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

    public function save() {
        $data = [
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "email" => $this->email,
            "annee_naissance" => $this->annee_naissance,
            "score" => $this->score,
            "ville" => $this->ville,
            "historique_scores" => $this->historique_scores,
            "password" => $this->password
        ];
        $json = json_encode($data);
        file_put_contents("data.json", $json);
    }

    public function load() {
        $json = file_get_contents("data.json");
        $data = json_decode($json, true);
        $this->nom = $data["nom"];
        $this->prenom = $data["prenom"];
        $this->email = $data["email"];
        $this->annee_naissance = $data["annee_naissance"];
        $this->score = $data["score"];
        $this->ville = $data["ville"];
        $this->historique_scores = $data["historique_scores"];
        $this->password = $data["password"];
    }
}



$utilisateur = new Utilisateur();
$utilisateur->load();

$utilisateur->setPassword("123456");

if ($utilisateur->checkPassword("flkgjdlkgfj")) {
    echo "Mot de passe correct";
} else {
    echo "Mot de passe incorrect";
}

echo "<pre>";
$utilisateur->afficherJson();
echo "</pre>";

$utilisateur->save();