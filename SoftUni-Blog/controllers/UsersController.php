<?php

class UsersController extends BaseController
{
    public function index() {
        $this->authorize();
        $this->users = $this->model->getAll();
    }
    
    public function login()
    {
        if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->login($username, $password);
            if($userId) {
                $_SESSION['username'] = $username;
                $_SESSION['userId'] = $userId;
                $this->addInfoMessage("Login successful");
                $this->redirect("");
            } else {
                $this->addErrorMessage("Error: Login failed");
            }
        }
    }

    public function register()
    {
		if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $full_name = $_POST['full_name'];

            if(strlen($username) <= 1) {
                $this->setValidationError("username", "Username invalid");
            }

            if(strlen($password) <= 1) {
                $this->setValidationError("password", "Password invalid");
            }

            if($password != $password_confirm) {
                $this->setValidationError("password_confirm","Passwords do not match!");
            }

            if($this->formValid()) {
            $userId = $this->model->register($username, $password, $full_name);
            if($userId) {
                $_SESSION['username'] = $username;
                $_SESSION['userId'] = $userId;
                $this->addInfoMessage("Register successful");
                $this->redirect("");
            } else {
                $this->addErrorMessage("Error: Registration failed");
            }
            }
        }
    }

    public function logout()
    {
		session_destroy();
        $this->redirect("");
    }
}
