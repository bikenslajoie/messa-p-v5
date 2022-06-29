<?php

namespace App\Controllers;

use App\Models\Parser;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->Parser       = new Parser();
    }

    public function index()
    {
        return redirect()->to('app');
    }

    public function app()
    {
        $annee = "";
        foreach ($_SESSION['lesannesactives'] as $anneeactives) {
            $annee = utf8_decode($anneeactives->periode);
        }

        if (isset($_SESSION['pass']) and $_SESSION['pass'] == "password") {
            return redirect()->to('reset-password');
            exit();
        }
        $data = [
            'les_connect_parents'   => $_SESSION['ConnectedParent'],
            'main_content'          => 'home/home'
        ];
        echo view('shared/template', $data);
    }
}
