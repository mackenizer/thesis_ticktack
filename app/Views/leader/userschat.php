
<div class="container-fluid">
<?php $uri = service('uri'); 


?>
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="/assets/images/nancy.jpg" data-holder-rendered="true" id="img">
    <ul class="nav flex-column nav-pills">
      
      <li class="nav-item">
      
      <a class="nav-link" aria-current="page" href="<?=base_url()?>/leader"><i class="fas fa-home"></i> Dashboard</a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/addmodule"><i class="fas fa-tasks"></i> Add Module</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/moduleview"><i class="fas fa-user-friends"></i> View Team</a>
      </li>
       <li class="nav-item">
        <a class="nav-link active" href="<?=base_url()?>/chat"><i class="far fa-user-md-chat"></i> Chat</a>
      </li>
      
    </ul>
  </div>
  <!-- Top bar -->
  <div class="topbar">
    <ul class="nav justify-content-end">
     
      <li class="nav-item">
        <a class="nav-link" href="#">
        <span style="font-size: 1em; color: Black;">
            <i class="fas fa-bell"></i>
        </span>
        </a>
      </li>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo session()->get('firstname').' '. session()->get('lastname') ?></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
    </ul>
  </div>
  <!-- Main body -->
  <div class="main">
 
    <div class="wrapper mt-4">
    <section class="chat-area">
      <header>
          <a href="<?=base_url()?>/chat" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="/assets/images/nancy.jpg" alt="">
          <?php if(!$chatuser == null) :?>
          
          
          <div class="details">
            <span><?= $chatuser['fullname']?></span>
            <p><?= $chatuser['status']?></p>
          </div>
          <?php endif; ?>
      </header>
      <div class="chat-box">
          <div class="chat outgoing">
              <div class="details">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
          </div>
           <div class="chat incoming">
               <img src="/assets/images/nancy.jpg" alt="">
              <div class="details">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
          </div>
          
      </div>
      
      <form method="post" action="<?= base_url()?>/userschat/<?= $uri->getSegment(2) ?>" class="typing-area" autocomplete="off">
         <input type="text" name="outgoing_msg_id" value="<?= $chatuser['studentID'] ?>" hidden>
          <input type="text" name="incoming_msg_id" value="<?php echo session()->get('studentID') ?>" hidden>
          <input type="text" name="msg" class="input-field" id="" placeholder="Send a message...">
          <button type="submit"><i class="fab fa-telegram-plane"></i></button>
      </form>
    
    </section>
    </div>
 
  </div>
</div>

 


  

 