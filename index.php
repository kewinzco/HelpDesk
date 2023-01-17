<!DOCTYPE html> <?php
 ?> <html lang="de">
  <!-- Set language to German -->
  <head>
    <title>Help Desk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link to jQuery library -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Link to jQuery library hosted by Google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Link to Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Link to jQuery.ajax() function -->
    <script src="https://api.jquery.com/jQuery.ajax"></script>
  </head>
  <body>
    <!-- Form starts here -->
     <form action="include/db_speichern.php" method="POST">

      <!-- Form heading -->
      <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Ticket erstellen</h1>
      </div>
      <!-- Container for first section of form -->
      <div class="container mt-5">
        <!-- First section of form (personal details) -->
        <div class="row" id="first">
          <!-- Input field for email address -->
          <div class="col-sm-6">
            <h4>1. Persönliche Daten</h4>
            <h5>E-Mail</h5>
            <div class="input-group sm-4">
              <span class="input-group-text">@</span>
              <input type="text" id="email" class="form-control" onkeyup="GetDetail(this.value)" placeholder="beispiel@help-desk.de" name="email">
            </div>
          </div>
        </div> <br>
        <!-- Second section of form (personal details) -->
        <div class="row" id="second">
          <!-- Input field for first name -->
          <div class="col-sm-3">
            <h5>Vorname</h5>
            <input type="text" id="vorname" class="form-control" placeholder="Hans" name="vorname" disabled>
          </div>
          <!-- Input field for last name -->
          <div class="col-sm-3">
            <h5>Nachname</h5>
            <input type="text" id="nachname" class="form-control" placeholder="Wurst" name="nachname" disabled>
          </div>
          <!-- Input field for phone number -->
          <div class="col-sm-3">
            <h5>Telefonnummer</h5>
            <input type="text" id="telnr" class="form-control" placeholder="123456" name="telefonnr" disabled>
          </div>
          <!-- Input field for office location -->
          <div class="col-sm-3">
            <h5>Büro</h5>
            <input type="text" id="buero" class="form-control" placeholder="B007" name="buero" disabled>
          </div>
        </div>
      </div>
      <div class="container mt-5">
        <!-- Container for third section of form -->
        <div class="row" id="third" hidden>
          <!-- Third section of form (device details) -->
          <div class="col-sm-3">
            <h4>2. Angaben zum Gerät</h4>
            <h5>PC-Nummer
              <span class="glyphicon" title="PC-Nummer" data-bs-toggle="popover" data-bs-trigger="hover"
              data-bs-content="Diese Nummer finden sie auf der Unterseite des Laptops oder auf der Rückseite des Bildschirms"> &#x1f6c8; </span>
            </h5>
            <input type="text" class="form-control" placeholder="1234" name="pcnr" id="pcnr">
          </div>
        </div>
      </div>
      <!-- Container for fourth section of form -->
      <div class="container mt-5" id="fourth" hidden>
        <!-- Third section of form (device details) -->
        <h4>3. Problembeschreibung</h4>
        <div class="row">
          <!-- Radio buttons for problem location -->
          <div class="col-sm-4">
            <h5>Wo tritt das Problem auf?</h5>
            <div class="">
              <select class="form-select" name="ort" id="ort">
                <option name="ort" value="Behörde">Behörde</option>
                <option name="ort" value="Homeoffice">Homeoffice</option>
                <option name="ort" value="Außendienst">Außendienst</option>
              </select>
            </div>
          </div>
          <!-- Dropdown menu for problem keyword -->
          <div class="col-sm-4">
            <h5>Art des Problems
              <span class="glyphicon" title="Problemarten" data-bs-toggle="popover" data-bs-trigger="hover"
                data-bs-content="Wählen Sie den Bereich aus in dem ihr Problem aufgetaucht ist.
                Auf Grundlage dessen wird der verantwortliche IT-Mitarbeiter ausgewählt."> &#x1f6c8; </span>
              </h5>
            <select class="form-select" name="schlagwort" id="problemart">
              <optgroup label="Hardware">
                <option name="schlagwort" value="Hardware_Bildschirm">Bildschirm</option>
                <option name="schlagwort" value="Hardware_PC">PC</option>
                <option name="schlagwort" value="Hardware_Drucker">Drucker</option>
                <option name="schlagwort" value="Hardware_Handy">Handy</option>
                <option name="schlagwort" value="Hardware_Sonstiges">Sonstige</option>
              </optgroup>
              <optgroup label="Netzwerk">
                <option name="schlagwort" value="Netzwerk">Netzwerk</option>
              </optgroup>
              <optgroup label="Software">
                <option name="schlagwort" value="Software_Office">Office</option>
                <option name="schlagwort" value="Software_Adobe">Adobe</option>
                <option name="schlagwort" value="Software_Sonstiges">Sonstiges</option>
              </optgroup>
              <optgroup label="IT-Sicherheit">
                <option name="schlagwort" value="IT-Sicherheit_SpamMail">Spam-Mail</option>
                <option name="schlagwort" value="IT-Sicherheit_Sonstiges">Sonstiges</option>
              </optgroup>
              <optgroup label="Beratung">
                <option name="schlagwort" value="Beratung">Beratung zu IT-spezifischen Fragen</option>
              </optgroup>
              <optgroup label="Weitere Anliegen">
                <option name="schlagwort" value="Sonstiges">Sonstiges</option>
              </optgroup>
            </select>
          </div>
        </div> <br>
        <div class="row">
          <!-- Textarea for problem description -->
          <div class="col-sm-8">
            <h5>Problembeschreibung und bisherige Lösungsansätze</h5>
            <div class="input-group" name="freitext" id="freitext_in">
              <!-- maxlength für text bei mysql-->
              <textarea class="form-control" aria-label="With textarea" name="freitext" id="freitext" maxlength="65535"> Bitte hier das Problem näher beschreiben
              </textarea>
            </div>
          </div>
        </div> <br>
        <!-- Checkbox for data security submit -->
        <div class="row">
          <fieldset>
            <input type="checkbox" class="form-check-input" id="checkbox">
            Ich stimme der Speicherung meiner E-Mailadresse für die Kontaktaufnahme zu
          </fieldset>
        </div>
        <!-- Submit button -->
        <div class="row">
          <div class="col-sm-4">
            <button type="submit" id="submit" name="absenden" onclick="mail_senden()" disabled>Absenden</button>
            <!--  <button type="submit" name="absenden" >Absenden</button> -->
          </div>
        </div>
      </div>
      <!--Form ends here-->
    </form>
    <!-- Unit Test button. For more information see below function testeUnit(). Uncomment for testing purposes -->
  <!--  <button name="testen" onclick="testeUnit()">Unit Test</button> -->
  </body>
