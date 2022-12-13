<!DOCTYPE html>
<?php
/* if (isset($_POST['email']) {
  header("https://formsubmit.co/" . $_POST['email']);
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
    <?php
           include('include/config.php'); //Verbindung zur Datenbank
           $sql = "select * from ticketsystem";
           if ($erg = $conn->query($sql)) {
              while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
            }
          }
      ?>
      <div data-role="main" class="ui-content">
  	<h1>Übersicht Ticketsystem</h1>
    <table id="meineTabelle" data-role="table" class="ui-responsive" data-mode="columntoggle" data-column-btn-text="Spalten" >
      <thead>
        <tr>
          <th data-priority="4">TicketID</th>
          <th data-priority="1">Datum</th>
          <th data-priority="2">AbsenderMail</th>
          <th data-priority="3">PCNummer</th>
          <th data-priority="3">Ort</th>
          <th data-priority="3">Schlagwort</th>
          <th data-priority="3">Freitext</th>
          <th data-priority="3">Ticket_loesen</th>
        </tr>
      </thead>
      <tbody>
    <?php
    foreach ($daten as $inhalt) {
    ?>
        <tr>
            <td>
                <?php echo $inhalt->TicketID; ?>
            </td>
            <td>
                <?php echo $inhalt->Datum; ?>
            </td>
            <td>
                <?php echo $inhalt->AbsenderMail; ?>
            </td>
            <td>
                <?php echo $inhalt->PCNummer; ?>
            </td>
            <td>
                <?php echo $inhalt->Ort; ?>
            </td>
            <td>
                <?php echo $inhalt->Schlagwort; ?>
            </td>
            <td>
                <?php echo $inhalt->Freitext; ?>
            </td>
            <td>
                <a href="ticket.php?TicketID=<?=$inhalt->TicketID?>">Ticket lösen</a>
                <!--<?php echo "Hier kommt der Link hin"; ?> -->
            </td>
      </tr>
    <?php
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
