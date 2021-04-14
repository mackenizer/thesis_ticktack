
<div class="container-fluid">
<?php $uri = service('uri'); 


?>
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="<?=base_url()?>/uploads/addPic/<?=session()->get('pic')?>" data-holder-rendered="true" id="img">
    <ul class="nav flex-column nav-pills">
      
      <li class="nav-item">
      
      <a class="nav-link " aria-current="page" href="<?=base_url()?>/adviser"><i class="fas fa-home"></i> Dashboard</a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/addteam"><i class="fas fa-tasks"></i> Add Project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="<?=base_url()?>/chatt"><i class="far fa-user-md-chat"></i> Chat</a>
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
            <li><a class="dropdown-item" href="#profile" data-bs-toggle="modal">Profile</a></li>
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
    </ul>
  </div>
   <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
        </div>
          <form class="p-5 pt-0" method="post" action="<?=base_url()?>/adviser" enctype="multipart/form-data">
            <div class="mb-3">
              <div class="row">
              <div class="mb-3">
                <label for="formFile" class="form-label"></label>
                <input class="form-control" type="file" id="formFile" name="addPic">
              </div>
                <!-- <div class="col">
                  <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                </div> -->
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
    </div>
    </div>
  <!-- Main body -->
  <div class="main">
 
    <div class="wrapper mt-4">
    <section class="chat-area">
      <header>
      <?php if(!$chat == null) :?>
          <a href="<?=base_url()?>/chatt" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="<?=base_url()?>/uploads/addPic/<?=$chat['pic']?>" alt="">
          
          
          
          <div class="details">
            <span><?= $chat['fullname']?></span>
           
            <p><?= $chat['status']?></p>
          </div>
          <?php endif; ?>
      </header>
     
       
      <div class="chat-box">
      
       <?php if(!$mess == null): ?>
       
        <?php foreach($mess as $mes): ?>
  
             <?php if($mes['incoming_msg_id'] == $uri->getSegment(2) && $mes['outgoing_msg_id'] == session()->get('adviserID') ):?>
            <div class="chat outgoing">
              <div class="details">
                  <p><?= $mes['msg']?></p>
              </div>
              
          </div>
          <?php endif;?>
                 <?php if($mes['incoming_msg_id'] == session()->get('adviserID') && $mes['outgoing_msg_id'] == $uri->getSegment(2)   ):?>
              <div class="chat incoming">
               <img src="<?=base_url()?>/uploads/addPic/<?=$chat['pic']?>" alt="">
              <div class="details">
                  <p><?= $mes['msg']?></p>
              </div>
              
          </div>
          <?php endif;?>
        <?php endforeach;?>
        
       <?php else:?>
       
          
      <?php endif; ?>
      </div>
      
     
      
      <form method="post" action="<?= base_url()?>/chatuser/<?= $uri->getSegment(2) ?>" class="typing-area" autocomplete="off">
         <input type="text" name="outgoing_msg_id"  hidden>
          <input type="text" name="incoming_msg_id"  hidden>
          <input type="text" name="msg" class="input-field" id="" placeholder="Send a message...">
          <button type="submit"><i class="fab fa-telegram-plane"></i></button>
      </form>
    
    </section>
    </div>
 
  </div>
</div>



  

 