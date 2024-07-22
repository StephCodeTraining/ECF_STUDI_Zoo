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
                    $email_contact = $_POST['email_contact'];
                    $sujet_contact = $_POST['sujet_contact'];
                    $message_contact = $_POST['message_contact'];

                    // Préparer et exécuter la requête d'insertion
                    $sql = "INSERT INTO messagerie (email_contact,sujet_contact, message_contact) VALUES (:email_contact, :sujet_contact, :message_contact)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':email_contact', $email_contact);
                    $stmt->bindParam(':sujet_contact', $sujet_contact);
                    $stmt->bindParam(':message_contact', $message_contact);
                    $stmt->execute();

                    echo "Votre demande a été envoyée avec succès !<br>";
                } catch (PDOException $e) {
                    die("Erreur lors de l'envoi de votre demande " . $e->getMessage());
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