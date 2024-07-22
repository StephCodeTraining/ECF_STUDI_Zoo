<header>
    <!-- Logo titre connect -->


    <div class="col">
        <!-- Logo -->
        <div class="logo">
            <a href=".\index_zoo.php">

                <img src=".\ressources\header_footer\logo.png" alt="logo">
            </a>
        </div>
    </div>
    <div class="col">
        <!-- Titre -->
        <h1 class="nom_zoo">Arcadia</h1>

    </div>
    <!-- Connexion -->
    <div class="connect col">
        <button type="button" id="openModalBtn">Connexion</button>
    </div>
    <!-- Modal Connect -->
    <div id="myModal" class="modal">
        <div class="modal-content row">
            <form class="row" method="post" action=".\staff_space\staff_connect.php">
                <div class="col">

                    <div class="col">
                        <label for="E-Mail">Login</label>
                        <input type="text" name="utilisateur">
                    </div>
                    <hr>

                    <div class="col">
                        <label for="password">Password</label>
                        <input type="text" name="password">
                    </div>
                </div>
                <div class="col">
                    <span class="closeBtn">&times;</span>
                    <button type="submit">Connexion</button>

                </div>
            </form>
        </div>
    </div>

</header>