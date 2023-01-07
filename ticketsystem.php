<!DOCTYPE html> <?php
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
 <body> <?php
           // Include the config file to establish a connection to the database
           include('include/config.php');
           // Select all rows from the ticketsystem table
           $sql = "select * from ticketsystem";
           // Execute the query and store the result
           if ($erg = $conn->query($sql)) {
              // Fetch each row of the result as an object and store it in the $daten array
              while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
            }
          }
      ?> <div data-role="main" class="ui-content">
   <h1>Übersicht Ticketsystem</h1>
   <table id="meineTabelle" data-role="table" class="ui-responsive" data-mode="columntoggle" data-column-btn-text="Spalten">
    <thead>
     <tr>
      <th data-priority="4">TicketID</th>
      <th data-priority="1">Datum</th>
      <th data-priority="2">AbsenderMail</th>
      <th data-priority="3">PCNummer</th>
      <th data-priority="3">Ort</th>
      <th data-priority="3">Schlagwort</th>
      <th data-priority="3">Freitext</th>
      <th data-priority="3">Gelöst</th>
      <th data-priority="3">Lösung</th>
      <th data-priority="3">Ticket Lösen</th>
     </tr>
    </thead>
    <tbody> <?php
    // Loop through each element in the $daten array
    foreach ($daten as $inhalt) {
    ?> <tr>
      <td> <?php
                // Echo the value of the TicketID field of the current object in the loop
                echo $inhalt->TicketID;
                ?> </td>
      <td> <?php
                // Echo the value of the Datum field of the current object in the loop
                echo $inhalt->Datum;
                ?> </td>
      <td> <?php
                // Echo the value of the AbsenderMail field of the current object in the loop
                echo $inhalt->AbsenderMail;
                ?> </td>
      <td> <?php
                // Echo the value of the PCNummer field of the current object in the loop
                echo $inhalt->PCNummer;
                ?> </td>
      <td> <?php
                // Echo the value of the Ort field of the current object in the loop
                echo $inhalt->Ort;
                ?> </td>
      <td> <?php
                // Echo the value of the Schlagwort field of the current object in the loop
                echo $inhalt->Schlagwort;
                ?> </td>
      <td> <?php
                // Echo the value of the Freitext field of the current object in the loop
                echo $inhalt->Freitext;
                ?> </td>
      <td> <?php
                // Echo "gelöst" if the value of the Gelöst field is 1, otherwise echo "ungelöst"
                $status=$inhalt->Gelöst;
                if($status==1) echo "gelöst";
                else echo "ungelöst";
                ?> </td>
      <td> <?php
                // Echo the value of the Lösung field of the current object in the loop
                echo $inhalt->Lösung;
                ?> </td>
      <td>
        <a href="ticket.php?TicketID=<?=$inhalt->TicketID?>">Ticket lösen</a>
      </td>
     </tr> <  <?php
       }
       ?>
         </tbody>
       </table>

              <?php
               $erg -> close(); //Verbindung wieder schließen
               $conn -> close();
               ?>
               </fieldset>
 </body>
</html>
