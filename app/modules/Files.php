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
        $imageinfo = $_FILES['file_image'];
        //echo '<pre>';var_dump($_FILES['file_image']);
        if ($this->checkUpload()) {
            if (move_uploaded_file($_FILES['file_image']['tmp_name'], $uploadFile)) {
                $imageinfo['link'] = $uploadFile;
                //echo '<pre>';var_dump($imageinfo);
                return $imageinfo;
            }
            else {
                return FALSE;
            }
        } else {
           echo "Sorry, we only accept images!";
           return FALSE;
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
            return FALSE;
        }
    }
    
    /**
     * Check upload of file
     * @return boolean
     */
    public function checkUpload() {
        $imageinfo = getimagesize($_FILES['file_image']['tmp_name']);
        if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg') {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
