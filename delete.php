<?php
include "db_connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Pobranie informacji o filmie
    $stmt = $conn->prepare("SELECT nazwa_filmu, autor FROM filmy WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
        $stmt = $conn->prepare("DELETE FROM filmy WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            header("Location: index.php?message=Film został usunięty");
            exit();
        } else {
            echo "Błąd podczas usuwania filmu.";
        }
    }
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filmTitle = htmlspecialchars($row['nazwa_filmu']);
        $filmAuthor = htmlspecialchars($row['autor']);

        echo "<h2>Czy na pewno chcesz usunąć film?</h2>";
        echo "<p><strong>Tytuł filmu:</strong> $filmTitle</p>";
        echo "<p><strong>Autor:</strong> $filmAuthor</p>";
        ?>
        <div class="confirmation">
            <a href="delete.php?id=<?php echo $id; ?>&confirm=yes" class="btn">TAK - Usuń film</a>
            <a href="index.php?query=" class="btn">NIE - Powrót</a>
        </div>
        <?php
    } else {
        echo "Film nie został znaleziony.";
    }

    $stmt->close();
    $conn->close();
}
?>
