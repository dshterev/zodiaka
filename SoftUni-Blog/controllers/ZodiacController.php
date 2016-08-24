<?php

class ZodiacController extends BaseController
{
    //    TODO: Контролера не е готов.
    function index() {
        $this->zodiacs = $this->model->getAll();
    }

    function daily() {
        $this->dailyZodiacs = $this->model->getDaily();
    }

    function month() {
        $this->monthZodiacs = $this->model->getMonth();
    }

    function year() {
        $this->yearZodiacs = $this->model->getYear();
    }
}