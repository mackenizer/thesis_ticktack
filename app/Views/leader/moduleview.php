
<div class="container-fluid">
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="<?=base_url()?>/uploads/addPic/<?=session()->get('pic')?>" data-holder-rendered="true" id="img">
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
       <li class="nav-item">
        <a class="nav-link " href="<?=base_url()?>/chat"><i class="far fa-user-md-chat"></i> Chat</a>
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
          <form class="p-5 pt-0" method="post" action="<?=base_url()?>/leader" enctype="multipart/form-data">
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


    <div class="ms-5 px-3 mt-5">
      <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= session()->get('error') ?>
                    </div>
               
                <?php endif; ?>
        <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
        <?php if(!$project == null) :?>
        <h3>Project Name:  <?= $project['projectTitle']?></h3>
        <p>Adviser:  <?= $project['adviser_fullname']?></p>
        <p>Project Leader: <?= $project['Fulllname']?></p>
        <a class="text-info text-decoration-none" href="#gantt" data-bs-toggle="modal"><p>Gantt Chart</p></a>
         <a class="text-info text-decoration-none" href="#addTeam" data-bs-toggle="modal"><p>Add Members</p></a>
      
   
    <div class="p-5">
     <p>Team Members:</p>
    <table class="table table-striped table-hover">
          <thead>
            <tr class="table-dark">
              <th>Project ID</th>
              <th>Full Name</th>
              <th>Module Name</th>
              <th>Rate</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!$member == null) :?>
          <?php foreach($member as $mem): ?>
            <tr>
              <td><?= $mem['projectID']?></th>
              <td><?= $mem['fullname']?></td>
              <td><?= $mem['moduleName']?></td>
              <td><button class="btn btn-primary">Rate</button></td>
              
              
            </tr>
             <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>

    </div>
     </div>
    <?php endif; ?>
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
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
    </div>
    </div>
    
    <?php if(!$member == null) :?>
    <?php foreach($member as $memb): ?>
    <div class="card-view2 text-center mt-5">
      <div class="d-flex justify-content-around mt-3">
          <a class="text-info text-decoration-none" href="<?=base_url()?>/resultmodule/<?= $memb['studentID']?>"><p><?= $memb['moduleName']?></p></a>
          <p><?= $memb['fullname']?></p>
          <p>Status</p>
      </div>
    </div>
   <?php endforeach; ?>
    <?php endif; ?>
    
    

  </div>
</div>