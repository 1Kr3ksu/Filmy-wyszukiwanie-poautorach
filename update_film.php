<?php
include "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nazwa_filmu = $_POST['nazwa_filmu'];
    $opis = $_POST['opis'];
    $rok_wydania = intval($_POST['rok_wydania']);
    $gatunek = $_POST['gatunek'];
    $rezyser = $_POST['rezyser'];
    $autor = $_POST['autor'];
    $ocena = floatval($_POST['ocena']);

    $stmt = $conn->prepare("UPDATE filmy SET nazwa_filmu=?, opis=?, rok_wydania=?, gatunek=?, rezyser=?, autor=?, ocena=? WHERE id=?");
    $stmt->bind_param("ssisdsdi", $nazwa_filmu, $opis, $rok_wydania, $gatunek, $rezyser, $autor, $ocena, $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Film zaktualizowany");
        exit();
    } else {
        echo "Błąd podczas aktualizacji.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Nieprawidłowe dane.";
}
?>
