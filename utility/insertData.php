<?php
session_start();
include("./connDB.php");

$prezzo = $_POST['prezzo'];
$acquirente = $_POST['acquirente'];
$IDUser = $_SESSION['IDUser'];

$sql = "INSERT INTO data (prezzo, acquirente, ID_userData) VALUES ('$prezzo', '$acquirente', '$IDUser')";
$result = $conn->query($sql);

header("Location: ../index.php");

?>