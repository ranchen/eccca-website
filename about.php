<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>About - ECCCA</title>
  
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
  <style type="text/css">
    .right {
      margin-left: 30px;
      display: block;
      float: right;
    }
    .left {
      margin-right: 30px;
      display: block;
      float: left;
    }
    .rightpane {
      border: none;
    }
  </style>
  
</head>

<body>

<?php include("header.html");?>
  
  <div class="text">
    <h1>History</h1>
    <?php
    $file = fopen('./text/history.txt', 'rb') or exit('Unable to open file.');
    echo trim(fread($file, filesize('./text/history.txt')));
    fclose($file);
    ?>
  </div>
  
  <div class="clear"></div>

  <div class="leftpane">
    <h1>List of Presidents</h1>
    <table>
      <tr><th>Year</th><th>Name</th></tr>
      <?php
      $file = fopen('./text/presidents.txt', 'rb') or exit('Unable to open file.');
      echo trim(fread($file, filesize('./text/presidents.txt')));
      fclose($file);
      ?>
    </table>
  </div>
  
  <div class="rightpane">
    <h1>Board of Directors</h1>
    <table>
      <tr><th>Position</th><th>Name</th></tr>
      <?php
      $file = fopen('./text/directors.txt', 'rb') or exit('Unable to open file.');
      echo trim(fread($file, filesize('./text/directors.txt')));
      fclose($file);
      ?>
    </table>
  </div>
  
  
  <div class="rightpane">
    <h1>Check Out Our Links</h1>
    <br />
    
    <?php
  
    //Connect to MySQL server
    $mysqli = new mysqli('EDITED OUT');
    if (mysqli_connect_errno()) {
      printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
      exit;
    }

    //Send a query to the server
    $query = "SELECT * FROM links";
    if ($result = $mysqli->query($query)) {
      
      //Fetch the results of the query
      while ($row = $result->fetch_assoc()) {
        $name = $row['li_Name'];
        $url = $row['li_Url'];
        $desc = $row['li_Desc'];
        
        echo '<p><a href="'.$url.'"><b>'.$name.'</b></a><br />'.$desc.'</p>';
      }
      
      //Destroy the result set and free the memory used for it
      $result->close();
    }    
    
    $mysqli->close();
    
    ?>
  </div>

<?php include("footer.html");?> 
  
</body></html>
