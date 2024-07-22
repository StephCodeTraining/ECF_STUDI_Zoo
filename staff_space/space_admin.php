<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>space_admin</title>
    <link rel="stylesheet" href="..\css\style_global.css">
    <link rel="stylesheet" href="..\css\staff_space.css">
    <link rel="stylesheet" href="..\css\formulaires.css">

</head>

<body>
    <header class="row">
        <div>
            <h1>Espace Administrateur</h1>
        </div>
        <div class="logo">
            <a href="..\index_zoo.php">

                <img src="..\ressources\header_footer\logo.png" alt="Zoo Logo">
            </a>
        </div>
    </header>
    <main>
        <!-- Création d'employé -->
        <h2>Gestion du personel</h2>
        <section class="row">
            <div class="form-container">
                <h3>Ajouter un Utilisateur</h3>
                <form method="post" action=".\actions\create_staff.php">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <label for="mdp">Mot de Passe:</label>
                    <input type="password" name="mdp" id="mdp" required>
                    <br>
                    <select name="statut" id="statut">
                        <option value="staff_Zoo">Personnel du Zoo</option>
                        <option value="veterinaire">Vétérinaire</option>
                    </select>
                    <br>
                    <button class="btn" type="submit" name="add_user">Ajouter Utilisateur</button>
                </form>
            </div>
            <div class="acc">
                <?php
                include '.\affiche\affiche_staff.php';
                ?>
            </div>
        </section>
        <hr>
        <!-- Modif Services -->
        <h2>Services</h2>
        <section class="row">
            <?php include '.\affiche\affiche_services.php' ?>
        </section>
        <!-- Vue Comptes rendus Veterinaire -->
        <h2>Comptes rendus Veterinaire</h2>
        <section class="row">
            <div class="acc">
                <div class="col">
                    <?php include '.\affiche\affiche_comptes_rendus.php' ?>
                </div>
            </div>
        </section>
        <!-- Vue Commentaires Habitats -->
        <h2>Commentaires Habitats</h2>
        <section class="row">
            <div class="acc">
                <div class="col">
                    <?php include '.\affiche\affiche_comm_habitats.php' ?>
                </div>
            </div>
        </section>
    </main>
    <footer></footer>
    <script src=".\scripts\modif_services.js"></script>
</body>


</html>