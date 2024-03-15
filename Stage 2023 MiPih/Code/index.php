<?php
// Vérifier la disponibilité du serveur SQL
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'teststage';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
    echo "Erreur de connexion au serveur SQL : " . $mysqli->connect_error;
    exit;
}

// Vérifier la disponibilité du serveur Apache
$siteUrl = 'http://localhost'; // Remplacez par l'URL de votre site web

$curl = curl_init($siteUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if ($httpCode !== 200) {
    echo "Erreur de connexion au serveur Apache.";
    exit;
}

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['username'])) {
    // Rediriger vers la page d'accueil ou une autre page protégée
    header('Location: accueil.php');
    exit;
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'authentification dans la base de données
    $query = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Authentification réussie, enregistrer les informations de l'utilisateur dans la session
        $_SESSION['username'] = $username;

        // Rediriger vers la page d'accueil ou une autre page protégée
        header('Location: accueil.php');
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}

// Fermer la connexion à la base de données
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color:
        }