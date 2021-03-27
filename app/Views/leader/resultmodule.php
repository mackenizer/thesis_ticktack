
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
    <?php if(!$module == null) :?>
    <div class="card-add text-center mt-5">
        <div class="ms-4 ps-4">
            <p class="text-start">Module Name:  <?= $module['moduleName']?></p>
            <p class="text-start">Assigned Member:  <?= $module['fullname']?></p>
            <p class="text-start">Description:  <?= $module['description']?></p>
            <p class="text-start">Due Date:  <?= $module['dueDate']?></p>
        </div>
        <?php endif; ?>
        <div class="card-viewact p-4 m-3">
            <form action="">
                
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Add comment" aria-label="Recipient's username with two button addons">
                    <button class="btn btn-outline-secondary" type="button"><span><i class="fas fa-paper-plane"></i></span></button>
                    <div clas="file_input_wrap">
                        <input type="file" name="imageUpload" id="imageUpload" class="hide" />
                        <label for="imageUpload" class="btn1 btn-large btn-outline-secondary"><span><i class="fas fa-paperclip"></i></span></label>
                        </div>
                        
                </div>
            </form>
            <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vitae aliquam delectus inventore maiores, corporis libero voluptatum earum necessitatibus unde nostrum saepe quibusdam nemo magnam reprehenderit recusandae harum? Quae, consequatur?</p>
       
        </div>
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4 me-4">
            <button class="btn btn-primary me-md-2" type="button">Complete</button>
            
        </div> -->
    </div>

  </div>
  
</div>

<script>
    $('#imageUpload').change(function() {
  readImgUrlAndPreview(this);

  function readImgUrlAndPreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').removeClass('hide').attr('src', e.target.result);
      }
    };
    reader.readAsDataURL(input.files[0]);
  }
});
</script>