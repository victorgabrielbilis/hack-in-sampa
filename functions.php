<?php
	
	function connect_DB()
	{
		$connection = mysqli_connect("localhost","root","bcd127","hackinsampa");
		mysqli_set_charset($connection,"utf8");
		return $connection;
	}
	
?>
