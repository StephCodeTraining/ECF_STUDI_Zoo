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

                    // --------------------------------------------------------- Connexion ac PDO

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
                        $host = 'localhost';
                        $dbname = 'arcadia';
                        $username = 'root';
                        $password = '';

                        try {
                            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Récupérer les données du formulaire
                            $email = $_POST['email'];
                            $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT); // Hachage du mot de passe
                            $statut = $_POST['statut'];

                            // Préparer et exécuter la requête d'insertion
                            $sql = "INSERT INTO staff (email, mdp, statut) VALUES (:email, :mdp, :statut)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':mdp', $mdp);
                            $stmt->bindParam(':statut', $statut);
                            $stmt->execute();

                            echo "Nouvel utilisateur: " . $email . " ajouté avec succès !<br>";
                        } catch (PDOException $e) {
                            die("Erreur d'ajout de l'utilisateur: " . $e->getMessage());
                        }
                    }
                    ?>
                    <button class="btn">
                        <a href="..\space_admin.php">Retour espace admin</a>
                    </button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>