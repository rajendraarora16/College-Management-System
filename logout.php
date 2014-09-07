<?php
	session_destroy();
	require("conection/connect.php");
	header("Location: index.php");
?>
