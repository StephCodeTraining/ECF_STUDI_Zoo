                <?php
                $host = 'localhost'; // Le nom d'hôte de votre serveur MySQL
                $dbname = 'arcadia'; // Le nom de votre base de données
                $username = 'root'; // Votre nom d'utilisateur MySQL
                $password = ''; // Votre mot de passe MySQL

                // Connexion
                try {
                    $pdo = new PDO("mysql:host=$host", $username, $password);
                    // Définir le mode d'erreur de PDO sur exception
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "Connexion réussie à MySQL<br>";
                } catch (PDOException $e) {
                    die("Connexion échouée: " . $e->getMessage());
                }

                // Création Data_base
                try {
                    $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
                    $pdo->exec($sql);
                    echo "Base de données créée avec succès<br>";

                    // création table ---------------------------------------------------------------------------------------------------- staff
                    $TableName = 'staff';
                    try {
                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo "Connexion réussie à la base de données $dbname<br>";

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) UNIQUE NOT NULL,
        mdp VARCHAR(50) NOT NULL,
        statut VARCHAR(50) NOT NULL,
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage());
                        }
                        // Ajout data ------------------------------------------------- satff

                        try {
                            // -------------------- employe_0
                            $name = "employe_0";
                            $email = "employe0@yahoo.com";
                            $mdp = "123";
                            $statut = "staff_Zoo";

                            $stmt = $pdo->prepare("INSERT INTO staff (email, mdp, statut) VALUES (:email, :mdp, :statut)");
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':mdp', $mdp);
                            $stmt->bindParam(':statut', $statut);
                            $stmt->execute();

                            echo "Nouveau Compte staff pour:" . $email . " crée avec succes<br>";
                        } catch (PDOException $e) {
                            if ($e->getCode() == 23000) { // Eviter duplicatat
                                echo "Erreur: Ce compte existe déja: " . $email . "<br>";
                            } else {
                                echo "Erreur lors de la création de service: " . $e->getMessage();
                            }
                        }
                        try {
                            // -------------------- veternaire_0
                            $name = "veternaire_0";
                            $email = "veterinaire0@yahoo.com";
                            $mdp = "321";
                            $statut = "veterinaire";

                            $stmt = $pdo->prepare("INSERT INTO staff (email, mdp, statut) VALUES (:email, :mdp, :statut)");
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':mdp', $mdp);
                            $stmt->bindParam(':statut', $statut);
                            $stmt->execute();

                            echo "Nouveau Compte staff pour:" . $email . " crée avec succes<br>";
                        } catch (PDOException $e) {
                            if ($e->getCode() == 23000) { // Eviter duplicatat
                                echo "Erreur: Ce compte existe déja: " . $email . "<br>";
                            } else {
                                echo "Erreur lors de la création de service: " . $e->getMessage();
                            }
                        }

                        // création table -------------------------------------------------------------------------------------------------- animaux
                        $TableName = 'animaux';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) UNIQUE NOT NULL,
        race VARCHAR(50) NOT NULL,
        habitat VARCHAR(50) NOT NULL,
        sante VARCHAR(50) NOT NULL,
        description TEXT NOT NULL,
        image VARCHAR(50) NOT NULL,
        FOREIGN KEY (habitat) REFERENCES habitats(name)
        )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage());
                        }


                        // Ajout data ------------------------------------------------- animaux
                        try {

                            // -------------------- Raja
                            $name = "Raja";
                            $race = "tigre";
                            $habitat = "jungle";
                            $sante = "bonne";
                            $image = "Raja.jpg";
                            $description = "Raja est le roi de la jungle avec ses rayures élégantes qui le rendent plus stylé que n'importe quel mannequin. Ses rugissements peuvent faire trembler les arbres, mais en vrai, il adore les câlins (si vous avez le courage de vous approcher !). Un gros chat qui rêve secrètement d'être une star de TikTok.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";


                            // -------------------- Tiphff
                            $name = "Tiphff";
                            $race = "elephant";
                            $habitat = "savane";
                            $sante = "moyenne";
                            $image = "Tiphff.jpg";
                            $description = "Tiphff est le plus grand des animaux terrestres, mais malgré sa taille, il est étonnamment délicat. Imaginez un poids lourd qui pourrait faire de la danse classique. Avec ses grandes oreilles, il capte tous les potins de la savane. Et sa trompe ? C'est à la fois une paille géante, un bras extensible et un arrosoir intégré !";


                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Sophie
                            $name = "Sophie";
                            $race = "giraffe";
                            $habitat = "savane";
                            $sante = "bonne";
                            $image = "Sophie.jpg";
                            $description = "Sophie est l'animal le plus grand et le plus élancé, avec un cou si long qu'elle pourrait changer une ampoule sans escabeau. Elle passe ses journées à manger des feuilles, car pour elle, le sommet des arbres est un buffet à volonté. Et avec son allure élégante, elle pourrait facilement être la nouvelle égérie d'une marque de mode.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Albert
                            $name = "Albert";
                            $race = "panda";
                            $habitat = "jungle";
                            $sante = "bonne";
                            $image = "Albert.jpg";
                            $description = "Albert est l'incarnation même de la mignonnerie. Avec son pelage noir et blanc, il ressemble à une grosse peluche vivante. Il passe ses journées à mâchouiller du bambou et à faire des roulades maladroites. Si le câlin était un sport olympique, le panda serait médaillé d'or à coup sûr.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Foxy
                            $name = "Foxy";
                            $race = "renard roux";
                            $habitat = "foret";
                            $sante = "bonne";
                            $image = "Foxy.jpg";
                            $description = " Foxy adore explorer chaque recoin de son habitat, à la recherche de petites aventures et de délicieux en-cas. Il a un flair incroyable pour dénicher les friandises cachées par ses soigneurs, prouvant à chaque fois qu’il est le Sherlock Holmes du monde animal. Mais ne vous y trompez pas, derrière ses yeux malicieux et son sourire rusé se cache un cerveau bien aiguisé ! ";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Leo
                            $name = "Leo";
                            $race = "lion";
                            $habitat = "savane";
                            $sante = "moyenne";
                            $image = "Leo.jpg";
                            $description = "  Leo, notre lion charismatique et plein de charme! Avec sa crinière royale et son rugissement impressionnant, Leo est sans conteste la star incontestée de notre zoo. Il passe ses journées à se prélasser sous le soleil, montrant fièrement sa crinière dorée aux visiteurs émerveillés. Mais ne vous laissez pas tromper par son air détendu! Quand il est l'heure du repas, Leo se transforme en un chasseur redoutable, même si son festin est soigneusement préparé par nos gardiens attentionnés. ";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Louis
                            $name = "Louis";
                            $race = "gorille";
                            $habitat = "jungle";
                            $sante = "bonne";
                            $image = "Louis.jpg";
                            $description = "  Louis passe ses journées à explorer son habitat luxuriant, grimper aux arbres et se balancer d'une branche à l'autre avec une agilité impressionnante. Mais ce qu'il préfère par-dessus tout, c'est observer les visiteurs avec curiosité. Parfois, il se met même à imiter leurs gestes, ce qui provoque des éclats de rire chez petits et grands. Quand il ne joue pas les acrobates, Louis adore résoudre des puzzles et manipuler des objets. ";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Grimm
                            $name = "Grimm";
                            $race = "ours brun";
                            $habitat = "foret";
                            $sante = "bonne";
                            $image = "Grimm.jpg";
                            $description = "  Quand il ne dort pas ou ne se régale pas, Grimm adore jouer dans l'eau. Qu'il s'agisse de barboter dans sa piscine ou de jouer avec des ballons flottants, il sait comment transformer n'importe quel moment en fête aquatique. Et si vous le voyez jongler avec des pommes, ne soyez pas surpris - c'est l'un de ses nombreux talents cachés!";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Lancelot
                            $name = "Lancelot";
                            $race = "cerf";
                            $habitat = "foret";
                            $sante = "bonne";
                            $image = "Lancelot.jpg";
                            $description = "  Lancelot passe ses journées à gambader dans son vaste enclos, broutant l'herbe tendre et explorant chaque recoin de son habitat. Il adore s'allonger à l'ombre des arbres, savourant la tranquillité de la nature tout en gardant un œil sur ses admirateurs humains.  Il est particulièrement friand des jeux de cache-cache et est un expert pour se fondre dans le paysage. Ses courses rapides et élégantes à travers son enclos sont un spectacle magnifique, souvent accompagnées de petits bonds joyeux.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Patty
                            $name = "Patty";
                            $race = "panthère des neiges";
                            $habitat = "montagne";
                            $sante = "bonne";
                            $image = "Patty.jpg";
                            $description = "Quand elle n'est pas perchée sur une haute falaise ou en train de se prélasser sur une corniche rocheuse, Patty aime jouer avec des balles de neige et des jouets en forme de proie. Son passe-temps favori est de sauter de rocher en rocher avec une agilité impressionnante, montrant ainsi ses incroyables talents d'acrobate. Patty a un talent particulier pour les surprises! Parfois, elle disparaît derrière une formation rocheuse pour réapparaître soudainement, laissant les visiteurs émerveillés. Elle aime aussi chasser les ombres, une activité qui la divertit beaucoup et amuse les spectateurs. Et si vous avez de la chance, vous pourriez l'entendre émettre son célèbre miaulement doux, une rare mélodie dans le silence neigeux.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Barbiche
                            $name = "Barbiche";
                            $race = "bouquettin";
                            $habitat = "montagne";
                            $sante = "moyenne";
                            $image = "Barbiche.jpg";
                            $description = "Quand il ne s'amuse pas à gravir les parois rocheuses, Barbiche adore jouer à cache-cache avec ses compagnons de zoo. Il est un expert pour se dissimuler dans les recoins les plus inattendus, défiant ainsi les visiteurs à le repérer. Ses sauts spectaculaires d'un rocher à l'autre sont un spectacle à ne pas manquer, souvent accompagnés de petits bêlements joyeux.  Avec ses cornes majestueuses et sa silhouette élégante, il sait exactement comment se positionner pour offrir la meilleure vue. Les photographes en herbe adorent capturer ses moments de bravoure sur les hauteurs. Et si vous lui apportez une friandise spéciale comme des feuilles de houx ou des herbes fraîches, il pourrait même descendre pour une rencontre rapprochée et amicale.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Skye
                            $name = "Skye";
                            $race = "aigle";
                            $habitat = "montagne";
                            $sante = "bonne";
                            $image = "Skye.jpg";
                            $description = "Skye adore jouer avec des jouets suspendus et des proies simulées. Son activité préférée est sans doute de plonger en piqué pour attraper des objets que les gardiens lancent en l'air, montrant ainsi son incroyable vitesse et précision. Ses démonstrations de vol sont un véritable spectacle, laissant les visiteurs émerveillés par sa grâce et sa puissance.  Les enfants aiment essayer d'imiter ses cris perçants, bien que personne ne puisse rivaliser avec sa voix majestueuse. Et si vous avez de la chance, vous pourriez le voir déployer ses ailes en grand, offrant une vue imprenable de son envergure impressionnante.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Tuba
                            $name = "Tuba";
                            $race = "tortue";
                            $habitat = "ocean";
                            $sante = "bonne";
                            $image = "Tuba.jpg";
                            $description = "Tuba aime se faufiler sous les feuilles et les rochers, parfois jouant à cache-cache avec ses amis de l'enclos. Elle peut aussi passer des heures à observer les visiteurs, remuant doucement la tête comme si elle comprenait chaque mot. Ses promenades lentes mais régulières sont un spectacle apaisant et amusant pour tous. Elle semble toujours prête à poser pour une photo. Les enfants adorent essayer de la faire bouger plus vite en l'encourageant gentiment, bien que Turbo préfère prendre son temps. Et si vous avez de la chance, vous pourriez la voir étirer ses pattes et son cou dans une pose de détente parfaite.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";

                            // -------------------- Echo
                            $name = "Echo";
                            $race = "dauphin";
                            $habitat = "ocean";
                            $sante = "bonne";
                            $image = "Echo.jpg";
                            $description = "Echo aime bien explorer les différents recoins de son bassin, cherchant des cachettes et observant les visiteurs avec curiosité. Elle adore aussi montrer ses compétences en communication, répondant aux signaux de ses entraîneurs avec enthousiasme et intelligence.  Avec ses sauts gracieux et ses pirouettes dans l'eau, elle transforme chaque représentation en un ballet aquatique éblouissant. Les enfants adorent imiter ses cris joyeux et essayer de reproduire ses mouvements, créant ainsi une atmosphère de fête sous-marine.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";
                            // -------------------- Olga
                            $name = "Olga";
                            $race = "otarie";
                            $habitat = "ocean";
                            $sante = "bonne";
                            $image = "Olga.jpg";
                            $description = "Olga adore jouer avec des balles et des anneaux flottants, montrant une adresse incroyable et une agilité étonnante. Elle est également un pro du jonglage avec des balles et des objets en plastique, ce qui fait rire petits et grands à chaque fois.. C'est une véritable comédienne dans l'âme ! Elle adore faire des grimaces et des tours de magie improvisés, utilisant ses nageoires pour jongler avec des balles et des poissons en peluche. Les enfants adorent imiter ses mouvements et lui offrir des applaudissements enthousiastes, ce qui le pousse à en faire toujours plus pour son public ravi.";

                            $stmt = $pdo->prepare("INSERT INTO animaux (name, race, habitat, sante, image, description ) VALUES (:name, :race, :habitat, :sante, :image , :description )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':race', $race);
                            $stmt->bindParam(':habitat', $habitat);
                            $stmt->bindParam(':sante', $sante);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouvel animal " . $name . " enregistré avec succes<br>";
                        } catch (PDOException $e) {
                            if ($e->getCode() == 23000) { // Eviter duplicatat
                                echo "Erreur: Cet animal existe déja: " . $name . "<br>";
                            } else {
                                echo "Erreur lors de l'enregistrementde l'animal: " . $e->getMessage();
                            }
                        }

                        // création table -------------------------------------------------------------------------------------------------- Habitats
                        $TableName = 'habitats';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) UNIQUE NOT NULL,
        image VARCHAR(50) NOT NULL,
        description TEXT NOT NULL,
        liste_animaux VARCHAR(50) NOT NULL
        )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage());
                        }

                        // Ajout data ------------------------------------------------- habitats
                        try {

                            // -------------------- Savane
                            $name = "Savane";
                            $image = "savane.jpg";
                            $description = "Chaque détail de cet habitat a été pensé pour reproduire les conditions naturelles de la savane. Les étendues herbeuses, les points d'eau, et les formations rocheuses offrent non seulement un cadre esthétique mais aussi des éléments essentiels pour le bien-être des animaux. Des programmes d'enrichissement comportemental sont mis en place pour stimuler les instincts naturels de nos résidents, garantissant ainsi leur épanouissement et leur santé.";
                            $liste_animaux = "Tiphff";

                            $stmt = $pdo->prepare("INSERT INTO habitats (name, image, description, liste_animaux) VALUES (:name,  :image , :description, :liste_animaux )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->bindParam(':liste_animaux', $liste_animaux);
                            $stmt->execute();

                            echo "Nouvel habitat " . $name . " enregistré avec succes<br>";


                            // -------------------- Jungle
                            $name = "Jungle";
                            $image = "jungle.webp";
                            $description = "L'habitat de la jungle est généralement aménagé pour reproduire fidèlement l'environnement naturel des forêts tropicales. Des arbres imposants, aux troncs épais et aux feuillages luxuriants, dominent le paysage. Des plantes grimpantes et des lianes serpentent le long des arbres, créant un réseau dense de verdure. Les fougères, les orchidées et diverses plantes épiphytes ajoutent à la diversité végétale. Des sentiers sinueux, parfois recouverts de feuilles mortes, invitent les visiteurs à explorer l'habitat de manière immersive. Pour simuler les conditions climatiques de la jungle, l'habitat est maintenu à une température et une humidité élevées. Des systèmes de brumisation sont souvent utilisés pour recréer l'humidité constante et les pluies fréquentes caractéristiques des forêts tropicales. Cela non seulement favorise la santé des plantes et des animaux, mais contribue également à l'authenticité de l'expérience pour les visiteurs.";
                            $liste_animaux = "Albert";

                            $stmt = $pdo->prepare("INSERT INTO habitats (name, image, description, liste_animaux) VALUES (:name,  :image , :description, :liste_animaux )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->bindParam(':liste_animaux', $liste_animaux);
                            $stmt->execute();

                            echo "Nouvel habitat " . $name . " enregistré avec succes<br>";


                            // -------------------- Foret
                            $name = "Foret";
                            $image = "foret.jpg";
                            $description = "L'habitat est aménagé avec des arbres majestueux tels que des chênes, des érables et des pins, dont les cimes forment une canopée dense. Des sentiers sinueux recouverts de feuilles et de mousse mènent les visiteurs à travers un paysage de fougères, de buissons et de fleurs sauvages. Des troncs d'arbres tombés et des rochers couverts de lichen ajoutent à l'authenticité du décor.L'habitat de la forêt accueille des espèces variées comme les cerfs, les renards, et les ratons laveurs, qui se déplacent librement dans l'espace. Des oiseaux chanteurs tels que les mésanges et les merles ajoutent une mélodie douce, tandis que les écureuils et les lapins peuvent être vus gambader parmi les arbres et les buissons. Des panneaux éducatifs informent les visiteurs sur la biodiversité et l'importance des écosystèmes forestiers. Des activités d'enrichissement telles que des mangeoires suspendues et des cachettes pour la nourriture encouragent les comportements naturels des animaux, les maintenant actifs et engagés.";
                            $liste_animaux = "Foxy";

                            $stmt = $pdo->prepare("INSERT INTO habitats (name, image, description, liste_animaux) VALUES (:name,  :image , :description, :liste_animaux )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->bindParam(':liste_animaux', $liste_animaux);
                            $stmt->execute();

                            echo "Nouvel habitat " . $name . " enregistré avec succes<br>";


                            // -------------------- Montagne
                            $name = "Montagne";
                            $image = "montagne.jpg";
                            $description = "L'habitat est caractérisé par des formations rocheuses escarpées, des falaises abruptes et des pentes parsemées de conifères robustes comme les pins et les sapins. Des sentiers sinueux serpentent à travers des prairies alpines fleuries et des éboulis, créant une atmosphère authentique de haute montagne. Cet habitat abrite des animaux adaptés aux conditions montagneuses. Les bouquetins et les chamois escaladent avec agilité les parois rocheuses, tandis que les ours bruns et les lynx rôdent discrètement à la recherche de nourriture. Des oiseaux de proie tels que les aigles et les faucons survolent majestueusement les hauteurs, ajoutant une touche spectaculaire au décor.  Des activités d'enrichissement, comme des structures d'escalade et des cachettes de nourriture, encouragent les comportements naturels des animaux, les maintenant actifs et engagés.";
                            $liste_animaux = "Olgga";

                            $stmt = $pdo->prepare("INSERT INTO habitats (name, image, description, liste_animaux) VALUES (:name,  :image , :description, :liste_animaux )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->bindParam(':liste_animaux', $liste_animaux);
                            $stmt->execute();

                            echo "Nouvel habitat " . $name . " enregistré avec succes<br>";

                            // -------------------- Ocean
                            $name = "Ocean";
                            $image = "ocean.jpg";
                            $description = "L'habitat est aménagé avec de vastes bassins d'eau salée, des récifs coralliens colorés et des plages de sable fin. Des tunnels de verre permettent aux visiteurs de marcher sous l'eau et d'observer la vie marine de près, créant une expérience immersive unique. Cet habitat abrite une grande variété de créatures marines. Des poissons tropicaux aux couleurs vives nagent parmi les coraux, tandis que les raies glissent gracieusement dans les eaux. Des requins imposants et des tortues de mer ajoutent une dimension spectaculaire. Les lions de mer et les phoques peuvent être vus jouant et se prélassant sur les rochers. Les récifs coralliens, les herbiers marins et les grottes sous-marines offrent des refuges naturels pour les animaux, favorisant des comportements instinctifs. Les courants artificiels et les variations de profondeur des bassins imitent les conditions océaniques, assurant une stimulation et un environnement enrichissant pour les animaux.";
                            $liste_animaux = "Echo";

                            $stmt = $pdo->prepare("INSERT INTO habitats (name, image, description, liste_animaux) VALUES (:name,  :image , :description, :liste_animaux )");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':description', $description);
                            $stmt->bindParam(':liste_animaux', $liste_animaux);
                            $stmt->execute();

                            echo "Nouvel habitat " . $name . " enregistré avec succes<br>";
                        } catch (PDOException $e) {
                            if ($e->getCode() == 23000) { // Eviter duplicatat
                                echo "Erreur: Cet habitat existe déja: " . $name . "<br>";
                            } else {
                                echo "Erreur lors de l'enregistrement de l'habitat: " . $e->getMessage();
                            }
                        }

                        // création table -------------------------------------------------------------------------------------------------- Services
                        $TableName = 'services';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) UNIQUE NOT NULL,
        description TEXT NOT NULL
        )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage());
                        }
                        // Ajout data ------------------------------------------------- services
                        try {
                            // -------------------- RESTAURATION
                            $name = "Restauration";
                            $description = "Pour satisfaire toutes les envies gourmandes, notre zoo dispose de plusieurs points de restauration répartis sur l'ensemble du site. Que vous ayez envie d'un repas complet, d'un en-cas rapide ou d'une boisson rafraîchissante, nos restaurants et kiosques sauront répondre à toutes vos attentes. Nous proposons des menus variés, incluant des options végétariennes et des repas adaptés pour les enfants. Vous pouvez profiter de votre repas en plein air dans nos aires de pique-nique ombragées, tout en admirant la vue sur les enclos des animaux.";

                            $stmt = $pdo->prepare("INSERT INTO services (name, description) VALUES (:name, :description)");

                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouveau service " . $name . " crée avec succes<br>";

                            // -------------------- VISITE HABITATS
                            // -----
                            $name = "Visite des Habitats";
                            $description = "Pour une immersion complète et éducative, nous offrons des visites guidées des habitats animaliers. Accompagnés par nos guides expérimentés et passionnés, vous découvrirez des informations fascinantes sur les différentes espèces, leurs comportements, leurs habitats naturels et les efforts de conservation en cours. Nos visites guidées sont une occasion unique de voir les animaux de plus près, d'apprendre à les connaître et de poser toutes vos questions à nos experts. Ces visites sont gratuites, adaptées à tous les âges et sont parfaites pour les familles, les groupes scolaires ou toute personne souhaitant approfondir ses connaissances sur le règne animal.";

                            $stmt = $pdo->prepare("INSERT INTO services (name, description) VALUES (:name, :description)");
                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouveau service " . $name . " crée avec succes<br>";

                            // -------------------- VISITE ZOO TRAIN
                            // -----

                            $name = "Visite avec le train";
                            $description = "Pour explorer le zoo de manière ludique et confortable, embarquez à bord de notre petit train touristique. Le tour du zoo en petit train est une excellente manière de voir l'ensemble du parc sans se fatiguer, tout en profitant des commentaires en direct sur les animaux et les installations. Le train effectue plusieurs arrêts stratégiques, vous permettant de descendre et remonter à votre guise pour visiter les enclos qui vous intéressent le plus. Ce service est idéal pour les familles avec de jeunes enfants, les personnes à mobilité réduite, ou tout simplement pour ceux qui souhaitent découvrir le zoo sous un autre angle.";

                            $stmt = $pdo->prepare("INSERT INTO services (name, description) VALUES (:name, :description)");
                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            echo "Nouveau service " . $name . " crée avec succes<br>";
                        } catch (PDOException $e) {
                            if ($e->getCode() == 23000) { // Eviter duplicatat
                                echo "Erreur: Ce service existe déja: " . $name . "<br>";
                            } else {
                                echo "Erreur lors de la création de service: " . $e->getMessage();
                            }
                        }

                        // création table -------------------------------------------------------------------------------------------------- Compte_rendus
                        $TableName = 'compte_rendus';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        animal VARCHAR(50) NOT NULL,
        etat VARCHAR(50) NOT NULL,
        nourriture VARCHAR(50) NOT NULL,
        grammage VARCHAR(50) NOT NULL,
        date_passage TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        commentaire TEXT NOT NULL
        )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage() . "<br>");
                        }

                        // création table -------------------------------------------------------------------------------------------------- comentaires_habitats
                        $TableName = 'comentaires_habitats';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        etat VARCHAR(50) NOT NULL,
        commentaire TEXT NOT NULL
        )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage() . "<br>");
                        }
                        // création table -------------------------------------------------------------------------------------------------- alimentations
                        $TableName = 'alimentations';
                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        animal VARCHAR(50) NOT NULL,
        nourriture VARCHAR(50) NOT NULL,
        grammage VARCHAR(50) NOT NULL,
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage() . "<br>");
                        }


                        // création table -------------------------------------------------------------------------------------------------- avis_utilisateurs
                        $TableName = 'avis_utilisateurs';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                pseudo VARCHAR(50) NOT NULL,
                commentaire TEXT NOT NULL,
                valide INT(1)  NOT NULL
                )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage());
                        }
                        // création table -------------------------------------------------------------------------------------------------- messagerie
                        $TableName = 'messagerie';

                        try {
                            $sql = "CREATE TABLE IF NOT EXISTS " . $TableName . "(
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                email_contact VARCHAR(50) NOT NULL,
                sujet_contact VARCHAR(50) NOT NULL,
                message_contact TEXT NOT NULL
                )";

                            $pdo->exec($sql);
                            echo "Table " . $TableName . " créée avec succès<br>";
                        } catch (PDOException $e) {
                            die("Erreur de création de la table: " . $e->getMessage());
                        }
                    } catch (PDOException $e) {
                        die("Connexion échouée: " . $e->getMessage());
                    }
                } catch (PDOException $e) {
                    die("Erreur de création de la base de données: " . $e->getMessage());
                }


                $pdo = null;
                // ----- à détailé pour chaque table
                ?>


                <!-- Suppr Data_Base -->
                <h2>Supprimer la Base de Données</h2>
                <form method="post">
                    <input type="submit" name="delete_db" value="Reset DataBase">
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_db'])) {

                    try {
                        $pdo = new PDO("mysql:host=$host", $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo "Connexion réussie à MySQL<br>";
                    } catch (PDOException $e) {
                        die("Connexion échouée: " . $e->getMessage());
                    }

                    try {
                        $sql = "DROP DATABASE IF EXISTS $dbname";
                        $pdo->exec($sql);
                        echo "Base de données '$dbname' supprimée avec succès<br>";
                    } catch (PDOException $e) {
                        die("Erreur de suppression de la base de données: " . $e->getMessage());
                    }
                }
                ?>
                </div>
                </div>
                </section>
                </body>

                </html>