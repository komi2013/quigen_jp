<?php
$rand = rand(1,10);

if( Model_Util::is_mobile() != 1){

  if($rand < 11) { // all adsense?>
    <iframe src="/htm/ad_right/?af=adsense_pc_right" width="160" height="600" frameborder="0" scrolling="no" class="ad_frame_right"></iframe>
    <script> ga('set', 'dimension16', "adsense_pc_right"); </script>
  <?php } else if($rand < 11) { ?>
    <iframe src="/htm/ad_right/?af=kauli_pc_right" width="160" height="600" frameborder="0" scrolling="no" class="ad_frame_right" ></iframe>
    <script> ga('set', 'dimension16', "kauli_pc_right"); </script>
  <?php } else if($rand < 11) { // no imobile ?>
    <iframe src="/htm/ad_right/?af=imobile_pc_right" width="160" height="600" frameborder="0" scrolling="no" class="ad_frame_right"></iframe>
    <script> ga('set', 'dimension16', "imobile_pc_right"); </script>
  <?php } ?>

<?php } ?>
