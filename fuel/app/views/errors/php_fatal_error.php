<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>fatal error</title>
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
  <h1>fatal error</h1>
<?php if(Config::get("my.display_error")){ ?>
		<p class="intro"><?php echo $type; ?> [ <?php echo $severity; ?> ]:<br /><?php echo e($message); ?></p>

		<h2 class="first"><?php echo $filepath; ?> @ line <?php echo $error_line; ?></h2>

<?php if (is_array($debug_lines)): ?>
<pre class="fuel_debug_source"><?php foreach ($debug_lines as $line_num => $line_content): ?>
<span<?php echo ($line_num == $error_line) ? ' class="fuel_line fuel_current_line"' : ' class="fuel_line"'; ?>><span class="fuel_line_number"><?php echo str_pad($line_num, (strlen(count($debug_lines))), ' ', STR_PAD_LEFT); ?></span><span class="fuel_line_content"><?php echo $line_content . PHP_EOL; ?>
</span></span><?php endforeach; ?></pre>
<?php endif; ?>
<?php }?>
</div>
<?php Model_Log::warn('fatal error');?>
<script src="/assets/js/basic.js?ver=96"></script>
<script>
  ga('send', 'pageview', location.pathname + location.search + location.hash +':fatal_error');
</script>
</body>
</html>