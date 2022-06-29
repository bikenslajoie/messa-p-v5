<?php

use App\Libraries\Ctools;

$ctools = new Ctools();
$uri = service('uri');
$session = session();

require_once APPPATH . 'ThirdParty/langue.php';
if (empty($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

function hed($var)
{
    return html_entity_decode($var);
}

$lesArray = array("0029A", "0103A");
if (!empty($_SESSION['account']['parent']) and in_array($_SESSION['account']['parent'], $lesArray)) {
    $_SESSION['lang'] = 'us';
}

$lg = $_SESSION['lang'];
$_SESSION['url_current'] = current_url();


$data = [
    'l_lan'                 => $lg,
    'lang'                  => $lang,
    'ctools'                => $ctools,
    'uri'                   => $uri
];

echo view($main_content, $data);
