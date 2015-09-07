<?php
namespace SiteMicroEngine\App\Core;
use \PDO;

class Db {
	
	private static $connectParams = "mysql:host=localhost;dbname=simple_site;";
	private static $pdoParams = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	);
	
	public static function getDb() {
		return new PDO(self::$connectParams, "root", "1zx23c", self::$pdoParams);
	}
}
?>