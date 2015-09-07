<?php
namespace SiteMicroEngine\App\Core;

class Web {
	public static function redirect($path) {
		header("Location: ".$path);
	}
}
?>