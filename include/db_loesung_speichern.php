<!DOCTYPE html>
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
  echo "<h1 style=text-align:center>Ticketstatus wurde erfolgreich auf gelöst gesetzt.</h1> <br>";
  echo "<h3 style=text-align:center>Zur Startseite zurückkehren: ";

}
catch(Exception $e)
{
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
