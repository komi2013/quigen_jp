<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>フォロワー</title>
    <meta name="robots" content="noindex">
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
  <img src="<?=$usr_img?>" id="u_img" class="icon" <?=$css?> >
  <img src="/assets/img/icon/cross_big.png" id="delete" class="icon" style="display:none;">
  <img src="/assets/img/icon/success_0.png" id="confirm" class="icon" style="display:none;">
  <img src="/assets/img/icon/success.png" id="success" class="icon" style="display:none;">
<div id="ad"><iframe src="/htm/ad_blank/" width="320" height="50" frameborder="0" scrolling="no"></iframe></div>
<table id="cel"></table>
</div>

<script>
  var receiver = '<?=$receiver?>';
  var csrf = '<?=Model_Csrf::setcsrf()?>';
</script>
<script src="/assets/js/check_news.js?ver=96"></script>
<script src="/assets/js/basic.js?ver=96"></script>
<?php if($usr_id == $receiver){ ?>
<script src="/assets/js/follower_my.js?ver=96"></script>
<?php }else{ ?>
<script src="/assets/js/follower.js?ver=96"></script>
<?php } ?>

<script>
  $(function(){ ga('send', 'pageview'); });
</script>

</body>
</html>
