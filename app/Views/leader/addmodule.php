
<div class="container-fluid">
  <!-- Sidebar -->
  <div class="sidebar">
    <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="/assets/images/nancy.jpg" data-holder-rendered="true" id="img">
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
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
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
      <h1 class="text-center mt-5">Add Module</h1>
    <div class="card-add text-center mt-5">
      <form action="" class="m-5">
          
            <div class="mb-3 row">
                <label for="inputProject" class="col-sm-2 col-form-label">Module Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProject">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMembers" class="col-sm-2 col-form-label">Assign Member:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputMembers">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMembers" class="col-sm-2 col-form-label">Module Description:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputMembers">
                </div>
            </div>
             <div class="mb-3 row">
                <label for="inputLeader" class="col-sm-2 col-form-label">Due Date:</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="datePicker">
                </div>
                
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4 me-4">
            <button class="btn btn-primary me-md-2" type="button">Submit</button>
            
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