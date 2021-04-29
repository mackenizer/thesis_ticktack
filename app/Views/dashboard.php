<?php $i = 1?>
<?php $uri = service('uri'); 

?>


<div class="wrapper">
  <?php include_once('templates/nav.php'); ?>
  <?php include_once('templates/sidenav.php'); ?>
  

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
         
            <?php 
            
              if(session()->get('adviserID') != null) {
                echo  "<h2>Welcome Adviser!</h2>";
              }
           else{
            echo  "<h2>Welcome Student!</h2>";
           }

                


            ?>
          
            <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>

                <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger text-center mt-2" role="alert">
                        <?= session()->get('error') ?>
                    </div>
               
                <?php endif; ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
 
          
      <div class="row">
        <div class="col-md-12">
        <div class="card card-outline">
          
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0 table-hover">
                <colgroup>
                  <col width="5%">
                  <col width="30%">
                  <col width="35%">
                  <col width="15%">
                  <col width="15%">
                </colgroup>
                <thead class="table-success">
                  <th>#</th>
                  <th>Projects</th>
                  <th>Progress</th>
                  <th>Total Tasks</th>
                  <th>Status</th>
                  <th></th>
                </thead>
                <tbody>
                
                <?php if($project != null) : ?>
                  <?php foreach ($project as $proj) :?>
                <tr>
                      <td>
                        <p><b><?= $proj['id']?><p>
                      </td>
                      
                      <td>
                        
                          <a>
                           <?= $proj['name']?>
                          </a>
                          <br>
                          <small>
                             Due: <?= $proj['end_date']?>
                          </small>
                          <br>
                          <small>
                             <b> Project Leader: <?= $proj['firstname'].' '.$proj['lastname']?>
                          </small>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                          <?php if(isset($progress)) : ?>
                              <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress[$proj['id']]?>%">
                              </div>
                          </div>
                          <small>

                          <?=$progress[$proj['id']]?>% Complete
                          </small>
                          <?php endif; ?>
                      </td>
                      <td>
                   
                        <p class="center  "><?=$total_task[$proj['id']]?></p>
                       
                      </td>
                      
                      <td class="project-state">
                      <?php
                            if($proj['status'] =='on-going'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-secondary'>{$proj['status']}</span></a>":"<span class='badge badge-secondary'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='stop'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-danger'>{$proj['status']}</span></a>":"<span class='badge badge-danger'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='on-hold'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-info'>{$proj['status']}</span></a>":"<span class='badge badge-info'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='complete'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-success'>{$proj['status']}</span></a>":"<span class='badge badge-success'>{$proj['status']}</span>";
                              echo "<p><i>Grade: ".$proj['grade']."</i></p>";
                            }
                          ?>
                        
                      </td>
                 
  
                      <td>
                        <a class="" href="<?=base_url()?>/viewproject/<?=$proj['id'] ?>">
                        <i class="fas fa-eye"></i>
                              View
                        </a>
                      </td>
                  
                  </tr>
                </tbody>  

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?=base_url()?>/updateproject" method="post">
                            <div class="form-group">
                              <input type="text" name="id" class="form-control" id="recipient-name" hidden>
                            </div>
                            <div class="col-mb-3 mt-2">
                            <div class="form-group">
                            <label for="">Status</label>

                            <select name="status" id="status" class="custom-select custom-select-sm">
                              
                                          <option value="on-going" <?php if($proj['status'] == "on-going") { echo "SELECTED"; } ?>>on-going</option>
                                          <option value="on-hold" <?php if($proj['status'] == "on-hold") { echo "SELECTED"; } ?>>on-hold</option>
                                          <option value="stop" <?php if($proj['status'] == "stop") { echo "SELECTED"; } ?>>stop</option>
                                          <option value="complete" <?php if($proj['status'] == "complete") { echo "SELECTED"; } ?>>complete</option>

                                          </select>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                          </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>       






                <?php endforeach;?>
                  <?php endif; ?>
              </table>
            </div>
          </div>
        </div>
        </div>
       
         
      </div> 
        </div>
      </div>
      </div><!--/. container-fluid -->
    </section>
   
  <!-- /.content-wrapper -->

 
</div>
<!-- ./wrapper -->



<script>

    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Update Project ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })

</script>


<?php include_once('templates/scripts.php')?>
