

  <div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <img class="rounded-circle text-center mx-auto d-block mt-3 mb-5" width="100" alt="" src="<?=base_url()?>/uploads/addPic/<?=session()->get('pic')?>" data-holder-rendered="true" id="img">
  <div class="list-group list-group-flush">
    <a class="nav-link" href="<?=base_url()?>/leader" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Dashboard</a>
    <a href="<?=base_url()?>/addmodule" class="nav-link active" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tasks"></i> Add Module</a>
    <a href="<?=base_url()?>/moduleview" class="nav-link" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-friends"></i> View Team</a>

    <a class="nav-link" href="<?=base_url()?>/chat" class="list-group-item list-group-item-action bg-light"><i class="far fa-user-md-chat"></i> Chat</a>
  
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


