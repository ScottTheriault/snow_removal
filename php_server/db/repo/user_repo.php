<?php
	require_once(__DIR__ . '/repository.php');

	class userRepo extends Repository {
		function authenticate($user_name, $password) {
			return true;
		}
	}
?>