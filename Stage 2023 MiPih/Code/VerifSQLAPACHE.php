<?php
// Vérification du serveur SQL
$host = 'localhost'; 
$user = 'root'; 
$password = 'root'; 
$database = 'teststage';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
    echo "Erreur de connexion au serveur SQL : " . $mysqli->connect_error;
} else {
    echo "Connexion au serveur SQL réussie !";
    $mysqli->close();
}

// Vérification du serveur Apache
$url = 'http://localhost'; 

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode == 200) {
    echo "Le serveur Apache est accessible !";
} else {
    echo "Erreur de connexion au serveur Apache : Code HTTP " . $httpCode;
}
?>