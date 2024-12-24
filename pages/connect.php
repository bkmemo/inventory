<?php
	function db_connect() {
		$connection = mysqli_connect('localhost', 'root', '', 'stock');
		return $connection;
	}
?>