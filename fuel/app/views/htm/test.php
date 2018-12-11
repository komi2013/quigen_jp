<?php
    $expires = 0;
    header('Last-Modified: Fri Jan 01 2010 00:00:00 GMT');
    header('Expires: ' . gmdate('D, d M Y H:i:s T', time() + $expires));
    header('Cache-Control: private, max-age=' . $expires);
    header('Pragma: ');
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>PeerJS - Video chat example</title>
    <link rel="shortcut icon" href="/assets/img/icon/quiz_generator.png" />
    <meta name="robots" content="noindex">
    <script src="/third/jquery-2.1.1.min.js"></script>
    <script src="/third/jquery.cookie.js"></script>
    <script src="https://skyway.io/dist/0.3/peer.js"></script>
    <script>var ua = '<?=Config::get("my.ua")?>';</script>
    <script src="/assets/js/analytics.js?ver=84"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/basic.css?ver=84" />
    <link rel="stylesheet" href="/assets/css/sp.css?ver=84" media="only screen and (max-width : 710px)">
    <meta name="viewport" content="width=device-width, user-scalable=no" >
<script>

    // Compatibility shim
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

    // PeerJS object
    var peer = new Peer({ key: 'e9f641fd-6546-4482-8e6e-4bad28469c0e', debug: 3});

    peer.on('open', function(){
      $('#my-id').text(peer.id);
    });

    // Receiving a call
    peer.on('call', function(call){
      // Answer the call automatically (instead of prompting user) for demo purposes
      call.answer(window.localStream);
      step3(call);
    });
    peer.on('error', function(err){
      alert(err.message);
      // Return to step 2 if error occurs
      step2();
    });

    // Click handlers setup
    $(function(){
      $('#make-call').click(function(){
        // Initiate a call!
        var call = peer.call($('#callto-id').val(), window.localStream);

        step3(call);
      });

      $('#end-call').click(function(){
        window.existingCall.close();
        step2();
      });

      // Retry if getUserMedia fails
      $('#step1-retry').click(function(){
        $('#step1-error').hide();
        step1();
      });

      // Get things started
      step1();
    });

    function step1 () {
      // Get audio/video stream
      navigator.getUserMedia({audio: true, video: true}, function(stream){
        // Set your video displays
        $('#my-video').prop('src', URL.createObjectURL(stream));

        window.localStream = stream;
        step2();
      }, function(){ $('#step1-error').show(); });
    }

    function step2 () {
      $('#step1, #step3').hide();
      $('#step2').show();
    }

    function step3 (call) {
      // Hang up on an existing call if present
      if (window.existingCall) {
        window.existingCall.close();
      }

      // Wait for stream on the call, then set peer video display
      call.on('stream', function(stream){
        $('#their-video').prop('src', URL.createObjectURL(stream));
      });

      // UI stuff
      window.existingCall = call;
      $('#their-id').text(call.peer);
      call.on('close', step2);
      $('#step1, #step2').hide();
      $('#step3').show();
    }

  </script>

  </head>
<body>
<style>
.quest_do{
  background-color: #CBFFD3;
}
.space {
  padding: 10px;
}
</style>


<div class="start_record space">start_record</div>
<div class="stop_record space">stop_record</div>
<div class="start_videochat space">start_videochat</div>
<div class="upload_voice space">upload_voice</div>

<div class="pure-g">

      <!-- Video area -->
      <div class="pure-u-2-3" id="video-container">
        <video id="their-video" autoplay></video>
        <video id="my-video" muted="true" autoplay></video>
      </div>

      <!-- Steps -->
      <div class="pure-u-1-3">
        <h2>PeerJS Video Chat</h2>

        <!-- Get local audio/video stream -->
        <div id="step1">
          <p>Please click `allow` on the top of the screen so we can access your webcam and microphone for calls.</p>
          <div id="step1-error">
            <p>Failed to access the webcam and microphone. Make sure to run this demo on an http server and click allow when asked for permission by the browser.</p>
            <a href="#" class="pure-button pure-button-error" id="step1-retry">Try again</a>
          </div>
        </div>

        <!-- Make calls to others -->
        <div id="step2">
          <p>Your id: <span id="my-id">...</span></p>
          <p>Share this id with others so they can call you.</p>
          <h3>Make a call</h3>
          <div class="pure-form">
            <input type="text" placeholder="Call user id..." id="callto-id">
            <a href="#" class="pure-button pure-button-success" id="make-call">Call</a>
          </div>
        </div>

        <!-- Call in progress -->
        <div id="step3">
          <p>Currently in call with <span id="their-id">...</span></p>
          <p><a href="#" class="pure-button pure-button-error" id="end-call">End call</a></p>
        </div>
      </div>
  </div>

<script>

  $(".start_record").click(function(i){
    location.href = "app-callfunc://start_record";
  });
  $(".stop_record").click(function(i){
    location.href = "app-callfunc://stop_record";
  });
  $(".start_videochat").click(function(i){
    location.href = "app-callfunc://start_videochat";
  });
  $(".upload_voice").click(function(i){
    location.href = "app-callfunc://upload_voice";
  });
</script>
<script src="/assets/js/basic.js?ver=84"></script>
<script src="/assets/js/check_news.js?ver=84"></script>
<script src="/assets/js/quest.js?ver=84"></script>
<script> 
  $(function(){ ga('send', 'pageview'); });
</script>
</body>
</html>