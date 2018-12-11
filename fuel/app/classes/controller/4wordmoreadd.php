<?php
class Controller_4wordmoreadd extends Controller
{
  public function action_index()
  {
    $res[0] = 2;
    $usr_id = Model_Cookie::get_usr();
    $auth = false;
    foreach (Config::get('my.adm') as $d)
    {
      if ($d == $usr_id)
      {
        $auth = true;
      }
    }
    if (!$auth AND $_SERVER['REMOTE_ADDR'] != '133.242.146.131')
    {
      die(json_encode($res));
    }
    $arr = DB::query("    select category_parent_id,category_id from w_col_05_01 where leaf_category = '0' and category_parent_id in 
    (
      select category_id from w_col_04_02
    )
")->execute()->as_array();
    $i = 0;
    foreach ($arr as $k => $d) {
      $arr_1 = DB::query("select category_id from w_col_05_01 where leaf_category = '1' and category_parent_id = '".$d['category_id']."'")->execute()->as_array();
      foreach ($arr_1 as $dd) {
        $arr_2 = DB::query("select category_id from w_col_05_01 where leaf_category = '1' and category_parent_id = '".$dd['category_id']."'")->execute()->as_array();
        foreach ($arr_2 as $ddd) {
          $arr_3 = DB::query("select category_id from w_col_05_01 where leaf_category = '1' and category_parent_id = '".$ddd['category_id']."'")->execute()->as_array();
          foreach ($arr_3 as $dddd) {
            DB::query("INSERT INTO w_col_05_03 (col1,col6) VALUES ('".$d['category_parent_id']."','".$dddd['category_id']."')")->execute();  
            ++$i;
          }
        }
      }
      
      
      
      
       
    }
    
    
    
    die($i);
    $ii = 1;
    $wh_time = 1446319900; //change
    
    foreach ($arr_word as $d) {
      //change
      $arr_word_q[] = $d['answer'].'　に該当する薬は？';
      $arr_word_a[] = $d['quiz'];

      if ( ($ii % 4) == 0 ) {
        $i = 0;

        while ($i < 4) {
          $wh_time += 60; //sometimes change
          $question = new Model_Question();
          $question_id = $question->get_new_id();
          $question->id = $question_id;
          $question->txt = $arr_word_q[$i];
          $question->usr_id = 33; //sometimes change
          $question->img = '';
          $question->create_at = date("Y-m-d H:i:s");
          $question->open_time = date("Y-m-d H:i:s", $wh_time);
          $question->save();
          $arr_a = $arr_word_a;
          unset($arr_a[$i]);
          $arr_incorrect = array_merge($arr_a); 
          $choice = new Model_Choice();
          $choice->choice_0 = $arr_word_a[$i];
          $choice->choice_1 = $arr_incorrect[0];
          $choice->choice_2 = $arr_incorrect[1];
          $choice->choice_3 = $arr_incorrect[2];
          $choice->question_id = $question_id;
          $choice->save();

          $answer_by_q = new Model_AnswerByQ();
          $answer_by_q->correct = 0;
          $answer_by_q->question_id = $question_id;
          $answer_by_q->amount = 0;
          $answer_by_q->create_at = date("Y-m-d H:i:s");
          $answer_by_q->update_at = date("Y-m-d H:i:s");
          $answer_by_q->save();

          $i++;
          DB::query("INSERT INTO tag (question_id,txt,open_time) VALUES (".$question_id.",'調剤薬局','".date("Y-m-d H:i:s", $wh_time)."')")->execute(); //change
        }
        $arr_word_q = [];
        $arr_word_a = [];
      }
      ++$ii;
    }
    
    
    
    $res[0] = 1;

    die(json_encode($res));
  }
}
