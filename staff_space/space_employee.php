<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>space_employee</title>
    <link rel="stylesheet" href="..\css\style_global.css">
    <link rel="stylesheet" href="..\css\staff_space.css">
    <link rel="stylesheet" href="..\css\formulaires.css">
    <!-- <link rel="stylesheet" href="staff_space.css"> -->
</head>

<body>
    <header class="row">
        <div>
            <h1>Espace Employé</h1>
        </div>
        <div class="logo">
            <a href="..\index_zoo.php">

                <img src="..\ressources\header_footer\logo.png" alt="Zoo Logo">
            </a>
        </div>
    </header>
    <main>
        <!-- --------------------------------------------- Alimentation -->
        <section class="row">
            <form method="POST" action=".\actions\alimentation.php">
                <fieldset>
                    <legend>Alimentation Quotidienne</legend>
                    <div class="col">
                        <!-- Choix Animal -->
                        <div class="row">
                            <h3>Animal Concerné</h3>
                            <select name="animal" id="animals">
                                <option value="dft">Selectioner</option>
                                <?php include '.\affiche\select_animal.php' ?>
                            </select>
                        </div>
                        <!-- Nourriture -->
                        <div class="row">
                            <h3>Nourriture donnée</h3>
                            <input name="nourriture" type="text">
                            <input name="grammage" type="text" placeholder="grammes">
                        </div>
                        <div class="row">
                            <button type="submit">Envoyer</button>
                            <button type="reset">Vider Formulaire</button>
                        </div>
                </fieldset>
            </form>
        </section>
        <!-- --------------------------------------------- Avis Visiteur-->
        <h2>Avis Visiteurs</h2>
        <section class="row">
            <div class="acc">
                <div class="col">
                    <?php include ".\affiche\affiche_commentaires.php" ?>
                </div>
            </div>
        </section>
        <h2>Messagerie</h2>
        <!-- --------------------------------------------- Messagerie-->
        <section class="row">
            <div class="acc">
                <div class="col">
                    <?php include ".\affiche\affiche_messagerie.php" ?>
                </div>
            </div>

        </section>
        <!-- --------------------------------------------- Modif Services -->
        <section class="row bg_w">
            <?php include ".\affiche\affiche_services.php" ?>
        </section>
    </main>
    <footer></footer>
    <script src=".\scripts\modif_services.js"></script>
</body>

</html>