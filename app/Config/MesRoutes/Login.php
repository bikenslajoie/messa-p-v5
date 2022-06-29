<?php
$routes->add('auth-messa',      'Login\Login::index', ['filter' => 'noauth']);

$routes->add('login_param/(:any)',               'Login\Login::$1');
$routes->add('reset-mot-de-passe',               'Login\Login::ResetPassword');
$routes->add('connexion-direct/(:any)/(:any)',   'login\login::DirectConnect/$1/$2');
$routes->add('mot-de-passe-oublier',             'Login\Login::OubliePassword');
$routes->add('reset-pass-messa/(:any)/(:any)',   'Login\Login::ResetAuto/$1/$2');
$routes->add('lien-non-valide',                  'Login\Login::LinkNonValide');
$routes->add('no-licence',                       'Login\NoLicence::index');

$routes->post('login-connect',                   'Login\Login::ConnectApp');
$routes->post('login-connectoublie',             'Login\Login::ConnectOublie');
