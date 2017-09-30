
$(document).ready(function(){
		$('#projects').on('click', function(e){
			callPage("test.php");
		});
		
		$('#profile').on('click', function(e){
			callPage("options.php");
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