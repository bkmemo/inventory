<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            <?php 
			include ("connect.php");
			$con = db_connect();
			$query="select * from expenses_incured";
			$query_run=mysqli_query($con,$query);
			while($a=mysqli_fetch_assoc($query_run)){
			echo "['".$a['Descreption']."',".$a['AMOUNT_SPENT']."],";
			
			}


?> 
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>