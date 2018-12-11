<?php
class Controller_TwCallback extends Controller
{
  public function action_index()
  {
    require APPPATH.'vendor/tw/twitteroauth/twitteroauth.php';
    $consumer_key = Config::get('my.tw_key');
    $consumer_secret = Config::get('my.tw_secret');
    
    $verifier = $_GET['oauth_verifier'];
    
    $to = new TwitterOAuth($consumer_key,$consumer_secret,Cookie::get('request_token'),Cookie::get('request_token_secret'));
    $access_token = $to->getAccessToken($verifier);
    $to->host = 'https://api.twitter.com/1.1/'; // By default library uses API version 1.  
    $profile = $to->get('/users/show.json?screen_name='.$access_token['screen_name'].'&user_id='.$access_token['user_id']);
    $id = $access_token['user_id'];
    $arr_pv_usr = DB::query("SELECT * FROM usr WHERE pv_u_id = '".$id."' AND provider = 2 ")->execute()->as_array();
    $follow = [];
    $myname = '';
    $myphoto = '';
    $point = '';
    $js_answer = [];
    $js_answer_by_u = [];
    $introduce = '';
    if ( isset($arr_pv_usr[0]['id']) ) {
      if ( isset($usr_id) AND $usr_id != $arr_pv_usr[0]['id']) {
        Response::redirect('/myprofile/?warn=logout');
      }
      $usr_id  = $arr_pv_usr[0]['id'];
      $point   = $arr_pv_usr[0]['point'];
      $myname  = $arr_pv_usr[0]['name'];
      $myphoto = $arr_pv_usr[0]['img'];
      $introduce = $arr_pv_usr[0]['introduce'];
    } else {
      $usr = new Model_Usr();
      $usr_id = isset($usr_id) ? $usr_id : $usr->get_new_id();
      $usr->id = $usr_id;
      $usr->pv_u_id = $id;
      $usr->provider = 2;
      $usr->name = $myname = $access_token['screen_name'];
      $usr->img = $myphoto = $profile->profile_image_url_https;
      $usr->update_at = date("Y-m-d H:i:s");
      $usr->save();
      $point = 0;
    }
    $arr_answer = DB::query("SELECT * FROM answer_key_u WHERE usr_id = ".$usr_id." ORDER BY create_at desc")->execute()->as_array();
    $correct = 0; $total = 0;
    foreach ($arr_answer as $k => $d) {
      $correct = $correct*1 + $d['result']*1;
      ++$total;
    }
    $js_answer_by_u = json_encode([$correct,$total]);
    $arr_offline_q = [];
    foreach ($arr_answer as $k => $d) {
     if ($k < 200) {
        $arr_offline_q[] = [
            $d['q_txt']
            ,$d['choice_0']
            ,$d['choice_1']
            ,$d['choice_2']
            ,$d['choice_3']
            ,$d['correct_choice']
            ,$d['q_img']
            ,(string)$d['question_id']
            ,$d['comment']
            ,$d['myanswer']
            ,$d['quiz_num']
          ];
      }
    }
    $js_offline_q = json_encode($arr_offline_q);
    $arr_follow = DB::query("select receiver from follow where sender = ".$usr_id)->execute()->as_array();
    $arr = array();
    foreach ($arr_follow as $d) {
      $arr[] = $d['receiver'];
    }
    Model_Cookie::set_usr($usr_id);
    
    $view = View::forge('oauth');

    $view->follow = json_encode($arr);
    $view->myname = Security::htmlentities($myname);
    $view->myphoto = Security::htmlentities($myphoto);
    $view->point = $point;
    $view->js_answer = $js_answer;
    $view->js_offline_q = $js_offline_q;
    $view->arr_offline_q = $arr_offline_q;
    $view->js_answer_by_u = $js_answer_by_u;
    $view->introduce = urlencode($introduce);

    $view->u_id = $usr_id;
    die($view);
  }
}
