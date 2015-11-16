<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Models;
use PDO;

/**
 * Description of Image
 *
 * @author porfirovskiy
 */
class Image extends Model {
    
    public $id;
    public $title = "";
    public $description = "";
    public $link = "";
    public $uploadName = "";
    public $size = 0;
    public $date;
    
    public function save() {
        $image = $this->dB->prepare('INSERT INTO images VALUES(NULL, :title, :description, :link, :upload_name, :size, :date)');
        $image->bindValue(':title', $this->title, PDO::PARAM_STR);
        $image->bindValue(':description', $this->description, PDO::PARAM_STR);
        $image->bindValue(':link', $this->link, PDO::PARAM_STR);
        $image->bindValue(':upload_name', $this->uploadName, PDO::PARAM_STR);
        $image->bindValue(':size', $this->size, PDO::PARAM_INT);
        $image->bindValue(':date', $this->date, PDO::PARAM_STR);
        $image->execute();
    }
    
    public function getImage($id) {
        $image= $this->dB->prepare('SELECT * FROM images WHERE id = :id');
        $image->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $image->execute();
        $image = $image->fetch(PDO::FETCH_LAZY);
        return $image;
    }
    
    public function getLastId() {
         $image= $this->dB->prepare('select id FROM images ORDER BY id DESC LIMIT 1');
         $image->execute();
         $image = $image->fetch(PDO::FETCH_LAZY);;
         return $image->id;
    }
    
    public function validateForm() {
        if (isset($this->title) && isset($this->description)) {
            if (!empty($this->title) && !empty($this->description)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
