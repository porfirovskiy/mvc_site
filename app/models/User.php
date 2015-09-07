<?php

namespace SiteMicroEngine\App\Models;

use PDO;

class User extends Model {

    public $id;
    public $name = "";
    public $email = "porf@save.me";
    public $password;
    public $createdDate;

    public function save() {
        $user = $this->dB->prepare('INSERT INTO users VALUES(NULL, :name, :email, :password, :created_date)');
        $user->bindValue(':name', $this->name, PDO::PARAM_STR);
        $user->bindValue(':email', $this->email, PDO::PARAM_STR);
        $user->bindValue(':password', $this->password, PDO::PARAM_STR);
        $user->bindValue(':created_date', $this->createdDate, PDO::PARAM_STR);
        $user->execute();
    }

    public function delete() {
        $user = $this->dB->prepare('DELETE FROM users WHERE id = :id');
        $user->bindValue(':id', (int) $this->id, PDO::PARAM_INT);
        $user->execute();
    }

    public function get() {
        $user = $this->dB->prepare('SELECT * FROM users WHERE id = :id');
        $user->bindValue(':id', (int) $this->id, PDO::PARAM_INT);
        $user->execute();
        $user = $user->fetch(PDO::FETCH_LAZY);
        return $user;
    }

    public function update() {
        $user = $this->dB->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :user_id');
        $user->bindValue(':name', $this->name, PDO::PARAM_STR);
        $user->bindValue(':email', $this->email, PDO::PARAM_STR);
        $user->bindValue(':password', $this->password, PDO::PARAM_STR);
        $user->bindValue(':user_id', (int) $this->id, PDO::PARAM_INT);
        $user->execute();
    }

    public function login() {
        
    }

    public function userExist() {
        $user = $this->dB->prepare('SELECT * FROM users WHERE email = :email');
        $user->bindValue(':email', $this->email, PDO::PARAM_INT);
        $user->execute();
        $result = $user->fetch(PDO::FETCH_LAZY);
        if (!empty($result)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getUsersEmail() {
        $user = $this->dB->prepare('SELECT * FROM users WHERE id = :id');
        $user->bindValue(':id', (int) $this->id, PDO::PARAM_INT);
        $user->execute();
        $result = $user->fetch(PDO::FETCH_LAZY);
        return $result['email'];
    }

    public function checkUser() {
        $user = $this->dB->prepare('SELECT id, name FROM users WHERE name = :name AND password = :password');
        $user->bindValue(':name', $this->name, PDO::PARAM_STR);
        $user->bindValue(':password', $this->password, PDO::PARAM_STR);
        $user->execute();
        $result = $user->fetch(PDO::FETCH_LAZY);
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }
    }

    public function validateForm() {
        if (isset($this->name) && isset($this->email) && isset($this->password)) {
            if (!empty($this->name) && !empty($this->email) && !empty($this->password)) {
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

    public function validateLoginForm() {
        if (isset($this->name) && isset($this->password)) {
            if (!empty($this->name) && !empty($this->password)) {
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