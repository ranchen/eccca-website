<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>Announcements - ECCCA</title>
  
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
</head>

<body>

<?php include("header.html");?>

  <div class="leftpane"><h1>Latest Newsletters</h1></div>
  <div class="rightpane" style="border:none"><h1>Latest Activities</h1></div>
  
  <?php
  
  //Connect to MySQL server
  $mysqli = new mysqli('EDITED OUT');
  if (mysqli_connect_errno()) {
    printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
    exit;
  }
  
  echo '<div class="leftpane"><p>';
  //Send a query to the server
  $query = "SELECT * FROM newsletters WHERE news_Lang=0 OR news_Lang=2 ORDER BY news_Date DESC LIMIT 8";
  if ($result = $mysqli->query($query)) {
    
    //Fetch the results of the query
    while ($row = $result->fetch_assoc()) {
      $title = $row['news_Title'];
      $filepath = "announcements/$title";
      $desc = $row['news_Desc'];
      $date = $row['news_Date'];
      
      echo "<a href='".$filepath."'><b>".$title."</b></a><br /><i>Posted on ".$date."</i><br/ >".$desc."<br /><br />";
    }
    
    //Destroy the result set and free the memory used for it
    $result->close();
  }
  echo '</p><p><a href="newsletter_archive.php">>>Click here to view all of our newsletters.</a></p></div>';

  echo '<div class="rightpane"><p>';
  //Send a query to the server
  $query = "SELECT * FROM activities WHERE act_Lang=0 OR act_Lang=2 ORDER BY act_Date DESC LIMIT 8";
  if ($result = $mysqli->query($query)) {
    
    //Fetch the results of the query
    while ($row = $result->fetch_assoc()) {
      $title = $row['act_Title'];
      $filepath = "announcements/$title";
      $desc = $row['act_Desc'];
      $date = $row['act_Date'];
      
      echo "<a href='".$filepath."'><b>".$title."</b></a><br /><i>Posted on ".$date."</i><br/ >".$desc."<br /><br />";
    }
    
    //Destroy the result set and free the memory used for it
    $result->close();
  }
  echo '</p><p><a href="activities_archive.php">>>Click here to view all of our activities.</a></p></div>';

  $mysqli->close();
  ?>
    
<?php include("footer.html");?>

</body></html>
