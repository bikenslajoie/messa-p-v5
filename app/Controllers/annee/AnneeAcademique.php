<?php

namespace App\Controllers\Annee;

use App\Models\ParserAnnee;
use App\Controllers\BaseController;

class AnneeAcademique extends BaseController
{

    public function __construct()
    {
        $this->ParserAnnee   = new ParserAnnee();
    }

    public function index()
    {
        //print_r($this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']));
        $data = [
            'act' => 'an',
            'main_content'          => 'annee/annee'
        ];
        echo view('shared/template', $data);
    }

    public function Lister_annee()
    {
        include APPPATH . 'ThirdParty/langue.php';

        $res = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);

        $rs_html = '';
        $titre = $lang['anneeAcademique'][$_SESSION['lang']];
        $btn = "";
        $panel = "";
        foreach ($res as $row) {

            if ($row->etat == '1') {
                $oui = "style=\"background:#99cc99;\"";
                $btn = "<button type=\"button\" onclick=\"Active_anneeAcademique('" . $row->idannee_academique . "','" . $row->periode . "')\" class=\"close\"  data-dismiss=\"panel\">
						<span aria-hidden=\"true\">
						<i class=\"ace-icon fa fa-check fa-2x \"></i>
						</span>
					</button>";
                $panel = "success";
            } else {
                $oui = "";
                $btn = "<button type=\"button\" onclick=\"Active_anneeAcademique('" . $row->idannee_academique . "','" . $row->periode . "')\" class=\"close\"  data-dismiss=\"panel\">
						<span aria-hidden=\"true\">
						<i class=\"ace-icon fa fa-ellipsis-h fa-2x \"></i>
						</span>
					</button>";

                $panel = "danger";
            }

            $rs_html .= "<div class=\"col-lg-3\">
<div class=\"panel panel-" . $panel . "  \">
      <div class=\"panel-body center \" " . $oui . ">

	  <button type=\"button\" onclick=\"Delete_anneeAcademique('" . $lang['txt_alerte'][$_SESSION['lang']] . "','" . $row->idannee_academique . "')\" class=\"close\"  data-dismiss=\"panel\">
			<span aria-hidden=\"true\">
			<i class=\"ace-icon fa fa-trash-o fa-2x\"></i>
			</span>
		</button>

		" . $btn . "

		<strong>" . $lang['anneeAcademique'][$_SESSION['lang']] . "</strong><br />
	  " . $row->periode . "</div>
    </div>
	</div>";
        }

        echo $rs_html;
        exit();
    }

    public function promotion()
    {
        $data['act']         = 'etu';
        $data['promo_etu']     = 'ok';
        $data['page']         = 'promotion';
        $this->load->view('ecoles/template', $data);
    }


    public function fin()
    {

        if (isset($_POST['idconfig_eco_add'])) {
            $ligne = 0;

            foreach ($_POST['idconfig_eco_add'] as $row) {

                $_SESSION['economat']['classe'][$ligne]         = $_POST['classe' . $row];
                $_SESSION['economat']['description'][$ligne]     = $_POST['description' . $row];
                $_SESSION['economat']['montant'][$ligne]         = round($_POST['montant' . $row], 2);
                $_SESSION['economat']['monnaie'][$ligne]         = $_POST['monnaie' . $row];
                $_SESSION['economat']['ordre'][$ligne]         = $_POST['ordre' . $row];

                $ligne++;
            }

            $_SESSION['ligne'] = $ligne;
        }


        $data['act']         = 'etu';
        $data['promo_etu']     = 'ok';
        $data['page']         = 'fin';
        $this->load->view('ecoles/template', $data);
    }
}
