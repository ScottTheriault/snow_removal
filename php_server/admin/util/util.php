<?
	class Util {
		function getArg($name) {
			if (isset($_GET[$name])) {
				return $_GET[$name];
			} else if (isset($_POST[$name])) {
				return $_POST[$name];
			} else {
				return null;
			}
		}

		function isBlank($input) {
			if (isset($input) && $input !== null && $input !== '') {
				return false;
			} else {
				return true;
			}
		}
	}
?>