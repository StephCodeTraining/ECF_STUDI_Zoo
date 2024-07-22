    <h3>Liste des Utilisateurs</h3>

    <?php
    $host = 'localhost';
    $dbname = 'arcadia';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Suppression de l'utilisateur si le bouton de suppression est cliqué
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM staff WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "Utilisateur supprimé avec succès !<br>";
        }

        // Préparer et exécuter la requête pour récupérer les données
        $sql = "SELECT id, email,statut, date_creation FROM staff";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Récupérer les résultats
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result && count($result) > 0) {
            echo '<table>';
            echo '  <tr> ';
            echo '      <th>Email</th> ';
            echo '      <th>Satut</th> ';
            echo '      <th>Date de Création</th> ';
            echo '      <th>Action</th> ';
            echo '  </tr>';

            // Afficher chaque ligne de résultat dans le tableau HTML
            foreach ($result as $row) {
                echo '<tr>';
                echo '  <td>' . htmlspecialchars($row['email']) . '</td>';
                echo '  <td>' . htmlspecialchars($row['statut']) . '</td>';
                echo '  <td>' . htmlspecialchars($row['date_creation']) . '</td>';
                echo '  <td> ';
                echo '    <form method="post" style="display:inline;"> ';
                echo '        <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '"> ';
                echo '        <button class="btn" type="submit" name="delete_user">Supprimer</button> ';
                echo '    </form> ';
                echo '  </td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Aucun utilisateur trouvé.';
        }
    } catch (PDOException $e) {
        die("Erreur de récupération des utilisateurs: " . $e->getMessage());
    }
    ?>