<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  
  <title>Essex County Chinese Canadian Association</title>
  
  <link rel="shortcut icon" href="favicon.ico">
  
  <style type="text/css">
    body {
      text-align: center;
    }
    h1 {
      margin: 100px auto;
    }
    a {
      font-size: 20px;
    }
  </style>
</head>

<body>
  
  <?php
    
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $title = htmlspecialchars($_POST['title']);
    $message = htmlspecialchars($_POST['message']);
    
    if (strlen($name) == 0 || strlen($title) == 0 || strlen($message) == 0) {
      echo '<h1>Please go back and complete the required fields</h1>';
      echo '<a href="submit.php">Go Back</a>';
    }
    else {
    
      //Connect to MySQL server
      $mysqli = new mysqli('ecccanet.ipagemysql.com', 'eccca', 'eccca123', 'eccca');
      if (mysqli_connect_errno()) {
        printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
        exit;
      }
      
      $query = 'insert into ads (ads_Title, ads_Name, ads_Phone, ads_Email, ads_Desc, ads_Date)
                values ("'.$title.'", "'.$name.'", "'.$phone.'", "'.$email.'", "'.$message.'", CURDATE())';
      
      if ($result = $mysqli->query($query)) {
        echo '<h1>Thank you! Your submission was successful and is pending review.</h1>';
        echo '<a href="../index.php">Main Page</a>';
      }
      
      $mysqli->close();
    }
    
  ?>
  
</body></html>
    
