<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifier les informations d'authentification
    if ($username === "utilisateur" && $password === "motdepasse") {
        // Authentification réussie
        echo "Authentification réussie ! Bienvenue, $username.";
    } else {
        // Authentification échouée
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>