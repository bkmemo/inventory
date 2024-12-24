<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);

	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control js-example-basic-single'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option>$category_name</option>";
                    }
                    echo "</select>";
               }
               else{
                    echo "<h4><font color='#ff0000'>$error</font></h4>";
               }
         }
         else{
              echo "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function
?>  



<!DOCTYPE html>
<html lang="en">

<?php   include ("../pages/header.php");?> 

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
        <div id="page-wrapper">
            <div class="row">
          <div class="col-lg-12">
          <div class="panel-body" align="right">
            <p>
                            <a href="add_expenses.php"><button type="button" class="btn btn-primary">Add Expense Type</button></a>
                            <a href="manage_expenses.php"><button type="button" class="btn btn-primary">View Expenses Type</button></a>
              <a href="incure_expenses.php"><button type="button" class="btn btn-primary">Enter Expense Incured</button></a>
                            <a href="expenses_history.php"><button type="button" class="btn btn-primary">Expense History</button></a>
                        </p>               
          </div>
             </div> 
             		
				
				

		<form  method="post" action="save_incured_expenses.php"  role="form">
        <div class="box box-primary">
			<div class="box-header"><h3 class="box-title" style="color:#333333;">Expenses</h3></div>
			 
           <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <?php //get__expense_totals(); ?>
           <br />
           <table width="95%">
           		<tr>
                	<th><h4 class="box-title" >Add New &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                	<th><p style="float:right;">Date <input style="float:right; text-align:center; width:50%; margin-right:25px;" id="dopDate" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="expense_date"  ></p></th>
                </tr>
           </table><br />
		   <table class="table table-bordered table-hover">
           		<thead>
                	<tr>
                    	<th>Expense Type</th>
                        <th>Descreption</th>
                        <th>Amount</th>
                    </tr>
                </thead>
				<tbody class="detail">
                		<tr> 
                            <td>
                            <?php 
							    $query="select * from expenses order by EXPENSE_NAME ASC";
                                $query_run=mysqli_query($con,$query);
                                echo "<select id='' name='expense_name' class='form-control'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
										$expense_name=$result['EXPENSE_NAME'];
										echo "<option>$expense_name</option>";
                                    }
                                echo "</select>";
                            ?>
                            </td>
                            <td><textarea type="text" class="form-control"  name="Descreption"  ></textarea></td>
                            <td><input type="text" class="form-control"  name="amount_spent"  ></td>
                        </tr>
				</tbody>
            </table>
			<div align="right"><button type="submit" name="save" class="btn btn-primary">Save Record</button></div>		 							
			</form>	
           </div> <!-- /.col-lg-12 -->
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>
	
</body>
</html>