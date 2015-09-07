<?php
namespace SiteMicroEngine\App\Models;
use \SiteMicroEngine\App\Core as Core;

class Model {
	
	protected $db;
	
	public function __construct() {
		$this->dB = Core\Db::getDb();
	}
	
}

?>