<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>Contact - ECCCA</title>
  
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
  <style type="text/css">
    form {
      padding: 0 50px;
    }
    .form {
      padding: 10px 0;
      margin-left: 50px;
      overflow: auto;
    }
    label {
      display: block;
      float: left;
      width: 100px;
      min-height: 1px;
      padding-right: 10px;
    }
    input[type="text"] {
      display: block;
      float: left;
      width: 200px;
    }
    input[type="number"] {
      width: 50px;
      margin-left: 20px;
    }
    .check {
      float: left;
      width: 150px;
    }
    .line {
      overflow: auto;
      margin: 10px 0;
    }
    .submit {
      width: 100px;
    }
  </style>
  
</head>

<body>

<?php include("header.html");?>
  
  <div class="text">
    
    <h3>Essex County Chinese Canadian Association is located on:</h3>
    <div class="text">
      <p>1420 Tecumseh Road East<br />Windsor, Ontario, N8W 1C1<br />Office Hours: 11 am - 3pm</p>
      <p>Phone: (519) 252-6621<br />Fax: (519) 252-1320<br />Email: info@eccca.net</p>
    </div>
    <h3>You can also reach us using the following form.</h3>
  </div>
  
  <form method="post" action="scripts/sendmail.php">
  
    <div class="form">
      <label for="email">
        Your Email
      </label>
      <input id="email" type="text" name="email" required>
    </div>
    
     <div class="form">
      <label for="subject">
        Subject
      </label>
      <input id="subject" type="text" name="subject" required>
    </div>

    <div class="form">
      <label for="message">
        Message
      </label>
      <textarea id="message" rows="5" cols="50" name="message" required></textarea>
    </div>
    
    <div class="form">
      <label></label>
      <input class="submit" type="submit" name="submit" value="Submit">
    </div>
    
  </form>
  
  <div class="text">
    
    <h3>If you are interested in volunteering at our organization, please fill out the following form:</h3>
    
  </div>
  
  <form method="post" action="scripts/volunteer.php">
  
    <div class="form">
      <label for="name">
        Name
      </label>
      <input id="name" type="text" name="name" required>
    </div>
    
    <div class="form">
      <label for="phone">
        Phone
      </label>
      <input id="phone" type="text" name="phone" required>
    </div>
    
    <div class="form">
      <label for="email">
        Email
      </label>
      <input type="text" name="email">
    </div>
    
    <div class="form">
      <p>Please indicate your interests.</p>
      <div class="line">
        <div class="check"><input type="checkbox" name="interest[]" value="Home Visit" />Home Visit</div>
        <div class="check"><input type="checkbox" name="interest[]" value="Driver" />Driver</div>
        <div class="check"><input type="checkbox" name="interest[]" value="Event Planning" />Event Planning</div>
      </div>
      <div class="line">
        <div class="check"><input type="checkbox" name="interest[]" value="Telephoning" />Telephoning </div>
        <div class="check"><input type="checkbox" name="interest[]" value="Find Raising" />Find Raising</div>
        <div class="check"><input type="checkbox" name="interest[]" value="Health Promotion" />Health Promotion</div>
        <div class="check"><input type="checkbox" name="interest[]" value="Other" />Other</div>
      </div>
    </div>
    
    <div class="form">
      <p>Please mark the times you are available.</p>
      <div class="line">
        <div class="check"><b>Weekday:</b></div>
        <div class="check"><input type="checkbox" name="weekday[]" value="morning" />Morning</div>
        <div class="check"><input type="checkbox" name="weekday[]" value="afternoon" />Afternoon</div>
        <div class="check"><input type="checkbox" name="weekday[]" value="night" />Night</div>
      </div>
      <div class="line">
        <div class="check"><b>Weekend:</b></div>
        <div class="check"><input type="checkbox" name="weekend[]" value="morning" />Morning</div>
        <div class="check"><input type="checkbox" name="weekend[]" value="afternoon" />Afternoon</div>
        <div class="check"><input type="checkbox" name="weekend[]" value="night" />Night</div>
      </div>
    </div>
    
    <div class="form">
      <p>
        How many hours per week?
        <input type="number" name="hours" value="0" />
      </p>
    </div>
    
    <div class="form">
      <label></label>
      <input class="submit" type="submit" name="submit" value="Submit">
    </div>
    
  </form>
<?php include("footer.html");?> 
  
</body></html>