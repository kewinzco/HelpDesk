<!DOCTYPE html>
<?php
// Get the user id


include('config.php');
  // Get corresponding first name and
  // last name for that user id
  $einfuegen = $conn->prepare("INSERT INTO ticketsystem (Datum, AbsenderMail, PCNummer, Ort, Schlagwort, Freitext) VALUES(NOW(),?,?,?,?,?)");
  $einfuegen -> bind_param('sssss',$_POST["email"],$_POST["pcnr"],$_POST["ort"],$_POST["schlagwort"],$_POST["freitext"]);
  $einfuegen -> execute();

  if ($einfuegen -> execute() === TRUE) {
  echo "Ihr Ticket wurde erfolgreich entgegengenommen. Bitte warten Sie darauf dass ein Mitarbeiter Sie kontaktiert.";
  } else {
  echo "Fehler beim Absenden vom Ticket. Bitte kontaktieren Sie Matthias Feil unter Folgender EMail-Adresse: matthias.feil@hof-university.de   Fehlermeldung" . $conn->error;
  }
  $conn -> close();
?>
