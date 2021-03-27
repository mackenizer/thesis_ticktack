
<div class="container-fluid">
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="/assets/images/nancy.jpg" data-holder-rendered="true" id="img">
    <ul class="nav flex-column nav-pills">
      
      <li class="nav-item">
      
      <a class="nav-link active" aria-current="page" href="<?=base_url()?>/student"><i class="fas fa-home"></i> Dashboard</a>
      
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/studentmodule"><i class="fas fa-tasks"></i> View Task</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/moduleteam"><i class="fas fa-user-friends"></i> My Team</a>
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
  <?php if(!$project == null) :?>
    <div class="card text-center mt-5">
      <a class="text-info text-decoration-none" href="<?=base_url()?>/studentresult/<?= $project['studentID']?>"><h2><?= $project['moduleName']?></h2></a>
      <p>Project Leader</p>
      <p>Assigned member: <?= $project['fullname']?></p>
    </div>
    <?php endif; ?>

  </div>
</div>