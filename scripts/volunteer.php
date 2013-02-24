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
  
  function spamcheck($field) {
  
    //filter_var() sanitizes the e-mail
    //address using FILTER_SANITIZE_EMAIL
    $field=filter_var($field, FILTER_SANITIZE_EMAIL);

    //filter_var() validates the e-mail
    //address using FILTER_VALIDATE_EMAIL
    if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
  
  //check if the email address is invalid
  $mailcheck = spamcheck($_POST['email']);
  if ($mailcheck==FALSE) {
    echo "Invalid email. Check your email input and try again.";
  }
  else {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $interest = $_POST['interest'];
    $weekday = $_POST['weekday'];
    $weekend = $_POST['weekend'];
    
    $hours = htmlspecialchars($_POST['hours']);
    
    if (strlen($name)==0 || strlen($email)==0 || strlen($phone)==0) {
      echo '<h1>Please go back and fill in your contact information.</h1>';
      echo '<a href="contact.php">Go Back</a>';
    }
    else {
      $subject = 'Volunteer Application';
      $message = "Name: ".$name."\nEmail: ".$email."\nPhone: ".$phone."\n\nInterests: ";
      foreach ($interest as $int) {
        $message = $message.$int.", ";
      }
      
      $message = $message."\n\nTimes Available:\n\nWeekday: ";
      foreach ($weekday as $wd) {
        $message = $message.$wd.", ";
      }
      $message = $message."\nWeekend: ";
      foreach ($weekend as $we) {
        $message = $message.$we.", ";
      }
      
      $message = $message."\n\nHours per week: ".$hours;

      $success = mail('info@eccca.net', $subject, $message, 'From:'.$email);
      if ($success) {
        echo '<h1>Thank you for your message! Someone will get in touch with you shortly.</h1>';
        echo '<a href="../contact.php">Go Back</a>';
      }
      else {
        echo '<h1>An error has occurred. Please go back and try again.</h1>';
        echo '<a href="../contact.php">Go Back</a>';
      }
    }
  }
  ?>
  
</body></html>
    
