
<div class="container-fluid">
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="<?=base_url()?>/uploads/addPic/<?=session()->get('pic')?>" data-holder-rendered="true" id="img">
    <ul class="nav flex-column nav-pills">
      
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href="<?=base_url()?>/leader"><i class="fas fa-home"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="<?=base_url()?>/addmodule"><i class="fas fa-tasks"></i> Add Module</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/moduleview"><i class="fas fa-user-friends"></i> View Team</a>
      </li>
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
      <h1 class="text-center mt-5">Add Module</h1>
    <div class="card-add text-center mt-5">
      <form action="<?=base_url()?>/addmodule" class="m-5" method="post">
          
            <div class="mb-3 row">
                <label for="inputProject" class="col-sm-2 col-form-label">Module Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProject" name="moduleName">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMembers" class="col-sm-2 col-form-label">Assign Member:</label>
                <div class="col-sm-10">
                 <select class="form-select mt-3" aria-label=".form-select-sm example" name="memberID">
                <option selected>Select Member</option>
                <?php if(!$member == null) :?>
         
      
     
                <?php foreach($member as $mem): ?>
                    <option value="<?=$mem['studentID']?>"><?= $mem['firstname'].' '.$mem['lastname']?></option>
                   

                  
                  <?php endforeach; ?>
                  <?php endif; ?>
                
                
            </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMembers" class="col-sm-2 col-form-label">Module Description:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputMembers" name="description">
                </div>
            </div>
             <div class="mb-3 row">
                <label for="inputLeader" class="col-sm-2 col-form-label">Due Date:</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="datePicker" name="dueDate">
                </div>
                
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4 me-4">
            <button class="btn btn-primary me-md-2" type="submit">Submit</button>
            
        </div>
      </form>
    </div>

  </div>
</div>

<script>
    $('#datePicker').datetimepicker({
        timepicker: true,
        datepicker: true,
        format: 'Y-m-d H:i',
        onShow: function(ct){
            this.setOptions({
                maxDate: $('#datePicker2').val() ? $('#datePicker2').val() : false
            })
        }
    })
</script>