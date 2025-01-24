 
 <?php
include "db_connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM filmy WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="update_film.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <label for="nazwa_filmu">Nazwa filmu:</label>
            <input type="text" name="nazwa_filmu" value="<?php echo htmlspecialchars($row['nazwa_filmu']); ?>" required>
            <label for="opis">Opis:</label>
            <textarea name="opis" required><?php echo htmlspecialchars($row['opis']); ?></textarea>
            <label for="rok_wydania">Rok wydania:</label>
            <input type="number" name="rok_wydania" value="<?php echo htmlspecialchars($row['rok_wydania']); ?>" required>
            <label for="gatunek">Gatunek:</label>
            <input type="text" name="gatunek" value="<?php echo htmlspecialchars($row['gatunek']); ?>" required>
            <label for="rezyser">Reżyser:</label>
            <input type="text" name="rezyser" value="<?php echo htmlspecialchars($row['rezyser']); ?>" required>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="<?php echo htmlspecialchars($row['autor']); ?>" required>
            <label for="ocena">Ocena:</label>
            <input type="number" step="0.1" name="ocena" value="<?php echo htmlspecialchars($row['ocena']); ?>" required>
            <button type="submit">Zapisz zmiany</button>
        </form>
        <div class="back-button">
            <a href="index.php?query=" class="btn">Powrót</a>
        </div>
        <?php
    } else {
        echo "Film nie został znaleziony.";
    }

    $stmt->close();
    $conn->close();
}
?>
