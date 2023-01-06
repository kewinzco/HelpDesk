<!DOCTYPE html> <?php
  // Store the value of the TicketID parameter in the $id variable
   $id=$_REQUEST['TicketID'];
 ?> <html lang="de">
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
  <!--Form starts here-->
  <form action="include/db_loesung_speichern.php" method="POST">
   <!-- Display the value of the $id variable in a disabled text field -->
   <div class="col-sm-3">
    <h5>TicketID</h5>
    <input type="text" id="anzeige" value=<?=$id?> class="form-control" name="anzeige" disabled>
   </div>
   <!-- Save the value of the $id variable in a hidden text field -->
   <input type="text" id="TicketID" value=<?=$id?> class="form-control" name="TicketID" hidden>
   <h5>Lösung</h5>
   <!-- Textarea for the solution input -->
   <div class="input-group" name="loesung_in" id="loesung-in">
    <textarea class="form-control" aria-label="With textarea" name="loesung" id="loesung">Bitte hier die Lösung angeben</textarea>
   </div>
   <!-- Submit button to send the form -->
   <div class="row">
    <div class="col-sm-4">
     <button type="submit" name="Ticketstatus auf gelöst setzen">Absenden</button>
    </div>
   </div>
   </div>
   <!--Form ends here-->
  </form>
  <!-- Empty script for potential future use -->
  <script></script>
 </body>
</html>