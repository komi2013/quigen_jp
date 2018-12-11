<!DOCTYPE html>
<html manifest="/myanswer.mf">
  <head>
    <meta charset="UTF-8" />
    <title>マイアンサー(復習)</title>
    <link rel="shortcut icon" href="/assets/img/icon/quiz_generator.png" />
    <meta name="robots" content="noindex">
    <script src="/third/jquery-2.1.1.min.js"></script>
    <script src="/third/jquery.cookie.js"></script>
    <script> var ua = '<?=Config::get("my.ua")?>'; </script>
    <script src="/assets/js/analytics_offline.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/basic.css" />
    <link rel="stylesheet" href="/assets/css/pc.css" media="only screen and (min-width : 711px)">
    <link rel="stylesheet" href="/assets/css/sp.css" media="only screen and (max-width : 710px)">
    <meta name="viewport" content="width=device-width, user-scalable=no" >
  </head>
<body>

<?php
  $side = View::forge('side');
  $side->this_page = 'myanswer';
  echo $side;
?>
<div id="content">

<div id="ad"><iframe src="/htm/ad_blank/" width="320" height="50" frameborder="0" scrolling="no"></iframe></div>
<table><tr><td class="td_99_c" id="position" style="color: blue;">前回のオフラインクイズ</td></tr></table>
<table id="cel"></table>
</div>

<div id="ad_right"></div>
<script>
var domain = '<?=Config::get('my.domain')?>';
</script>
<script src="/assets/js/check_news.js"></script>
<script src="/assets/js/basic_offline.js"></script>
<script src="/assets/js/myanswer_offline.js"></script>
<script>  
if(navigator.onLine){
  $(function(){ ga('send', 'pageview'); });
}
</script>
</body>
</html>
