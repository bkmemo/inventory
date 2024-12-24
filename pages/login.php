<?php   include ("../pages/header.php");?>
<body>        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div></nav>
    <div class="container" style="background-image:url(../images/mobileshop1.jpg);">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-yellow">
                    <div class="panel-heading">
                         <h4><center>MBS Stock Control System</center></h4>
						
                    </div>
                    <div class="panel-body">
					
      <form id="main-contact-form" method="post" action="logins.php" role="form">
	     			<div class="form-group">
					<center><h3>Login Here</h3></center>
                </div>
   			<div class="form-group">
                    Username<input type="text"  name="myusername" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    Password <input type="password"  name="mypassword" placeholder="password" class="form-control">
                </div>			
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block"> User Login</button>
                </div>
        </form>  
   
                    <a href="login_with_email_otp.php" class="btn btn-lg btn-danger btn-block"> <font color="white">Admin Login</font></a>
                           
                    </div>
                </div>
            </div>
        </div>
		<br><br><br><br><br><br><br>
    </div>

<?php   include ("../pages/footer.php");?>