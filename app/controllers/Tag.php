<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Controllers;

/**
 * Description of Tag
 *
 * @author porfirovskiy
 */
class Tag extends Controller {
    
    public function actionIndex() {
        $model = $this->getModel();
        $tags = $model->getAllTags();
        $this->render('index', $tags);
    }
}
