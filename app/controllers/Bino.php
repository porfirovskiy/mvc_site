<?php

namespace SiteMicroEngine\App\Controllers;

/**
 * Description of Bino
 *
 * @author porfirovskiy
 */
class Bino extends Controller {
    
    public function actionIndex($params = null) {
        $model = $this->getModel();
        $data = ['field' => $model->getFOV(), 'starValue' => $model->getStarValue(), 'light' => $model->getApertureRatio()];
        $this->render('index', $data);
    }
}
