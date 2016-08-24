<?php

class ZodiacController extends BaseController
{
    //    TODO: Контролера не е готов.
    function index() {
        $this->chinese_zodiacs = $this->model->getAll();
    }
}