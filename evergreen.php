<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>Evergreen Center - ECCCA</title>
  
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
  <style type="text/css">
    #logo img{
      display: block;
      margin: auto;
    }
  </style>
</head>

<body>

<?php include("header.html");?>
  <div id="logo">
    <img src="evergreen_logo.png" width="500" alt="Evergreen Banner"/>
  </div>

  <div class="text">  
    <?php
    $file = fopen('./text/evergreen.txt', 'rb') or exit('Unable to open file.');
    echo trim(fread($file, filesize('./text/evergreen.txt')));
    fclose($file);
    ?>
  </div>
  
  <div class="leftpane">
    <h1>Newsletters</h1>
  </div>
  
  <div class="rightpane" style="border:none">
    <h1>Upcoming Events</h1>
  </div>
  
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
      $filepath = "evergreen/$title";
      $desc = $row['news_Desc'];
      $date = $row['news_Date'];
      
      echo "<a href='".$filepath."'><b>".$title."</b></a><br /><i>Posted on ".$date."</i><br/ >".$desc."<br /><br />";
    }
    
    //Destroy the result set and free the memory used for it
    $result->close();
  }
  echo '</p><p><a href="evergreen_archive.php">>>Click here to view all of our newsletters.</a></p></div>';
  
  echo '<div class="rightpane"><p>';
  //Send a query to the server
  $query = "SELECT * FROM events WHERE ev_Lang=0 OR ev_Lang=2 ORDER BY ev_Date DESC LIMIT 8";
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
  echo '</p><p><a href="event_archive.php">>>Click here to view all of our events.</a></p></div>';
  
  
  $mysqli->close();
  ?>

  
<?php include("footer.html");?>

</body></html>
