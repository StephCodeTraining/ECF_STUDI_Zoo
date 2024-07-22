<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>space_veterinaire</title>
    <link rel="stylesheet" href="..\css\style_global.css">
    <link rel="stylesheet" href="..\css\staff_space.css">
    <link rel="stylesheet" href="..\css\formulaires.css">

</head>

<body>
    <header>
        <div>
            <h1>Espace Veterinaire</h1>
        </div>
        <div class="logo">
            <a href="..\index_zoo.php">
                <img src="..\ressources\header_footer\logo.png" alt="Zoo Logo">
            </a>
        </div>
    </header>
    <main>
        <!-- --------------------------------------------------------------------------------------------------------------------------------- Compte Rendu -->
        <h2>Elaboration Compte Rendu</h2>
        <section class="row">
            <form method="POST" action=".\actions\compte_rendu.php">
                <fieldset>
                    <legend>Compte Rendu</legend>
                    <div class="col">
                        <!-- Choix Animal -->
                        <div class="row">
                            <h3>Animal Concerné</h3>
                            <select name="animal" id="animals">
                                <option value="dft">Selectioner</option>
                                <?php include '.\affiche\select_animal.php' ?>
                            </select>
                        </div>
                        <!-- Etat Animal -->
                        <div class="row">
                            <div class="col">
                                <h3>Etat:</h3>
                            </div>
                            <div class="row">
                                <input type="radio" id="mauvais" name="etat" value="mauvais" />
                                <label for="etat">Mauvais</label>
                            </div>
                            <div class="row">
                                <input type="radio" id="moyen" name="etat" value="moyen" />
                                <label for="etat"">Moyen</label>
                            </div>
                            <div class=" row">
                                    <input type="radio" id="bon" name="etat" value="bon" />
                                    <label for="etat"">Bon</label>
                            </div>
                        </div>
                        <!-- Nourriture -->
                        <div class=" row">
                                        <h3>Nourriture donnée</h3>
                                        <input name="nourriture" type="text">
                                        <input name="grammage" type="text" placeholder="grammes">
                            </div>
                            <!-- Commentaire -->
                            <div class="row">
                                <h3>Commentaires</h3>
                                <textarea rows="1" cols="30" name="commentaire" id="comment" placeholder="Alors allez y !! ici..."></textarea>
                            </div>
                            <!-- Bouttons Soummetre -->
                            <div class="row">
                                <button type="submit">Envoyer</button>
                                <button type="reset">Vider Formulaire</button>
                            </div>
            </form>

        </section>
        <!-- ------------------------------------------------------------------------------------------------------------------------ Commentaire Habitat -->
        <h2>Commentaire Habitat</h2>
        <section class="row">
            <form method="POST" action=".\actions\commentaire_habitat.php">
                <fieldset>
                    <legend>Commentaire</legend>
                    <div class="col">
                        <!-- Choix habitat -->
                        <div class="row">
                            <h3>Habitat Concerné</h3>
                            <select name="name" id="habitats">
                                <option value="dft">Selectioner</option>
                                <?php include '.\affiche\select_habitat.php' ?>
                            </select>
                        </div>
                        <!-- Etat habitat -->
                        <div class="row">
                            <div class="col">
                                <h3>Etat:</h3>
                            </div>
                            <div class="row">
                                <input type="radio" id="mauvais" name="etat" value="mauvais" />
                                <label for="etat" class="inline-label">Mauvais</label>
                            </div>
                            <div class="row">
                                <input type="radio" id="moyen" name="etat" value="moyen" />
                                <label for="etat" class="inline-label">Moyen</label>
                            </div>
                            <div class="row">
                                <input type="radio" id="bon" name="etat" value="bon" />
                                <label for="etat" class="inline-label">Bon</label>
                            </div>
                        </div>
                        <!-- Commentaire -->
                        <div class="row">
                            <h3>Commentaire</h3>
                            <textarea rows="1" cols="30" name="commentaire" id="comment"></textarea>
                        </div>
                        <!-- Bouttons Soummetre -->
                        <div class="row">
                            <button type="submit">Envoyer</button>
                            <button type="reset">Vider Formulaire</button>
                        </div>
            </form>

        </section>
        <!-- -------------------------------------------------------------------------------------------------------------------------- Commentaire Habitat -->
        <h2>Alimentation Quotidienne</h2>
        <section class="row">
            <div class="acc">
                <?php include ".\affiche\affiche_alimentation.php"; ?>
            </div>
        </section>
    </main>
    <footer></footer>

</body>


</html>