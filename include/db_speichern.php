<!DOCTYPE html>
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
  echo "<h1 style=text-align:center>Ihr Ticket wurde erfolgreich entgegengenommen.<br>";
  echo "Bitte warten Sie darauf dass ein Mitarbeiter Sie kontaktiert.</h1>";

}
catch(Exception $e)
{
    echo "<h1 style=text-align:center>Fehler beim Absenden vom Ticket. <br>";
    echo "Bitte kontaktieren Sie Matthias Feil unter Folgender EMail-Adresse: matthias.feil@hof-university.de </h1> <br> ";
    echo  "Fehlermeldung: $e -> getMessage()";
}

  $conn -> close();
?>
