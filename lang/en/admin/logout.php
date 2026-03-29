<?PHP
	session_start();
	//session_write_close(); 
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	echo '<script>window.location="index.php";</script>';
?>