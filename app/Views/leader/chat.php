
<div class="container-fluid">
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
    <section class="users">
      
      <header>
        
        <div class="content">
         <?php if(!$user == null) :?>
          <img src="/assets/images/nancy.jpg" alt="">
          <div class="details">
            
            <span><?= $user['fullname']?></span>
            <p><?= $user['status']?></p>
          </div>
        </div>
        <?php endif; ?>
      </header>
      <?php if(!$display == null) :?>
      <?php foreach($display as $disp): ?>
      <div class="users-list">
        <a href="<?=base_url()?>/userschat">
          <div class="content">
            <img src="/assets/images/nancy.jpg" alt="">
             <div class="details">
               <span><?= $disp['fullname']?></span>
                <p>Test Message</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
        
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

    </section>
    </div>
 
  </div>
</div>

 


  

 