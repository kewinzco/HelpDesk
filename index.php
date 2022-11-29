<!DOCTYPE html>
<html lang="de">
<head>
  <title>Help Desk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Ticket erstellen</h1>
</div>

<div class="container mt-5">

  <div class="row">
    <div class="col-sm-6">
      <h5>E-Mail</h5>
      <div class="input-group sm-4">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="beispiel@help-desk.de" name="email">
      </div>
    </div>
  <br><br>
  </div>

  <div class="row">
    <div class="col-sm-3">
      <h5>Vorname</h5>
      <input type="text" class="form-control" placeholder="Hans" name="vorname">
    </div>
    <div class="col-sm-3">
      <h5>Nachname</h5>
      <input type="text" class="form-control" placeholder="Wurst" name="nachname">
    </div>
    <div class="col-sm-3">
      <h5>Telefonnummer</h5>
      <input type="text" class="form-control" placeholder="123456" name="telefonnr">
    </div>
    <div class="col-sm-3">
      <h5>Büro</h5>
      <input type="text" class="form-control" placeholder="B007" name="buero">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-3">
      <h5>PC-Nummer</h5>
      <input type="text" class="form-control" placeholder="1234" name="pcnr">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <h5>Wo tritt das Problem auf?</h5>
      <div class="">
        <fieldset>
          <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Behörde <br>
          <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2" >Homeoffice <br>
          <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3" >Außendienst
        </fieldset>
      </div>
    </div>
    <div class="col-sm-4">
      <h5>Art des Problems</h5>
      <select class="form-select" >
          <option>Netzwerk</option>
          <option>Software</option>
          <option>Hardware</option>
          <option>IT-Sicherheit</option>
          <option>Beratung zu IT-spezifischen Fragen</option>
          <option>Sonstiges</option>
      </select>
    </div>
    <div class="col-sm-4">
      <h5>Welches Gerät</h5>
      <select class="form-select" >
          <option>Bildschirm</option>
          <option>Maus/Tastatur</option>
          <option>Drucker</option>
          <option>Sonstiges</option>
      </select>
    </div>
  </div>



  <div class="row">
    <div class="col-sm-8">
      <h5>Problembeschreibung und bisherige Lösungsansätze</h5>
      <div class="input-group">
        <textarea class="form-control" aria-label="With textarea"></textarea>
      </div>
    </div>
    <div class="col-sm-4">
      <h5>Screenshot-Upload</h5>
        <input type="file" name="" value="" accept="image/*">
    </div>
  </div>

  <div class="row">
      <fieldset>
        <input type="checkbox" class="form-check-input" id="checkbox">
        Ich stimme der Speicherung meiner E-Mailadresse für die Kontaktaufnahme zu
      </fieldset>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <button type="button" name="absenden">Absenden</button>
    </div>
  </div>

</div>

</body>
</html>
