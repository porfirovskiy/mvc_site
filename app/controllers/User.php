<?php

namespace SiteMicroEngine\App\Controllers;

use SiteMicroEngine\App\Core as Core;

class User extends Controller {

    public function actionIndex($params = null) {
        $model = $this->getModel();
        $pages = $model->getAllUsers();
        $this->render('index', $pages);
    }

    public function actionRegistration() {
        $model = $this->getModel();
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        $model->password = $_POST['password'];
        $model->createdDate = date("Y-m-d H:i:s");

        if (isset($_POST['register_user'])) {
            if ($model->validateForm()) {
                if (!$model->userExist()) {
                    $model->save();
                    echo "user created!";
                }
                else {
                    echo "user already exist!";
                }
            }
            else {
                echo "user not created!";
            }
        }
        $this->render('registration');
    }

    public function actionDelete($params = null) {
        $id = $params['id'];
        $model = $this->getModel();
        if (!empty($id)) {
            $model->id = $id;
            $model->delete();
            echo "user deleted!";
        }
    }

    public function actionView($params = null) {
        $user = $this->getModel();
        if (!empty($params['id'])) {
            $user->id = $params['id'];
            $this->render('view', $user->get());
        }
    }

    public function actionUpdate($params = null) {
        $model = $this->getModel();
        $model->id = $params['id'];
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        if ($model->email == $model->getUsersEmail()) {
            $model->email = $model->getUsersEmail();
        }
        $model->password = $_POST['password'];
        if (isset($_POST['update_user'])) {
            if ($model->validateForm()) {
                $model->update();
                echo "User updated!";
            }
            else {
                echo "User not updated!";
            }
        }
        $user = $model->get($params['id']);
        $this->render('update', $user);
    }

    public function actionLogin() {
        $model = $this->getModel();
        $model->name = $_POST['name'];
        $model->password = $_POST['password'];
        if (isset($_POST['login_user'])) {
            if ($model->validateLoginForm()) {
                $user = $model->checkUser();
                if ($user) {
                    $_SESSION['user'] = ['id' => $user->id, 'name' => $user->name];
                    echo "User is login!";
                    var_dump($_SERVER['REQUEST_URI']);
                    die();
                    Core\Web::redirect('/');
                }
                else {
                    echo "User is not login!";
                }
            }
            else {
                echo "User is not login!";
            }
        }
    }

    public function actionLogout() {
        unset($_SESSION['user']);
        session_destroy();
        Core\Web::redirect('/');
    }

}

?>