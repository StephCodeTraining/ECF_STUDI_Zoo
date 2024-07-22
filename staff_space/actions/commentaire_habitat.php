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
            <div class=" col valid">

                <?php
                $host = 'localhost';
                $dbname = 'arcadia';
                $username = 'root';
                $password = '';

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Récupérer les données du formulaire
                    $name = $_POST['name'];
                    $etat = $_POST['etat'];
                    $commentaire = $_POST['commentaire'];

                    // Préparer et exécuter la requête d'insertion
                    $sql = "INSERT INTO comentaires_habitats (name, etat, commentaire) VALUES (:name, :etat, :commentaire)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':etat', $etat);
                    $stmt->bindParam(':commentaire', $commentaire);
                    $stmt->execute();

                    echo "<p>Nouveau commentaire sur habitat enregistré avec succès !</p><br>";
                } catch (PDOException $e) {
                    die("Erreur d'ajout de commentaire sur " . $name . " : " . $e->getMessage());
                }
                ?>
                <button class="btn">
                    <a href="..\space_veterinaire.php">Retour espace veterinaire</a>
                </button>
            </div>
        </div>
    </section>
</body>

</html>