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
    <div class="col">
        <div class="logo">
            <a href="..\index_zoo.php">
                <img src="..\ressources\header_footer\logo.png" alt="Zoo Logo">
            </a>
        </div>
    </div class="col">
    <section class="row">
        <div class="acc">
            <div class="col">
                <?php var_dump($_POST) ?>
                <p>Acces refusé, vous ne faites pas partie du personel d'Arcadia</p>
            </div>
        </div>
    </section>
    <footer></footer>

</body>

</html>