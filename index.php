<?php
session_start();
if(!isset($_SESSION['IDUser'])){
    header("Location: ./pages/accessPage.php");
}
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<center><a href="./index.php" class="tDNone"><h1>SwolliDashBoard</h1></a></center><hr>

    <div class="grafico">
    <center><h2 class="mt-5">Work in Progress!!!</h2></center>
    </div>
    <div>
        <a href="./pages/agendaChiodi.php"><div class="dayMonthYear" style="left: 15px;"><h3><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="tomato" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
  <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
</svg></h3></div></a>
        <a href="./pages/agendaPagamenti.php"><div class="dayMonthYear" style="left: 132px;"><h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgb(3, 147, 3)" class="bi bi-cash-stack" viewBox="0 0 16 16">
  <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
</svg></h3></div></a>
        <a href="./pages/impostazioni.php"><div class="dayMonthYear" style="left: 249px;"><h3><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgb(96, 96, 96)" class="bi bi-gear-fill" viewBox="0 0 16 16">
  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg></h3></div></a>
    </div>
    <div class="insert">
        <h2>Inserisci Pagamento</h2>
        <form action="./utility/insertData.php" method="POST">
            <input type="text" name="prezzo" placeholder="Inserisci il prezzo..."><br>
            <input type="text" name="acquirente" placeholder="Inserisci il nome del compratore..."><br><br>
            <input type="submit" value="Inserisci Pagamento">
        </form>
    </div>
    <div class="insert1">
        <h2>Inserisci Chiodo</h2>
        <form action="./utility/insertChiodi.php" method="POST">
            <input type="text" name="prezzoC" placeholder="Inserisci il prezzo..."><br>
            <input type="text" name="acquirenteC" placeholder="Inserisci il nome del compratore..."><br><br>
            <input type="submit" value="Inserisci Chiodo">
        </form>
    </div>

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>