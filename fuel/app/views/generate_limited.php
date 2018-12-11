<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>お待ちください</title>
    <link rel="shortcut icon" href="/assets/img/icon/quiz_generator.png" />
    <script src="/third/jquery-2.1.1.min.js"></script>
    <script src="/third/jquery.cookie.js"></script>
    <script>var ua = '<?=Config::get("my.ua")?>';</script>
    <script src="/assets/js/analytics.js?ver=96"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/basic.css?ver=96" />
    <link rel="stylesheet" href="/assets/css/pc.css?ver=96" media="only screen and (min-width : 711px)">
    <link rel="stylesheet" href="/assets/css/sp.css?ver=96" media="only screen and (max-width : 710px)">
    <meta name="viewport" content="width=device-width, user-scalable=no" >
  </head>
<body>

<?php
  $side = View::forge('side');
  $side->this_page = '';
  echo $side;
?>
<div id="content">
<table>
  <tr><td class="td_99"><a href="/htm/mypaid/">&nbsp;&nbsp;下記の時間以降作成できます</a></td></tr>
  <tr><td class="td_99"><a href="/payment1/">&nbsp;&nbsp;<?=$available?></a></td></tr>
</table>
<div id="ad"><iframe src="/htm/ad_blank/" width="320" height="50" frameborder="0" scrolling="no"></iframe></div>
</div>
<script src="/assets/js/check_news.js?ver=96"></script>
<script src="/assets/js/basic.js?ver=96"></script>
<script>
  $(function(){ ga('send', 'pageview', location.href+'&limited'); });
</script>
</body>
</html>

