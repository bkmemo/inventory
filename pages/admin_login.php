<?php
    session_start();
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    include_once "connect.php"; 
    $con = db_connect();
	
	 if(isset($_POST["submit"])) {	
	$phone_number = $_POST['phone_number'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	$result5 = "SELECT username FROM user WHERE password='$password' and phone_number='$phone_number'" ;
	
	$resultSet = mysqli_query($con, $result5) or die("database error:". mysqli_error($conn));
	$isValidLogin = mysqli_num_rows($resultSet);	
	if($isValidLogin){
		$userDetails = mysqli_fetch_assoc($resultSet);
		$_SESSION['username'] = $username;
		$otp =rand(100000, 999999);
            require_once 'bulk/sms.php';
            $livesms = new SMS();
            @$phone=$_POST['phone_number'];
            @$phone=preg_replace('/^0/','+256',$phone);
            //@$message=$_POST['message'];
            @$result = $livesms->send($phone, $otp);
			
			if(@$result['success']) {
			    date_default_timezone_set('Africa/Kampala');
            	$today = date( 'Y-m-d H:i:s' );
			$insertQuery = "INSERT INTO authentication (otp, expired, created) VALUES ('".$otp."', 0, '".$today."')";
			$result1 = mysqli_query($con, $insertQuery);
			$insertID = mysqli_insert_id($con);
		    header('Location:verify.php');
		}
          }   
          if (@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-primary" role="alert">
            '.@$result['message'].'
            </div>';
			header('Location:verify.php');
          }elseif (!@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-danger" role="alert">
            '.@$result['message'].'
            </div>';
          } 
	 }
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,700,300italic);
*, *:before, *:after { box-sizing: border-box; }
html { font-size: 100%;  }
body { 
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  background: #d0e6ef; 
  color: #666;
}

.wrapper {
  max-width: 75%;
  margin: auto;
}


h1 { 
  color: #555; 
  margin: 3rem 0 1rem 0; 
  padding: 0;
  font-size: 1.5rem;
}

textarea {
  width: 100%;
  min-height: 100px;
  resize: none;
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 0.5rem;
  color: #666;
  box-shadow: inset 0 0 0.25rem #ddd;
  &:focus {
    outline: none;
    border: 1px solid darken(#ddd, 5%);
    box-shadow: inset 0 0 0.5rem darken(#ddd, 5%);
  }
  &[placeholder] { 
    font-style: italic;
    font-size: 1.875rem;
  }
}

#the-count {
  float: right;
  padding: 0.1rem 0 0 0;
  font-size: 1.875rem;
}

</style>


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
                         <h4><center>Admin Login Panel</center></h4>
						
                    </div>
                    <div class="panel-body">
					
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
				   <h4>Choose Phones</h4>
					<div class="form-group">
					  
                <?php 
						    $count = 0;
                            $query="select * from user  WHERE phone_number IS NOT NULL";
                            $query_run=mysqli_query($con,$query);
                            echo "<select name='phone_number'  multiple multiselect-search='true' multiselect-select-all='true' multiselect-max-items='All' class='form-control' placeholder='Select One Or All the Numbers'>";
                            while($result=mysqli_fetch_assoc($query_run)){
                        	    $item_name=$result['phone_number'];
								echo "<option> $item_name</option>";
                            }
                            echo "</select>";
                        ?>
						
					</div>
					<h4>Username</h4>
					<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Enter Username" required />
					</div>
					<h4>Admin Password</h4>
					<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Enter Your Passwoed" required />
					</div>
					  <div class="col-sm"><br>
						<button name="submit" class="btn btn-success btn-md btn-block" >Send OTP</button>
					  </div>
				  </form>
                                  
                    </div>
                </div>
            </div>
        </div>
		<br><br><br><br><br><br><br>
    </div>

<?php   include ("../pages/footer.php");?>
	<script src="../js/multiselect-dropdown.js"></script>
<script>
$('textarea').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 140) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
  
      
});
</script>

