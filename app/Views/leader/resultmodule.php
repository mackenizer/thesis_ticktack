
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
<?php if(!$module == null) :?>
    <div class="card-add text-center mt-5">
        <div class="ms-4 ps-4">
            <p class="text-start">Module Name:  <?= $module['moduleName']?></p>
            <p class="text-start">Assigned Member:  <?= $module['fullname']?></p>
            <p class="text-start">Description:  <?= $module['description']?></p>
            <p class="text-start">Due Date:  <?= $module['dueDate']?></p>
        </div>
        <?php endif; ?>
        <div class="card-viewact p-4 m-3 text-start">
            <form method="post" action="<?= base_url()?>/resultmodule/<?= $uri->getSegment(2) ?>" enctype="multipart/form-data">
                
                <div class="input-group">
                    <input type="text" class="form-control" name="description" placeholder="Add comment" aria-label="Recipient's username with two button addons">
                    <button class="btn btn-outline-secondary" type="submit"><span><i class="fas fa-paper-plane"></i></span></button>
                    
                    <div clas="file_input_wrap">
                        <input type="file" name="fileUpload" id="imageUpload" class="hide" />
                        <label for="imageUpload" class="btn1 btn-large btn-outline-secondary"><span><i class="fas fa-paperclip"></i></span></label>
                        
                        </div>

                   
                        
                </div>
            </form>
            
            
            

            <table class="table  table-striped table-hover mt-5">
              <thead   class="thead-dark">
                <tr>
                  <th>Description</th>
                  <th>File Name</th>
                  <th>Date Submitted</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if(!$files == null) :?>
              <?php foreach($files as $file): ?>
                <tr>
                  <td><?= $file['description']?></th>
                  <td><?= $file['file']?></td>
                  <td><?= $file['date']?></td>
                  <td><a href="<?= base_url()?>/uploads/fileUpload/<?= $file['file']?>" download= "<?= $file['file']?>"><i class="far fa-download"></a></i></td>
                  
                  
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php endif; ?>
           
            
             
       
        </div>
        
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4 me-4">
            <button class="btn btn-primary me-md-2" type="button">Complete</button>
            
        </div> -->
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


