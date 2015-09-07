<?php

namespace SiteMicroEngine\App\Models;

use PDO;

class Page extends Model {

    public $id;
    public $title = "";
    public $text = "";
    public $date;

    public function getAllPages() {
        $page = $this->dB->query('SELECT title, text, date FROM posts')->fetchAll();
        return $page;
    }

    public function getPage($id) {
        $page = $this->dB->prepare('SELECT * FROM posts WHERE id = :id');
        $page->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $page->execute();
        $page = $page->fetch(PDO::FETCH_LAZY);
        return $page;
    }

    public function save() {
        $page = $this->dB->prepare('INSERT INTO posts VALUES(NULL, :title, :text, :date)');
        $page->bindValue(':title', $this->title, PDO::PARAM_STR);
        $page->bindValue(':text', $this->text, PDO::PARAM_INT);
        $page->bindValue(':date', $this->date, PDO::PARAM_INT);
        $page->execute();
    }

    public function update() {
        $post = $this->dB->prepare('UPDATE posts SET title = :title, text = :text WHERE id = :page_id');
        $post->bindValue(':title', $this->title, PDO::PARAM_STR);
        $post->bindValue(':text', $this->text, PDO::PARAM_STR);
        $post->bindValue(':page_id', (int) $this->id, PDO::PARAM_INT);
        $post->execute();
    }

    public function delete() {
        $page = $this->dB->prepare('DELETE FROM posts WHERE id = :id');
        $page->bindValue(':id', (int) $this->id, PDO::PARAM_INT);
        $page->execute();
    }

    public function validateForm() {
        if (isset($this->title) && isset($this->text)) {
            if (!empty($this->title) && !empty($this->text)) {
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

?>