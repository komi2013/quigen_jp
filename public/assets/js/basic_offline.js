var drawerIsOpen = false;
$('#menu').click(function(){
  if(drawerIsOpen){
    $('#drawer').css({'left':'-100%'});
    drawerIsOpen = false;
  }else{
    $('#drawer').css({'left': '-1px','top':$(window).scrollTop()+51+'px'});
    drawerIsOpen = true;
    if(navigator.onLine){
      $('#ad_menu').empty().append(ad_menu_iframe);
    }else{
      $('#ad_menu').empty();
    }
  }
});
var hour_stamp = Math.floor(new Date().getTime() /1000 /60 /60);
//393009 = 2014-11-01 18:00:00
if(localStorage.last_visit){
  if( (hour_stamp - localStorage.last_visit) > 3 ){
    localStorage.session = localStorage.session*1 + 1;
    if(localStorage.session > 9 && localStorage.session < 100){
      var session_amt= localStorage.session / 10;
      session_amt = Math.floor(session_amt) * 10;
    }else if(localStorage.session > 100){
      var session_amt = 100;
    }else{
      var session_amt = localStorage.session;
    }
    if(navigator.onLine){
      ga('set', 'dimension18', session_amt);
    }
    localStorage.last_visit = hour_stamp;
    localStorage.session_answer = 0;
  }
}else{
  localStorage.last_visit = hour_stamp;
  localStorage.session = 1;
  localStorage.session_answer = 0;
  if(navigator.onLine){
    ga('set', 'dimension18', localStorage.session);
  }
}
var nowPosition = 0;
$(window).scroll(function(){
  var scrTop = $(document).scrollTop(); // px
  if (window.matchMedia('(min-width: 711px)').matches) {
    if(scrTop > 1000){
      $('#drawer').css({'position':'fixed','margin-top':'-49px'});
    }else{
      $('#drawer').css({'position':'absolute','margin-top':'-1px'});
    }
  }else{
    diffPosition = nowPosition - $(window).scrollTop();
    nowPosition = $(window).scrollTop();
    if(scrTop < 4000){
      $('#drawer').css({'position':'absolute','top':'51px'});
    }else if(diffPosition > 0){
      $('#drawer').css({'top':$(window).scrollTop()+51+'px'});
    }
    if(diffPosition < 0 || nowPosition < 4000){ //down scroll
      $('#header').css({'position':'static'});
    }else{ //up scroll
      $('#header').css({'position':'fixed','z-index':'10'});
    }
  }
});

if(localStorage.quest_level > 2){
  $('.disp_quest').css({ 'display': ''});
}else{
  $('.disp_quest').css({ 'display': 'none'});
}

var rand_ad = parseInt(Math.random()*10);
var ad_ga = 'none';
var ad_right_ga = 'none';
if(window.matchMedia('(min-width: 711px)').matches){
  if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=adsense_pc_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'adsense_pc_menu';
  }else if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=kauli_pc_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'kauli_pc_menu';
  }else if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=imobile_pc_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'imobile_pc_menu';
  }

  if(rand_ad < 11){
    var ad_right_iframe = '<iframe src="/htm/ad_right/?af=adsense_pc_right" width="160" height="600" frameborder="0" scrolling="no" class="ad_frame_right"></iframe>';
    var ad_right_ga = 'adsense_pc_right';
  }else if(rand_ad < 11){
    var ad_right_iframe = '<iframe src="/htm/ad_right/?af=kauli_pc_right" width="160" height="600" frameborder="0" scrolling="no" class="ad_frame_right"></iframe>';
    var ad_right_ga = 'kauli_pc_right';
  }else if(rand_ad < 11){
    var ad_right_iframe = '<iframe src="/htm/ad_right/?af=imobile_pc_right" width="160" height="600" frameborder="0" scrolling="no" class="ad_frame_right"></iframe>';
    var ad_right_ga = 'imobile_pc_right';
  }

}else{
  if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=adsense_sp_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'adsense_sp_menu';
  }else if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=nend_sp_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'nend_sp_menu';
  }else if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=kauli_sp_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'kauli_sp_menu';
  }else if(rand_ad < 11){
    var ad_menu_iframe = '<iframe src="/htm/ad_menu/?af=imobile_sp_menu" width="300" height="250" frameborder="0" scrolling="no" class="ad_frame"></iframe>';
    var ad_menu_ga = 'imobile_sp_menu';
  }
  
  if(rand_ad < 11){
    var ad_iframe = '<iframe src="/htm/ad/?af=adsense_sp" width="320" height="50" frameborder="0" scrolling="no" data-af="adsense_sp" class="ad_frame"></iframe>';
    var ad_ga = 'adsense_sp';
  }else if(rand_ad < 11){
    var ad_iframe = '<iframe src="/htm/ad/?af=nend_sp" width="320" height="50" frameborder="0" scrolling="no" data-af="adsense_sp" class="ad_frame"></iframe>';
    var ad_ga = 'nend_sp';
  }

}
if(navigator.onLine){
  ga('set', 'dimension16', ad_ga+','+ad_menu_ga+','+ad_right_ga);

  setTimeout(function(){
    if(window.matchMedia('(min-width: 711px)').matches){
      setTimeout(function(){
        $('#ad_menu').empty().append(ad_menu_iframe);
      },6000);
      $('#ad_right').empty().append(ad_right_iframe);
    }else{
      $('#ad').empty().append(ad_iframe);
    }
  },3000);
}else{
  $('#ad_menu').empty();
  $('#ad').empty();
}
if(window.matchMedia('(min-width: 711px)').matches){
  $('#ad').empty();
}