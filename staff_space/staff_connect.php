<?php

$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';

$user = $_POST['utilisateur'];
$mdp = $_POST['password'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($user === 'admin' && $mdp === '123') {
        include ".\space_admin.php";
    } else {
        $sql = "SELECT * FROM staff WHERE email = :user ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result && count($result) > 0) {

            foreach ($result as $staff) {
                if ($user === $staff['email'] && $mdp === $staff['mdp'] && $staff['statut'] === 'staff_Zoo') {
                    include ".\space_employee.php";
                } elseif ($user === $staff['email'] && $mdp === $staff['mdp'] && $staff['statut'] === 'veterinaire') {
                    include ".\space_veterinaire.php";
                }
            }
        } else {
            var_dump($_POST);
            include 'echec_staff_connect.php';
        }
    }
} catch (PDOException $e) {
    die("Erreur de récupération des utilisateurs: " . $e->getMessage());
}
