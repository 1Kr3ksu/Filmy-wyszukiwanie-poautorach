<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmy </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.webp" type="image/png">
</head>
<body>
    <div class="main">
    
    </div>

    <div class="searchbar">
    <form action="index.php" method="GET">
        <input type="text" id="query" name="query" placeholder="Wpisz nazwę filmu...">
        <button type="submit">Szukaj</button>
        <a href="add_films.php" >
    <button class="add-film">Dodaj film
</a>


    </div>
    <?php
    require_once "select.php"
    ?>
     <script src="js/fadein.js" defer></script>
    


</body>
</html>