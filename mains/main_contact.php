<div class="ctnr_menu">
    <menu>
        <ul class="row">
            <li><a href=".\index_zoo.php">Accueil</a></li>
            <li><a href=".\page_animaux.php">Animaux</a></li>
            <li><a href=".\page_habitats.php">Habitat</a></li>
            <li><a href=".\page_services.php">Services</a></li>
        </ul>
    </menu>
</div>
<main>
    <!-- Presentation -->
    <section class="row">
        <div class="acc">
            <h2>Nous Contacter</h2>
            <div class="col">
                <p>
                    Bienvenue sur la page de contact d'Arcadia ! <br>
                    Nous sommes ravis de vous accueillir et de répondre à toutes vos questions. <br>
                    Que vous souhaitiez en savoir plus sur nos animaux, planifier votre visite, ou découvrir nos programmes éducatifs et de conservation, notre équipe est à votre disposition pour vous assister.
                    <br><br>
                    Pour toute information ou demande spécifique, n'hésitez pas à nous contacter par les moyens suivants :
                </p>
                <ul>
                    <li>Adresse : 123 Rue des Aventuriers, Ville des Merveilles</li>
                    <li>Téléphone : 05 78 89 12 23</li>
                    <li>Email : arcadiazoo@lion.fr</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Formulaire Contact -->
    <section class="row">
        <div class="acc">
            <div class="col">
                <p>
                    Vous pouvez également remplir notre formulaire en ligne pour toute demande particulière.
                </p>
                <p>
                    Nous nous engageons à vous répondre dans les plus brefs délais.
                    <br><br>
                    Votre avis est important pour nous !
                    <br><br>
                    N'hésitez pas à nous faire part de vos commentaires et suggestions afin d'améliorer votre expérience d'Arcadia.
                    <br><br>
                    Nous sommes impatients de vous accueillir et de partager avec vous la beauté et la diversité du monde animal.
                </p>
            </div>
        </div>
        <div class="col">
            <form action=".\visit\actions\demande_contact.php" method="post">
                <fieldset>
                    <legend>Demande</legend>
                    <div>
                        <label for="email_contact">Email</label>
                        <input type="email" id="email_contact" name="email_contact" required>
                    </div>
                    <div>
                        <label for="sujet_contact">Sujet</label>
                        <input type="text" id="sujet_contact" name="sujet_contact" required>
                    </div>
                    <div>
                        <label for="message_contact">Message</label>
                        <textarea name="message_contact" id="message_contact" rows="3"></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </fieldset>
            </form>
        </div>
    </section>
</main>