<?php 
include "db_connection.php";

if (isset($_GET['query'])) {
    $query = $_GET['query']; 

   
    $stmt = $conn->prepare("
        SELECT * 
        FROM filmy 
        WHERE rezyser LIKE ? OR nazwa_filmu LIKE ?
    ");
    
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
   
    echo "<div class='results'>";
    if ($result->num_rows > 0) {
        echo "<h2>Wyniki wyszukiwania:</h2>";
        while ($row = $result->fetch_assoc()) {
            // Podświetlanie wyszukiwanego hasła w nazwie filmu i reżyserze
            $highlightedTitle = str_ireplace($query, "<mark>" . $query . "</mark>", htmlspecialchars($row['nazwa_filmu']));
            $highlightedDirector = str_ireplace($query, "<mark>" . $query . "</mark>", htmlspecialchars($row['rezyser']));

            echo "<div class='film'>";
            echo "<h3>" . $highlightedTitle . "</h3>";
            echo "<p>Opis: " . htmlspecialchars($row['opis']) . "</p>";
            echo "<p>Rok wydania: " . htmlspecialchars($row['rok_wydania']) . "</p>";
            echo "<p>Gatunek: " . htmlspecialchars($row['gatunek']) . "</p>";
            echo "<p>Reżyser: " . $highlightedDirector . "</p>"; 
            echo "<p>Ocena: " . htmlspecialchars($row['ocena']) . "</p>";
            echo "<a href='edit.php?id=" . htmlspecialchars($row['id']) . "' class='btn-edit'>Edytuj</a>";
            echo "<a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='btn-delete' onclick='return confirm(\"Czy na pewno chcesz usunąć ten film?\");'>Usuń</a>";
            echo "</div>";
        }
        echo "<div class='back-button'>";
        echo "<a href='index.php?query=' class='btn-back'>Powrót</a>";
        echo "</div>";
    } else {
        echo "<p>Brak wyników dla zapytania: " . htmlspecialchars($query) . "</p>";
    }
    echo "</div>";
}
?>
