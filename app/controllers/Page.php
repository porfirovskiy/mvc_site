<?php

namespace SiteMicroEngine\App\Controllers;

class Page extends Controller {

    public function actionIndex($params = null) {
        $model = $this->getModel();
        $pages = $model->getAllPages();
        $this->render('index', $pages);
    }

    public function actionView($params = null) {
        $model = $this->getModel();
        $page = $model->getPage($params['id']);
        $this->render('page', $page);
    }

    public function actionCreate($params = null) {
        $model = $this->getModel();
        $model->title = $_POST['title'];
        $model->text = $_POST['text'];
        $model->date = date("Y-m-d H:i:s");
        if (isset($_POST['save_page'])) {
            if ($model->validateForm()) {
                $model->save();
                echo "Page created!";
            }
            else {
                echo "page not saved!";
            }
        }
        $this->render('create');
    }

    public function actionUpdate($params = null) {
        $model = $this->getModel();
        $model->id = $params['id'];
        $model->title = $_POST['title'];
        $model->text = $_POST['text'];
        if (isset($_POST['update_page'])) {
            if ($model->validateForm()) {
                $model->update();
                echo "Page updated!";
            }
            else {
                echo "page not updated!";
            }
        }
        $page = $model->getPage($params['id']);
        $this->render('update', $page);
    }

    public function actionDelete($params = null) {
        $model = new \SiteMicroEngine\App\Models\Page();
        $model->id = $params['id'];
        $model->delete();
    }

}

?>