<?php
	$name = $util->getArg('user_name');
	$password = $util->getArg('password');

	$error = '';
	if (!$util->isBlank($name) && !$util->isBlank($password)) {
		$user_repo = getUserRepo();
	} else  if (!$util->isBlank($name)) {
		$error = "password required";
	} else if (!$util->isBlank($password)) {
		$error = "user name required";
	}
?>