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
<h5>E-Mail</h5>
<div class="row">
  <div class="col-sm-6">
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

</body>
</html>
