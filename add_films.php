<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj film</title>
</head>
<body>
<div class="main">
    
    </div>

    <div class="searchbar">
    <form action="index.php" method="GET">
        <input type="text" id="query" name="query" placeholder="Wpisz nazwę filmu...">
        <button type="submit">Szukaj</button>
    </div>
    <?php
include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa_filmu = $_POST['nazwa_filmu'];
    $opis = $_POST['opis'];
    $rok_wydania = intval($_POST['rok_wydania']);
    $gatunek = $_POST['gatunek'];
    $rezyser = $_POST['rezyser'];
    $autor = $_POST['autor'];
    $ocena = floatval($_POST['ocena']);

    $stmt = $conn->prepare("INSERT INTO filmy (nazwa_filmu, opis, rok_wydania, gatunek, rezyser, autor, ocena) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssd", $nazwa_filmu, $opis, $rok_wydania, $gatunek, $rezyser, $autor, $ocena);

    if ($stmt->execute()) {
        echo "<p>Film został pomyślnie dodany!</p>";
        echo "<div class='back-button'><a href='index.php?query=' class='btn'>Powrót do listy</a></div>";
    } else {
        echo "<p>Wystąpił błąd podczas dodawania filmu: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    ?>
    <form action="add_films.php" method="post">
        <label for="nazwa_filmu">Nazwa filmu:</label>
        <input type="text" name="nazwa_filmu" required>
        
        <label for="opis">Opis:</label>
        <textarea name="opis" required></textarea>
        
        <label for="rok_wydania">Rok wydania:</label>
        <input type="number" name="rok_wydania" required>
        
        <label for="gatunek">Gatunek:</label>
        <input type="text" name="gatunek" required>
        
        <label for="rezyser">Reżyser:</label>
        <input type="text" name="rezyser" required>
        
        <label for="autor">Autor:</label>
        <input type="text" name="autor" required>
        
        <label for="ocena">Ocena:</label>
        <input type="number" step="0.1" name="ocena" required>
        
        <button type="submit">Dodaj film</button>
    </form>

    <div class="back-button">
        <a href="index.php?query=" class="btn">Powrót</a>
    </div>
    <?php
}
?>

</body>
</html>