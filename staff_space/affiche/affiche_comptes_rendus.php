<?php
$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Suppression de l'utilisateur si le bouton de suppression est cliqué
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_compte_rendu'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM compte_rendus WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo '<div class="col">';
        echo "  Compte-rendu supprimé avec succès !<br>";
        echo '</div>';
    }

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT id, animal, etat, nourriture, grammage, date_passage, commentaire FROM compte_rendus";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result && count($result) > 0) {

        echo '<table>';
        echo '    <tr>';
        echo '        <th>Animal</th>';
        echo '        <th>Etat</th>';
        echo '        <th>Nourriture</th>';
        echo '        <th>Grammage</th>';
        echo '        <th>Date de Passage</th>';
        echo '        <th>Commentaire</th>';
        echo '        <th>Action</th>';
        echo '    </tr>';

        // Afficher chaque ligne de résultat dans le tableau HTML
        foreach ($result as $row) {
            echo '<tr>';
            echo '  <td>' . htmlspecialchars($row['animal']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['etat']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['nourriture']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['grammage']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['date_passage']) . '</td>';
            echo '  <td>' . htmlspecialchars($row['commentaire']) . '</td>';
            echo '  <td> ';
            echo '        <form method="post" style="display:inline;"> ';
            echo '            <input type="hidden" name="utilisateur" value="' . $_POST['utilisateur'] . '">';
            echo '            <input type="hidden" name="password" value="' . $_POST['password'] . '">';
            echo '            <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '"> ';
            echo '            <button class="btn" type="submit" name="delete_compte_rendu">Supprimer</button>';
            echo '        </form> ';
            echo '  </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<div class="col">';
        echo '  Aucun compte-rendu trouvé.';
        echo '</div>';
    }
} catch (PDOException $e) {
    die("Erreur de récupération des compte-rendus: " . $e->getMessage());
}
