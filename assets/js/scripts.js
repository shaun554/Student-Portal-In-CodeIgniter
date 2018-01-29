$(document).ready(function(){
    $(".nav-item").click(function(){
    	$(".nav-item").removeClass("active");
        $(this).addClass("active");
    });
});

$(document).ready( function () {
	$('#list-of-books').DataTable();
} );