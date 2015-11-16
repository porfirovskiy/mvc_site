<?php

namespace SiteMicroEngine\App\Models;
use PDO;

/**
 * Model for relation images vs tags 
 *
 * @author porfirovskiy
 */
class ImgTag extends Model{
    
    public $id;
    public $id_image;
    public $id_tag;
    
    public function save() {
        $db = $this->dB->prepare('INSERT INTO img_tag VALUES(NULL, :id_image, :id_tag)');
        $db->bindValue(':id_image', $this->id_image, PDO::PARAM_INT);
        $db->bindValue(':id_tag', $this->id_tag, PDO::PARAM_INT);
        $db->execute();
    }
}
