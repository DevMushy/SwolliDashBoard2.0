<?php
      session_start();
      include("../utility/connDB.php");

      $userID = $_SESSION['IDUser'];


      if(isset($_POST['IDChiodo'])){
        $idChiodo = $_POST['IDChiodo'];
        $update = "UPDATE chiodi SET restituito = 1 WHERE ID_userData = '$userID' AND ID = '$idChiodo'";
        $resultDelete = $conn->query($update);
        $select = "SELECT * FROM chiodi WHERE ID_userData = '$userID' AND ID = '$idChiodo'";
        $result = $conn->query($select);
        $row = mysqli_fetch_assoc($result);
        $prezzo = $row['prezzo'];
        $acquirente = $row['acquirente'];
        $insert = "INSERT INTO data (prezzo, acquirente, ID_userData) VALUES ('$prezzo', '$acquirente', '$userID')";
        $resultinsert = $conn->query($insert);
      }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
  </head>
  <body>
  <center><a href="../index.php" class="tDNone"><h1>SwolliDashBoard</h1></a></center><hr>
  <center><h4>Agenda Chiodi</h4>
  <h6><a href="./cronologia.php">clicca qui </a>per la cronologia dei chiodi</h6></center>
    <?php

      $select = "SELECT * FROM chiodi WHERE ID_userData = '$userID' AND restituito = '0' ORDER BY date DESC, time DESC";

      $result = $conn->query($select);
      $_SESSION['dataPrec'] = 0;
      while ($row = mysqli_fetch_assoc($result)) { 
        echo '<div>';
        if($_SESSION['dataPrec'] == 0 || $_SESSION['dataPrec'] != $row['date']){
          echo '<h3 class="date">'.$row['date'].'</h3>';
        }
        $_SESSION['dataPrec'] = $row['date'];
        echo '<div class="recordAgenda">';
        echo '<table>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$row['prezzo'].'€'.'</td>';
        echo '<td>'.$row['acquirente'].'</td>';
        echo '<td>'.$row['time'].'</td>';
        $x = $row["ID"];
        echo '<td><form action="agendaChiodi.php" method="POST"><input type="hidden" name="IDChiodo" value="'.$x.'"><input type="submit" value="invia"></form></td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
      }
    ?>


  </body>
</html>
