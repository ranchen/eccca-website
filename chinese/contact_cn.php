<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>聯繫地址</title>
  
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
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

<?php include("header_cn.html");?>
  
  <div class="text">
    
    <h3>雅斯郡華人協會地址：</h3>
    <div class="text">
      <p>1420 Tecumseh Road East<br />Windsor, Ontario, N8W 1C1<br />辦公時間：早上11點-下午3點</p>
      <p>電話: (519) 252-6621<br />傳真: (519) 252-1320<br />電郵: info@eccca.net</p>
    </div>
    <h3>您也可以使用以下表格與我們聯系。</h3>
  </div>
  
  <form method="post" action="../scripts/sendmail.php">
  
    <div class="form">
      <label for="email">
        您的電郵
      </label>
      <input id="email" type="text" name="email" required>
    </div>
    
     <div class="form">
      <label for="subject">
        科目
      </label>
      <input id="subject" type="text" name="subject" required>
    </div>

    <div class="form">
      <label for="message">
        通訊内容
      </label>
      <textarea id="message" rows="5" cols="50" name="message" required></textarea>
    </div>
    
    <div class="form">
      <label></label>
      <input class="submit" type="submit" name="submit" value="提交">
    </div>
    
  </form>
  
  <div class="text">
    
    <h3>如您有興趣到協會做義工，請填以下表格：</h3>
    
  </div>
  
  <form method="post" action="../scripts/volunteer.php">
  
    <div class="form">
      <label for="name">
        姓名
      </label>
      <input id="name" type="text" name="name" required>
    </div>
    
    <div class="form">
      <label for="phone">
        電話
      </label>
      <input id="phone" type="text" name="phone" required>
    </div>
        
     <div class="form">
      <label for="email">
        電郵
      </label>
      <input type="text" name="email">
    </div>

    <div class="form">
      <p>請寫明您的興趣</p>
      <div class="line">
        <div class="check"><input type="checkbox" name="interest" value="Home Visit" />家訪</div>
        <div class="check"><input type="checkbox" name="interest" value="Driver" />司機</div>
        <div class="check"><input type="checkbox" name="interest" value="Event Planning" />活动策划</div>
      </div>
      <div class="line">
        <div class="check"><input type="checkbox" name="interest" value="Telephoning" />打电话</div>
        <div class="check"><input type="checkbox" name="interest" value="Find Raising" />筹款</div>
        <div class="check"><input type="checkbox" name="interest" value="Health Promotion" />健康促进</div>
        <div class="check"><input type="checkbox" name="interest" value="Other" />其他</div>
      </div>
    </div>
    
    <div class="form">
      <p>請标记您的合適時間帶</p>
      <div class="line">
        <div class="check"><b>週日:</b></div>
        <div class="check"><input type="checkbox" name="weekday" value="morning" />早上</div>
        <div class="check"><input type="checkbox" name="weekday" value="afternoon" />下午</div>
        <div class="check"><input type="checkbox" name="weekday" value="night" />晚上</div>
      </div>
      <div class="line">
        <div class="check"><b>週末:</b></div>
        <div class="check"><input type="checkbox" name="weekend" value="morning" />早上</div>
        <div class="check"><input type="checkbox" name="weekend" value="afternoon" />下午</div>
        <div class="check"><input type="checkbox" name="weekend" value="night" />晚上</div>
      </div>
    </div>
    
    <div class="form">
      <p>
        每星期幾小時?
        <input type="number" name="hours" value="0" />
      </p>
    </div>
    
    <div class="form">
      <label></label>
      <input class="submit" type="submit" name="submit" value="提交">
    </div>
    
  </form>
<?php include("footer_cn.html");?> 
  
</body></html>