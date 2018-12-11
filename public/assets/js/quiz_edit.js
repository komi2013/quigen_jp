tag_show();
function tag_show(){
  var param = {
    q : q_id
  };
  $.get('/tagshow/',param,function(){},"json")
  .always(function(res){
    if(res[0]==1){
      for(i = 0; i < res[1].length; i++){
        $('#tag_0').val(res[1][i]['txt']+' ');
        ga('set','dimension13',res[1][i]);
      }
    }else{
     //console.log(res);
    }
  });
}


$('#generate').click(function(){
  if(!u_id){
    alert('はじめにクイズに答えてください');
    return;
  }
  var validate = 1;
  if($('#q_txt').val()==''){
    $('#q_txt').css({'border-color':'red'});
    validate=2;
  }
  for(i = 0; i < 4; i++){
    if($('#choice_'+i).val()==''){
      $('#choice_'+i).css({'border-color':'red'});
      validate=2;
    }
  }
  if(validate==2){
    return;
  }
  $('#generate').css({'display': 'none'});  
  $('#success').css({'display': ''});
  var mycanvas = document.getElementById('mycanvas');
  
  if(change_pic == 1 || already_img != '/assets/img/icon/camera.png'){
    var imgdata = mycanvas.toDataURL();
  }else{
    var imgdata = 'no';
  }
  if(localStorage.myphoto){
    var myphoto = localStorage.myphoto;
  }else{
    var myphoto = '';
  }
  var param = {
    csrf : csrf
    ,q_txt : $('#q_txt').val()
    ,choice_0 : $('#choice_0').val()
    ,choice_1 : $('#choice_1').val()
    ,choice_2 : $('#choice_2').val()
    ,choice_3 : $('#choice_3').val()
    ,img : imgdata
    ,tag_0 : $('#tag_0').val()
    ,tag_1 : $('#tag_1').val()
    ,tag_2 : $('#tag_2').val()
    ,myphoto : myphoto
    ,reference : $('#reference').val()
    ,q_id : q_id
    ,open_time : open_time
  };
  $.post('/quizeditupd/',param,function(){},"json")
  .always(function(res){
    if(res[0]==1){
      location.href = '/quiz/?q='+q_id;
    }else{
      $('#success').css({'display': 'none'});
      $('#generate').css({'display': ''});  
      alert('connection error');
    }
  });
  var hour_stamp = Math.floor(new Date().getTime() /1000 /60 /60); 
  var notify = JSON.parse(localStorage.notify);
  notify[1] = hour_stamp;
  localStorage.notify = JSON.stringify(notify);
  ga('set', 'dimension3','gene_'+localStorage.genestep);
  ga('send','event','generate','upload',localStorage.ua_u_id,localStorage.genestep);
});

//.begin. canvas edit
function handleImage(e){
  $('#imageLoader').css({
    'display': 'none'
  });
  var reader = new FileReader();
  reader.onload = function(event){
    var img = new Image();
    img.src = event.target.result;
    var gesturableImg = new ImgTouchCanvas({
        canvas: document.getElementById('mycanvas')
        ,path: img.src
        ,desktop: true
    });
    change_pic = 1;
  }
  reader.readAsDataURL(e.target.files[0]);     
}

var resImg = document.getElementById('mycanvas');
var gesturableImg = new ImgTouchCanvas({
    canvas: resImg,
    path: already_img
});

var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);
var change_pic = 0;
//.end. canvas edit

$('#rotate').click(function(){
  var canvas = document.getElementById('mycanvas');
  var ctx = canvas.getContext('2d');
  var image = new Image();
  image.src = canvas.toDataURL();
  var rad = Math.atan2(1, 0);
  ctx.save();
  var image_width  = 300;
  var image_height = 300;
  ctx.translate(150, 150);
  ctx.rotate(rad);
  ctx.translate(-150, -150);
  ctx.drawImage(image,0,0);
  if(change_pic == 1){
    gesturableImg.rotate = gesturableImg.rotate + 1;
  }
});
localStorage.scale = 10;
$('[name=scale]').change(function(){
  localStorage.scale = $('[name=scale] option:selected').text();
});
