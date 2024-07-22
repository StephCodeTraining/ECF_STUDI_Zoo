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
        <div class="col acc">

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
                    $pseudo = $_POST['pseudo_user'];
                    $commentaire = $_POST['commentaire'];

                    // Préparer et exécuter la requête d'insertion
                    $sql = "INSERT INTO avis_utilisateurs (pseudo, commentaire) VALUES (:pseudo, :commentaire)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':pseudo', $pseudo);
                    $stmt->bindParam(':commentaire', $commentaire);
                    $stmt->execute();

                    echo "<p>Votre avis a été envoyer avec succès !</p><br>";
                } catch (PDOException $e) {
                    die("Erreur lors de l'envoi de votre avis " . $e->getMessage());
                }
                ?>
                <button>
                    <a href="..\..\index_zoo.php">Retour au site </a>
                </button>
            </div>
        </div>
    </section>
</body>

</html>