<?php

class Home extends Controller{
    public function login()
    {
        $data = [
            'nombre' => 'Martel Developer' . '<br>',
            'mensaje' => 'hola suscriptores desde youtube'
        ];
        $this->view('pages/login', $data);
    }
}