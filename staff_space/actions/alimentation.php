<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\..\css\style_global.css">
</head>

<body>
    <section class="row">
        <div class="acc">
            <div class="col">

                <?php

                $host = 'localhost';
                $dbname = 'arcadia';
                $username = 'root';
                $password = '';

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Récupérer les données du formulaire
                    $animal = $_POST['animal'];
                    $nourriture = $_POST['nourriture'];
                    $grammage = $_POST['grammage'];

                    // Préparer et exécuter la requête d'insertion
                    $sql = "INSERT INTO alimentations (animal, nourriture, grammage) VALUES (:animal, :nourriture, :grammage)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':animal', $animal);
                    $stmt->bindParam(':nourriture', $nourriture);
                    $stmt->bindParam(':grammage', $grammage);
                    $stmt->execute();

                    echo "Nouveau repas pour " . $animal . " enregistré avec succès !<br>";
                } catch (PDOException $e) {
                    die("Erreur d'ajout de compte rendu : " . $e->getMessage());
                }
                ?>
                <button class="btn">
                    <a href="..\space_employee.php">Retour espace employé</a>
                </button>
            </div>
        </div>
    </section>
</body>

</html>