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
    <style>
      .statistics {
        height: auto;
        background-color: red;
        display: flex;
      }

      .graph {
        height: 250px;
        flex: 1;
        justify-content: center;
      }
    </style>
    <!--Google Pie Charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      //Chart Solved
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Tickets', 'Prozent'],
          ['Gelöst', 11],
          ['Ungelöst', 7]
        ]);
        var options = {
          title: 'Gelöste Tickets'
        };
        var chart = new google.visualization.PieChart(document.getElementById('statistikOffen'));
        chart.draw(data, options);
      }
      //Chart Employee
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Mitarbeiter', 'Prozent'],
          ['Matthias', 11],
          ['Regina', 2],
          ['Kevin', 7]
        ]);
        var options = {
          title: 'Mitarbeiter Auslastung'
        };
        var chart = new google.visualization.PieChart(document.getElementById('statistikMitarbeiter'));
        chart.draw(data, options);
      }
      //Chart Category
      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Kategorie', 'Prozent'],
          ['Hardware_Drucker', 11],
          ['IT-Sicherheit_SpamMail', 2],
          ['Netzwerk', 2],
          ['Software_Sonstiges', 2],
          ['Beratung', 7],
          ['Hardware_Handy', 2],
          ['Hardware_Sonstiges', 2],
          ['IT-Sicherheit_Sonstiges', 2],
          ['Software_Office', 2],
          ['Hardware_Bildschirm', 2],
          ['Hardware_PC', 2],
          ['Software_Adobe', 2],
          ['Sonstiges', 2]
        ]);
        var options = {
          title: 'Kategorien'
        };
        var chart = new google.visualization.PieChart(document.getElementById('statistikKategorie'));
        chart.draw(data, options);
      }
    </script>
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
      <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Übersicht Ticketsystem</h1>
      </div>
      <!--Statistics-->
      <div class="statistics">
        <div class="graph" id="statistikOffen"></div>
        <div class="graph" id="statistikMitarbeiter"></div>
        <div class="graph" id="statistikKategorie"></div>
      </div>
      <table id="meineTabelle" data-role="table" class="table table-bordered table-hover" data-mode="columntoggle" data-column-btn-text="Spalten">
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
                ?> </td> <?php
                // Echo "gelöst" if the value of the Gelöst field is 1, otherwise echo "ungelöst"
                $status=$inhalt->Gelöst;
                if($status==1) {
                  echo '
									<td class="bg-success"> gelöst</td>';
                }
                else echo '
									<td class="bg-warning">ungelöst</td>';
                ?> <td> <?php
                // Echo the value of the Lösung field of the current object in the loop
                echo $inhalt->Lösung;
                ?> </td>
            <td>
              <a href="ticket.php?TicketID=
											<?=$inhalt->TicketID?>">Ticket lösen </a>
            </td>
          </tr> <?php
       }
       ?> </tbody>
      </table>
    </div> <?php
               $erg -> close(); //Close Connection
               $conn -> close();
               ?> </body>
  <script>
    //Reverses Table order and shows latest ticket on top.
    var table = document.getElementById("meineTabelle");
    var rows = table.rows;
    var i;
    for (i = 1; i < rows.length; i++) {
      table.insertBefore(rows[i], table.firstChild);
    }
  </script>
</html>