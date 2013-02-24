<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>首页</title>
  
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

  <link rel="shortcut icon" href="favicon.ico">
  
	<!-- the CSS for Smooth Div Scroll -->
	<link rel="Stylesheet" type="text/css" href="../css/smoothDivScroll.css" />
	
	<!-- Styles for my specific scrolling content -->
	<style type="text/css">
    h1 {
      color: Maroon;
      text-align: center;
      font-size: 50px;
      margin-bottom: 30px;
    }
		#makeMeScrollable {
			width:820px;
			height: 330px;
			position: relative;
      margin: 30px auto;
      box-shadow: 0px 0px 10px #000000;
		}
		#makeMeScrollable div.scrollableArea img {
			position: relative;
			float: left;
			margin: 0;
			padding: 0;
			/* If you don't want the images in the scroller to be selectable, try the following
			   block of code. It's just a nice feature that prevent the images from
			   accidentally becoming selected/inverted when the user interacts with the scroller. */
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
	</style>
  
</head>

<body>

<?php include("header_cn.html");?>
  <div class="text">
    <h1>歡迎蒞臨雅斯郡華人協會</h1>
  </div>
  
	<div id="makeMeScrollable">
    <?php
      $listfiles = scandir('../images');
      foreach ($listfiles as $file) {
        if (!is_dir('../images/'.$file)) {
          $fullpath = '../images/'.$file;
          echo '<img src="'.$fullpath.'" alt="'.$file.'" height="330"/>';
        }
      }
    ?>
	</div>
  
  
  	<!-- LOAD JAVASCRIPT LATE - JUST BEFORE THE BODY TAG 
	     That way the browser will have loaded the images
		 and will know the width of the images. No need to
		 specify the width in the CSS or inline. -->

	<!-- jQuery library - Please load it from Google API's using 
	     a protocol-independent absolute path-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<!-- jQuery UI Widget and Effects Core (custom download)
	     You can make your own at: http://jqueryui.com/download -->
	<script src="../js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	
	<!-- Latest version of jQuery Mouse Wheel by Brandon Aaron
	     You will find it here: http://brandonaaron.net/code/mousewheel/demos -->
	<script src="../js/jquery.mousewheel.min.js" type="text/javascript"></script>

	<!-- Smooth Div Scroll 1.2 minified-->
	<script src="../js/jquery.smoothdivscroll-1.2-min.js" type="text/javascript"></script>

	<!-- If you want to look at the uncompressed version you find it at
	     js/jquery.smoothDivScroll-1.2.js -->

	<!-- Plugin initialization -->
	<script type="text/javascript">
		// Initialize the plugin with no custom options
		$(document).ready(function () {
			// None of the options are set
			$("div#makeMeScrollable").smoothDivScroll({
        autoScrollingMode: "always"
			});
		});
	</script>


	<div id="reference" style="width: 1px; height; 1px;"></div>

  <div class="text">
    <?php
    $file = fopen('./text_cn/welcome_cn.txt', 'rb') or exit('Unable to open file.');
    echo trim(fread($file, filesize('./text_cn/welcome_cn.txt')));
    fclose($file);
    ?>
  </div>
  
<?php include("footer_cn.html");?>

</body></html>