<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php session_start()?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Welcome to BitHub</title>
		<link rel="stylesheet" href="css/bootstrap.css">
    <style>
	    		body {
						padding-top: 70px;
					}
					.modal-header, .modal-body, .modal-footer{
						padding: 25px;
					}
					.modal-footer{
						text-align: center;
					}
					#signup-modal-content, #forgot-password-modal-content{
						display: none;
					}
							
					/** validation */
							
					input.parsley-error		{    
					    border-color:#843534;
					    box-shadow: none;
					}
					input.parsley-error:focus{    
					    border-color:#843534;
					    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
					}
					.parsley-errors-list.filled {
					    opacity: 1;
					    color: #a94442;
					    display: none;
					}
    </style>
	</head>

	<body>
		<div id="maindiv">
			<div id="head">
			<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BitHub</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="index.php" target="_blank">Home</a></li> -->
            <!-- <li><a href="index.php" target="_blank">About</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<?php 
          	 if(empty($_SESSION["usermail"])){
          	?>
            	<li><a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">Login/Signup</a></li>
            <?php 
          	 }
          	 else{
          	     echo("<li><a href='javascript:void(0)'>".$_SESSION["name"]." ".$_SESSION["lastname"]."</a></li>");
          	     echo("<li><a href='scripts/logout.php'>Logout</a></li>");
          	   }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  
    
    
    <!-- Bootstrap Modal -->
		
		
		<!--Login, Signup, Forgot Password Modal -->
		<div id="login-signup-modal" class="modal fade" tabindex="-1" role="dialog">
  		<div class="modal-dialog" role="document">
    
    	<!-- login modal content -->
        <div class="modal-content" id="login-modal-content">
        
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Login Now!</h4>
      </div>
        
        <div class="modal-body">
          <form method="post" id="Login-Form" action="scripts/login.php" role="form">
          
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email" >
                </div>                      
            </div>
            
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="login-password" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>                      
            </div>
              <button type="submit" class="btn btn-success btn-block btn-lg">LOGIN</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>
          <a id="signupModal" href="javascript:void(0)">Register Here!</a>
          </p>
        </div>
        
       </div>
        <!-- login modal content -->
        
        <!-- signup modal content -->
        <div class="modal-content" id="signup-modal-content">
        
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Signup Now!</h4>
      </div>
                
       <div class="modal-body">
          <form method="post" id="Signin-Form" role="form" action="scripts/register.php">
          	<div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input name="username" id="username" type="text" class="form-control input-lg" placeholder="Enter Username" required data-parsley-length="[4, 25]">
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input name="name" id="name" type="text" class="form-control input-lg" placeholder="Enter Name" required >
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input name="lastname" id="lastname" type="text" class="form-control input-lg" placeholder="Enter Lastname" required >
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="passwd" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>                      
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="confirm-passwd" type="password" class="form-control input-lg" placeholder="Retype Password" required data-parsley-equalto="#passwd" data-parsley-trigger="keyup">
                </div>                      
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                <input name="birth" id="birth" type="date" class="form-control input-lg" placeholder="Birthdate (dd.mm.yyyy)" required">
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                <input name="company" id="company" type="text" class="form-control input-lg" placeholder="Enter Company" required >
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                	<select name="color" class="form-control input-lg" >
                		<option style="background-color: #a52a2a">#a52a2a</option>
                		<option style="background-color: #800080">#800080</option>
                		<option style="background-color: #ee82ee">#ee82ee</option>
                		<option style="background-color: #ff00ff">#ff00ff</option>
                		<option style="background-color: #ffc0cb">#ffc0cb</option>
                		<option style="background-color: #ff0000">#ff0000</option>
                		<option style="background-color: #ffa500">#ffa500</option>
                		<option style="background-color: #ffff00">#ffff00</option>
                		<option style="background-color: #00ff00">#00ff00</option>
                		<option style="background-color: #008000">#008000</option>
                		<option style="background-color: #006600">#006600</option>
                		<option style="background-color: #00ccff">#00ccff</option>
                		<option style="background-color: #0000ff">#0000ff</option>
                		<option style="background-color: #000099">#000099</option>
                		<option style="background-color: #ffffff">#ffffff</option>
                		<option style="background-color: #bfbfbf">#bfbfbf</option>
                		<option style="background-color: #808080">#808080</option>
                		<option style="background-color: #404040">#404040</option>
                		<option style="background-color: #000000">#000000</option>
                	</select>
                </div>                     
            </div>
            
              <button type="submit" class="btn btn-success btn-block btn-lg">CREATE ACCOUNT!</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>
        </div>
        
      </div>
        <!-- signup modal content -->
        
      </div>        

		
    
    	<!-- /.modal-content -->
  		</div><!-- /.modal-dialog -->
		</div>
        <!--Login, Signup, Forgot Password Modal -->
              
        
	<!-- Bootstrap Modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajaxpars.js"></script>
    <script src="ajax.js"></script>
    
    <script>
    $(document).ready(function(){
	  $('#Login-Form').parsley();
	  $('#Signin-Form').parsley();
	  	  
	  $('#signupModal').click(function(){			    		
	  	$('#login-modal-content').fadeOut('fast', function(){
	  	   $('#signup-modal-content').fadeIn('fast');
	    });
	  });
	    		   		
	  $('#loginModal').click(function(){			    			
	    $('#signup-modal-content').fadeOut('fast', function(){
	       $('#login-modal-content').fadeIn('fast');
	    });
	  });
	  <?php 
		if(!empty($_SESSION["loginerror"])){
	   ?>
			
	   <?php
				unset($_SESSION["loginerror"]);
			}
	   ?>
	});
	
    </script>
				
			</div>
			<div id="body">
				<div id="maincontent">
					<?php include_once 'mainpage.php';?>
				</div>
			</div>
		</div>
	</body>
</html>