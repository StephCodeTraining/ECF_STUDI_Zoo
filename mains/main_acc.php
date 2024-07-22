<div class="ctnr_menu">
    <menu>
        <ul class="row">
            <li><a href=".\page_animaux.php">Animaux</a></li>
            <li><a href=".\page_habitats.php">Habitats</a></li>
            <li><a href=".\page_services.php">Services</a></li>
            <li><a href=".\page_contact.php">Contact</a></li>
        </ul>
    </menu>
</div>
<main>
    <section class="row">
        <div class="col acc">
            <h2>Bienvenue au Zoo d'Arcadia !</h2>
            <p>Situé au cœur de l'Ardèche, le Zoo d'Arcadia est un havre de biodiversité et une destination incontournable pour les amoureux des animaux et de la nature. Fondé en [année de création], notre zoo s'étend sur [nombre d'hectares] hectares et abrite plus de [nombre d'espèces] espèces provenant des quatre coins du monde.</p>
            <br>
        </div>
        <div class="acc">
            <h3>Notre mission :</h3>
            <div class="col">
                <p>Le Zoo d'Arcadia a pour mission de préserver la biodiversité, d'éduquer le public sur l'importance de la conservation des espèces et de promouvoir le bien-être animal. Nous nous engageons à offrir à nos pensionnaires des habitats qui reproduisent le plus fidèlement possible leurs environnements naturels.</p>
                <br>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="acc">
            <h3>Des expériences uniques :</h3>
            <div class="col">
                <h4>Rencontres Animales :</h4>
                <p>Offrez-vous des moments inoubliables en participant à nos sessions de rencontre avec les animaux. Vous pourrez approcher de près des espèces fascinantes, comme les lions majestueux, les éléphants géants, et les pandas adorables.</p>
                <br>
                <h4>Spectacles et Animations :</h4>
                <p>Assistez à nos spectacles quotidiens et découvrez les talents cachés de nos résidents animaux. Nos animations éducatives sont conçues pour divertir tout en sensibilisant à la conservation.</p>
                <br>
            </div>
        </div>
        <div class="acc">
            <div class="col ">
                <h4>Zones Thématiques :</h4>
                <p>Explorez nos différentes zones thématiques, telles que la Savane Africaine, la Forêt Tropicale, et la Plongée Sous-Marine. Chaque zone est conçue pour vous immerger dans les écosystèmes les plus fascinants de notre planète.</p>
                <br>
                <h4>Programmes de Conservation :</h4>
                <p>: Informez-vous sur nos initiatives de conservation. Le Zoo d'Arcadia travaille en cullaboration avec des organisations internationales pour protéger les espèces menacées et restaurer leurs habitats naturels.</p>
                <br>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="acc">
            <h3>Engagement pour la Durabilité :</h3>
            <div class="col">
                <p>
                    Le Zoo d'Arcadia s'efforce d'être un leader en matière de durabilité. Nous utilisons des pratiques écologiques, telles que le recyclage, la gestion efficace de l'eau et l'énergie renouvelable, pour minimiser notre empreinte écologique.
                </p>
                <br>
            </div>
        </div>
        <div class="acc">
            <h3>Éducation et Sensibilisation :</h3>
            <div class="col">
                <p>Nous proposons des programmes éducatifs pour tous les âges, des visites scolaires aux ateliers pour adultes. Nos guides et animateurs passionnés partagent leurs connaissances pour inspirer une nouvelle génération de protecteurs de la nature.</p>
                <br>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="acc">

            <h3>Informations Pratiques :</h3>
            <!-- Services ZOO -->
            <?php include "affiche_services_acc.php" ?>

        </div>
        <!-- Avis Visiteurs -->
        <div class="acc">
            <h3>Avis des Visiteurs:</h3>
            <?php include "affiche_avis_valide.php" ?>
            <div>
                <div class="row">
                    <button class="btn" type="button" id="btnAvis">Laisser un commentaire</button>
                    <!-- Tout Droits Réservés -->
                </div>
                <div id="modalAvis" class="modal">
                    <div class="modal-content row">
                        <form class="row" method="POST" action=".\visit\actions\avis_users.php">
                            <div class="col">

                                <label for="pseudo_user">Votre nom</label>
                                <input type="text" name="pseudo_user" />



                                <label for="commentaire">Avis:</label>
                                <textarea name="commentaire" id="commentaire" rows="3"></textarea>

                            </div>
                            <div class="col">
                                <span class="btnClose">×</span>
                                <button type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>
</main>