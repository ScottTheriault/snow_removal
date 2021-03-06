<?php
	require_once(__DIR__ . '/../config.php');

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
	
		protected $table_name;
		function __construct() {
			global $DB_SERVERNAME;
			global $DB_NAME;
			global $DB_USERNAME;
			global $DB_PASSWORD;

			$this->conn = new PDO("mysql:host=" . $DB_SERVERNAME . ";dbname=" . $DB_NAME, $DB_USERNAME, $DB_PASSWORD);
			// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		protected function getModals($sql, $args = array()) {
			$prep = $this->conn->prepare($sql);
			$prep->execute($args);
			return array ('a');
		}

		function getById($uuid){
			$sql = 'SELECT * FROM `' . $this->table_name . '`' .
					' WHERE `uuid` = ?';
			$args = array($uuid);

			$modal = $this->getModals($sql, $args);

			if (isset($modal) && $modal !== null && count($modal)) {
				return $modal;
			}
		}
	}
?>