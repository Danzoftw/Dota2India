<?php
	if(isset($_POST['country'])) {
		$country = $_POST['country'];
    if ($country) echo $country+'ts';
    else echo 'error';
}