<!DOCTYPE html> <?php
/* if (isset($_POST['email']) {
  header("https://formsubmit.co/" . $_POST['email']);
}
*/
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
    <!--form start-->
  <!--  <form action="include/db_speichern.php" method="POST">-->
      <form >
      <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Ticket erstellen</h1>
      </div>
      <div class="container mt-5">
        <!--visible first-->
        <div class="row" id="first">
          <div class="col-sm-6">
            <h4>1. Persönliche Daten</h4>
            <h5>E-Mail</h5>
            <div class="input-group sm-4">
              <span class="input-group-text">@</span>
              <input type="text" id="email" class="form-control" onkeyup="GetDetail(this.value)" placeholder="beispiel@help-desk.de" name="email">
            </div>
          </div>
        </div>
        <!--visible second-->
        <div class="row" id="second">
          <div class="col-sm-3">
            <h5>Vorname</h5>
            <input type="text" id="vorname" class="form-control" placeholder="Hans" name="vorname">
          </div>
          <div class="col-sm-3">
            <h5>Nachname</h5>
            <input type="text" id="nachname" class="form-control" placeholder="Wurst" name="nachname">
          </div>
          <div class="col-sm-3">
            <h5>Telefonnummer</h5>
            <input type="text" id="telnr" class="form-control" placeholder="123456" name="telefonnr">
          </div>
          <div class="col-sm-3">
            <h5>Büro</h5>
            <input type="text" id="buero" class="form-control" placeholder="B007" name="buero">
          </div>
        </div>
      </div>
      <div class="container mt-5">
        <!--visible second-->
        <div class="row" id="third">
          <div class="col-sm-3">
            <h4>2. Angaben zum Gerät</h4>
            <h5>PC-Nummer</h5>
            <input type="text" class="form-control" placeholder="1234" name="pcnr" id="pcnr">
          </div>
        </div>
      </div>
      <!--visible third-->
      <div class="container mt-5" id="fourth">
        <div class="row">
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
          <div class="col-sm-4">
            <h5>Art des Problems</h5>
            <select class="form-select" name="schlagwort" id="problemart" onchange="zustandigkeitAndern()">
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
        </div>
        <div class="row">
          <div class="col-sm-8">
            <h4>3. Problembeschreibung</h4>
            <h5>Problembeschreibung und bisherige Lösungsansätze</h5>
            <div class="input-group" name="freitext" id="freitext_in">
              <textarea class="form-control" aria-label="With textarea" name="freitext" id="freitext">Bitte hier das Problem näher beschreiben</textarea>
            </div>
          </div>
          <!--  <div class="col-sm-4"><h5>Screenshot-Upload</h5><input type="file" name="" value="" accept="image/*"></div> -->
        </div>
        <div class="row">
          <fieldset>
            <input type="checkbox" class="form-check-input" id="checkbox"> Ich stimme der Speicherung meiner E-Mailadresse für die Kontaktaufnahme zu
          </fieldset>
        </div>
        <div class="row">
          <div class="col-sm-4">
          <button type="submit" name="absenden" onclick="mail_senden()">Absenden</button>
          <!--  <button type="submit" name="absenden" >Absenden</button> -->
          </div>
        </div>
      </div>
      <!--form end-->
    </form>
    <button name="testen" onclick="testeUnit()">Unit Test</button>
  </body>
  <script>
    //Zustandigkeit Listener
    var zustandigkeit = "https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053";
    console.log(zustandigkeit);
    function zustandigkeitAndern() {
      switch (document.getElementById("problemart").value) {
        case "Hardware_Bildschirm":
        //  zustandigkeit = "https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053";
        zustandigkeit = "https://formsubmit.co/ajax/klose.k@gmx.net";
          break;
        case "Hardware_PC":
          zustandigkeit = "https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053";
          break;
        case "Hardware_Drucker":
          zustandigkeit = "https://formsubmit.co/ajax/16226ee088794398fdfc9911f7464bf1";
          break;
        case "Hardware_Handy":
          zustandigkeit = "https://formsubmit.co/ajax/e1c8ab6cf84cb805b3ab50a8f4535a6e";
          break;
        case "Hardware_Sonstiges":
          zustandigkeit = "https://formsubmit.co/ajax/e1c8ab6cf84cb805b3ab50a8f4535a6e";
          break;
        case "Netzwerk":
          zustandigkeit = "https://formsubmit.co/ajax/16226ee088794398fdfc9911f7464bf1";
          break;
        case "Software_Office":
          zustandigkeit = "https://formsubmit.co/ajax/e1c8ab6cf84cb805b3ab50a8f4535a6e";
          break;
        case "Software_Adobe":
          zustandigkeit = "https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053";
          break;
        case "Software_Sonstiges":
          zustandigkeit = "https://formsubmit.co/ajax/16226ee088794398fdfc9911f7464bf1";
          break;
        case "Sicherheit_SpamMail":
          zustandigkeit = "https://formsubmit.co/ajax/16226ee088794398fdfc9911f7464bf1";
          break;
        case "Sicherheit_Sonstiges":
          zustandigkeit = "https://formsubmit.co/ajax/e1c8ab6cf84cb805b3ab50a8f4535a6e";
          break;
        case "Beratung":
          zustandigkeit = "https://formsubmit.co/ajax/e1c8ab6cf84cb805b3ab50a8f4535a6e";
          break;
        case "Sonstiges":
          zustandigkeit = "https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053";
          break;
        default:
          break;
      }
      console.log(zustandigkeit);
    }
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
        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "include/einfuegen.php?email=" + str, true);
        // Sends the request to the server
        xmlhttp.send();
      }
      /*  function mail_senden()
        {
          console.log("klappt");
        }*/
    }

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

      $.ajax({
        method: 'POST',
        url: 'zustandigkeit',
        dataType: 'json',
        accepts: 'application/json',
        data: {
        /*  Email: document.getElementById("email").value,
          Vorname: document.getElementById("vorname").value,
          Nachname: document.getElementById("nachname").value,
          Telefonnummer: document.getElementById("telnr").value,
          Buero: document.getElementById("buero").value,
          PcNummer: document.getElementById("pcnr").value,
          Ort: document.getElementById("ort").value,
          Schlagwort: document.getElementById("problemart").value,
          Freitext: document.getElementById("freitext").value,*/
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
    //Unit Tests
  function testeUnit() {
      //Kevin
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
      //Matthias
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
      //Regina
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
