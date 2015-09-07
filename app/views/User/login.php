<?php
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	include "app/views/User/logout.php";
} else {
	include "app/views/User/login_form.php";
	
}
?>