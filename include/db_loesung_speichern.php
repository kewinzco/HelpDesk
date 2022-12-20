<!DOCTYPE html>
<?php
// Get the user id


include('config.php');
  // Get corresponding first name and
  // last name for that user id
  $sql="UPDATE ticketsystem SET Gelöst=TRUE, Lösung=? WHERE TicketID=?";
  $einfuegen=$conn->prepare($sql);
  $einfuegen -> bind_param('si',$_POST["loesung"], $_POST["TicketID"]);

  if ($einfuegen -> execute() === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

  $einfuegen -> close();
  $conn -> close();
?>

<html>
<a href="../ticketsystem.php">Ticketsystem</a>
</html>