<script>
  //Script für Hinweise
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>
  <script>
    //Listens for changes in the checkbox input field and enables/disables
    //submit button if the checkbox value changes
    document.getElementById('checkbox').addEventListener('change', () => {
      document.getElementById('submit').disabled = !document.getElementById('checkbox').checked;
    });
    // Listens for changes in the 'email' input field and enables/unhides
    //certain elements if the input value changes
    document.getElementById('email').addEventListener('change', () => {
      document.getElementById('vorname').disabled = false;
      document.getElementById('nachname').disabled = false;
      document.getElementById('telnr').disabled = false;
      document.getElementById('buero').disabled = false;
      document.getElementById('third').hidden = false;
    });
    // Listens for changes in the 'pcnr' input field and unhides
    //a certain element if the input value changes
    document.getElementById('pcnr').addEventListener('change', () => {
      document.getElementById('fourth').hidden = false;
    });
    // Listens for changes in the 'problemart' input field and sets
    //the corresponding recipient if the input value changes
    var zustandigkeit = "https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053";
    document.getElementById('problemart').addEventListener('change', () => {
      // Logs the URL string to the console
      console.log(zustandigkeit);
      console.log("Zuständigkeit davor: ");
      console.log(zustandigkeit);
      var problem = document.getElementById("problemart").value;
      console.log("Übergebenes Problem: ");
      console.log(problem);
      // Creates a new XMLHttpRequest object
      var xhttp = new XMLHttpRequest();
      console.log("1");
      console.log(xhttp);
      xhttp.onreadystatechange = function() {
        // Defines a function to be called when
        // the readyState property changes
        console.log("infunc");
        if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed
          // when the document is ready
          console.log(this.responseText);
          var myObj_p = JSON.parse(this.responseText);
          zustandigkeit = myObj_p[0];
          console.log("neue Zuständigkeit: ");
          console.log(zustandigkeit);
        }
      };
      // xhttp.open("GET", "filename", true);
      xhttp.open("GET", "include/einfuegen_mail.php?problem=" + problem, true);
      // Sends the request to the server
      xhttp.send();
    });
    // onkeyup event will occur when the user
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
      console.log(str);
      if (str.length == 0) {
        //document.getElementById("").value = "";
        //document.getElementById("last_name").value = "";
        return;
      } else {
        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          // Defines a function to be called when
          // the readyState property changes
          if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed
            // when the document is ready
            console.log(this.responseText);
            var myObj = JSON.parse(this.responseText);
            // Returns the response data as a
            // string and store this array in
            // a variable assign the value
            // received to first name input field
            document.getElementById("vorname").value = myObj[0];
            // Assign the value received to
            // last name input field
            document.getElementById("nachname").value = myObj[1];
            document.getElementById("telnr").value = myObj[2];
            document.getElementById("buero").value = myObj[3];
          }
        };
        // Sends the request to the server
        xmlhttp.open("GET", "include/einfuegen.php?email=" + str, true);
        xmlhttp.send();
      }
    }
    // Mail API. This will collect the corresponding information
    //from the form and Post them to FormSubmit for processing.
    function mail_senden() {
      var email = document.getElementById("email").value;
      var vorname = document.getElementById("vorname").value;
      var nachname = document.getElementById("nachname").value;
      var tel = document.getElementById("telnr").value;
      var buero = document.getElementById("buero").value;
      var pcnr = document.getElementById("pcnr").value;
      var ort = document.getElementById("ort").value;
      var art = document.getElementById("problemart").value;
      var text = document.getElementById("freitext").value;
      console.log('zustandigkeit');
      // Ajax Post
      $.ajax({
        method: 'POST',
         url: zustandigkeit,
        dataType: 'json',
        accepts: 'application/json',
        data: {
          Email: email,
          Vorname: vorname,
          Nachname: nachname,
          Telefonnummer: tel,
          Buero: buero,
          PcNummer: pcnr,
          Ort: ort,
          Schlagwort: art,
          Freitext: text,

        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
    }

    //Unit Tests. This will only be here for testing purposes and has to be deleted alongside
    //the above Unit Test button in a theoretical final build. It will automatically
    //generate multiple unit test cases without the need to fill the form manually.
    function testeUnit() {
      //Creates a Unit Test adressed at Kevin
      $.ajax({
        method: 'POST',
        url: 'include/db_speichern.php',
        dataType: 'json',
        accepts: 'application/json',
        data: {
          email: "kevin.klose@aiv.hfoed.de",
          pcnr: "001",
          ort: "Behörde",
          schlagwort: "Hardware_Bildschirm",
          freitext: "Hello World 1",
        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
      // Ajax Post to FormSubmit
      $.ajax({
        method: 'POST',
        url: 'zustandigkeit',
        dataType: 'json',
        accepts: 'application/json',
        data: {
          Email: "kevin.klose@aiv.hfoed.de",
          Vorname: "Kevin2",
          Nachname: "Klose2",
          Telefonnummer: 1000,
          Buero: "A1002",
          PcNummer: "001",
          Ort: "Behörde",
          Schlagwort: "Hardware_Bilschirm",
          Freitext: "Hello World 1",
        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
      //Creates a Unit Test adressed at Matthias
      $.ajax({
        method: 'POST',
        url: 'include/db_speichern.php',
        dataType: 'json',
        accepts: 'application/json',
        data: {
          email: "matthias.feil@aiv.hfoed.de",
          pcnr: "001",
          ort: "Homeoffice",
          schlagwort: "Netzwerk",
          freitext: "Hello World 2",
        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
      // Ajax Post to FormSubmit
      $.ajax({
        method: 'POST',
        url: 'zustandigkeit',
        dataType: 'json',
        accepts: 'application/json',
        data: {
          Email: "matthias.feil@aiv.hfoed.de",
          Vorname: "Matthias2",
          Nachname: "Feil2",
          Telefonnummer: "2000",
          Buero: "A1003",
          PcNummer: "002",
          Ort: "Homeoffice",
          Schlagwort: "Netzwerk",
          Freitext: "Hello World 2",
        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
      //Creates a Unit Test adressed at Regina
      $.ajax({
        method: 'POST',
        url: 'include/db_speichern.php',
        dataType: 'json',
        accepts: 'application/json',
        data: {
          email: "reginamarga.richter@aiv.hfoed.de",
          pcnr: "003",
          ort: "Behörde",
          schlagwort: "Hardware_Bildschirm",
          freitext: "Hello World 3",
        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
      // Ajax Post to FormSubmit
      $.ajax({
        method: 'POST',
        url: 'zustandigkeit',
        dataType: 'json',
        accepts: 'application/json',
        data: {
          Email: "reginamarga.richter@aiv.hfoed.de",
          Vorname: "Regina2",
          Nachname: "Richter2",
          Telefonnummer: "3000",
          Buero: "A1003",
          PcNummer: "003",
          Ort: "Behörde",
          Schlagwort: "Hardware_Bildschirm",
          Freitext: "Hello World 3",
        },
        success: (data) => console.log(data),
        error: (err) => console.log(err)
      });
    }
  </script>
</html>
