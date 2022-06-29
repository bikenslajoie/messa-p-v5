<?php

namespace App\Controllers\Lang;

use App\Controllers\BaseController;

class Langue extends BaseController
{


    public function index()
    {
    }

    public function ChangeLangue()
    {
        $uri = service('uri');
        $_SESSION['lang'] = $uri->getSegment(2);
        $url = $_SESSION['url_current'] ?? 'auth-messa';
        return redirect()->to($url);
    }
}
