<!-- Navbar -->
<nav class="main-header navbar navbar-expand" style="background-color: #32be8f">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
            <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
         
    </ul>

    <ul class="navbar-nav ml-auto">
     
      <!-- <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
     <?php if($uri->getSegment(1) == 'dashboard') :?>
      <li class="nav-item dropdown">
       
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell text-white"></i><span class="badge bg-danger" id="count" style="border-radius: 50% ; position: relative; top: -10px ; left: -10px"><?=(isset($due))?count($due): null?></span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             
              <?php if(isset($due)) :?>
              <?php foreach ($due as $com) :?>
              <a class="dropdown-item" href="" >
                <small><b><i><?= $com?></b></i></small><br>
              </a>
                <?php endforeach;?>
                <?php endif;?>
               
                </div>
        </li>
        <?php endif; ?>
        
     
     
     <li class="nav-item dropdown">
            <a class="nav-link"  data-toggle="dropdown" aria-expanded="true" href="">
              <span>
                <div class="d-felx badge-pill">
                  <span class="text-white fa fa-user mr-2"></span>
                  <span class="text-white"><b><?php echo session()->get('firstname').' '. session()->get('lastname') ?></b></span>
                  <span class="text-white fa fa-angle-down ml-2"></span>
                </div>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
              <!-- <a class="dropdown-item" href="" id="manage_account"><i class="fa fa-cog"></i> Manage Account</a> -->
              <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
      </li>
    </ul>
  </nav>