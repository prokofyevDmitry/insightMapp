<?php
session_destroy();

echo '<script> 
		window.location.replace("index.php");
		exit();
		</script>';