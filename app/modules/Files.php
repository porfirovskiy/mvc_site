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
    
    const dir = 'images';
    
    /**
     * Load image file 
     * @return boolean, array
     */
    public function saveFile() {
        
        $uploadFile = self::dir.'/'.$this->getSubDir().'/'.basename($_FILES['file_image']['name']);
        //var_dump($uploadFile);
        if (move_uploaded_file($_FILES['file_image']['tmp_name'], $uploadFile)) {
            return true;
        }
        else {
            return false;
        }
        
    }
    
    /**
     * Get sub directory for save new image 
     * @return string
     */
    public function getSubDir() {
        $subDir = $this->getLastSDir();
        if ($subDir) {
            if (count(scandir(self::dir.'/'.$subDir)) > 1002) {
                $subDir++;
                $subDir = self::dir.'/'.$subDir;
                mkdir($subDir);
                return $subDir;
            } else {
                return $subDir;
            }
        } else {
            mkdir(self::dir.'\1');
            return '1';
        }
    }
    
    /**
     * Return last directory with images
     * @return boolean or string
     */
    
    public function getLastSDir() {
        $dirs = scandir(self::dir);
        if (count($dirs) > 2) {
            asort($dirs);
            return array_pop($dirs);
        } else {
            return false;
        }
    }

}
