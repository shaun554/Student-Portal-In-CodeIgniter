$(document).ready(function(){
    $(".nav-item").click(function(){
    	$(".nav-item").removeClass("active");
        $(this).addClass("active");
    });
});

$(document).ready( function () {
	$('#list-of-books').DataTable();
} );

$('input').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});

$('input').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
  } else {
    $(this).addClass('filled');
  }
})  