<?php
namespace SiteMicroEngine\App\Controllers;

class Main extends Controller {
	
	public function actionIndex($params = null) {
		$model = $this->getModel();
		$pages = $model->getAllPages();
		$this->render('index', $pages);
	}
	
}
?>