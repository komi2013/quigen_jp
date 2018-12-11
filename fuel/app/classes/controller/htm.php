<?php
class Controller_Htm extends Controller
{
  public function action_index()
  {
    $expires = 3600 * 24;
    header('Last-Modified: Fri Jan 01 2010 00:00:00 GMT');
    header('Expires: ' . gmdate('D, d M Y H:i:s T', time() + $expires));
    header('Cache-Control: private, max-age=' . $expires);
    header('Pragma: ');
    if ( !isset($_GET['p']) ) {
      die( View::forge('404') );
    }
    if ( !file_exists(APPPATH.'views/htm_'.$_GET['p'].'.php') ) {
      die( View::forge('404') );
    }
    $view = View::forge('htm_'.$_GET['p']);
    $view->u_id = Model_Cookie::get_usr();
    die($view);
  }
  public function action_all()
  {
    $expires = 3600 * 24;
    header('Last-Modified: Fri Jan 01 2010 00:00:00 GMT');
    header('Expires: ' . gmdate('D, d M Y H:i:s T', time() + $expires));
    header('Cache-Control: private, max-age=' . $expires);
    header('Pragma: ');
    $file = $this->param('one');
    if ( !file_exists(APPPATH.'views/htm/'.$file.'.php') ) {
      die( View::forge('404') );
    }
    $view = View::forge('htm/'.$file);
    $view->u_id = Model_Cookie::get_usr();
    $arr = DB::query("SELECT id,txt FROM comment ")->execute()->as_array();
    $arr2 = [];
    foreach ($arr as $k => $d) {
      $arr2[$k]['id'] = $d['id'];
      $arr2[$k]['txt'] = Security::htmlentities($d['txt']);
    }
    $view->js_arr = json_encode($arr2);
    //var_dump($arr2);
    //die();
    $view->arr = $arr2;
    die($view);
  }

}
