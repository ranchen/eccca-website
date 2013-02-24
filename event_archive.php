<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  
  <title>Evergreen Event Archives - ECCCA</title>
  
  <link rel="shortcut icon" href="favicon.ico">
  
</head>

<body>

<h1>Evergreen Event Archive</h1>

<p><a href="evergreen.php">Go Back</a></p>

<?php

//Connect to MySQL server
$mysqli = new mysqli('EDITED OUT');
if (mysqli_connect_errno()) {
  printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
  exit;
}

//Send a query to the server
$query = "SELECT * FROM events WHERE ev_Lang=0 OR ev_Lang=2 ORDER BY ev_Date DESC";
if ($result = $mysqli->query($query)) {
  
  //Fetch the results of the query
  while ($row = $result->fetch_assoc()) {
    $title = $row['ev_Title'];
    $filepath = "evergreen/$title";
    $desc = $row['ev_Desc'];
    $date = $row['ev_Date'];
    
    echo "<a href='".$filepath."'><b>".$title."</b></a><br /><i>Posted on ".$date."</i><br/ >".$desc."<br /><br />";
  }
  
  //Destroy the result set and free the memory used for it
  $result->close();
}

$mysqli->close();
?>

</body></html>
