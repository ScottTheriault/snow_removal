<?php
	require_once(__DIR__ . '/user_repo.php');

	$USER_REPO = null;

	function getUserRepo() {
		global $USER_REPO;
		if ($USER_REPO === null) {
			$USER_REPO = new userRepo();
		}
		return $USER_REPO;
	}

	abstract class Repository {
	
	}
?>