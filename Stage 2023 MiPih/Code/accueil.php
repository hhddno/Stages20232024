<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header('Location: index.html');
    exit;
}

// Afficher le contenu de la page d'accueil pour l'utilisateur connecté
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $username; ?></h1>
    <p>Ceci est votre page d'accueil.</p>
    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
