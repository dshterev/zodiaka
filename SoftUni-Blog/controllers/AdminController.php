<?php

class AdminController extends BaseController
{
    //    TODO: Контролера не е готов.
    function onInit()
    {
        $this->authorize();
        $this->authorizeAdministration();
    }

    function index() {
        $this->posts = $this->model->getAll();
    }

    function view(int $id) {
        $post = $this->model->getPostById($id);
        if(!$post) {
            $this->addErrorMessage("Error: invalid post");
            $this->redirect("");
        }
        $this->post = $post;
    }
}