<?php
session_start();
include("../utility/connDB.php");

if(isset($_POST['username'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se la password contiene parole chiave per le query
    if (preg_match("/SELECT|INSERT|UPDATE|DELETE|;|--/", $password)) {
        //messaggio d'errore
        header("Location: ./accessPage.php");
    } else {
        // Esegui la query per verificare se l'utente esiste già
        $sql = "SELECT * FROM userdata WHERE username = '$username' AND email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        // Controlla se l'utente esiste già
        if ($result->num_rows > 0) {
            // L'utente esiste già
            $row = $result->fetch_assoc();
            $_SESSION['IDUser'] = $row['ID'];
            header("Location: ../index.php");
        } else {
            $sql = "SELECT * FROM userdata WHERE username = '$username' OR email = '$email'";
            $result = $conn->query($sql);
    
            // Controlla se l'utente esiste già
            if ($result->num_rows < 1) {
                // L'utente esiste già
                // L'utente non esiste ancora, quindi inserisci i dati nella tabella userdata
                $sql = "INSERT INTO userdata (username, email, password) VALUES ('$username', '$email', '$password')";
                $result = $conn->query($sql);

                // Esegui la query per ottenere l'ID dell'utente appena inserito
                $sql = "SELECT * FROM userdata WHERE username = '$username' AND email = '$email' AND password = '$password'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $_SESSION['IDUser'] = $row['ID'];
                header("Location: ../index.php");
            }else{
                //messaggio d'errore
                header("Location: ./accessPage.php");
            }
        }
    }
}
// Chiusura della connessione
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <title>ACCESSO</title>
</head>
<body class="AbodyGradient">
    <!--inizio form-->
    <div class="divForm">
        <h3>SwolliDashBoard 2.0</h3>
        <form action="" method="POST">
            <input type="text" name="username" id="1" placeholder="  Username..." required><br>
            <input type="email" name="email" id="2" placeholder="  Email..." required><br>
            <input type="password" name="password"  id="3" placeholder="  Password..." required><br>
            <input type="checkbox" name="privacy" id="4" required> Accetto la Swolli Privacy<br>
            <input type="submit" name="Entra" value="ENTRA" id="5">
        </form>
    </div>
    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>