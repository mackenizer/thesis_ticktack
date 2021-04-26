

<div class="container-fluid">
   
<!--     
      <button onclick="muteVideo()">Mute Video</button>
      <button onclick="muteAudio()">Mute Audio</button> -->
   
  </div>
  <div id="video-call-div">
    <video src="" id="local-video" autoplay></video>
    <video src="" id="remote-video" autoplay></video>
    <div class="d-grid gap-2 col-6 mx-auto">
    <input type="text" id="username-input" class="form-control" placeholder="Enter your username">
    <button  onclick="sendEmail()">Send</button>
    <button  onclick="joinCall()">Join Call</button>
     
    </div>
  </div>
  


  <script src="<?=base_url()?>/assets/js/sender.js"></script>





<style>
  #video-call-div{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: block; 
    
  }

  #local-video{
    position: absolute;
    top: 0;
    left: 0;
    margin: 16px;
    border-radius: 15px;
    max-width: 20%;
    max-height: 20%;
    background: #ffffff;
   
  
  }
  #remote-video{
   
    width: 100%;
    height: 100%;
    background: #000000;
    

  }
  .call-action-div{
    position: absolute;
    left: 45%;
    bottom: 32px;
  }

</style>