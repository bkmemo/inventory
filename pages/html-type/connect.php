<?php
	/*
	$query=mysql_connect("localhost","root","");
	if(!$query) print mysql_error();
	$re=mysql_select_db("procurement");
	if(!$re) print mysql_error();
	*/
	function db_connect() {
		$connection = mysqli_connect('localhost', 'root', '', 'procurement') or die(mysqli_connect_error());
		return $connection;
	}
?>