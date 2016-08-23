<?php

class AdminController extends BaseController
{
    //    TODO: Контролера не е готов.
    function index() {
        $this->posts = $this->model->getAll();
    }
}