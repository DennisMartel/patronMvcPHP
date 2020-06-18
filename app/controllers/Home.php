<?php

class Home extends Controller{
    public function __construct()
    {
        $this->user = $this->model('HomeM');
    }
    public function login()
    {
        echo $this->user->getUser();
        $this->view('pages/login');
    }
}