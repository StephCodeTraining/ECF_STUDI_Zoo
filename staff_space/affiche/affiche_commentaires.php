<?php

$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT id, pseudo, commentaire, valide FROM avis_utilisateurs WHERE valide = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result && count($result) > 0) {

        echo '<form action=".\actions\valid_commentaires.php" method="post" class=row>';

        foreach ($result as $commentaire) {

            echo '<div class="col bg_w">';
            echo '  <h3>Avis de : <br>' . $commentaire['pseudo'] . '</h3>';
            echo '  <p>"' . $commentaire['commentaire'] . '"</p>';
            echo '  <div class="row">';
            echo '      <input type="radio" name="' . $commentaire['pseudo'] . '" value="1" />';
            echo '      <label for="' . $commentaire['pseudo'] . '" class="inline-label">Valide</label>';
            echo '  </div>';
            echo '  <div class="row">';
            echo '      <input type="radio" name="' . $commentaire['pseudo'] . '" value="0" />';
            echo '      <label for="' . $commentaire['pseudo'] . '" class="inline-label">Suppr</label>';
            echo '  </div>';
            echo "</div>";
        }
        echo '<button type="submitt" >Valider</button>';
        echo '</form>';
    } else {
        echo '<div class="col bg_w">';
        echo 'Aucun commentaire trouvé.';
        echo '</div>';
    }
} catch (PDOException $e) {
    die("Erreur de récupération des commentaires: " . $e->getMessage());
}
