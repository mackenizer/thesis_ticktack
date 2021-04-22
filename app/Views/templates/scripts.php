<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<!-- SweetAlert2 -->
<script src="<?=base_url()?>/project/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>/project/plugins/toastr/toastr.min.js"></script>
<!-- Switch Toggle -->
<script src="<?=base_url()?>/project/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>/project/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>/project/plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="<?=base_url()?>/project/plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?=base_url()?>/project/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DateTimePicker -->
  <script src="<?=base_url()?>/project/dist/js/jquery.datetimepicker.full.min.js"></script>
  <!-- Bootstrap Switch -->
<script src="<?=base_url()?>/project/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- MOMENT -->
<script src="<?=base_url()?>/project/plugins/moment/moment.min.js"></script>
<!-- <script>
	$(document).ready(function(){
	  $('.select2').select2({
	    placeholder:"Please select here",
	    width: "100%"
	  });
  })
	 window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	  }
	  window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
	      })
	  }
	 window.viewer_modal = function($src = ''){
	    start_load()
	    var t = $src.split('.')
	    t = t[1]
	    if(t =='mp4'){
	      var view = $("<video src='"+$src+"' controls autoplay></video>")
	    }else{
	      var view = $("<img src='"+$src+"' />")
	    }
	    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
	    $('#viewer_modal .modal-content').append(view)
	    $('#viewer_modal').modal({
	            show:true,
	            backdrop:'static',
	            keyboard:false,
	            focus:true
	          })
	          end_load()  

	}
	  window.uni_modal = function($title = '' , $url='',$size=""){
	      start_load()
	      $.ajax({
	          url:$url,
	          error:err=>{
	              console.log()
	              alert("An error occured")
	          },
	          success:function(resp){
	              if(resp){
	                  $('#uni_modal .modal-title').html($title)
	                  $('#uni_modal .modal-body').html(resp)
	                  if($size != ''){
	                      $('#uni_modal .modal-dialog').addClass($size)
	                  }else{
	                      $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
	                  }
	                  $('#uni_modal').modal({
	                    show:true,
	                    backdrop:'static',
	                    keyboard:false,
	                    focus:true
	                  })
	                  end_load()
	              }
	          }
	      })
	  }
	  window._conf = function($msg='',$func='',$params = []){
	     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
	     $('#confirm_modal .modal-body').html($msg)
	     $('#confirm_modal').modal('show')
	  }
	   window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
	   	 var Toast = Swal.mixin({
	      toast: true,
	      position: $pos || 'top-end',
	      showConfirmButton: false,
	      timer: 5000
	    });
	      Toast.fire({
	        icon: $bg,
	        title: $msg
	      })
	  }
$(function () {
  bsCustomFileInput.init();

    $('.summernote').summernote({
        height: 300,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    })

     $('.datetimepicker').datetimepicker({
		  format:'Y/m/d H:i',
		})
    

  })
 $(".switch-toggle").bootstrapToggle();
$('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9]/, '');
        val = val.replace(/,/g, '');
        val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
        $(this).val(val)
    })
</script> -->
<script src="<?=base_url()?>/project/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/project/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/project/dist/js/adminlte.js"></script>

<!-- PAGE assets/plugins -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>/project/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>/project/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>/project/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/project/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>/project/dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>/project/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<!-- SweetAlert2 -->
<script src="<?=base_url()?>/project/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>/project/plugins/toastr/toastr.min.js"></script>
<!-- Switch Toggle -->
<script src="<?=base_url()?>/project/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>/project/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>/project/plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="<?=base_url()?>/project/plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?=base_url()?>/project/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DateTimePicker -->
  <script src="<?=base_url()?>/project/dist/js/jquery.datetimepicker.full.min.js"></script>
  <!-- Bootstrap Switch -->
