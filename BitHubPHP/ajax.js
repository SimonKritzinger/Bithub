
$(document).ready(function(){
		$('#projects').on('click', function(e){
			callPage("test.php");
		});
});

function callPage(pageInput){
$.ajax({
	url: pageInput,
	type: "GET",
	dataType: "text",
	success: function(response){
			$('#maincontent').html(response);
	}
});
};