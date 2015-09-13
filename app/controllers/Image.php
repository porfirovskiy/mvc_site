<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Controllers;

use SiteMicroEngine\App\Modules as Modules;

/**
 * Description of Images
 *
 * @author porfirovskiy
 */
class Image extends Controller {

    public function actionCreate() {

        $model = $this->getModel();
        $model->title = $_POST['title'];
        $model->description = $_POST['description'];
        $model->date = date("Y-m-d H:i:s");
        
        if (isset($_POST['add_image'])) {
            if ($model->validateForm()) {
                
                $files = new Modules\Files();
                $image = $files->saveFile();
                
                if ($image) {
                    $model->link = $image['link'];
                    $model->uploadName = $image['name'];
                    $model->size = $image['size'];
                    $model->save();
                    echo 'ok';
                }
                else {
                    echo 'not ok';
                }
                
            }
            else {
                echo 'Name or description is empty!';
            }
        }
        $this->render('create');
    }
    
    public function actionView($params) {
        $model = $this->getModel();
        $image = $model->getImage($params['id']);
        $this->render('view', $image);
    }

}
