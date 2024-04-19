<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<title>Hello, world!</title>
</head>

<body>
	
<form id="form1">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
	<span id="error_email"></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
	<span id="error_password"></span>
  </div>
 
  <button id="submitform" class="btn btn-primary">Submit</button>
</form>






<script>
 
  $("#submitform").on("click",function(e){
	e.preventDefault();
	
	var formdata=$("#form1").serialize();

	$.ajax({
		url:"<?php echo base_url("welcome/validation") ?>",
		method:"post",
		dataType:"json",
		data:formdata,
		success:function(data){
			console.log(data);
			
         if(data.status=="error"){
			if(data.message.email!==""){
				$("#error_email").empty();
				$("#error_email").append(`<p>The Email field must contain a valid email address.</p>`);
				

			}
            if(data.message.password!==""){
				$("#error_password").empty();
				$("#error_password").append(`<p>Please enter a valid password`)
				

			}
			
		 // Redirect the page
		 



		 }
		 else{
			window.location.href = data.redirect;
			
		 }
		
           

		}
	
		



	})



  })
 
 
</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
</body>

</html>