<div class="ctnr_menu">
    <menu>
        <ul class="row">
            <li><a href=".\index_zoo.php">Accueil</a></li>
            <li><a href=".\page_animaux.php">Animaux</a></li>
            <li><a href=".\page_services.php">Services</a></li>
            <li><a href=".\page_contact.php">Contact</a></li>
        </ul>
    </menu>
</div>
<main>
    <section class="row">
        <div class="acc">
            <h2>Nos Habitats</h2>
            <div class="col">
                <p>
                    A Arcadia chaque visiteur est invité à explorer les habitats diversifiés qui abritent nos incroyables résidents. Nos espaces sont conçus pour recréer fidèlement les environnements naturels de chaque espèce, permettant à nos animaux de vivre dans des conditions proches de celles de leur habitat d'origine.
                    <br><br>

                    Traversez les vastes plaines africaines où règnent les lions majestueux, explorez les forêts denses de l'Asie du Sud-Est où se cachent les éléphants et les tigres, et plongez dans les eaux glacées de l'Antarctique en compagnie des pingouins. Chaque habitat est soigneusement aménagé pour reproduire les écosystèmes uniques, des savanes arides aux jungles luxuriantes, des déserts arides aux récifs coralliens vibrants.
                    <br><br>

                    Notre zoo ne se contente pas de montrer des animaux, il raconte l'histoire de leurs maisons. Les visiteurs apprendront comment ces habitats soutiennent la biodiversité, les défis qu'ils affrontent et les efforts de conservation entrepris pour les protéger. En recréant ces environnements, nous espérons sensibiliser le public à l'importance de préserver les habitats naturels pour les générations futures.
                    <br><br>

                    Venez découvrir ces mondes captivants et laissez-vous transporter dans une aventure à travers les écosystèmes les plus extraordinaires de notre planète. Votre voyage à Arcadia sera non seulement une exploration de la faune mondiale, mais aussi une célébration des habitats diversifiés qui rendent notre Terre si unique.
                </p>
            </div>
        </div>
    </section>
    <?php

    $host = 'localhost';
    $dbname = 'arcadia';
    $username = 'root';
    $password = '';


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Préparer et exécuter la requête pour récupérer les données
        $sql = "SELECT * FROM habitats";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();


        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($result as $habitat) {
            echo '<section class="row">';
            echo '<div class="acc">';
            echo '  <div class="row">';
            echo '      <div class="infos_habitat">';
            echo          '<h3>' . $habitat['name']  . '</h3><br>';
            echo            $habitat['description']  . '<br>';
            echo '      </div>';
            echo "         <img class=\" img_habitat\" src=ressources.\habitats\\" . $habitat['image'] . " alt=\"savane\">";
            echo '  </div>';

            $filtre = $habitat['name'];
            $sql = 'SELECT * FROM animaux WHERE habitat = :name';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $filtre);
            $stmt->execute();


            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<div class="row">';
            echo '<div class="col"><h4>Occupants :</h4></div>';
            foreach ($result as $animal) {

                echo ' <a href=page_animaux.php#' . $animal['name'] . '><img class=img_animal_small src=ressources.\animaux\\' . $animal['image'] . ' alt=""></a>';
            }
            echo '</div>';

            echo '</div>';
            echo '</section>';
        }
    } catch (PDOException $e) {
        die("Erreur lors de l'envoi de votre avis " . $e->getMessage());
    }
    ?>

</main>