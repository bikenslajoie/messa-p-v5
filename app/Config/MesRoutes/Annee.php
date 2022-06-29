<?php

$routes->add('annee-academique', 'annee\AnneeAcademique::index');
$routes->add('lister-annee-academique', 'annee\AnneeAcademique::Lister_annee');

$routes->add('changement-annee-academique', 'annee\AnneeAcademique::promotion');
$routes->add('fin', 'annee\AnneeAcademique::fin');
$routes->add('bienvenue', 'ecoles/Home/welcome');
$routes->add('messa-erreur', 'ecoles/Home/erreur');
