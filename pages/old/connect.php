<?php
	function db_connect() {
		$connection = mysqli_connect('localhost', 'mtlictsolutions_phonesuser', '8-Suya7SEouO', 'mtlictsolutions_phonesdb');
		return $connection;
	}
?>