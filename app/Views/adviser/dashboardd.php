
<div class="container-fluid">
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="/assets/images/nancy.jpg" data-holder-rendered="true" id="img">
    <ul class="nav flex-column nav-pills">
      
      <li class="nav-item">
      
      <a class="nav-link active" aria-current="page" href="<?=base_url()?>/adviser"><i class="fas fa-home"></i> Dashboard</a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/addteam"><i class="fas fa-tasks"></i> Add Project</a>
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
   <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger text-center mt-2" role="alert">
                        <?= session()->get('error') ?>
                    </div>
               
                <?php endif; ?>
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center mt-2" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
                <?php if(!$project == null) :?>
                <?php foreach($project as $proj): ?>

                  <div class="card text-center mt-5">
                    <!-- <a href="<?=base_url()?>/viewteam"><h2>Team Name</h2></a> -->
                    <a class="text-light text-decoration-none" href="<?=base_url()?>/viewteam"><h2><?= $proj['projectTitle']?></h2></a>
                    <p><?= $proj['Fulllname']?></p>
                    <p>Members:</p>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>

  </div>
</div>