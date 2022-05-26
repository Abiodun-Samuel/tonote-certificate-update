<?php require_once('../private/initialize.php');

	if ($loggedInAdmin->admin_level == 1) {
		redirect_to(url_for('/public/dashboard/'));
	}else if ($loggedInAdmin->admin_level == 3) {
		redirect_to(url_for('/public/support/'));
	}else{
		redirect_to(url_for('/public/dashboard/'));
	}
 ?>