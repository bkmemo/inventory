<footer><center><h4>Copyright @ MobileShop.UG Powered By <a href="http://www.mtlictsolutions.com" target="blank">Mtl Ict Solutions</h4><center></footer><!-- /#wrapper -->
	 <script src="../bower_components/jquery/dist/jquery.min.js"></script>
	    <!-- jQuery -->
	<script src="../select2/dist/js/select2.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
	    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

	<script src="../dist/js/dataTables.buttons.min.js"></script>
    <script src="../dist/js/buttons.flash.min.js"></script>
    <script src="../dist/js/jszip.min.js"></script>
    <script src="../dist/js/build/pdfmake.min.js"></script>
    <script src="../dist/js/vfs_fonts.js"></script>
    <script src="../dist/js/buttons.html5.min.js"></script>
    <script src="../dist/js/buttons.print.min.js"></script>
	
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="loader.js"></script>
			<script>  
			
			$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
				 $(document).ready(function(){  
					  $('#employee_data3').DataTable(					  {
						'iDisplayLength': 50,
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 
				 $(document).ready(function(){  
					  $('#employee_data1').DataTable(					  {
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 				 
			</script> 
<script>  
			
			$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
				 $(document).ready(function(){  
					  $('#employee_data4').DataTable(					  {
						'iDisplayLength': 5,
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 
				 $(document).ready(function(){  
					  $('#employee_data1').DataTable(					  {
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 				 
			</script> 
<script>  
			
			$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
				 $(document).ready(function(){  
					  $('#employee_data5').DataTable(					  {
						'iDisplayLength': 10,
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 
				 $(document).ready(function(){  
					  $('#employee_data1').DataTable(					  {
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 				 
			</script> 	

<script>  
			
			$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
				 $(document).ready(function(){  
					  $('#employee_data6').DataTable(					  {
						'iDisplayLength': 5,
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 
				 
	//$(document).ready(function(){  
		$('#onsale_sold_total').DataTable({
			
		});  
	//}); 
				 
				 
				 $(document).ready(function(){  
					  $('#employee_data1').DataTable(					  {
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 				 
			</script> 	

<script>  
			
			$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
				 $(document).ready(function(){  
					  $('#employee_data7').DataTable({
						'iDisplayLength': 5,
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 
				 $(document).ready(function(){  
					  $('#employee_data1').DataTable({
						dom: 'Bfrtip',
						buttons: [
							'csv', 'excel', 'print'
						]
    } );  
				 }); 				 
			</script> 			
		<script type="text/javascript">
        $(function () {
            $('#dopDate').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			$('.date_1').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			 $('#expDate').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			  $('#start_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			 $('#to_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			$('#order_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			 $('#required_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
				$('#exp_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			            $('#open_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
			 $('#close_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
				$('#exp_date').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
		
var isDirty = false;
$(document).ready(function() {
//save all the input values to check later
$('#myform input').each(function() {
  $(this).data('original', $(this).val());
 });

 $(window).bind('beforeunload', function(){
   //to update the dirty flag when there is a different form values 
   $('#myform input').each(function() {
   if ($(this).data('original') != $(this).val()) {
    isDirty = true;
   }
  });
  if (isDirty) {
   return 'You haven\'t saved your changes.';
   }
 
  });
 
});
		
    </script>



	</body>

</html>