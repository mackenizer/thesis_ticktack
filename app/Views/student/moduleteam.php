
<div class="container-fluid">
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="/assets/images/nancy.jpg" data-holder-rendered="true" id="img">
    <ul class="nav flex-column nav-pills">
      
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href="<?=base_url()?>/student"><i class="fas fa-home"></i> Dashboard</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/studentmodule"><i class="fas fa-tasks"></i> View Task</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link active" href="<?=base_url()?>/moduleteam"><i class="fas fa-user-friends"></i> My Team</a>
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

    <div class="ms-5 px-5 mt-5">
        <h3>Project Name: <?= $project['projectTitle']?></h3>
        <p>Adviser: <?= $project['adviser_fullname']?></p>
        <p>Project Leader: <?= $project['Fulllname']?></p>
        
        <a class="text-info text-decoration-none" href="#exampleModal" data-bs-toggle="modal"><p>Gantt Chart</p></a>
        
    
    <div class="p-5">
      <p>Team Members:</p>
      <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Project ID</th>
              <th>Full Name</th>
              <th>Module Name</th>
              
            </tr>
          </thead>
          <tbody>
          <?php if(!$module == null) :?>
          <?php foreach($module as $modee): ?>
            <tr>
              <td><?= $modee['projectID']?></th>
              <td><?= $modee['fullname']?></td>
              <td><?= $modee['moduleName']?></td>
              
              
              
            </tr>
             <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>

    </div>
    </div>
    <?php endif; ?>
    
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Gantt Chart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        
           
            
        
        </div>
    </div>
    </div>
    
     <?php if(!$module == null) :?>
    <?php foreach($module as $mode): ?>
    <div class="card-view text-center mt-5">
    
      <div class="d-flex justify-content-around mt-3">
          <a class="text-info text-decoration-none" href="<?=base_url()?>/studentresult/<?= $mode['studentID']?>"><p><?= $mode['moduleName']?></p></a>
          <p><?= $mode['fullname']?></p>
          <p>Status</p>
      </div>
    </div>
     <?php endforeach; ?>
    <?php endif; ?>
    
    
    

  </div>
</div>