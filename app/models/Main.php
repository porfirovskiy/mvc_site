<?php

namespace SiteMicroEngine\App\Models;

class Main extends Model {

    public $title = "";
    public $text = "";
    public $date;

    public function getAllPages() {
        $page = $this->dB->query('SELECT title, text, date FROM posts')->fetchAll();
        return $page;
    }

}

?>