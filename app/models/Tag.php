<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Models;

/**
 * Description of Tag
 *
 * @author porfirovskiy
 */
class Tag extends Model {
    
    public $id;
    public $tag;
    public $date;

    public function getAllTags() {
        $tags = $this->dB->query('SELECT id, tag, date FROM tags')->fetchAll();
        return $tags;
    }
}
