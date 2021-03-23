
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
        <a class="nav-link active" href="<?=base_url()?>/moduleview"><i class="fas fa-user-friends"></i> View Team</a>
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


    <div class="ms-5 ps-5 mt-5">
        <h3>Team Name:</h3>
        <p>Project Leader:</p>
        <p>Team Members:</p>
        <a class="text-info text-decoration-none" href="#gantt" data-bs-toggle="modal"><p>Gantt Chart</p></a>
         <a class="text-info text-decoration-none" href="#addTeam" data-bs-toggle="modal"><p>Add Members</p></a>
      
    </div>
    <div>
      <?php if(!$member == null) :?>
      <ul>
      
     
                <?php foreach($member as $mem): ?>
                    <li>
                    <?= $mem['firstname'].' '.$mem['lastname']?>
                    </li>
                  
                  <?php endforeach; ?>
           </ul>
                  <?php endif; ?>

    </div>
    <div class="modal fade" id="gantt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="addTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Members</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
        </div>
          <form class="p-5 pt-0" method="post" action="<?=base_url()?>/AddMembers">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
    
    
    <div class="card-view2 text-center mt-5">
      <div class="d-flex justify-content-around mt-3">
          <a class="text-dark text-decoration-none" href="<?=base_url()?>/resultmodule"><p>Module 1</p></a>
          <p>Assigned Members</p>
          <p>Status</p>
      </div>
    </div>
    <div class="card-view2 text-center mt-5">
      <div class="d-flex justify-content-around mt-3">
          <a class="text-dark text-decoration-none" href=""><p>Module 2</p></a>
          <p>Assigned Members</p>
          <p>Status</p>
      </div>
    </div>
    <div class="card-view2 text-center mt-5">
      <div class="d-flex justify-content-around mt-3">
          <a class="text-dark text-decoration-none" href=""><p>Module 3</p></a>
          <p>Assigned Members</p>
          <p>Status</p>
      </div>
    </div>
    
    

  </div>
</div>