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
        //$image = $_FILES['file_image'];
        $files = new Modules\Files();
        var_dump($files->getLastSDir());
        //$model = $this->getModel();
        
        //$model->save();
        
        $this->render('create');
    }
}
