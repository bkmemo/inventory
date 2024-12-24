<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
    error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);

	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
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
          <div class="panel-body" align="center">
            <?php   include ("../pages/cashflow_links.php");?>	              
          </div>
             </div> 
             		
				
				

		<form  method="post" action="save_incured_cashflow.php"  role="form">
        <div class="box box-primary">
			<div class="box-header"><h3 class="box-title" style="color:#333333;">Assign Amount</h3></div>

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
                    	<th>CashFlow Type</th>
                        <th>Descreption</th>
                        <th>Amount</th>
                    </tr>
                </thead>
				<tbody class="detail">
                		<tr> 	
                            <td>
                            <?php 
							    $query="select * from cashflow order by cashflow_type ASC";
                                $query_run=mysqli_query($con,$query);
                                echo "<select id='' name='cashflow_type' class='form-control js-example-basic-single'>";
                                    while($result=mysqli_fetch_assoc($query_run)){
										$cashflow_type=$result['cashflow_type'];
										echo "<option>$cashflow_type</option>";
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