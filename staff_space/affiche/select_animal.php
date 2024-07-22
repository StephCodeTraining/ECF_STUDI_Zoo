<?php
$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT name FROM animaux";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as $animal) {
        echo '<option value=' . $animal['name'] . '>' . $animal['name'] . '</option>';
    }
} catch (PDOException $e) {
    die("Erreur de récupération des utilisateurs: " . $e->getMessage());
}
