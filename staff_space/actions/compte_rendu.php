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
                        $animal = $_POST['animal'];
                        $etat = $_POST['etat'];
                        $nourriture = $_POST['nourriture'];
                        $grammage = $_POST['grammage'];
                        $commentaire = $_POST['commentaire'];

                        // Préparer et exécuter la requête d'insertion
                        $sql = "INSERT INTO compte_rendus (animal, etat, nourriture, grammage, commentaire) VALUES (:animal, :etat, :nourriture, :grammage, :commentaire)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':animal', $animal);
                        $stmt->bindParam(':etat', $etat);
                        $stmt->bindParam(':nourriture', $nourriture);
                        $stmt->bindParam(':grammage', $grammage);
                        $stmt->bindParam(':commentaire', $commentaire);
                        $stmt->execute();

                        echo "<p>Nouveau compte rendu enregistré avec succès !</p><br>";

                        $sql = "INSERT INTO alimentations (animal, nourriture, grammage) VALUES (:animal, :nourriture, :grammage)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':animal', $animal);
                        $stmt->bindParam(':nourriture', $nourriture);
                        $stmt->bindParam(':grammage', $grammage);
                        $stmt->execute();



                        echo "<p>Nouveau repas pour " . $animal . " enregistré avec succès !</p><br>";

                        $sql = 'UPDATE animaux SET sante = :etat WHERE name = :animal';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':etat', $etat, PDO::PARAM_STR);
                        $stmt->bindParam(':animal', $animal, PDO::PARAM_INT);
                        $stmt->execute();

                        echo "<p>Santé de " . $animal . " mise à jour !</p><br>";
                    } catch (PDOException $e) {
                        die("Erreur d'ajout de compte rendu : " . $e->getMessage());
                    }
                    ?>
                    <button class="btn">
                        <a href="..\space_veterinaire.php">Retour espace veterinaire</a>
                    </button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>