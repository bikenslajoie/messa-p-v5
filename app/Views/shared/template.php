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

function dec($var)
{
    return html_entity_decode($var);
}

$lesArray = array("0029A", "0103A");
if (in_array($_SESSION['account']['parent'], $lesArray)) {
    $_SESSION['lang'] = 'us';
}

$lg = $_SESSION['lang'];

$_SESSION['url_current'] = current_url();

$lesGroupes             = $_SESSION['lesGroupes'];
$lesclassesCompletes     = $_SESSION['lesclassesCompletes'];
foreach ($_SESSION['lesannesactives'] as $anneeactives) {
}

$TotalEns                 = $_SESSION['TotalEns'];
$totaleleve             = $_SESSION['totaleleve'];
$licence_montant         = $_SESSION['licence_montant'];
$TotalParSexe             = $_SESSION['TotalParSexe'];
$totaleleveparclasse    = $_SESSION['totaleleveparclasse'];
$TotalParClasSexe        = $_SESSION['TotalParClasSexe'];
$resultatAnnuel            = $_SESSION['resultatAnnuel'];
$MoyenneDiscipline        = $_SESSION['MoyenneDiscipline'];

$lesgp                     = $_SESSION['lesgp'];
$lespays                = $_SESSION['lespays'];

$lstGroupePromo         = $_SESSION['lstGroupePromo'];
$ListeAnnee             = $_SESSION['ListeAnnee'];

$total_nofifer             = intval($_SESSION['total_nofifer']);
$total_mesnoti             = intval($_SESSION['total_mesnoti']);

$_SESSION['les_codes_federation'] = array('0151A', '0154A');

/*Les clients à montant FIXE
		0034A 	= SOS CAP
		97E		= SOS Cayes
		18E		= SOS Santo
        66D     = La puissance de l'éducation
        0027A   = Institution Sainte Rose de Lima
	*/
$les_clients_montant_fixe = array('0034A', '97E', '18E', '66D', '0027A');


$lamonnaie         = explode(";", $_SESSION['account']['monnaie']);
$les_modules       = explode(",", $_SESSION['droit']['modules']);
$_SESSION['les_classes'] = array();
foreach ($_SESSION['classe_all'] as $row) {
    $_SESSION['les_classes']['groupe'][$row->idgroupe_cours]     = utf8_decode($row->groupe);
    $_SESSION['les_classes']['b1'][$row->idgroupe_cours]         = utf8_decode($row->b1);
}

$tot_anniv = 0;

$lm     = explode("____", $licence_montant);
$sexe     = explode(",", $TotalParSexe);
$pieces = explode(",__", $totaleleveparclasse);

$sexec = explode(",__", $TotalParClasSexe);


if (empty($pieces[1])) {
    $pieces[1]     = "";
}

if (empty($pieces[0])) {
    $pieces[0]    = 0;
}

if (empty($sexec[1])) {
    $sexec[1]     = 0;
}

if (empty($sexec[0])) {
    $sexec[0]    = 0;
}

$eff_m = array('0');
$eff_f = array('0');

if (isset($sexe[0]) and $sexe[0] == "") {
    $eff_m = explode(",", $sexec[0]);
}
if (isset($sexe[1]) and $sexe[1] == "") {
    $eff_f = explode(",", $sexec[1]);
}
$annee = "";
if (isset($anneeactives->periode)) {
    $annee = utf8_decode($anneeactives->periode);
}

$data_rec = "";
if (isset($_SESSION['total_record'])) {
    $data_rec = $_SESSION['total_record'];
}
if (isset($pieces[1])) {
    $les_boites = explode(",", $pieces[1]);
} else {
    $les_boites = array();
}
foreach ($_SESSION['ControleLicence'] as $cl) {
}

$data = [
    'lg'                    => $lg,
    'anneeactives'          => $anneeactives,
    'lang'                  => $lang,
    'ctools'                => $ctools,
    'uri'                   => $uri,
    'lesGroupes'            => $lesGroupes,
    'lesclassesCompletes'   => $lesclassesCompletes,
    'TotalEns'              => $TotalEns,
    'totaleleve'            => $totaleleve,
    'licence_montant'       => $licence_montant,
    'TotalParSexe'          => $TotalParSexe,
    'totaleleveparclasse'   => $totaleleveparclasse,
    'TotalParClasSexe'      => $TotalParClasSexe,
    'resultatAnnuel'        => $resultatAnnuel,
    'MoyenneDiscipline'     => $MoyenneDiscipline,
    'lesgp'                 => $lesgp,
    'lespays'               => $lespays,
    'lstGroupePromo'        => $lstGroupePromo,
    'ListeAnnee'            => $ListeAnnee,
    'total_nofifer'         => $total_nofifer,
    'total_mesnoti'         => $total_mesnoti,
    'les_clients_montant_fixe'     => $les_clients_montant_fixe,
    'lamonnaie'             => $lamonnaie,
    'les_modules'           => $les_modules,
    'tot_anniv'             => $tot_anniv,
    'lm'                    => $lm,
    'sexe'                  => $sexe,
    'pieces'                => $pieces,
    'sexec'                 => $sexec,
    'eff_m'                 => $eff_m,
    'eff_f'                 => $eff_f,
    'annee'                 => $annee,
    'data_rec'              => $data_rec,
    'les_boites'            => $les_boites,
    'cl'                    => $cl
];

echo view('shared/tete.php', $data);
echo view($main_content);
echo view('shared/pied.php');
