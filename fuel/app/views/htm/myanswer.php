<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>マイアンサー(復習)</title>
    <link rel="shortcut icon" href="/assets/img/icon/quiz_generator.png" />
    <meta name="robots" content="noindex">
    <script src="/third/jquery-2.1.1.min.js"></script>
    <script src="/third/jquery.cookie.js"></script>
    <script>var ua = '<?=Config::get("my.ua")?>';</script>
    <script src="/assets/js/analytics.js"></script>
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

<table id="rank"></table>    

<table>
<tr>
  <td><img src="/assets/img/icon/circle_big.png" class="icon"></td>
  <td class="td_34" id="num_ratio">0 % </td>
  <td><img src="/assets/img/icon/answer.png" class="icon"></td>
  <td class="td_34" id="num_answer">0</td>
</tr>
</table>

<table>
<tr>
<td style="width:70px;">
  <a href="" target="_blank">
    <img src="/assets/img/icon/fb.jpg" alt="facebook" class="icon">
  </a>
</td>
<td style="width:70px;">
  <a href="" target="_blank">
  <img src="/assets/img/icon/tw.jpg" alt="twitter" class="icon">
  </a>
</td>
<td style="width:70px;" class="pc_disp_none">
  <a href="" target="_blank">
  <img src="/assets/img/icon/ln.jpg" alt="line" class="icon">
  </a>
</td>
<td style="width:70px;">
  <a href="" target="_blank">
  <img src="/assets/img/icon/clip.png" alt="clip" class="icon">
  </a>
</td>
</tr>
</table>

<div id="ad"><iframe src="/htm/ad_blank/" width="320" height="50" frameborder="0" scrolling="no"></iframe></div>

<table id="cel"></table>
</div>

<div id="ad_right"></div>
<script>
var domain = '<?=Config::get('my.domain')?>';
</script>
<script src="/assets/js/check_news.js"></script>
<script src="/assets/js/basic.js"></script>
<script src="/assets/js/myanswer.js"></script>
<script>
  $(function(){ ga('send', 'pageview'); });
</script>
</body>
</html>
