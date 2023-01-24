<?php

 $host = "localhost";
 $username = "root";
 $password = "";
 $database ="helpdesk";

 //$conn= mysqli_connect($host,$username,$password,$database);

 $conn= mysqli_connect($host,$username,$password,$database);

 if ($conn->connect_error)
{
  //die("Verbindung fehlgeschlagen: " . $conn->connect_error);
  exit("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

  ?>
