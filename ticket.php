<!DOCTYPE html>
<?php

   $id=$_REQUEST['TicketID'];
/*
   include('include/config.php'); //Verbindung zur Datenbank
   $sql = "select * from ticketsystem where TicketID = $id";
   if ($erg = $conn->query($sql)) {
      while ($datensatz = $erg->fetch_object()) {
        $daten[] = $datensatz;
    }
  }
  */

 ?>

<html lang="de">
  <head>
    <title>Help Desk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://api.jquery.com/jQuery.ajax"></script>
  </head>
  <body>
    <!--form start-->
    <form action="include/db_loesung_speichern.php" method="POST">


      <div class="col-sm-3">
        <h5>TicketID</h5>
        <input type="text" id="TicketID" value= <?=$id?> class="form-control" name="TicketID" disabled>
      </div>

      <h5>Lösung</h5>
      <div class="input-group" name="loesung_in" id="loesung-in">
        <textarea class="form-control" aria-label="With textarea" name="loesung" id="loesung">Bitte hier die Lösung angeben</textarea>
      </div>

        <div class="row">
          <div class="col-sm-4">
            <button type="submit" name="Ticketstatus auf gelöst setzen" >Absenden</button>
        <!--    <button name="testen" onclick="testeUnit()">Unit Test</button>-->
          </div>
        </div>
      </div>
      <!--form end-->
    </form>
    <script>

    </script>
  </body>
</html>
