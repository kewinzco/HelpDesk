<!DOCTYPE html>
<?php
// Get the user id


include('config.php');
  // Get corresponding first name and
  // last name for that user id

  $einfuegen = $conn->prepare("INSERT INTO ticketsystem (Datum, AbsenderMail, PCNummer, Ort, Schlagwort, Freitext) VALUES(NOW(),?,?,?,?,?)");
  $einfuegen -> bind_param('sssss',$_POST["email"],$_POST["pcnr"],$_POST["optradio"],$_POST["schlagwort"],$_POST["freitext"]);
  $einfuegen -> execute();

  $einfuegen -> close();
  $conn -> close();
?>

<html>
  <body>
  <form action="https://formsubmit.co/kevin.klose@hof-university.de" method="POST">
    </form>
  </body>
  </html>
