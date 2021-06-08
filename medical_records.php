<?php 
include "conn_db.php";
if(isset($_GET['view']) ) {
    //CODICE FISCALE
    $view = $_GET['view'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Medical Records</title>
</head>
<body style="background-color: #E9EFFF;">
<div class="container customcontainer center" id="form-container">
      <form style="padding: 50px;">
        

        <div class="container-sm center customcontainer">
      <h1>Cartella clinica</h1>
      <br>
      <h3>Dati paziente</h3>
      <?php 
        $query = "SELECT nome, cognome, genere, dataNascita FROM paziente WHERE codFiscale='$view'";
        $raw_result = mysqli_query($conn, $query); 
        $info = mysqli_fetch_array($raw_result);


        // <li class="list-group-item">' . $info["eta"] . ' anni </li>
        echo '
        <ul class="list-group">
          <li class="list-group-item"><h6>Nome: </h6>' . $info["nome"] . '</li>
          <li class="list-group-item"><h6>Cognome: </h6>' . $info["cognome"] . '</li>
          <li class="list-group-item"><h6>Genere: </h6>' . $info["genere"] . '</li>
          <li class="list-group-item"><h6>Data di nascita: </h6>' . $info["dataNascita"] . '</li>
        </ul>
        ';
      ?>
      <br>
      <h3>Disturbi</h3>
      <?php
        $query = "SELECT disturbo.tipo, disturbo.descrizione
                  FROM disturbo, presenta, paziente
                  WHERE disturbo.tipo=presenta.tipoDisturbo
                  AND presenta.codFiscalePaz=paziente.codFiscale
                  AND codFiscale='$view'";
        $raw_result = mysqli_query($conn, $query); 

        while($row = mysqli_fetch_array($raw_result)) {
          echo '
          <ul class="list-group">
            <li class="list-group-item">' . $row["tipo"] . ' - ' . $row["descrizione"] . '</li>
          </ul>
          ';
        }
      ?>
      <br>
      <h3>Patologie</h3>
      <?php
        $query = "SELECT patologia.nome as nome FROM paziente, patologia, soffre WHERE patologia.nome=soffre.nomePatologia
                  AND soffre.codFiscalePaz=paziente.codFiscale
                  AND codFiscale='$view'";
        $raw_result = mysqli_query($conn, $query); 
        
        while($row = mysqli_fetch_array($raw_result)) {
          echo '
          <ul class="list-group">
            <li class="list-group-item">' . $row["nome"] . '</li>
          </ul>
        '; 
        }
      ?>


      <h3>Sintomi</h3>
      <?php
        $query = "SELECT sintomo.nome as sintomo, sintomo.descrizione as descrizione
                  FROM sintomo, causa, patologia, soffre, paziente
                  WHERE sintomo.nome=causa.nomeSintomo
                  AND causa.nomePatologia=patologia.nome
                  AND patologia.nome=soffre.nomePatologia
                  AND soffre.codFiscalePaz=paziente.codFiscale
                  AND codFiscale='$view'";
        $raw_result = mysqli_query($conn, $query); 
        
        while($row = mysqli_fetch_array($raw_result)) {
          echo '
          <ul class="list-group">
            <li class="list-group-item">' . $row["sintomo"] . '  ' . $row["descrizione"] . '</li>
          </ul>
        '; 
        }        
      ?>
      <br>

      <h3>Terapie</h3>
      <?php
        $query = "SELECT dosaggio, frequenza, assegnazione, farmaco.nome, farmaco.descrizione
                  FROM terapia, farmaco, paziente
                  WHERE farmaco.id=terapia.idfarmaco
                  AND terapia.codFiscalePaz=paziente.codFiscale 
                  AND paziente.codFiscale='$view'";
        $raw_result = mysqli_query($conn, $query); 

        while($row = mysqli_fetch_array($raw_result)) {
          echo '
          <ul class="list-group">
            <li class="list-group-item">' . $row["nome"] . ' - ' . $row["descrizione"] . '</li>
            <li class="list-group-item">' . $row["dosaggio"] . ' - ' . $row["frequenza"] . '</li>
            <li class="list-group-item">' . $row["assegnazione"] . '</li>
          </ul>
        '; 
        }
        
      ?>


    </div>

    
</body>
</html>