<?php
// Get the user id
$user_id = $_REQUEST['user_id'];
include('include/config.php'); //Verbindung DB
// Database connection

if ($user_id !== "") {

    // Get corresponding first name and
    // last name for that user id
    $query = mysqli_query($con, "SELECT vorname, nachname, telefonnummer, büro FROM mitarbe WHERE e-mailadresse='$user_id'");

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
