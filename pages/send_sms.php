<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
    error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	 if(isset($_POST['submit'])){
            require_once 'bulk/sms.php';
            $livesms = new SMS();
            @$phone=$_POST['customer_phone'];
            @$phone=preg_replace('/^0/','+256',$phone);
            @$message=$_POST['message'];
            @$result = $livesms->send($phone, $message);
          }   
          if (@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-primary" role="alert">
            '.@$result['message'].'
            </div>';
          }elseif (!@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-danger" role="alert">
            '.@$result['message'].'
            </div>';
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
<body>

    <div id="wrapper">
<?php   include ("../pages/side.php");?>
        <div id="page-wrapper">
		<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h2>Send Bulky SMS Now To Mobile Shop Customers</h2>
								</div>
							</div>
						</div>
		</div>
            <div class="row">				
                <div class="col-lg-12">
                <div class="col-md-12">
                 		<div class="box box-primary">
			<!-- <div class="box-header"><h3 class="box-title" style="color:#333333;">Report</h3></div> -->  
           <form  method="post" action="send_sms.php"  role="form">
           <table width="100%">
           		<tr>
                   <th>From</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="dopDate" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="search_value1" value="<?php echo $date1; ?>"  /></th>
                    <th>To</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="expDate" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="search_value2" value="<?php echo $date2; ?>"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Generate Contacts" class="btn btn-lg btn-danger"></th>
                </tr>
           </table>
           </form><br><br>
<?php
			$date1=date('Y-m-d');
			$date2=$date1;
		   if(isset($_POST['search'])){
		   		$date1 = $_POST['search_value1'];
				$date1 = strtotime( $date1 );
				$date1 = date( 'Y-m-d', $date1 );
				
				$date2 = $_POST['search_value2'];
				$date2 = strtotime( $date2 );
				$date2 = date( 'Y-m-d', $date2 );
		   }
?>
				   <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
				   <h4>Choose Phones</h4>
					<div class="form-group">
					  
                <?php 
						    $count = 0;
                            $query="select * from phones  WHERE customer_phone IS NOT NULL AND PDATE_OF_SALE BETWEEN '$date1' AND '$date2';";
                            $query_run=mysqli_query($con,$query);
                            echo "<select name='customer_phone[]'  multiple multiselect-search='true' multiselect-select-all='true' multiselect-max-items='All' class='form-control' placeholder='Select One Or All the Numbers'>";
                            while($result=mysqli_fetch_assoc($query_run)){
                        	    $item_name=$result['customer_phone'];
								echo "<option>$item_name</option>";
                            }
                            echo "</select>";
                        ?>
						
					</div>
					<div class="form-group textarea-group">
					  <h4>Compose Message<h4>
						<textarea name="message" id="the-textarea" maxlength="160" placeholder="Start Typin..."autofocus></textarea>
					    <div id="the-count">
						<span id="current">0</span>
						<span id="maximum">/ 160</span>
					  </div>
					</div>
					  <div class="col-sm"><br>
						<button name="submit" class="btn btn-info btn-lg btn-block">SEND NOW</button>
					  </div>
				  </form>
		</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
   <?php   include ("../pages/footer.php");?>  
</body>

</html>
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