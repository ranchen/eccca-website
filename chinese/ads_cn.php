<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>分類廣告</title>
  
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
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

<?php include("header_cn.html");?>
  
  <div class="text">
    <h1>廣告欄</h1>
    <p>
      如您沒有看到您的廣告，是因爲尚未被批准。如有疑問請聯系我們。
    </p>
  </div>
  
  <div id="wrapper">
    <?php
    
    //Connect to MySQL server
    $mysqli = new mysqli('ecccanet.ipagemysql.com', 'eccca', 'eccca123', 'eccca');
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
        echo '<div class="left">'.$title.'</div> <div class="right">提交日期 '.$date.'</div></div>';
        echo '<div class="contact">';
        echo '<b>姓名:</b> '.$name.'<br />';
        echo '<b>電話:</b> '.$phone.'<br />';
        echo '<b>電郵:</b> '.$email.'</div>';
        echo '<div class="desc">';
        echo '<b>說明:</b> '.$desc.'</div></div>';
      }
      
      //Destroy the result set and free the memory used for it
      $result->close();
    }

    $mysqli->close();
    ?>
  </div>
  <div class="text">
    <h1>提交廣告</h1>
    <p>
      請填以下表格。帶星（<span class="required">*</span>）記號的欄目爲必填項。您的廣告需要通過協會管理人員的批准。我們保留拒絕您的廣告權利。
    </p>
  </div>
  
  <form method="post" action="scripts/post.php">
  
    <h3>聯系地址</h3>
    
    <div class="form">
      <label for="name">
        <span class="required">*</span>姓名
      </label>
      <input id="name" type="text" name="name" required>
    </div>
    
    <div class="form">
      <label for="phone">
        電話
      </label>
      <input id="phone" type="text" name="phone">
    </div>
    
    <div class="form">
      <label for="email">
        電郵
      </label>
      <input id="email" type="text" name="email">
    </div>
    
    <h3>廣告內容</h3>
    
    <div class="form">
      <label for="title">
        <span class="required">*</span>標題
      </label>
      <input id="title" type="text" name="title" required>
    </div>   
    
    <div class="form">
      <label for="message">
        <span class="required">*</span>說明
      </label>
      <textarea id="message" rows="5" cols="50" name="message" required></textarea>
    </div>
    
    <div class="form">
      <label for="submit"></label>
      <input id="submit" type="submit" name="submit" value="Submit">
    </div>
    
  </form>

  
<?php include("footer_cn.html");?> 
  
</body></html>