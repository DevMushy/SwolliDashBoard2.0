<?php
      session_start();
      include("../utility/connDB.php");

      $userID = $_SESSION['IDUser'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<center><a href="../index.php" class="tDNone"><h1>SwolliDashBoard</h1></a></center><hr>
<center><h4>Cronologia Chiodi</h4>
  <h6>Lista dei chiodi restituiti</h6></center>
    <?php

      $select = "SELECT * FROM chiodi WHERE ID_userData = '$userID' AND restituito = '1' ORDER BY date DESC, time DESC";

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
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
      }
    ?>
</body>
</html>