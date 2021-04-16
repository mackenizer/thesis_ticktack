<div class="d-flex" id="wrapper">
<?php $uri = service('uri'); 


?>
<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="<?=base_url()?>/uploads/addPic/<?=session()->get('pic')?>" data-holder-rendered="true" id="img">
  <div class="list-group list-group-flush">
    <a class="nav-link" href="<?=base_url()?>/leader" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Dashboard</a>
    <a href="<?=base_url()?>/addmodule" class="nav-link" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tasks"></i> Add Module</a>
    <a href="<?=base_url()?>/moduleview" class="nav-link" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-friends"></i> View Team</a>

    <a class="nav-link active" href="<?=base_url()?>/chat" class="list-group-item list-group-item-action bg-light"><i class="far fa-user-md-chat"></i> Chat</a>
  
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <button class="btn btn-dark" id="menu-toggle"><i class="far fa-bars"></i></button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo session()->get('firstname').' '. session()->get('lastname') ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#profile" data-bs-toggle="modal">Profile</a>
            <!-- <a class="dropdown-item" href="#">Another action</a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
       
    </div>
      <form class="p-5 pt-0" method="post" action="<?=base_url()?>/profile" enctype="multipart/form-data">
        <div class="mb-3">
          <div class="row">
          <div class="mb-3">
            <label for="formFile" class="form-label"></label>
            <input class="form-control" type="file" id="formFile" name="addPic">
          </div>
         
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
</div>
</div>
<div class="wrapper mt-4">
    <section class="chat-area">
      <header>
      <?php if(!$chatuser == null) :?>
          <a href="<?=base_url()?>/chat" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img class="rounded-circle" src="<?=base_url()?>/uploads/addPic/<?=$chatuser['pic']?>" alt="">
          
          
          
          <div class="details">
            <span><?= $chatuser['fullname']?></span>
            <p><?= $chatuser['status']?></p>
          </div>
          <?php endif; ?>
      </header>
     
       
      <div class="chat-box">
      
       <?php if(!$mess == null): ?>
       
        <?php foreach($mess as $mes): ?>
  
             <?php if($mes['incoming_msg_id'] == session()->get('studentID') && $mes['outgoing_msg_id'] == $uri->getSegment(2) ):?>
            <div class="chat outgoing">
              <div class="details">
                  <p><?= $mes['msg']?></p>
              </div>
              
          </div>
          <?php endif;?>
                 <?php if($mes['incoming_msg_id'] == $uri->getSegment(2) && $mes['outgoing_msg_id'] == session()->get('studentID') ):?>
              <div class="chat incoming">
               <img class="rounded-circle" src="<?=base_url()?>/uploads/addPic/<?=$chatuser['pic']?>" alt="">
              <div class="details">
                  <p><?= $mes['msg']?></p>
              </div>
              
          </div>
          <?php endif;?>
        <?php endforeach;?>
        
       <?php else:?>
       
          
      <?php endif; ?>
      </div>
      
     
      
      <form method="post" action="<?= base_url()?>/userschat/<?= $uri->getSegment(2) ?>" class="typing-area" autocomplete="off">
         <input type="text" name="outgoing_msg_id"  hidden>
          <input type="text" name="incoming_msg_id"  hidden>
          <input type="text" name="msg" class="input-field" id="" placeholder="Send a message...">
          <button type="submit"><i class="fab fa-telegram-plane"></i></button>
      </form>
    
    </section>
    </div>
 
  

 
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>


