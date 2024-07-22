<div class="ctnr_menu">
    <menu>
        <ul class="row">
            <li><a href=".\index_zoo.php">Accueil</a></li>
            <li><a href=".\page_habitats.php">Habitats</a></li>
            <li><a href=".\page_services.php">Services</a></li>
            <li><a href=".\page_contact.php">Contact</a></li>
        </ul>
    </menu>
</div>
<main>
    <section class="row">
        <div class="acc">
            <h2>Nos Animaux</h2>
            <div class="col">
                <p>
                    Arcadia est un lieu où la nature et la diversité animale se rencontrent pour offrir une expérience inoubliable à tous nos visiteurs. Notre zoo abrite une multitude d'espèces fascinantes venues des quatre coins du monde. Des majestueux lions de la savane africaine aux adorables pandas géants de Chine, en passant par les agiles pingouins de l'Antarctique, chaque animal ici est un ambassadeur de son habitat naturel.

                    En parcourant les allées de notre zoo, vous découvrirez des créatures étonnantes et apprendrez des faits captivants sur leur vie et leur environnement. Notre mission est de sensibiliser le public à la conservation de la faune et de la flore, tout en offrant une expérience éducative et divertissante pour tous les âges.

                    Rejoignez-nous pour un voyage extraordinaire à travers les merveilles du règne animal, et laissez-vous émerveiller par la beauté et la diversité de la vie sur notre planète.
                </p>
            </div>
        </div>
    </section>
    <section class="row ctnr_animaux">

        <?php

        $host = 'localhost';
        $dbname = 'arcadia';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            // Préparer et exécuter la requête pour récupérer les données
            $sql = "SELECT * FROM animaux";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();


            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result && count($result) > 0) {

                foreach ($result as $animal) {
                    echo '<div class="acc">';
                    echo '  <div class="col">';
                    echo '      <h3 id= ' . $animal['name'] . ' >' . $animal['name'] . '</h3> <br>';
                    echo '      <div class="ctnr_img_animal">';
                    echo "         <img class=img_animal src=ressources.\animaux\\" . $animal['image'] . " alt=\"\">";
                    echo '      </div>';
                    echo '      <button onclick=display_desc("' . $animal['name'] . '") class=btn_desc>Plus d\'infos</button>';
                    echo '  </div>';
                    // Description detail
                    echo '  <div id=infos_' . $animal['name'] . ' class="animal_desc">';
                    echo '    <div class="animal_desc_content">';
                    echo '        <h3>Nom : ' . $animal['name'] . '</h3>';
                    echo '        <h4>Race : ' . $animal['race'] . '</h4>';
                    echo '        <h4>Habitat : ' . $animal['habitat'] . '</h4>';
                    echo '        <h4>Santé actuelle : ' . $animal['sante'] . '</h4>';
                    echo '        <p>' . $animal['description'] . '</p>';

                    // Derniers repas
                    $sql = "SELECT * FROM alimentations WHERE animal = :animal  ORDER BY date DESC LIMIT 1";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':animal', $animal['name'], PDO::PARAM_STR);
                    $stmt->execute();

                    $repas = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($repas) {
                        echo '<h4>Dernier Repas : ' . $repas['grammage'] . 'g de ' . $repas['nourriture'] . '</h4>';
                        echo '<p class="date">' . $repas['date'] . '</p>';
                    }








                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col">';
                echo 'Aucun animal trouvé.';
                echo '</div>';
            }
        } catch (PDOException $e) {
            die("Erreur lors de l'envoi de votre avis " . $e->getMessage());
        }
        ?>



    </section>
</main>