<?php
$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Suppression de l'utilisateur si le bouton de suppression est cliqué
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_message'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM messagerie WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Message supprimé avec succès !<br>";
    }

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT * FROM messagerie";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result && count($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Email</th>';
        echo '<th>Sujet</th>';
        echo '<th>Message</th>';
        echo '</tr>';

        // Afficher chaque ligne de résultat dans le tableau HTML
        foreach ($result as $message) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($message['email_contact']) . '</td>';
            echo '<td>' . htmlspecialchars($message['sujet_contact']) . '</td>';
            echo '<td>' . htmlspecialchars($message['message_contact']) . '</td>';
            echo '<td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="utilisateur" value="' . $_POST['utilisateur'] . '">
                <input type="hidden" name="password" value="' . $_POST['password'] . '">
                <input type="hidden" name="id" value="' . htmlspecialchars($message['id']) . '">
                <input type="submit" name="delete_message" value="Supprimer">
            </form>
            </td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Aucun message trouvé.';
    }
} catch (PDOException $e) {
    die("Erreur de récupération des messages: " . $e->getMessage());
}
