<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>production unexpected error</title>
    <link rel="shortcut icon" href="/assets/img/icon/quiz_generator.png">
    <script src="/third/jquery-2.1.1.min.js"></script>
    <script src="/third/jquery.cookie.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/basic.css?ver=96" />
    <link rel="stylesheet" href="/assets/css/pc.css?ver=96" media="only screen and (min-width : 711px)">
    <link rel="stylesheet" href="/assets/css/sp.css?ver=96" media="only screen and (max-width : 710px)">
    <meta name="viewport" content="width=device-width, user-scalable=no" >
    <script>var ua = '<?=Config::get("my.ua")?>';</script>
    <script src="/assets/js/analytics.js?ver=96"></script>
  </head>
<body>
<?php
  $side = View::forge('side');
  $side->this_page = '';
  echo $side;
?>
<div id="content">
  <h1>production unexpected error</h1>
<?php if(Config::get("my.display_error")){ ?>
  <?= isset($contents) ? $contents : 'no contents'; ?>
<?php } ?>
</div>
<?php Model_Log::warn('production unexpected error');?>
<script src="/assets/js/basic.js?ver=96"></script>
<script>
  ga('send', 'pageview', location.pathname + location.search + location.hash +':production');
</script>
</body>
</html>