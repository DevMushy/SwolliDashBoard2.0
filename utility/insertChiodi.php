<?php
session_start();
include("./connDB.php");

$prezzo = $_POST['prezzoC'];
$acquirente = $_POST['acquirenteC'];
$IDUser = $_SESSION['IDUser'];

$sql = "INSERT INTO chiodi (prezzo, acquirente, ID_userData) VALUES ('$prezzo', '$acquirente', '$IDUser')";
$result = $conn->query($sql);

header("Location: ../index.php");

?>