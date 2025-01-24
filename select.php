<?php 
include "db_connection.php";

if (isset($_GET['query'])) {
    $query = $_GET['query']; 

    // Przygotowanie zapytania SQL wyszukującego tylko po autorach
    $stmt = $conn->prepare("
        SELECT * 
        FROM filmy 
        WHERE autor LIKE ?
    ");
    // Zapytanie SQL wyszukującego tylko po nazwie filmu
    
   // $stmt = $conn->prepare("SELECT * FROM filmy WHERE nazwa_filmu LIKE ?");
    
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("s", $searchTerm); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
   
    echo "<div class='results'>";
    if ($result->num_rows > 0) {
        echo "<h2>Wyniki wyszukiwania po autorach:</h2>";
        while ($row = $result->fetch_assoc()) {
            // Podświetlanie wyszukiwanego autora w wyszukiwarce
            // prostrzy sposób , bo zamienia konkretny tekst, np. "kot" na "pies", bez użycia skomplikowanych wzorców.
            $highlightedAuthor = str_ireplace($query, "<mark>" . $query . "</mark>", htmlspecialchars($row['autor']));
            

            //lub drugi sposób , ale trudniejszy , bo preg_replace potrafi szukać wzorców w tekście i zamieniać je na inne
            //Ale wzorce to coś bardziej skomplikowanego niż zwykły tekst
            // – mogą uwzględniać różne możliwości, np. "tekst, który zaczyna się na A, ale kończy się na Z" albo "dowolne cyfry".


           // $highlightedAuthor = preg_replace(
                //"/(" . preg_quote($query, '/') . ")/i", 
              //  "<mark>$1</mark>",                     
               // htmlspecialchars($row['autor'])        
            //s);

            echo "<div class='film'>";
            echo "<h3>" . htmlspecialchars($row['nazwa_filmu']) . "</h3>";
            echo "<p>Opis: " . htmlspecialchars($row['opis']) . "</p>";
            echo "<p>Rok wydania: " . htmlspecialchars($row['rok_wydania']) . "</p>";
            echo "<p>Gatunek: " . htmlspecialchars($row['gatunek']) . "</p>";
            echo "<p>Reżyser: " . htmlspecialchars($row['rezyser']) . "</p>";
            echo "<p>Autor: " . $highlightedAuthor . "</p>"; 
            echo "<p>Ocena: " . htmlspecialchars($row['ocena']) . "</p>";
            echo "<a href='edit.php?id=" . htmlspecialchars($row['id']) . "' class='btn'>Edytuj</a>";
            echo "<a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='btn' onclick='return confirm(\"Czy na pewno chcesz usunąć ten film?\");'>Usuń</a>";
            echo "</div>";
        }
        echo "<div class='back-button'>";
        echo "<a href='index.php?query=' class='btn'>Powrót </a>";
        echo "</div>";
    } else {
        echo "<p>Brak wyników dla zapytania (autorzy): " . htmlspecialchars($query) . "</p>";
    }
    echo "</div>";
}
?>
