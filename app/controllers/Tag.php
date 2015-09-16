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
    
    /**
     * Main page tag
     */
    public function actionIndex() {
        $model = $this->getModel();
        $tags = $model->getAllTags();
        $this->render('index', $tags);
    }
    
    /**
     * Create new tag
     */
    public function actionCreate() {
        $model = $this->getModel();
        if ($this->isAjax()) {
            $model->tag = $_POST['title_tag'];
            $model->date = date("Y-m-d H:i:s");
            if ($model->validateForm() && !$model->ExistTag()) {
                $model->save();
                echo json_encode($model->getLastRecord());
            } else {
                echo 0;
            }
        }
        
    }
    
    public function actionList() {
        $model = $this->getModel();
        if ($this->isAjax()) {
            echo json_encode($model->getTagsList());
        }
    }
    
    public function actionAutoComplete() {
        $model = $this->getModel();
        $model->tag = $_GET['term'];
        echo json_encode($model->getAutCopleteTags());
    }

    /**
     * Check is ajax request
     * @return boolean
     */
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}
