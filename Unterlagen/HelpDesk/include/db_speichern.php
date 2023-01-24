<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Link to Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Link to Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
// Get the user id


include('config.php');
  // Get corresponding first name and
  // last name for that user id
  $einfuegen = $conn->prepare("INSERT INTO ticketsystem (Datum, AbsenderMail, PCNummer, Ort, Schlagwort, Freitext) VALUES(NOW(),?,?,?,?,?)");
  $einfuegen -> bind_param('sssss',$_POST["email"],$_POST["pcnr"],$_POST["ort"],$_POST["schlagwort"],$_POST["freitext"]);

//Fehlerbehandlung,
try
{
  $einfuegen -> execute();
  echo "<div class='container-fluid p-5 bg-primary text-white text-center'><h1>Ticket gesendet</h1></div> <br><br>";
  echo "<h1 style=text-align:center>Ihr Ticket wurde erfolgreich entgegengenommen.<br>";
  echo "Bitte warten Sie darauf dass ein Mitarbeiter Sie kontaktiert.</h1>";

}
catch(Exception $e)
{
    echo "<div class='container-fluid p-5 bg-primary text-white text-center'><h1>Ticket Fehler</h1></div> <br><br>";
    echo "<h1 style=text-align:center>Fehler beim Absenden vom Ticket. <br>";
    echo "Bitte kontaktieren Sie Matthias Feil unter Folgender EMail-Adresse: matthias.feil@hof-university.de </h1> <br> ";
    echo  "Fehlermeldung: $e -> getMessage()";
}

  $conn -> close();
?>
