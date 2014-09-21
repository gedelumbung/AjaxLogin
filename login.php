<?php
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == 'lumbung' && $password == 'lumbung')
		{
			echo "1";	
		}
		else
		{
			echo "0";
		}
	
?>