<script src="<?=base_url()?>/project/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- MOMENT -->
<script src="<?=base_url()?>/project/plugins/moment/moment.min.js"></script>
<script>
	$(document).ready(function(){
	  $('.select2').select2({
	    placeholder:"Please select here",
	    width: "100%"
	  });
  })
	 window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	  }
	  window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
	      })
	  }
	 window.viewer_modal = function($src = ''){
	    start_load()
	    var t = $src.split('.')
	    t = t[1]
	    if(t =='mp4'){
	      var view = $("<video src='"+$src+"' controls autoplay></video>")
	    }else{
	      var view = $("<img src='"+$src+"' />")
	    }
	    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
	    $('#viewer_modal .modal-content').append(view)
	    $('#viewer_modal').modal({
	            show:true,
	            backdrop:'static',
	            keyboard:false,
	            focus:true
	          })
	          end_load()  

	}
	  window.uni_modal = function($title = '' , $url='',$size=""){
	      start_load()
	      $.ajax({
	          url:$url,
	          error:err=>{
	              console.log()
	              alert("An error occured")
	          },
	          success:function(resp){
	              if(resp){
	                  $('#uni_modal .modal-title').html($title)
	                  $('#uni_modal .modal-body').html(resp)
	                  if($size != ''){
	                      $('#uni_modal .modal-dialog').addClass($size)
	                  }else{
	                      $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
	                  }
	                  $('#uni_modal').modal({
	                    show:true,
	                    backdrop:'static',
	                    keyboard:false,
	                    focus:true
	                  })
	                  end_load()
	              }
	          }
	      })
	  }
	  window._conf = function($msg='',$func='',$params = []){
	     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
	     $('#confirm_modal .modal-body').html($msg)
	     $('#confirm_modal').modal('show')
	  }
	   window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
	   	 var Toast = Swal.mixin({
	      toast: true,
	      position: $pos || 'top-end',
	      showConfirmButton: false,
	      timer: 5000
	    });
	      Toast.fire({
	        icon: $bg,
	        title: $msg
	      })
	  }
// $(function () {
//   bsCustomFileInput.init();

//     $('.summernote').summernote({
//         height: 300,
//         toolbar: [
//             [ 'style', [ 'style' ] ],
//             [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
//             [ 'fontname', [ 'fontname' ] ],
//             [ 'fontsize', [ 'fontsize' ] ],
//             [ 'color', [ 'color' ] ],
//             [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
//             [ 'table', [ 'table' ] ],
//             [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
//         ]
//     })

//      $('.datetimepicker').datetimepicker({
// 		  format:'Y/m/d H:i',
// 		})
    

//   })
//  $(".switch-toggle").bootstrapToggle();
// $('.number').on('input keyup keypress',function(){
//         var val = $(this).val()
//         val = val.replace(/[^0-9]/, '');
//         val = val.replace(/,/g, '');
//         val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
//         $(this).val(val)
//     })
</script>
<script src="<?=base_url()?>/project/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/project/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/project/dist/js/adminlte.js"></script>

<!-- PAGE assets/plugins -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>/project/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>/project/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>/project/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/project/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url()?>/project/dist/js/pages/dashboard2.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>/project/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<!-- SweetAlert2 -->
<script src="<?=base_url()?>/project/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>/project/plugins/toastr/toastr.min.js"></script>
<!-- Switch Toggle -->
<script src="<?=base_url()?>/project/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>/project/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>/project/plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="<?=base_url()?>/project/plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?=base_url()?>/project/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DateTimePicker -->
  <script src="<?=base_url()?>/project/dist/js/jquery.datetimepicker.full.min.js"></script>
  <!-- Bootstrap Switch -->
