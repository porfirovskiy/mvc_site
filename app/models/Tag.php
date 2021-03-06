<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Models;

use PDO;

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

    public function save() {
        $tag = $this->dB->prepare('INSERT INTO tags VALUES(NULL, :tag, :date)');
        $tag->bindValue(':tag', $this->tag, PDO::PARAM_STR);
        $tag->bindValue(':date', $this->date, PDO::PARAM_INT);
        $tag->execute();
    }

    public function getTagsList() {
        $list = $this->dB->query('SELECT id, tag FROM tags')->fetchAll();
        return $list;
    }

    public function getLastRecord() {
        $record = $this->dB->query('SELECT id, tag FROM tags ORDER BY id DESC LIMIT 1')->fetchAll();
        return $record;
    }
    
    public function getAutCopleteTags() {
        $tags = $this->dB->prepare('SELECT tag FROM tags WHERE tag LIKE ?');
        $tag = "%$this->tag%";
        $tags->execute([$tag]);
        return $tags->fetchAll(PDO::FETCH_COLUMN);
    }

    public function validateForm() {
        if (isset($this->tag) && isset($this->date)) {
            if (!empty($this->date) && !empty($this->tag)) {
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
    
    public function ExistTag() {
        $tag = $this->dB->prepare('SELECT id FROM tags WHERE tag=:tag');
        $tag->bindValue(':tag', $this->tag, PDO::PARAM_STR);
        $tag->execute();
        if (empty($tag->fetchAll())) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
