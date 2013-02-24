<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>Classified Ads - ECCCA</title>
  
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
  <style type="text/css">
    #wrapper {
      padding: 0 50px;
    }
    .ad {
      padding: 20px 0;
      overflow: auto;
    }
    .title {
      overflow: auto;
      margin-bottom: 10px;
      border-bottom: 1px solid Gray;
    }
    .left {
      display: block;
      float: left;
      font-size: 20px;
      font-weight: bold;
    }
    .right {
      display: block;
      float: right;
      font-size: 15px;
      font-style: italic;
    }
    .contact {
      width: 330px;
      float: left;
    }
    .desc {
      width: 490px;
      float: right;
    }
    form {
      padding: 0 50px;
    }
    .form {
      padding: 10px 0;
      overflow: auto;
    }
    label {
      display: block;
      float: left;
      width: 100px;
      min-height: 1px;
      text-align: right;
      margin-right: 20px;
    }
    input {
      display: block;
      float: left;
      width: 200px;
    }
    #submit {
      width: 100px;
    }
    .required {
      color: Red;
    }
  </style>
  
</head>

<body>

<?php include("header.html");?>
  
  <div class="text">
    <h1>Ad Listing</h1>
    <p>
      If you do not see your ad listed below, it has not been approved yet.
      Please <a href="contact.php">contact us</a> for more information.
    </p>
  </div>
  
  <div id="wrapper">
    <?php
    
    //Connect to MySQL server
    $mysqli = new mysqli('EDITED OUT');
    if (mysqli_connect_errno()) {
      printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
      exit;
    }
    
    //Send a query to the server
    $query = "SELECT * FROM ads WHERE ads_Approve=1 ORDER BY ads_Date DESC";
    if ($result = $mysqli->query($query)) {
      
      //Fetch the results of the query
      while ($row = $result->fetch_assoc()) {
        $title = $row['ads_Title'];
        $name = $row['ads_Name'];
        $phone = $row['ads_Phone'];
        $email = $row['ads_Email'];
        $desc = $row['ads_Desc'];
        $date = $row['ads_Date'];
        
        echo '<div class="ad">';
        echo '<div class="title">';
        echo '<div class="left">'.$title.'</div> <div class="right">Submitted on '.$date.'</div></div>';
        echo '<div class="contact">';
        echo '<b>Name:</b> '.$name.'<br />';
        echo '<b>Phone:</b> '.$phone.'<br />';
        echo '<b>Email:</b> '.$email.'</div>';
        echo '<div class="desc">';
        echo '<b>Description:</b> '.$desc.'</div></div>';
      }
      
      //Destroy the result set and free the memory used for it
      $result->close();
    }

    $mysqli->close();
    ?>
  </div>
  
  <div class="text">
    <h1>Submit an Ad</h1>
    <p>
      Please fill out the following form. The fields marked with an asterisk 
      <span class="required">*</span>
      are required. Your advertisement is subject to approval by the association
      administrators. We reserve the right to reject your advertisement.
    </p>
  </div>
  
  <form method="post" action="scripts/post.php">
  
    <h3>Contact Information</h3>
    
    <div class="form">
      <label for="name">
        <span class="required">*</span>Name
      </label>
      <input id="name" type="text" name="name" required>
    </div>
    
    <div class="form">
      <label for="phone">
        Phone
      </label>
      <input id="phone" type="text" name="phone">
    </div>
    
    <div class="form">
      <label for="email">
        Email
      </label>
      <input id="email" type="text" name="email">
    </div>
    
    <h3> Advertisement Content</h3>
    
    <div class="form">
      <label for="title">
        <span class="required">*</span>Title
      </label>
      <input id="title" type="text" name="title" required>
    </div>   
    
    <div class="form">
      <label for="message">
        <span class="required">*</span>Message
      </label>
      <textarea id="message" rows="5" cols="50" name="message" required></textarea>
    </div>
    
    <div class="form">
      <label for="submit"></label>
      <input id="submit" type="submit" name="submit" value="Submit">
    </div>
    
  </form>

  
<?php include("footer.html");?> 
  
</body></html>