<script src="<?=base_url()?>/project/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- MOMENT -->
<script src="<?=base_url()?>/project/plugins/moment/moment.min.js"></script>
<script>
	$(document).ready(function(){
	  $('.select2').select2({
	    placeholder:"Please select here",
	    width: "100%"
	  });
  })
	 window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	  }
	  window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
	      })
	  }
	 window.viewer_modal = function($src = ''){
	    start_load()
	    var t = $src.split('.')
	    t = t[1]
	    if(t =='mp4'){
	      var view = $("<video src='"+$src+"' controls autoplay></video>")
	    }else{
	      var view = $("<img src='"+$src+"' />")
	    }
	    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
	    $('#viewer_modal .modal-content').append(view)
	    $('#viewer_modal').modal({
	            show:true,
	            backdrop:'static',
	            keyboard:false,
	            focus:true
	          })
	          end_load()  

	}
	  window.uni_modal = function($title = '' , $url='',$size=""){
	      start_load()
	      $.ajax({
	          url:$url,
	          error:err=>{
	              console.log()
	              alert("An error occured")
	          },
	          success:function(resp){
	              if(resp){
	                  $('#uni_modal .modal-title').html($title)
	                  $('#uni_modal .modal-body').html(resp)
	                  if($size != ''){
	                      $('#uni_modal .modal-dialog').addClass($size)
	                  }else{
	                      $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
	                  }
	                  $('#uni_modal').modal({
	                    show:true,
	                    backdrop:'static',
	                    keyboard:false,
	                    focus:true
	                  })
	                  end_load()
	              }
	          }
	      })
	  }
	  window._conf = function($msg='',$func='',$params = []){
	     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
	     $('#confirm_modal .modal-body').html($msg)
	     $('#confirm_modal').modal('show')
	  }
	   window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
	   	 var Toast = Swal.mixin({
	      toast: true,
	      position: $pos || 'top-end',
	      showConfirmButton: false,
	      timer: 5000
	    });
	      Toast.fire({
	        icon: $bg,
	        title: $msg
	      })
	  }
// $(function () {
//   bsCustomFileInput.init();

//     $('.summernote').summernote({
//         height: 300,
//         toolbar: [
//             [ 'style', [ 'style' ] ],
//             [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
//             [ 'fontname', [ 'fontname' ] ],
//             [ 'fontsize', [ 'fontsize' ] ],
//             [ 'color', [ 'color' ] ],
//             [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
//             [ 'table', [ 'table' ] ],
//             [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
//         ]
//     })

//      $('.datetimepicker').datetimepicker({
// 		  format:'Y/m/d H:i',
// 		})
    

//   })
//  $(".switch-toggle").bootstrapToggle();
// $('.number').on('input keyup keypress',function(){
//         var val = $(this).val()
//         val = val.replace(/[^0-9]/, '');
//         val = val.replace(/,/g, '');
//         val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
//         $(this).val(val)
//     })
</script>
<script src="<?=base_url()?>/project/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/project/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/project/dist/js/adminlte.js"></script>

<!-- PAGE assets/plugins -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>/project/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>/project/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>/project/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/project/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url()?>/project/dist/js/pages/dashboard2.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>/project/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


















<script>

    
    var exampleModal1 = document.getElementById('exampleModal1')
    exampleModal1.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = exampleModal1.querySelector('.modal-title')
    var modalBodyInput = exampleModal1.querySelector('.modal-body input')

    modalTitle.textContent = 'Evaluate Task # ' + recipient
    modalBodyInput.value = recipient
    })




</script>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    var recipient1 = button.getAttribute('data-bs-what')
    var recipient2 = button.getAttribute('data-bs-w')
    var recipient3 = button.getAttribute('data-bs-wh')
    var recipient4 = button.getAttribute('data-bs-wha')
    var recipient5 = button.getAttribute('data-bs-projid')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = exampleModal.querySelector('.modal-title')
    var modalBodyInput = exampleModal.querySelector('.modal-body input')

    var title = exampleModal.querySelector('#title')
    var start = exampleModal.querySelector('#start')
    var end = exampleModal.querySelector('#end')
    var desc = exampleModal.querySelector('#desc')
    var projj = exampleModal.querySelector('#proj')


    modalTitle.textContent = 'Edit Task ' + recipient1
    title.value = recipient1
    start.value = recipient2
    end.value = recipient3
    desc.value = recipient4
    projj.value = recipient5

    modalBodyInput.value = recipient
})

</script>