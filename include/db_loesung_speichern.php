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
  $sql="UPDATE ticketsystem SET Gelöst=TRUE, Lösung=? WHERE TicketID=?";
  $einfuegen=$conn->prepare($sql);
  $einfuegen -> bind_param('si',$_POST["loesung"], $_POST["TicketID"]);

try
{
  $einfuegen -> execute();
  echo "<div class='container-fluid p-5 bg-primary text-white text-center'><h1>Ticket gelöst</h1></div> <br><br>";
  echo "<h1 style=text-align:center>Ticketstatus wurde erfolgreich auf gelöst gesetzt.</h1> <br>";
  echo "<h3 style=text-align:center>Zur Startseite zurückkehren: ";

}
catch(Exception $e)
{
    echo "<div class='container-fluid p-5 bg-primary text-white text-center'><h1>Ticket Fehler</h1></div> <br><br>";
    echo "<h1 style=text-align:center>Fehler beim ändenr vom Ticketstatus. <br>";
    echo "Bitte kontaktieren Sie Matthias Feil unter Folgender EMail-Adresse: matthias.feil@hof-university.de </h1> <br> ";
    echo  "Fehlermeldung: $e -> getMessage()";
}

  $einfuegen -> close();
  $conn -> close();
?>

<html>
<a href="../ticketsystem.php">Ticketsystem</a>
</html>
