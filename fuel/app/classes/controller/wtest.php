<?php
class Controller_Wtest extends Controller
{
  public function action_index()
  {
    
    
    
        $util = new Model_Util();
        $util->eto(920);
        $u_name = $util->eto_txt;
        $u_img = $util->eto_img;
        $css   = $util->eto_css;
    var_dump($util); die();
      @mkdir(DOCROOT.'assets/img/quiz/'.date('Ymd'), 0777);
      @chmod(DOCROOT.'assets/img/quiz/'.date('Ymd'), 0777);
      $img_path = DOCROOT.'assets/img/quiz/'.date('Ymd').'/test1.png';
      $web_path = '/assets/img/quiz/'.date('Ymd').'/test1.png';
      $canvas = $_POST["image"];
      $canvas = preg_replace("/data:[^,]+,/i","",$canvas);
      $canvas = base64_decode($canvas);
      //json_encode(var_dump($_POST));
      //json_encode(var_dump($_FILES));
      Model_Log::warn(json_encode(var_dump($_POST)));
      Model_Log::warn(json_encode(var_dump($_FILES)));
      //Model_Log::warn($canvas);
      //$image = imagecreatefromstring($canvas);
      //imagesavealpha($image, TRUE);
      //imagepng($image ,$img_path);

  }
}
