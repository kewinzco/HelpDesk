<!DOCTYPE html>
<?php
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

       //Werte für Charts holen
       //gelöst
       $chart1_1 = "SELECT COUNT(TicketID) FROM `ticketsystem` WHERE Gelöst=1";
       if($erg1 = $conn->query($chart1_1)){
         $geloest= $erg1->fetch_row();
       }
       $chart1_2 = "SELECT COUNT(TicketID) FROM `ticketsystem` WHERE Gelöst=0";
       if($erg2 = $conn->query($chart1_2)){
         $ungeloest= $erg2->fetch_row();
       }
       //Mitarbeiter
       $chart2_1 = "SELECT COUNT(TicketID) from `ticketsystem` JOIN `zustaendigkeit` ON zustaendigkeit.Schlagwort = ticketsystem.Schlagwort Where MitarbeiterEMail = 'reginamarga.richter@hof-university.de'";
       if($m_1 = $conn->query($chart2_1)){
         $rr= $m_1->fetch_row();
       }
       $chart2_2 = "SELECT COUNT(TicketID) from `ticketsystem` JOIN `zustaendigkeit` ON zustaendigkeit.Schlagwort = ticketsystem.Schlagwort Where MitarbeiterEMail = 'reginamarga.richter@hof-university.de'";
       if($m_2 = $conn->query($chart2_2)){
         $kk= $m_2->fetch_row();
       }
       $chart2_3 = "SELECT COUNT(TicketID) from `ticketsystem` JOIN `zustaendigkeit` ON zustaendigkeit.Schlagwort = ticketsystem.Schlagwort Where MitarbeiterEMail = 'matthias.feil@hof-university.de'";
       if($m_3 = $conn->query($chart2_3)){
        $mf= $m_3->fetch_row();
       }
       //Kategorien
       $chart3_1 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Sonstiges';";
       if($k_1 = $conn->query($chart3_1)){
        $s= $k_1->fetch_row();
       }
       $chart3_2 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Hardware_Bildschirm'";
       if($k_2 = $conn->query($chart3_2)){
        $h_b= $k_2->fetch_row();
       }
       $chart3_3 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Hardware_PC'";
       if($k_3 = $conn->query($chart3_3)){
        $h_p= $k_3->fetch_row();
       }
       $chart3_4 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Hardware_Drucker'";
       if($k_4 = $conn->query($chart3_4)){
        $h_d= $k_4->fetch_row();
       }
       $chart3_5 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Hardware_Handy'";
       if($k_5 = $conn->query($chart3_5)){
        $h_h= $k_5->fetch_row();
       }
       $chart3_6 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Hardware_Sonstiges'";
       if($k_6 = $conn->query($chart3_6)){
        $h_s= $k_6->fetch_row();
       }
       $chart3_7 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Netzwerk'";
       if($k_7 = $conn->query($chart3_7)){
        $netz= $k_7->fetch_row();
       }
      $chart3_8 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Software_Office'";
       if($k_8 = $conn->query($chart3_8)){
        $s_o= $k_8->fetch_row();
       }
       $chart3_9 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Software_Adobe'";
       if($k_9 = $conn->query($chart3_9)){
        $s_a= $k_9->fetch_row();
       }
       $chart3_10 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Software_Sonstiges'";
       if($k_10 = $conn->query($chart3_10)){
        $s_s= $k_10 ->fetch_row();
       }
       $chart3_11 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='IT-Sicherheit_SpamMail'";
       if($k_11 = $conn->query($chart3_11)){
        $it_mail= $k_11->fetch_row();
       }
       $chart3_12 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='IT-Sicherheit_Sonstiges'";
       if($k_12 = $conn->query($chart3_12)){
        $it_s= $k_12->fetch_row();
       }
       $chart3_13 = "SELECT COUNT(TicketID) from `ticketsystem` WHERE Schlagwort='Beratung'";
       if($k_13 = $conn->query($chart3_13)){
        $b= $k_13->fetch_row();
       }
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
          ['Gelöst', <?=$geloest[0]?>],
          ['Ungelöst', <?=$ungeloest[0]?>]
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
          ['Matthias', <?=$mf[0]?>],
          ['Regina', <?=$rr[0]?>],
          ['Kevin', <?=$kk[0]?>]
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
          ['Sonstiges', <?=$s[0]?>],
          ['Hardware_Bildschirm', <?=$h_b[0]?>],
          ['Hardware_PC', <?=$h_p[0]?>],
          ['Hardware_Drucker', <?=$h_d[0]?>],
          ['Hardware_Handy', <?=$h_h[0]?>],
          ['Hardware_Sonstiges', <?=$h_s[0]?>],
          ['Netzwerk', <?=$netz[0]?>],
          ['Software_Office', <?=$s_o[0]?>],
          ['Software_Adobe', <?=$s_a[0]?>],
          ['Software_Sonstiges', <?=$s_s[0]?>],
          ['IT-Sicherheit_SpamMail', <?=$it_mail[0]?>],
          ['IT-Sicherheit_Sonstiges', <?=$it_s[0]?>],
          ['Beratung', <?=$b[0]?>]
        ]);
        var options = {
          title: 'Kategorien'
        };
        var chart = new google.visualization.PieChart(document.getElementById('statistikKategorie'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body> <div data-role="main" class="ui-content">
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
               $erg1 -> close(); $erg2 -> close();
               $m_1->close(); $m_2->close(); $m_3->close();
               $k_1->close();$k_2->close(); $k_3->close(); $k_4->close(); $k_5->close(); $k_6->close();
               $k_7->close(); $k_8->close(); $k_9->close(); $k_10->close(); $k_11->close(); $k_12->close(); $k_13->close();
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
