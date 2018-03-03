$(document).ready(function(){
	
$('.tags').keydown(function(event){
    if (event.keyCode == 13 || event.keyCode == 32) {
$(this).val(($(this).val()).concat(','));
        return 109;
    }
});





$('button#delete').on('click', function(){
  // swal({   
  //   title: "Are you sure?",
  //   text: "You will not be able to recover this lorem ipsum!",         type: "warning",   
  //   showCancelButton: true,   
  //   confirmButtonColor: "#DD6B55",
  //   confirmButtonText: "Yes, delete it!", 
  //   closeOnConfirm: false 
  // }, 
  //      function(){   
  //   $("#myform").submit();
  // });
swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
  	$("#myform").submit();
    swal(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})






});
  });
