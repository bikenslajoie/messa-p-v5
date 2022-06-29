<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;

class Nolicence extends BaseController

{
    public function index()
    {
        $session = session();
        $session->destroy();

        $data = [
            'main_content'          => 'login/nolicence'
        ];
        echo view('shared/templatelogin', $data);
    }
}
