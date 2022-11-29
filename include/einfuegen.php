<?php
// Get the user id
$email = $_REQUEST['email'];
include('config.php'); //Verbindung DB
// Database connection

if ($email !== "") {

    // Get corresponding first name and
    // last name for that user id
    $query = mysqli_query($conn, "SELECT vorname, nachname, telefonnummer, büro FROM mitarbeiter WHERE emailadresse='$email'");

    $row = mysqli_fetch_array($query);

    // Get the first name
    $vorname = $row["vorname"];

    // Get the first name
    $nachname = $row["nachname"];
    $telefonnummer = $row["telefonnummer"];
    $büro = $row["büro"];
}

// Store it in a array
$result = array("$vorname", "$nachname", "$telefonnummer", "$büro");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
