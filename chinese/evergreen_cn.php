<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>松柏中心</title>
  
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
  <style type="text/css">
    #logo img{
      display: block;
      margin: auto;
    }
  </style>
</head>

<body>

<?php include("header_cn.html");?>
  <div id="logo">
    <img src="../evergreen_logo.png" alt="Evergreen Banner" width="500"/>
  </div>

  <div class="text">  
    <?php
    $file = fopen('./text_cn/evergreen_cn.txt', 'rb') or exit('Unable to open file.');
    echo trim(fread($file, filesize('./text_cn/evergreen_cn.txt')));
    fclose($file);
    ?>
  </div>
  
  <div class="leftpane">
    <h2>通訊</h2>
  </div>
  
  <div class="rightpane" style="border:none">
    <h2>活動預告</h2>
  </div>
  
  <?php
  
  //Connect to MySQL server
  $mysqli = new mysqli('ecccanet.ipagemysql.com', 'eccca', 'eccca123', 'evergreen');
  if (mysqli_connect_errno()) {
    printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
    exit;
  }
  
  echo '<div class="leftpane"><p>';
  //Send a query to the server
  $query = "SELECT * FROM newsletters WHERE news_Lang=1 OR news_Lang=2 ORDER BY news_Date DESC LIMIT 8";
  if ($result = $mysqli->query($query)) {
    
    //Fetch the results of the query
    while ($row = $result->fetch_assoc()) {
      $title = $row['news_Title'];
      $filepath = "../evergreen/$title";
      $desc = $row['news_Desc'];
      $date = $row['news_Date'];
      
      echo "<a href='".$filepath."'><b>".$title."</b></a><br /><i>發布日期 ".$date."</i><br/ >".$desc."<br /><br />";
    }
    
    //Destroy the result set and free the memory used for it
    $result->close();
  }
  echo '</p><p><a href="evergreen_archive_cn.php">>>點擊這裡可看我們所有通訊</a></p></div>';
  
  echo '<div class="rightpane"><p>';
  //Send a query to the server
  $query = "SELECT * FROM events WHERE ev_Lang=1 OR ev_Lang=2 ORDER BY ev_Date DESC LIMIT 8";
  if ($result = $mysqli->query($query)) {
    
    //Fetch the results of the query
    while ($row = $result->fetch_assoc()) {
      $title = $row['ev_Title'];
      $filepath = "../evergreen/$title";
      $desc = $row['ev_Desc'];
      $date = $row['ev_Date'];
      
      echo "<a href='".$filepath."'><b>".$title."</b></a><br /><i>發布日期 ".$date."</i><br/ >".$desc."<br /><br />";
    }
    
    //Destroy the result set and free the memory used for it
    $result->close();
  }
  echo '</p><p><a href="event_archive_cn.php">>>點擊這裡可看所有活動</a></p></div>';
  
  $mysqli->close();
  ?>

  
<?php include("footer_cn.html");?>

</body></html>