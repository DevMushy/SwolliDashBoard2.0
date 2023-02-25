<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Swollidashboard2.0";

// Connessione al database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica della connessione
if (!$conn) {
    die("Connessione al database fallita: " . mysqli_connect_error());
}

?>