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
    public $size = 0;
    public $date;
    
    public function save() {
        $page = $this->dB->prepare('INSERT INTO images VALUES(NULL, :title, :description, :size, :date)');
        $page->bindValue(':title', $this->title, PDO::PARAM_STR);
        $page->bindValue(':description', $this->description, PDO::PARAM_STR);
        $page->bindValue(':size', $this->size, PDO::PARAM_INT);
        $page->bindValue(':date', $this->date, PDO::PARAM_STR);
        $page->execute();
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
