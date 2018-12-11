<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>クイズ編集</title>
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
<script src="/third/img-touch-canvas_1.js?ver=96"></script>
<?php
  $side = View::forge('side');
  $side->this_page = '';
  echo $side;
?>
<div id="content">

<table style="text-align:center;">
<tr><td><textarea maxlength="2000" class="txt_long" id="q_txt"><?=$q_txt?></textarea></td></tr>
</table>
<table id="from_text" style="text-align:center;">
<tr><td><input type="text" value="<?=$arr_choice[0]?>" maxlength="1000" class="txt_99" id="choice_0"></td></tr>
<tr><td><input type="text" value="<?=$arr_choice[1]?>" maxlength="1000" class="txt_99" id="choice_1"></td></tr>
<tr><td><input type="text" value="<?=$arr_choice[2]?>" maxlength="1000" class="txt_99" id="choice_2"></td></tr>
<tr><td><input type="text" value="<?=$arr_choice[3]?>" maxlength="1000" class="txt_99" id="choice_3"></td></tr>
</table>
<div class="div_right">
  <img src="/assets/img/icon/upload_0.png" alt="generate" class="icon" id="generate">
  <img src="/assets/img/icon/success.png" alt="success" class="icon" id="success" style="display:none;">
</div>
<table>
  <tr><td class="td_99_c">オプション</td></tr>  
</table>
<table>
  <tr><td class="tag">#<input type="text" value="" maxlength="12" class="txt_84" id="tag_0"></td></tr>
</table>
<div style="display:none;">
<input type="text" placeholder="" maxlength="12" class="tag_in" id="tag_1">
<input type="text" placeholder="" maxlength="12" class="tag_in" id="tag_2">
</div>    

<table>
  <tr><td class="td_99"><input type="text" value="<?=$reference?>" placeholder="画像の参照" maxlength="1000" class="txt_99" id="reference"></td></tr>
</table>

<table>
  <tr>
  <td id="rotate" style="width:50px;cursor:pointer;"><img src="/assets/img/icon/rotate.png" class="icon" alt="rotate"></td>
  <td id="minus" style="width:50px;cursor:pointer;"><img src="/assets/img/icon/minus.png" class="icon" alt="minus"></td>
  <td style="width:50px;cursor:pointer;">
    <select name='scale' style="font-size:20px;">
        <option>1</option>
        <option>5</option>
        <option>10</option>
        <option>20</option>
        <option>40</option>
    </select>
  </td>
  <td id="plus" style="width:50px;cursor:pointer;"><img src="/assets/img/icon/plus.png" class="icon" alt="plus"></td>
  </tr>
</table>

<div id="canvas_div_img" style="text-align:center;">
<input type="file" id="imageLoader" name="imageLoader">
<canvas id="mycanvas" height="300" width="300"></canvas>
</div>

<div id="ad"><iframe src="/htm/ad_blank/" width="320" height="50" frameborder="0" scrolling="no"></iframe></div>

</div>
<script>
  var u_id = '<?=$u_id?>';
  var q_id = '<?=$question?>';
  var open_time = '<?=$open_time?>';
  var already_img = '<?=$img ?: '/assets/img/icon/camera.png' ?>';
  var csrf = '<?=Model_Csrf::setcsrf()?>';
</script>
<script src="/assets/js/check_news.js?ver=96"></script>
<script src="/assets/js/basic.js?ver=96"></script>
<script src="/assets/js/quiz_edit.js?ver=96"></script>
<script>
  $(function(){ ga('send', 'pageview'); });
</script>
</body>
</html>

