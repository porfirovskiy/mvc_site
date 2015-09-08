<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Modules;

/**
 * Description of Files
 *
 * @author porfirovskiy
 */
class Files extends Module {
    
    const dir = '\images';

    public function saveFile($file) {
        $uploadFile = self::dir.$this->getSubDir().basename($_FILES['file_image']['name']);
        if (move_uploaded_file($_FILES['file_image']['tmp_name'], $uploadFile)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function getSubDir() {
        $subDir = $this->getLastSDir();
        if ($subDir) {
            return $subDir;
        } else {
            mkdir(self::dir.'\dir1');
            return '\dir1\';
        }
        
    }
    
    public function checkDir() {
        
    }
    
    public function createSubDir() {
        
    }
    
    public function getLastSDir() {
        
        $dirs = scandir('images');
        if (count($dirs) > 2) {
            return array_pop($dirs);
        } else {
            return false;
        }
    }

}
