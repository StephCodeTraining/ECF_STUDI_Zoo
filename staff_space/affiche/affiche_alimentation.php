<div class="col">
    <h3>Alimentation</h3>
</div>


<?php
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT * FROM alimentations";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="col">';
    echo '<table>';
    echo '    <thead>';
    echo '        <tr>';
    echo '            <th>Animal</th>';
    echo '            <th>Nourriture</th>';
    echo '            <th>Grammage</th>';
    echo '            <th>Date</th>';
    echo '        </tr>';
    echo '    </thead>';
    echo '    <tbody>';
    foreach ($result as $row) {
        echo '        <tr>';
        echo '          <td>' . $row['animal'] . '</td>';
        echo '          <td>' . $row['nourriture'] . '</td>';
        echo '          <td>' . $row['grammage'] . '</td>';
        echo '          <td>' . $row['date'] . '</td>';
        echo '        </tr>';
    }
    echo '     </tbody>';
    echo '</table>';
    echo '</div>';
} catch (PDOException $e) {
    die("Erreur de récupération des utilisateurs: " . $e->getMessage());
}
