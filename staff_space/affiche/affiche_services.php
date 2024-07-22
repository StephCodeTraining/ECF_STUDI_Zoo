<?php
$host = 'localhost';
$dbname = 'arcadia';
$username = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['modif_service'])) {
        $id = $_POST['id'];
        $description = $_POST['description'];
        try {
            $sql = 'UPDATE services SET description = :description WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            echo '<div class="col bg_w">';
            echo 'Description modifiée avec succes';
            echo '</div>';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Préparer et exécuter la requête pour récupérer les données
    $sql = "SELECT * FROM services";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as $service) {
?>

        <div class="acc">
            <h3><?= $service['id'] . " : " . $service['name'] ?></h3>
            <p id="service_<?= $service['id'] ?>"><?= $service['description'] ?></p>
            <button id="mdf_srvc_<?= $service['id'] ?>">Modifier</button>
            <div id="ctnr_desc<?= $service['id'] ?>" class="hide">
                <form method="post">
                    <div class="row">
                        <input type="hidden" name="utilisateur" value="<?= $_POST['utilisateur'] ?>">
                        <input type="hidden" name="password" value="<?= $_POST['password'] ?>">
                        <input type="hidden" name="id" value="<?= $service['id'] ?>">
                        <input type="text" name="description" value="<?= $service['description'] ?>">
                        <button class="btn" type="submit" name="modif_service">Valider</button>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
} catch (PDOException $e) {
    die("Erreur de récupération des utilisateurs: " . $e->getMessage());
}
?>