<?php
class Model_Time extends \Model
{
  public static function s2h($seconds)
  {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);
    $seconds = $seconds % 60;
    
    $hours = $hours ? $hours.'時間' : '';
    $minutes = $minutes ? $minutes.'分' : '';
    $seconds = $seconds ? $seconds.'秒' : '';
    $hms = $hours.$minutes.$seconds;
    //$hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    return $hms;
  }
  public static $weekjp = array(
    '日', //0
    '月', //1
    '火', //2
    '水', //3
    '木', //4
    '金', //5
    '土'  //6
  );
}