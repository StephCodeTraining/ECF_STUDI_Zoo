<div class="col">

    <div>

        <?php

        $host = 'localhost';
        $dbname = 'arcadia';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // Préparer et exécuter la requête pour récupérer les données
            $sql = "SELECT * FROM avis_utilisateurs WHERE valide = 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();


            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($user && count($user) > 0) {

                foreach ($user as $avis) {
                    echo '<div class=" avis">';
                    echo '    <h3>' . $avis['pseudo'] . '</h3> <br>';
                    echo '    <p>"' . $avis['commentaire'] . '"</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col">';
                echo 'Aucun commentaire trouvé.';
                echo '</div>';
            }
        } catch (PDOException $e) {
            die("Erreur lors de l'envoi de votre avis " . $e->getMessage());
        }
        ?>

    </div>
</div>