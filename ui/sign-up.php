<?php
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = avinnagre";
   $credentials = "user = avinnagre password=db-avinnagre-30832";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
        <link href="/ui/style.css" rel="stylesheet" />
        
        <script>
            function ValidateContactForm()
            {
                var name = document.ContactForm.Name;
              
            
                if (name.value == "")
                {
                    window.alert("Please enter your name.");
                    name.focus();
                    return false;
                }
              

                return true;
            }
        </script>
    </head>
    
    <body>
	    <div class="container" style="margin-top: 30px">
		    
       		<p align="center" class="fs"><b>Fill up the New User Form</b></p>
		<form method="post" class="fs" name="ContactForm" onsubmit="return ValidateContactForm();">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputusername" class="col-form-label"><b>Username</b></label>
			      <input type="text" name="Name" data-toggle="tooltip" data-placement="top" title="Enter the username accordingly" class="form-control" id="username" placeholder="username">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputPassword4" class="col-form-label"><b>Password</b></label>
			      <input type="password" data-toggle="tooltip" data-placement="top" title="The password must be easy to remenmber" class="form-control" id="password" placeholder="password">
			    </div>    
			</div>
			
			<div class="form-row">
			     <div class="form-group col-md-6">
			      <label for="inputname" class="col-form-label"><b>Full Name</b></label>
			      <input type="text" data-toggle="tooltip" data-placement="top" title="Enter your complete name here" class="form-control" id="name" placeholder=fullname>
			    </div>  
				<div class="form-group col-md-6">
					<label for="inputAddress" class="col-form-label"><b>Address</b></label>
			    <input type="text" class="form-control" id="inputAddress" placeholder="Flat no. area">
			    </div>
			</div>
			
			<div class="form-row">
			    <div class="form-group col-md-6">
				    <label for="inputCity" class="col-form-label"><b>City</b></label>
			      <input type="text" class="form-control" id="inputCity" placeholder="City">
			    </div>
				<div class="form-group col-md-4">
					<label for="inputState" class="col-form-label"><b>State</b></label>
			      <input type="text" id="inputState" class="form-control" placeholder="State">
				</div>
				<div class="form-group col-md-2">
					<label for="inputZip" class="col-form-label"><b>Zip</b></label>
			      <input type="text" class="form-control" id="inputZip" placeholder="pincode">
				</div>
			</div>
		
			<p>
				<button type="submit" value="send" style="float: left" id="submit_btn" class="btn btn-primary">Submit</button>
				<a href="/" style="float: right" role="button" class="btn btn-danger">Exit</a>
			</p>
		</form>
		<br>
		    
	    </div>
	
        <script type="text/javascript" src="/ui/main.js">
        </script>
        
    </body>
</html>
