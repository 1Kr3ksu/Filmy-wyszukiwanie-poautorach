<?php 
include "db_connection.php";

if (isset($_GET['query'])) {
    $query = $_GET['query']; 

    
    $stmt = $conn->prepare("SELECT * FROM filmy WHERE nazwa_filmu LIKE ?");
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("s", $searchTerm); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
   
    echo "<div class='results'>";
    if ($result->num_rows > 0) {
        echo "<h2>Wyniki wyszukiwania:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='film'>";
            echo "<h3>" . htmlspecialchars($row['nazwa_filmu']) . "</h3>";
            echo "<p>Opis: " . htmlspecialchars($row['opis']) . "</p>";
            echo "<p>Rok wydania: " . htmlspecialchars($row['rok_wydania']) . "</p>";
            echo "<p>Gatunek: " . htmlspecialchars($row['gatunek']) . "</p>";
            echo "<p>Reżyser: " . htmlspecialchars($row['rezyser']) . "</p>";
            echo "<p>Ocena: " . htmlspecialchars($row['ocena']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Brak wyników dla zapytania: " . htmlspecialchars($query) . "</p>";
    }
    echo "</div>";
}
?>