<?php
	require_once(__DIR__ . '/repository.php');

	class userRepo extends Repository {
		protected $table_name = 'user';

		function authenticate($user_name, $password) {
			return $this->getById(1);
		}
	}
?>