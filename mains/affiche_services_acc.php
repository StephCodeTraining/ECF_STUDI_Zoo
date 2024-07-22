<?php
$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT * FROM services";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as $service) {
?>

        <h4><?= $service['name'] ?></h4>
        <div class="col">
            <p class="service" id="service_<?= $service['id'] ?>"><?= $service['description'] ?></p>
        </div>
<?php
    }
} catch (PDOException $e) {
    die("Erreur de récupération des utilisateurs: " . $e->getMessage());
}
?>