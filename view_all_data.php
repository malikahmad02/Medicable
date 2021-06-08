<?php 
include "conn_db.php";
if(isset($_GET['view']) ) {
    /* NOME UTENTE */
    $view = $_GET['view'];
    $sql = "SELECT medico.codFiscale,medico.nome,medico.cognome,medico.telefono,medico.email,medico.genere,medico.dataNascita,medico.nomeRuolo,specalizzazione.nome as Specializzazione
            FROM medico,consegue,specalizzazione
            WHERE consegue.codFiscaleMed = medico.codFiscale
            AND consegue.nomeSpecializzazione = specalizzazione.nome
            AND medico.codFiscale = '$view'";
    $result=$conn->query($sql);
    $obj= $result -> fetch_object();

    
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
    <script src="fontawesome.js"></script>
    <title>Dr. <?php echo $obj->cognome;?> <?php echo $obj->nome;?></title>
</head>
<body style="background-color: #E9EFFF;">
    <div class="container">
        <div class="jumbotron jumbo">
            <h1>Dr. <?php echo $obj->cognome;?> <?php echo $obj->nome;?> Data</h1>
            <form style="padding: 50px;">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar" value="Nome:       <?php echo $obj->nome;?>" name="nome" id="nome" placeholder="Nome" readonly>
                         </div>
                    </div>
                
                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar" value="Cognome:        <?php echo $obj->cognome;?>"name="cognome"id="cognome" placeholder="Cognome" readonly>
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar" value="Data di nascita:        <?php echo $obj->dataNascita;?>" name="dataNascita" id="dataNascita" placeholder="dataNascita" readonly>
                         </div>
                    </div>
                
                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar" value="Genere:        <?php echo $obj->genere;?>"name="genere"id="genere" placeholder="Genere" readonly>
                        </div>
                    </div>
                </div>

               <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar" value="Telefono:        <?php echo $obj->telefono;?>" name="telefono"id="telefono" placeholder="Telefono" readonly>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar"value="Codice Fiscale:        <?php echo $obj->codFiscale;?>" name="codFiscale"id="codFiscale" placeholder="Codice Fiscale" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">                    
                    <div class="col-sm">
                        <div class="form-group">
                        <input class="form-control inputbar" value="Ruolo:        <?php echo $obj->nomeRuolo;?>"name="ruolo"id="ruolo" placeholder="Ruolo" readonly>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                        <input class="form-control inputbar" value="Specializzazione:        <?php echo $obj->Specializzazione;?>"name="ruolo"id="ruolo" placeholder="Ruolo" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="row">            
                    <div class="col-sm">
                        <div class="form-group">
                            <input class="form-control inputbar"value="Email:        <?php echo $obj->email;?>" name="email"id="email" placeholder="Email" readonly>
                        </div>
                    </div>
                
                </div>
            </form>

        </div>
    <!--  </div> -->
</body>
</html>