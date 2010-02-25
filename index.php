<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Simplebox.</title>
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<script src="js/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>	
	<script>
	$(document).ready(function(){	
		
		$.getJSON('all-comments.php', function(data) {
			displayComments(data);
		});
		
		$("input#name").click(function() {
			$("input#name").val("").css({ "color" : "#000", "font-style" : "normal"})
		});
		
		$("input#email").click(function() {
			$("input#email").val("").css({ "color" : "#000", "font-style" : "normal"})
		});
		
		$("textarea#comment").click(function() {
			$("textarea#comment").val("").css({ "color" : "#000", "font-style" : "normal"})
		});
		
		$("#submit-button").click(function(){
			$("#alerts").empty().hide();
						
			var hasError = false;
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			var name = $("#name").val();
			if(name == '' || name == "Your Name") {
				$("#alerts").append('<div class="error">Please enter your name.</div>');
				$("#alerts").show();
				hasError = true
			}

			var email = $("#email").val();
			if(email == '' || email == "Your Email") {
				$("#alerts").append('<div class="error">Please enter your email address.</div>');
				$("#alerts").show();
				hasError = true;
			} else if(!emailReg.test(email)) {	
				$("#alerts").append('<div class="error">Please make sure your email is correct.</div>');
				$("#alerts").show();
				hasError = true;
			}
			
			var comment = $("#comment").val();
			if(comment == '' || comment == "Your Comment") {
				$("#alerts").append('<div class="error">Please enter your name.</div>');
				$("#alerts").show();
				hasError = true
			}
			
			if(hasError == false) {	
				var dataString = 'n='+ encodeURIComponent(name) + '&e=' + encodeURIComponent(email) + '&c=' + encodeURIComponent(comment) ;  

				$.ajax({  
			   		type: "POST",  
			   		url: "comment.php",  
			   		data: dataString,  
				  	dataType: 'json',
			   		success: function(data) { displayComments(data) }
		 		});
			}
			return false;
		});
		
		function displayComments(data){
			var comments = [];
			for(i=0; i<data.length; i++) {
				comments.push("<p>", "<strong>", data[i].name, "</strong>", "<br />", data[i].comment, "</p>");
			}
			$("#comments").html( comments.join("") );
		};
	});
	</script>
	
</head>

<body>

<div id="form">
	
	<div id="alerts"></div>
	
	<form id="comment-form">
		<div id="name-field" class="form-field">
			<label>Name: </label><br />
			<input id="name" type="text" name="name" value="Your Name" />
		</div>
	
		<div id="email-field" class="form-field">
			<label>Email: </label><br />
			<input id="email" type="text" name="email" value="Your Email" />
		</div>
	
		<div id="comment-field" class="form-field">
			<label>Comment: </label><br />
			<textarea id="comment" name="comment">Your Comment</textarea>
		</div>
				
		<div id="submit-button" class="button form-field">
			submit
		</div>
	</form>
</div>

<div id="comments">
	
</div>
</body>
</html>