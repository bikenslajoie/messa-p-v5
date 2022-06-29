<?php

namespace Config;

class MessaConfig extends \CodeIgniter\Config\BaseConfig
{
    const SERVER = 'http://localhost/';

    public $KeyWs       = "uJvFYsPBmKevLhCaK4EZMHLZuBGFg5ksVCpLuRLTSY37HVyhgRephD4VQV6wRFkxPj4RQ7EghqmZ9XKsLepyySFB4SzxEdLrFWb3";
    public $LienWs = self::SERVER . 'wsmessa/server.php?wsdl';
    public $LienCand    = 'https://mybase.messa.online/ws/candidature.php?wsdl';
}
