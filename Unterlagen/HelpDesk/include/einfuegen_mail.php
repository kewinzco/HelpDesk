<?php
// Get the user id
$problem = $_REQUEST['problem'];
include('config.php'); //Verbindung DB
// Database connection

if ($problem !== "") {

    // Get corresponding first name and
    // last name for that user id
  //  $query = mysqli_query($conn, "SELECT vorname, nachname, telefonnummer, büro FROM mitarbeiter WHERE emailadresse='$email'");
  $query = mysqli_query($conn, "SELECT Hashwert FROM `mitarbeiter` JOIN zustaendigkeit ON mitarbeiter.EMailadresse = zustaendigkeit.MitarbeiterEMail Where Schlagwort = '$problem'");

    $row = mysqli_fetch_array($query);

    // Get the first name
    $mail = $row["Hashwert"];


}

// Store it in a array
$result = array("$mail");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
