<?php
$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Suppression du commentaire si le bouton de suppression est cliqué
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_commentaire'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM comentaires_habitats WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo '<div class="col">';
        echo "Commentaire supprimé avec succès !<br>";
        echo '</div>';
    }

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT id, name, etat, commentaire FROM comentaires_habitats";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result && count($result) > 0) {
        echo '<table>';
        echo '<tr> ';
        echo '  <th>Habitat</th> ';
        echo '  <th>Etat</th> ';
        echo '  <th>Commentaire</th> ';
        echo '  <th>Action</th> ';
        echo '</tr>';

        // Afficher chaque ligne de résultat dans le tableau HTML
        foreach ($result as $row) {
            echo '<tr>';
            echo '  <td>' . htmlspecialchars($row['name']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['etat']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['commentaire']) . '</td>';
            echo '  <td> ';
            echo '      <form method="post" style="display:inline;"> ';
            echo '          <input type="hidden" name="utilisateur" value="' . $_POST['utilisateur'] . '">';
            echo '          <input type="hidden" name="password" value="' . $_POST['password'] . '">';
            echo '          <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '"> ';
            echo '          <button class="btn" type="submit" name="delete_commentaire">Supprimer</button>';
            echo '      </form> ';
            echo '  </td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<div class="col">';
        echo 'Aucun commentaire trouvé.';
        echo '</div>';
    }
} catch (PDOException $e) {
    die("Erreur de récupération des commentaires: " . $e->getMessage());
}
