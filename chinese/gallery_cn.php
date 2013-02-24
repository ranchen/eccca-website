<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Ran Chen">
  <meta name="keywords" content="essex, county, chinese, canadian, association, eccca">
  <meta name="description" content="Website for the Essex County Chinese Canadian Association">
  
  <title>相簿</title>
  
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
  <link rel="shortcut icon" href="favicon.ico">
  
  <link rel="stylesheet" href="../css/galleriffic-2.css" type="text/css" />
  <script type="text/javascript" src="../js/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="../js/jquery.galleriffic.js"></script>
  <script type="text/javascript" src="../js/jquery.opacityrollover.js"></script>
  <!-- We only want the thunbnails to display when javascript is disabled -->
  <script type="text/javascript">
    document.write('<style>.noscript { display: none; }</style>');
  </script>
  
  <style type="text/css">
    .title {
      padding: 10px 30px;
    }
  </style>
  
</head>

<body>

<?php include("header_cn.html");?>

  <div class="title">
    <h1>相簿分類</h1>
    <p>瀏覽我們相簿分類。請到<a href="http://www.youtube.com/user/ecccanet">Youtube</a>看我們的活動錄像。</p>
  </div>
  
  <div id="gallerywrapper">
  
    <div id="gallery" class="content">
      <div id="controls" class="controls"></div>
      <div class="slideshow-container">
        <div id="loading" class="loader"></div>
        <div id="slideshow" class="slideshow"></div>
      </div>
      <div id="caption" class="caption-container"></div>
    </div>
    
    <div id="leftpane">
      <p>選擇相簿圖片分類:</p>
      <form method="get" action="gallery_cn.php">
        <select name="select">
          <?php
            $exclude = array('.','..');
            $listdirs = scandir('../gallery');
            foreach ($listdirs as $dir) {
              $path = '../gallery/'.$dir;
              if (is_dir($path) and !in_array($dir, $exclude)) {
                echo '<option value="'.$dir.'">'.$dir.'</option>';
              }
            }
          ?>
        </select>
        <input type="submit" value="提交">
      </form>
    
      <div id="thumbs" class="navigation">
        <ul class="thumbs noscript">
          <?php
            if (isset($_GET['select'])) {
              $gallery = $_GET['select'];
            }
            else {
              $gallery = "Rising Dragon";
            }
            $path = '../gallery/'.$gallery;
            $listfiles = scandir($path);
            foreach ($listfiles as $file) {
              $fullpath = '../gallery/'.$gallery.'/'.$file;
              if (!is_dir($fullpath)) {
                echo '<li><a class="thumb" href="'.$fullpath.'" title="'.$file.'">';
                echo '<img src="'.$fullpath.'" alt="'.$file.'" width="75" height="75"/></a>';
                echo '<div class="caption">';
                echo '<div class="image-title">'.$file.'</div></div></li>';
              }
            }         
          ?>
        </ul>
      </div>
    </div>  
    <div style="clear: both;"></div>
  
  </div>
  
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      // We only want these styles applied when javascript is enabled
      $('div.navigation').css({'width' : '290px', 'float' : 'left'});
      $('div.content').css('display', 'block');

      // Initially set opacity on thumbs and add
      // additional styling for hover effect on thumbs
      var onMouseOutOpacity = 0.67;
      $('#thumbs ul.thumbs li').opacityrollover({
        mouseOutOpacity:   onMouseOutOpacity,
        mouseOverOpacity:  1.0,
        fadeSpeed:         'fast',
        exemptionSelector: '.selected'
      });
      
      // Initialize Advanced Galleriffic Gallery
      var gallery = $('#thumbs').galleriffic({
        delay:                     2500,
        numThumbs:                 15,
        preloadAhead:              10,
        enableTopPager:            true,
        enableBottomPager:         true,
        maxPagesToShow:            7,
        imageContainerSel:         '#slideshow',
        controlsContainerSel:      '#controls',
        captionContainerSel:       '#caption',
        loadingContainerSel:       '#loading',
        renderSSControls:          true,
        renderNavControls:         true,
        playLinkText:              'Play Slideshow',
        pauseLinkText:             'Pause Slideshow',
        prevLinkText:              '&lsaquo; Previous Photo',
        nextLinkText:              'Next Photo &rsaquo;',
        nextPageLinkText:          'Next &rsaquo;',
        prevPageLinkText:          '&lsaquo; Prev',
        enableHistory:             false,
        autoStart:                 false,
        syncTransitions:           true,
        defaultTransitionDuration: 0,
        onSlideChange:             function(prevIndex, nextIndex) {
          // 'this' refers to the gallery, which is an extension of $('#thumbs')
          this.find('ul.thumbs').children()
            .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
            .eq(nextIndex).fadeTo('fast', 1.0);
        },
        onPageTransitionOut:       function(callback) {
          this.fadeTo('fast', 0.0, callback);
        },
        onPageTransitionIn:        function() {
          this.fadeTo('fast', 1.0);
        }
      });
    });
  </script>

<?php include("footer_cn.html");?> 
  
</body></html>