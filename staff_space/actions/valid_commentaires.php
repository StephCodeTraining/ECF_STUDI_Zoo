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

                    $sql = "SELECT * FROM avis_utilisateurs";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    foreach ($_POST as $pseudo => $valid) {
                        if ($valid == 1) {
                            // $sql = "UPDATE utilisateurs SET email = :email WHERE id = :id"
                            $sql = " UPDATE avis_utilisateurs SET valide = :valid WHERE pseudo = :pseudo;";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':valid', $valid);
                            $stmt->bindParam(':pseudo', $pseudo);
                            $stmt->execute();
                            echo 'L\'avis de ' . $pseudo . ' as bien été enregistré.. <br>';
                        } elseif ($valid == 0) {
                            $sql = " DELETE FROM avis_utilisateurs WHERE `avis_utilisateurs`.`pseudo` = :pseudo ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':pseudo', $pseudo);
                            $stmt->execute();
                            echo 'L\'avis de ' . $pseudo . ' n\'as pas été enregistré.. <br>';
                        }
                    }

                    echo "<p>Traitement des commentaires effectués !</p><br>";
                } catch (PDOException $e) {
                    die("Erreur d'ajout de commentaire sur " . $name . " : " . $e->getMessage());
                }
                ?>
                <button>
                    <a href="..\space_employee.php">Retour espace du staff</a>
                </button>

            </div>
        </div>
    </section>
</body>

</html>