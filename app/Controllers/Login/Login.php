<?php

namespace App\Controllers\Login;

use App\Models\Parser;
use App\Models\ParserHome;
use App\Models\ParserAnnee;
use App\Models\ParserLogin;
use App\Controllers\BaseController;

class Login extends BaseController
{

    public function __construct()
    {
        $this->ParserLogin  = new ParserLogin();
        $this->ParserHome   = new ParserHome();
        $this->Parser       = new Parser();
        $this->ParserAnnee  = new ParserAnnee();
    }

    public function index()
    {
        $data = [
            'main_content'          => 'login/login'
        ];
        echo view('shared/templatelogin', $data);
    }

    public function ConnectOublie()
    {


        $result    = $this->ParserLogin->ResetMpPersonnel($_POST['loginname2']);

        if ($result == "ok") {
            echo "1";
        } else {
            echo "ERR_CONN";
        }
        //
        exit();
    }

    public function ConnectApp()
    {

        //=======================


        if (!empty($_POST['log'])) {

            $result    =    $this->ParserLogin->SeconnecterAdmin($_POST['loginname'], $_POST['passlogin']);

            foreach ($result as $row) {
            }

            if (isset($row->identreprise) and $row->identreprise != "") {
                $_SESSION['account']['id']                 = $row->identreprise;
                $_SESSION['account']['nom']             = strtoupper($row->nompers);
                $_SESSION['account']['prenom']             = $row->prenompers;
                $_SESSION['account']['email']             = $row->adresse_email;
                $_SESSION['account']['identifiant']     = $row->adresse_email;
                $_SESSION['account']['institution']     = $row->entreprise;
                $_SESSION['account']['groupe']             = "admin";
                $_SESSION['account']['parent']             = $row->codedoralya;
                $_SESSION['account']['idlogin']            = "";
                $_SESSION['account']['code']            = $row->codedoralya;
                $_SESSION['account']['logo']            = $row->logodata;
                $_SESSION['account']['type']            = $row->typeent;
                $_SESSION['account']['monnaie']            = $row->monnaie;


                $_SESSION['lesGroupes']             = $this->ParserLogin->ListeGroup($_SESSION['account']['parent']);
                $_SESSION['lesannesactives']         = $this->ParserLogin->ListeAnneeActive($_SESSION['account']['parent']);
                $_SESSION['lesclassesCompletes']     = $this->ParserLogin->ListeClasseComplet($_SESSION['account']['parent']);

                $_SESSION['droit']['groupe']         = "admin";

                $_SESSION['droit']['emp_afficher']     = "1";
                $_SESSION['droit']['emp_ajouter']     = "1";
                $_SESSION['droit']['emp_modifier']     = "1";
                $_SESSION['droit']['emp_supprimer'] = "1";

                $_SESSION['droit']['eco_afficher']     = "1";
                $_SESSION['droit']['eco_ajouter']     = "1";
                $_SESSION['droit']['eco_modifier']     = "1";
                $_SESSION['droit']['eco_supprimer'] = "1";


                $_SESSION['droit']['dep_afficher']     = "1";
                $_SESSION['droit']['dep_ajouter']     = "1";
                $_SESSION['droit']['dep_modifier']     = "1";
                $_SESSION['droit']['dep_supprimer'] = "1";

                $_SESSION['droit']['elev_afficher'] = "1";
                $_SESSION['droit']['elev_ajouter']     = "1";
                $_SESSION['droit']['elev_modifier'] = "1";
                $_SESSION['droit']['elev_supprimer'] = "1";

                $_SESSION['droit']['note_afficher'] = "1";
                $_SESSION['droit']['note_ajouter']     = "1";
                $_SESSION['droit']['note_modifier'] = "1";
                $_SESSION['droit']['note_supprimer'] = "1";
                $_SESSION['droit']['note_choix']    = "1";

                $_SESSION['droit']['recu_afficher']     = "1";
                $_SESSION['droit']['recu_ajouter']         = "1";
                $_SESSION['droit']['recu_modifier']     = "1";
                $_SESSION['droit']['recu_supprimer']     = "1";

                $_SESSION['droit']['conf_peda']         = "1";
                $_SESSION['droit']['conf_adm']             = "1";
                $_SESSION['droit']['conf_eco']             = "1";

                $_SESSION['droit']['p1'] = "1";
                $_SESSION['droit']['p2'] = "1";
                $_SESSION['droit']['p3'] = "1";
                $_SESSION['droit']['p4'] = "1";
                $_SESSION['droit']['p5'] = "1";
                $_SESSION['droit']['p6'] = "1";
                $_SESSION['droit']['p7'] = "1";
                $_SESSION['droit']['p8'] = "1";
                $_SESSION['droit']['p9'] = "1";
                $_SESSION['droit']['p10'] = "1";
                $_SESSION['droit']['p11'] = "1";
                $_SESSION['droit']['p12'] = "1";

                $_SESSION['droit']['m1'] = "1";
                $_SESSION['droit']['m2'] = "1";
                $_SESSION['droit']['m3'] = "1";
                $_SESSION['droit']['m4'] = "1";
                $_SESSION['droit']['m5'] = "1";
                $_SESSION['droit']['m6'] = "1";
                $_SESSION['droit']['m7'] = "1";
                $_SESSION['droit']['m8'] = "1";
                $_SESSION['droit']['m9'] = "1";
                $_SESSION['droit']['m10'] = "1";
                $_SESSION['droit']['m11'] = "1";
                $_SESSION['droit']['m12'] = "1";

                $_SESSION['droit']['modules'] = $row->modules;

                $_SESSION['pass'] = $_POST['passlogin'];

                $track    =    $this->ParserLogin->AddTracking("Connexion", $_SESSION['account']['idlogin'] . "-" . $_SESSION['account']['prenom'] . " " . $_SESSION['account']['nom'], $_SESSION['account']['parent']);

                // Update DashBoard ==

                foreach ($_SESSION['lesannesactives'] as $anneeactives) {
                }

                $annee = $anneeactives->periode ?? '';

                $_SESSION['TotalEns']                  = $this->ParserHome->ComptePers($_SESSION['account']['parent']);
                $_SESSION['totaleleve']              = $this->ParserHome->TotalEleve($annee, "", $_SESSION['account']['parent']);
                $_SESSION['licence_montant']         = $this->ParserHome->LicenceDispo($_SESSION['account']['parent']);
                $_SESSION['TotalParSexe']              = $this->ParserHome->TotalParSexe($annee, "", $_SESSION['account']['parent']);
                $_SESSION['totaleleveparclasse']    = $this->ParserHome->ListParClasse($annee, $_SESSION['account']['parent']);
                $_SESSION['TotalParClasSexe']        = $this->ParserHome->ListParClasseSexe($annee, $_SESSION['account']['parent']);
                $_SESSION['resultatAnnuel']            = $this->ParserHome->ResultatAnnuel($annee, $_SESSION['account']['parent']);
                $_SESSION['MoyenneDiscipline']        = $this->ParserHome->MoyenneDiscipline($annee, $_SESSION['account']['parent']);

                $_SESSION['lesgp']                     = $this->Parser->ListeGP($_SESSION['account']['parent']);
                $_SESSION['lespays']                   = $this->Parser->LstPays();
                $_SESSION['ConnectedParent'] = intval($this->Parser->ConnectedParent($annee, $_SESSION['account']['parent']));
                $_SESSION['lstGroupePromo']         = $this->ParserLogin->lstGroupePromo($_SESSION['account']['parent']);
                $_SESSION['ListeAnnee']             = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);
                $_SESSION['ListeAccesClasse']        = $this->Parser->ListeAccesClasse($_SESSION['account']['idlogin'], $_SESSION['account']['parent']);
                $_SESSION['total_nofifer']             = intval($this->Parser->TotalNotifier('0', $_SESSION['account']['parent']));
                $_SESSION['total_mesnoti']             = intval($this->Parser->TotalNotifier('1', $_SESSION['account']['parent']));

                $_SESSION['ControleLicence'] = $this->Parser->ControleLicence($_SESSION['account']['parent']);

                $_SESSION['liste_definitive'] = 0;
                $res = $this->Parser->Liste_definitive_annee($_SESSION['account']['parent']);
                foreach ($res as $row) {
                    if ($row->etat == '1' and $row->letat == '0') {
                        $_SESSION['liste_definitive'] = 1;
                    }
                }
                $res = $this->Parser->SetPinnApp($_SESSION['account']['parent']);

                $_SESSION['rap_annee'] = $this->Parser->AnneePaiementEco($_SESSION['account']['parent']);

                $_SESSION['classe_all'] = $this->Parser->ClasseAll($_SESSION['account']['parent']);
                $_SESSION['anniv']     = $this->Parser->GetAnniversaire($annee, $_SESSION['account']['parent']);
                //======================	

                echo "1";
                exit();
            } else {

                $result2    =    $this->ParserLogin->SeconnecterUser($_POST['loginname'], $_POST['passlogin']);
                foreach ($result2 as $row2) {
                }

                if (isset($row2->idcollaborateur) and $row2->idcollaborateur != "") {
                    $_SESSION['account']['id']                 = "";
                    $_SESSION['account']['nom']             = $row2->nom;
                    $_SESSION['account']['prenom']             = $row2->prenom;
                    $_SESSION['account']['email']             = $row2->adressemail;
                    $_SESSION['account']['identifiant']     = $row2->identifiant;
                    $_SESSION['account']['institution']     = $row2->entreprise;
                    $_SESSION['account']['groupe']             = $row2->idgroupe_user;
                    $_SESSION['account']['parent']             = $row2->codedoralya;
                    $_SESSION['account']['idlogin']            = $row2->idcollaborateur;
                    $_SESSION['account']['code']            = $row2->codedoralya;
                    $_SESSION['account']['logo']            = $row->logodata;
                    $_SESSION['account']['type']            = $row2->typeent ?? '';
                    $_SESSION['account']['monnaie']            = $row2->monnaie ?? '';

                    $_SESSION['account']['fac']                 = $row2->fac ?? "";


                    $_SESSION['lesGroupes']             = $this->ParserLogin->ListeGroup($_SESSION['account']['parent']);
                    $_SESSION['lesannesactives']         = $this->ParserLogin->ListeAnneeActive($_SESSION['account']['parent']);
                    $_SESSION['lesclassesCompletes']     = $this->ParserLogin->ListeClasseComplet($_SESSION['account']['parent']);

                    $mesdroits = $this->ParserLogin->DroitGroup($row2->idgroupe_user);
                    foreach ($mesdroits as $rdw) {
                    }
                    $_SESSION['droit']['groupe'] = $rdw->nom_groupe ?? '';

                    $_SESSION['droit']['emp_afficher']     = $rdw->emp_afficher ?? '';
                    $_SESSION['droit']['emp_ajouter']     = $rdw->emp_ajouter ?? '';
                    $_SESSION['droit']['emp_modifier']     = $rdw->emp_modifier ?? '';
                    $_SESSION['droit']['emp_supprimer'] = $rdw->emp_supprimer ?? '';

                    $_SESSION['droit']['eco_afficher']     = $rdw->eco_afficher ?? '';
                    $_SESSION['droit']['eco_ajouter']     = $rdw->eco_ajouter ?? '';
                    $_SESSION['droit']['eco_modifier']     = $rdw->eco_modifier ?? '';
                    $_SESSION['droit']['eco_supprimer'] = $rdw->eco_supprimer ?? '';


                    $_SESSION['droit']['dep_afficher']     = $rdw->dep_afficher ?? '';
                    $_SESSION['droit']['dep_ajouter']     = $rdw->dep_ajouter ?? '';
                    $_SESSION['droit']['dep_modifier']     = $rdw->dep_modifier ?? '';
                    $_SESSION['droit']['dep_supprimer'] = $rdw->dep_supprimer ?? '';

                    $_SESSION['droit']['elev_afficher'] = $rdw->elev_afficher ?? '';
                    $_SESSION['droit']['elev_ajouter']     = $rdw->elev_ajouter ?? '';
                    $_SESSION['droit']['elev_modifier'] = $rdw->elev_modifier ?? '';
                    $_SESSION['droit']['elev_supprimer'] = $rdw->elev_supprimer ?? '';

                    $_SESSION['droit']['note_afficher'] = $rdw->note_afficher ?? '';
                    $_SESSION['droit']['note_ajouter']     = $rdw->note_ajouter ?? '';
                    $_SESSION['droit']['note_modifier'] = $rdw->note_modifier ?? '';
                    $_SESSION['droit']['note_supprimer'] = $rdw->note_supprimer ?? '';
                    $_SESSION['droit']['note_choix']    = $rdw->note_choix ?? '';

                    $_SESSION['droit']['recu_afficher'] = $rdw->recu_afficher ?? '';
                    $_SESSION['droit']['recu_ajouter']     = $rdw->recu_ajouter ?? '';
                    $_SESSION['droit']['recu_modifier'] = $rdw->recu_modifier ?? '';
                    $_SESSION['droit']['recu_supprimer'] = $rdw->recu_supprimer ?? '';

                    $_SESSION['droit']['conf_peda']         = $rdw->conf_pedagogique ?? '';
                    $_SESSION['droit']['conf_adm']             = $rdw->configuration ?? '';
                    $_SESSION['droit']['conf_eco']             = $rdw->vente_retour ?? '';


                    $_SESSION['droit']['p1'] = $row2->p1     ?? '0';
                    $_SESSION['droit']['p2'] = $row2->p2     ?? '0';
                    $_SESSION['droit']['p3'] = $row2->p3     ?? '0';
                    $_SESSION['droit']['p4'] = $row2->p4     ?? '0';
                    $_SESSION['droit']['p5'] = $row2->p5     ?? '0';
                    $_SESSION['droit']['p6'] = $row2->p6     ?? '0';
                    $_SESSION['droit']['p7'] = $row2->p7     ?? '0';
                    $_SESSION['droit']['p8'] = $row2->p8     ?? '0';
                    $_SESSION['droit']['p9'] = $row2->p9     ?? '0';
                    $_SESSION['droit']['p10'] = $row2->p10     ?? '0';
                    $_SESSION['droit']['p11'] = $row2->p11     ?? '0';
                    $_SESSION['droit']['p12'] = $row2->p12     ?? '0';

                    $_SESSION['droit']['m1'] = $row2->m1     ?? '0';
                    $_SESSION['droit']['m2'] = $row2->m2     ?? '0';
                    $_SESSION['droit']['m3'] = $row2->m3     ?? '0';
                    $_SESSION['droit']['m4'] = $row2->m4     ?? '0';
                    $_SESSION['droit']['m5'] = $row2->m5     ?? '0';
                    $_SESSION['droit']['m6'] = $row2->m6     ?? '0';
                    $_SESSION['droit']['m7'] = $row2->m7     ?? '0';
                    $_SESSION['droit']['m8'] = $row2->m8     ?? '0';
                    $_SESSION['droit']['m9'] = $row2->m9     ?? '0';
                    $_SESSION['droit']['m10'] = $row2->m10     ?? '0';
                    $_SESSION['droit']['m11'] = $row2->m11     ?? '0';
                    $_SESSION['droit']['m12'] = $row2->m12     ?? '0';
                    $_SESSION['pass'] = $_POST['passlogin'];
                    $_SESSION['droit']['modules'] = $row2->modules;

                    $track    =    $this->ParserLogin->AddTracking("Connexion", $_SESSION['account']['idlogin'] . "-" . $_SESSION['account']['prenom'] . " " . $_SESSION['account']['nom'], $_SESSION['account']['parent']);

                    // Update DashBoard ==
                    $annee = "";
                    foreach ($_SESSION['lesannesactives'] as $anneeactives) {
                    }
                    $annee = $anneeactives->periode ?? "";
                    $_SESSION['TotalEns']                  = $this->ParserHome->ComptePers($_SESSION['account']['parent']);
                    $_SESSION['totaleleve']              = $this->ParserHome->TotalEleve($annee, "", $_SESSION['account']['parent']);
                    $_SESSION['licence_montant']         = $this->ParserHome->LicenceDispo($_SESSION['account']['parent']);
                    $_SESSION['TotalParSexe']              = $this->ParserHome->TotalParSexe($annee, "", $_SESSION['account']['parent']);
                    $_SESSION['totaleleveparclasse']    = $this->ParserHome->ListParClasse($annee, $_SESSION['account']['parent']);
                    $_SESSION['TotalParClasSexe']        = $this->ParserHome->ListParClasseSexe($annee, $_SESSION['account']['parent']);
                    $_SESSION['resultatAnnuel']            = $this->ParserHome->ResultatAnnuel($annee, $_SESSION['account']['parent']);
                    $_SESSION['MoyenneDiscipline']        = $this->ParserHome->MoyenneDiscipline($annee, $_SESSION['account']['parent']);

                    $_SESSION['lesgp']                     = $this->Parser->ListeGP($_SESSION['account']['parent']);
                    $_SESSION['lespays']                   = $this->Parser->LstPays();
                    $_SESSION['ConnectedParent'] = intval($this->Parser->ConnectedParent($annee, $_SESSION['account']['parent']));
                    $_SESSION['lstGroupePromo']         = $this->ParserLogin->lstGroupePromo($_SESSION['account']['parent']);
                    $_SESSION['ListeAnnee']             = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);
                    $_SESSION['ListeAccesClasse']        = $this->Parser->ListeAccesClasse($_SESSION['account']['idlogin'], $_SESSION['account']['parent']);

                    $_SESSION['total_nofifer']             = intval($this->Parser->TotalNotifier('0', $_SESSION['account']['parent']));
                    $_SESSION['total_mesnoti']             = intval($this->Parser->TotalNotifier('1', $_SESSION['account']['parent']));
                    $_SESSION['ControleLicence'] = $this->Parser->ControleLicence($_SESSION['account']['parent']);
                    $_SESSION['liste_definitive'] = 0;
                    $res = $this->Parser->Liste_definitive_annee($_SESSION['account']['parent']);
                    foreach ($res as $row) {
                        if ($row->etat == '1' and $row->letat == '0') {
                            $_SESSION['liste_definitive'] = 1;
                        }
                    }
                    $res = $this->Parser->SetPinnApp($_SESSION['account']['parent']);

                    $_SESSION['rap_annee'] = $this->Parser->AnneePaiementEco($_SESSION['account']['parent']);
                    $_SESSION['classe_all'] = $this->Parser->ClasseAll($_SESSION['account']['parent']);
                    $_SESSION['anniv']     = $this->Parser->GetAnniversaire($annee, $_SESSION['account']['parent']);
                    //======================

                    echo "1";
                    exit();
                } else {

                    echo "ERR_CONN";
                    exit();
                }
            }
        }
    }


    public function SeDeconnecter()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('auth-messa');
    }


    public function ResetPassword()
    {

        if (!isset($_SESSION['account']['parent']) or $_SESSION['account']['parent'] == '') {
            return redirect()->to('auth-messa');
        } else {
            $data['page']             = 'resetpassword';
            $this->load->view('ecoles/template', $data);
        }
    }


    public function OubliePassword()
    {

        $data = [
            'main_content'          => 'login/oublie'
        ];
        echo view('shared/templatelogin', $data);
    }


    public function DirectConnect()
    {
        $id = $this->uri->segment(2);
        $code = $this->uri->segment(3);

        $result  = $this->ParserLogin->SeconnecterAdminDoralya($id, $code);

        foreach ($result as $row) {
        }

        if (isset($row->identreprise) and $row->identreprise != "") {
            $_SESSION['account']['id']                 = $row->identreprise;
            $_SESSION['account']['nom']             = ""; //strtoupper($row->nompers);
            $_SESSION['account']['prenom']             = $row->entreprise; //$row->prenompers;
            $_SESSION['account']['email']             = $row->adresse_email;
            $_SESSION['account']['identifiant']     = $row->adresse_email;
            $_SESSION['account']['institution']     = $row->entreprise;
            $_SESSION['account']['groupe']             = "admin";
            $_SESSION['account']['parent']             = $row->codedoralya;
            $_SESSION['account']['idlogin']            = "";
            $_SESSION['account']['code']            = $row->codedoralya;
            $_SESSION['account']['logo']            = "";
            $_SESSION['account']['type']            = $row->typeent;
            $_SESSION['account']['monnaie']            = $row->monnaie;


            $_SESSION['lesGroupes']             = $this->ParserLogin->ListeGroup($_SESSION['account']['parent']);
            $_SESSION['lesannesactives']         = $this->ParserLogin->ListeAnneeActive($_SESSION['account']['parent']);
            $_SESSION['lesclassesCompletes']     = $this->ParserLogin->ListeClasseComplet($_SESSION['account']['parent']);

            $_SESSION['droit']['groupe']         = "admin";

            $_SESSION['droit']['emp_afficher']     = "1";
            $_SESSION['droit']['emp_ajouter']     = "1";
            $_SESSION['droit']['emp_modifier']     = "1";
            $_SESSION['droit']['emp_supprimer'] = "1";

            $_SESSION['droit']['eco_afficher']     = "1";
            $_SESSION['droit']['eco_ajouter']     = "1";
            $_SESSION['droit']['eco_modifier']     = "1";
            $_SESSION['droit']['eco_supprimer'] = "1";


            $_SESSION['droit']['dep_afficher']     = "1";
            $_SESSION['droit']['dep_ajouter']     = "1";
            $_SESSION['droit']['dep_modifier']     = "1";
            $_SESSION['droit']['dep_supprimer'] = "1";

            $_SESSION['droit']['elev_afficher'] = "1";
            $_SESSION['droit']['elev_ajouter']     = "1";
            $_SESSION['droit']['elev_modifier'] = "1";
            $_SESSION['droit']['elev_supprimer'] = "1";

            $_SESSION['droit']['note_afficher'] = "1";
            $_SESSION['droit']['note_ajouter']     = "1";
            $_SESSION['droit']['note_modifier'] = "1";
            $_SESSION['droit']['note_supprimer'] = "1";
            $_SESSION['droit']['note_choix']    = "1";

            $_SESSION['droit']['recu_afficher']     = "1";
            $_SESSION['droit']['recu_ajouter']         = "1";
            $_SESSION['droit']['recu_modifier']     = "1";
            $_SESSION['droit']['recu_supprimer']     = "1";

            $_SESSION['droit']['conf_peda']         = "1";
            $_SESSION['droit']['conf_adm']             = "1";
            $_SESSION['droit']['conf_eco']             = "1";

            $_SESSION['droit']['p1'] = "1";
            $_SESSION['droit']['p2'] = "1";
            $_SESSION['droit']['p3'] = "1";
            $_SESSION['droit']['p4'] = "1";
            $_SESSION['droit']['p5'] = "1";
            $_SESSION['droit']['p6'] = "1";
            $_SESSION['droit']['p7'] = "1";
            $_SESSION['droit']['p8'] = "1";
            $_SESSION['droit']['p9'] = "1";
            $_SESSION['droit']['p10'] = "1";
            $_SESSION['droit']['p11'] = "1";
            $_SESSION['droit']['p12'] = "1";

            $_SESSION['droit']['m1'] = "1";
            $_SESSION['droit']['m2'] = "1";
            $_SESSION['droit']['m3'] = "1";
            $_SESSION['droit']['m4'] = "1";
            $_SESSION['droit']['m5'] = "1";
            $_SESSION['droit']['m6'] = "1";
            $_SESSION['droit']['m7'] = "1";
            $_SESSION['droit']['m8'] = "1";
            $_SESSION['droit']['m9'] = "1";
            $_SESSION['droit']['m10'] = "1";
            $_SESSION['droit']['m11'] = "1";
            $_SESSION['droit']['m12'] = "1";

            $_SESSION['droit']['modules'] = $row->modules;

            $_SESSION['pass'] = 'direct_connexion';

            /*$track    =    $this->ParserLogin->AddTracking("Connexion",$_SESSION['account']['idlogin']."-".$_SESSION['account']['prenom']." ".$_SESSION['account']['nom'],$_SESSION['account']['parent']);*/

            // Update DashBoard ==

            foreach ($_SESSION['lesannesactives'] as $anneeactives) {
            }

            $annee = dec($anneeactives->periode) ?? '';

            $_SESSION['TotalEns']                  = $this->ParserHome->ComptePers($_SESSION['account']['parent']);
            $_SESSION['totaleleve']              = $this->ParserHome->TotalEleve($annee, "", $_SESSION['account']['parent']);
            $_SESSION['licence_montant']         = $this->ParserHome->LicenceDispo($_SESSION['account']['parent']);
            $_SESSION['TotalParSexe']              = $this->ParserHome->TotalParSexe($annee, "", $_SESSION['account']['parent']);
            $_SESSION['totaleleveparclasse']    = $this->ParserHome->ListParClasse($annee, $_SESSION['account']['parent']);
            $_SESSION['TotalParClasSexe']        = $this->ParserHome->ListParClasseSexe($annee, $_SESSION['account']['parent']);
            $_SESSION['resultatAnnuel']            = $this->ParserHome->ResultatAnnuel($annee, $_SESSION['account']['parent']);
            $_SESSION['MoyenneDiscipline']        = $this->ParserHome->MoyenneDiscipline($annee, $_SESSION['account']['parent']);

            $_SESSION['lesgp']                     = $this->Parser->ListeGP($_SESSION['account']['parent']);
            $_SESSION['lespays']                   = $this->Parser->LstPays();
            $_SESSION['ConnectedParent'] = intval($this->Parser->ConnectedParent($annee, $_SESSION['account']['parent']));

            $_SESSION['lstGroupePromo']         = $this->ParserLogin->lstGroupePromo($_SESSION['account']['parent']);
            $_SESSION['ListeAnnee']             = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);
            $_SESSION['ListeAccesClasse']        = $this->Parser->ListeAccesClasse($_SESSION['account']['idlogin'], $_SESSION['account']['parent']);
            $_SESSION['total_nofifer']             = intval($this->Parser->TotalNotifier('0', $_SESSION['account']['parent']));
            $_SESSION['total_mesnoti']             = intval($this->Parser->TotalNotifier('1', $_SESSION['account']['parent']));
            $_SESSION['ControleLicence'] = $this->Parser->ControleLicence($_SESSION['account']['parent']);
            $_SESSION['liste_definitive'] = 0;
            $res = $this->Parser->Liste_definitive_annee($_SESSION['account']['parent']);
            foreach ($res as $row) {
                if ($row->etat == '1' and $row->letat == '0') {
                    $_SESSION['liste_definitive'] = 1;
                }
            }

            $res = $this->Parser->SetPinnApp($_SESSION['account']['parent']);

            $_SESSION['rap_annee'] = $this->Parser->AnneePaiementEco($_SESSION['account']['parent']);
            $_SESSION['classe_all'] = $this->Parser->ClasseAll($_SESSION['account']['parent']);
            $_SESSION['anniv']     = $this->Parser->GetAnniversaire($annee, $_SESSION['account']['parent']);
        }
        redirect('app');
    }


    public function ConnectByPin()
    {
        $id = $this->uri->segment(2);

        $result2    =    $this->Parser->SeconnecterPIN($id);
        foreach ($result2 as $row2) {
        }

        if (isset($row2->idcollaborateur) and $row2->idcollaborateur != "") {
            $_SESSION['account']['id']                 = "";
            $_SESSION['account']['nom']             = $row2->nom;
            $_SESSION['account']['prenom']             = $row2->prenom;
            $_SESSION['account']['email']             = $row2->adressemail;
            $_SESSION['account']['identifiant']     = $row2->identifiant;
            $_SESSION['account']['institution']     = $row2->entreprise;
            $_SESSION['account']['groupe']             = $row2->idgroupe_user;
            $_SESSION['account']['parent']             = $row2->codedoralya;
            $_SESSION['account']['idlogin']            = $row2->idcollaborateur;
            $_SESSION['account']['code']            = $row2->codedoralya;
            $_SESSION['account']['logo']            = "";
            $_SESSION['account']['type']            = $row2->typeent ?? '';
            $_SESSION['account']['monnaie']            = $row2->monnaie ?? '';

            $_SESSION['account']['fac']                 = $row2->fac ?? "";


            $_SESSION['lesGroupes']             = $this->ParserLogin->ListeGroup($_SESSION['account']['parent']);
            $_SESSION['lesannesactives']         = $this->ParserLogin->ListeAnneeActive($_SESSION['account']['parent']);
            $_SESSION['lesclassesCompletes']     = $this->ParserLogin->ListeClasseComplet($_SESSION['account']['parent']);

            $mesdroits = $this->ParserLogin->DroitGroup($row2->idgroupe_user);
            foreach ($mesdroits as $rdw) {
            }
            $_SESSION['droit']['groupe'] = $rdw->nom_groupe ?? '';

            $_SESSION['droit']['emp_afficher']     = $rdw->emp_afficher ?? '';
            $_SESSION['droit']['emp_ajouter']     = $rdw->emp_ajouter ?? '';
            $_SESSION['droit']['emp_modifier']     = $rdw->emp_modifier ?? '';
            $_SESSION['droit']['emp_supprimer'] = $rdw->emp_supprimer ?? '';

            $_SESSION['droit']['eco_afficher']     = $rdw->eco_afficher ?? '';
            $_SESSION['droit']['eco_ajouter']     = $rdw->eco_ajouter ?? '';
            $_SESSION['droit']['eco_modifier']     = $rdw->eco_modifier ?? '';
            $_SESSION['droit']['eco_supprimer'] = $rdw->eco_supprimer ?? '';


            $_SESSION['droit']['dep_afficher']     = $rdw->dep_afficher ?? '';
            $_SESSION['droit']['dep_ajouter']     = $rdw->dep_ajouter ?? '';
            $_SESSION['droit']['dep_modifier']     = $rdw->dep_modifier ?? '';
            $_SESSION['droit']['dep_supprimer'] = $rdw->dep_supprimer ?? '';

            $_SESSION['droit']['elev_afficher'] = $rdw->elev_afficher ?? '';
            $_SESSION['droit']['elev_ajouter']     = $rdw->elev_ajouter ?? '';
            $_SESSION['droit']['elev_modifier'] = $rdw->elev_modifier ?? '';
            $_SESSION['droit']['elev_supprimer'] = $rdw->elev_supprimer ?? '';

            $_SESSION['droit']['note_afficher'] = $rdw->note_afficher ?? '';
            $_SESSION['droit']['note_ajouter']     = $rdw->note_ajouter ?? '';
            $_SESSION['droit']['note_modifier'] = $rdw->note_modifier ?? '';
            $_SESSION['droit']['note_supprimer'] = $rdw->note_supprimer ?? '';
            $_SESSION['droit']['note_choix']    = $rdw->note_choix ?? '';

            $_SESSION['droit']['recu_afficher'] = $rdw->recu_afficher ?? '';
            $_SESSION['droit']['recu_ajouter']     = $rdw->recu_ajouter ?? '';
            $_SESSION['droit']['recu_modifier'] = $rdw->recu_modifier ?? '';
            $_SESSION['droit']['recu_supprimer'] = $rdw->recu_supprimer ?? '';

            $_SESSION['droit']['conf_peda']         = $rdw->conf_pedagogique ?? '';
            $_SESSION['droit']['conf_adm']             = $rdw->configuration ?? '';
            $_SESSION['droit']['conf_eco']             = $rdw->vente_retour ?? '';


            $_SESSION['droit']['p1'] = $row2->p1     ?? '0';
            $_SESSION['droit']['p2'] = $row2->p2     ?? '0';
            $_SESSION['droit']['p3'] = $row2->p3     ?? '0';
            $_SESSION['droit']['p4'] = $row2->p4     ?? '0';
            $_SESSION['droit']['p5'] = $row2->p5     ?? '0';
            $_SESSION['droit']['p6'] = $row2->p6     ?? '0';
            $_SESSION['droit']['p7'] = $row2->p7     ?? '0';
            $_SESSION['droit']['p8'] = $row2->p8     ?? '0';
            $_SESSION['droit']['p9'] = $row2->p9     ?? '0';
            $_SESSION['droit']['p10'] = $row2->p10     ?? '0';
            $_SESSION['droit']['p11'] = $row2->p11     ?? '0';
            $_SESSION['droit']['p12'] = $row2->p12     ?? '0';

            $_SESSION['droit']['m1'] = $row2->m1     ?? '0';
            $_SESSION['droit']['m2'] = $row2->m2     ?? '0';
            $_SESSION['droit']['m3'] = $row2->m3     ?? '0';
            $_SESSION['droit']['m4'] = $row2->m4     ?? '0';
            $_SESSION['droit']['m5'] = $row2->m5     ?? '0';
            $_SESSION['droit']['m6'] = $row2->m6     ?? '0';
            $_SESSION['droit']['m7'] = $row2->m7     ?? '0';
            $_SESSION['droit']['m8'] = $row2->m8     ?? '0';
            $_SESSION['droit']['m9'] = $row2->m9     ?? '0';
            $_SESSION['droit']['m10'] = $row2->m10     ?? '0';
            $_SESSION['droit']['m11'] = $row2->m11     ?? '0';
            $_SESSION['droit']['m12'] = $row2->m12     ?? '0';
            $_SESSION['pass'] = "---------------";
            $_SESSION['droit']['modules'] = $row2->modules;

            $track    =    $this->ParserLogin->AddTracking("Connexion", $_SESSION['account']['idlogin'] . "-" . $_SESSION['account']['prenom'] . " " . $_SESSION['account']['nom'], $_SESSION['account']['parent']);

            // Update DashBoard ==
            $annee = "";
            foreach ($_SESSION['lesannesactives'] as $anneeactives) {
            }
            $annee = dec($anneeactives->periode) ?? "";
            $_SESSION['TotalEns']                  = $this->ParserHome->ComptePers($_SESSION['account']['parent']);
            $_SESSION['totaleleve']              = $this->ParserHome->TotalEleve($annee, "", $_SESSION['account']['parent']);
            $_SESSION['licence_montant']         = $this->ParserHome->LicenceDispo($_SESSION['account']['parent']);
            $_SESSION['TotalParSexe']              = $this->ParserHome->TotalParSexe($annee, "", $_SESSION['account']['parent']);
            $_SESSION['totaleleveparclasse']    = $this->ParserHome->ListParClasse($annee, $_SESSION['account']['parent']);
            $_SESSION['TotalParClasSexe']        = $this->ParserHome->ListParClasseSexe($annee, $_SESSION['account']['parent']);
            $_SESSION['resultatAnnuel']            = $this->ParserHome->ResultatAnnuel($annee, $_SESSION['account']['parent']);
            $_SESSION['MoyenneDiscipline']        = $this->ParserHome->MoyenneDiscipline($annee, $_SESSION['account']['parent']);

            $_SESSION['lesgp']                     = $this->Parser->ListeGP($_SESSION['account']['parent']);
            $_SESSION['lespays']                   = $this->Parser->LstPays();
            $_SESSION['ConnectedParent'] = intval($this->Parser->ConnectedParent($annee, $_SESSION['account']['parent']));

            $_SESSION['lstGroupePromo']         = $this->ParserLogin->lstGroupePromo($_SESSION['account']['parent']);
            $_SESSION['ListeAnnee']             = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);
            $_SESSION['ListeAccesClasse']        = $this->Parser->ListeAccesClasse($_SESSION['account']['idlogin'], $_SESSION['account']['parent']);

            $_SESSION['total_nofifer']             = intval($this->Parser->TotalNotifier('0', $_SESSION['account']['parent']));
            $_SESSION['total_mesnoti']             = intval($this->Parser->TotalNotifier('1', $_SESSION['account']['parent']));
            $_SESSION['ControleLicence'] = $this->Parser->ControleLicence($_SESSION['account']['parent']);
            $_SESSION['liste_definitive'] = 0;
            $res = $this->Parser->Liste_definitive_annee($_SESSION['account']['parent']);
            foreach ($res as $row) {
                if ($row->etat == '1' and $row->letat == '0') {
                    $_SESSION['liste_definitive'] = 1;
                }
            }

            $res = $this->Parser->SetPinnApp($_SESSION['account']['parent']);

            $_SESSION['rap_annee'] = $this->Parser->AnneePaiementEco($_SESSION['account']['parent']);
            $_SESSION['classe_all'] = $this->Parser->ClasseAll($_SESSION['account']['parent']);
            $_SESSION['anniv']     = $this->Parser->GetAnniversaire($annee, $_SESSION['account']['parent']);
            //======================


        } else {
        }

        $_SESSION['mobile'] = "ok";
        redirect('app');
    }



    public function ResetAuto()
    {
        $uri = service('uri');
        if (!empty($uri->getSegment(2))) {
            $res = $this->Parser->ValiderResetPassword($uri->getSegment(2));

            if ($res != "0") {

                $result    =    $this->ParserLogin->SeconnecterAdmin($res, 'password');

                foreach ($result as $row) {
                }

                if (isset($row->identreprise) and $row->identreprise != "") {
                    $_SESSION['account']['id']                 = $row->identreprise;
                    $_SESSION['account']['nom']             = strtoupper($row->nompers);
                    $_SESSION['account']['prenom']             = $row->prenompers;
                    $_SESSION['account']['email']             = $row->adresse_email;
                    $_SESSION['account']['identifiant']     = $row->adresse_email;
                    $_SESSION['account']['institution']     = $row->entreprise;
                    $_SESSION['account']['groupe']             = "admin";
                    $_SESSION['account']['parent']             = $row->codedoralya;
                    $_SESSION['account']['idlogin']            = "";
                    $_SESSION['account']['code']            = $row->codedoralya;
                    $_SESSION['account']['logo']            = "";
                    $_SESSION['account']['type']            = $row->typeent;
                    $_SESSION['account']['monnaie']            = $row->monnaie;


                    $_SESSION['lesGroupes']             = $this->ParserLogin->ListeGroup($_SESSION['account']['parent']);
                    $_SESSION['lesannesactives']         = $this->ParserLogin->ListeAnneeActive($_SESSION['account']['parent']);
                    $_SESSION['lesclassesCompletes']     = $this->ParserLogin->ListeClasseComplet($_SESSION['account']['parent']);

                    $_SESSION['droit']['groupe']         = "admin";

                    $_SESSION['droit']['emp_afficher']     = "1";
                    $_SESSION['droit']['emp_ajouter']     = "1";
                    $_SESSION['droit']['emp_modifier']     = "1";
                    $_SESSION['droit']['emp_supprimer'] = "1";

                    $_SESSION['droit']['eco_afficher']     = "1";
                    $_SESSION['droit']['eco_ajouter']     = "1";
                    $_SESSION['droit']['eco_modifier']     = "1";
                    $_SESSION['droit']['eco_supprimer'] = "1";


                    $_SESSION['droit']['dep_afficher']     = "1";
                    $_SESSION['droit']['dep_ajouter']     = "1";
                    $_SESSION['droit']['dep_modifier']     = "1";
                    $_SESSION['droit']['dep_supprimer'] = "1";

                    $_SESSION['droit']['elev_afficher'] = "1";
                    $_SESSION['droit']['elev_ajouter']     = "1";
                    $_SESSION['droit']['elev_modifier'] = "1";
                    $_SESSION['droit']['elev_supprimer'] = "1";

                    $_SESSION['droit']['note_afficher'] = "1";
                    $_SESSION['droit']['note_ajouter']     = "1";
                    $_SESSION['droit']['note_modifier'] = "1";
                    $_SESSION['droit']['note_supprimer'] = "1";
                    $_SESSION['droit']['note_choix']    = "1";

                    $_SESSION['droit']['recu_afficher']     = "1";
                    $_SESSION['droit']['recu_ajouter']         = "1";
                    $_SESSION['droit']['recu_modifier']     = "1";
                    $_SESSION['droit']['recu_supprimer']     = "1";

                    $_SESSION['droit']['conf_peda']         = "1";
                    $_SESSION['droit']['conf_adm']             = "1";
                    $_SESSION['droit']['conf_eco']             = "1";

                    $_SESSION['droit']['p1'] = "1";
                    $_SESSION['droit']['p2'] = "1";
                    $_SESSION['droit']['p3'] = "1";
                    $_SESSION['droit']['p4'] = "1";
                    $_SESSION['droit']['p5'] = "1";
                    $_SESSION['droit']['p6'] = "1";
                    $_SESSION['droit']['p7'] = "1";
                    $_SESSION['droit']['p8'] = "1";
                    $_SESSION['droit']['p9'] = "1";
                    $_SESSION['droit']['p10'] = "1";
                    $_SESSION['droit']['p11'] = "1";
                    $_SESSION['droit']['p12'] = "1";

                    $_SESSION['droit']['m1'] = "1";
                    $_SESSION['droit']['m2'] = "1";
                    $_SESSION['droit']['m3'] = "1";
                    $_SESSION['droit']['m4'] = "1";
                    $_SESSION['droit']['m5'] = "1";
                    $_SESSION['droit']['m6'] = "1";
                    $_SESSION['droit']['m7'] = "1";
                    $_SESSION['droit']['m8'] = "1";
                    $_SESSION['droit']['m9'] = "1";
                    $_SESSION['droit']['m10'] = "1";
                    $_SESSION['droit']['m11'] = "1";
                    $_SESSION['droit']['m12'] = "1";

                    $_SESSION['droit']['modules'] = $row->modules;

                    $_SESSION['pass'] = $_POST['passlogin'];

                    $track    =    $this->ParserLogin->AddTracking("Connexion", $_SESSION['account']['idlogin'] . "-" . $_SESSION['account']['prenom'] . " " . $_SESSION['account']['nom'], $_SESSION['account']['parent']);

                    // Update DashBoard ==

                    foreach ($_SESSION['lesannesactives'] as $anneeactives) {
                    }

                    $annee = $anneeactives->periode ?? '';

                    $_SESSION['TotalEns']                  = $this->ParserHome->ComptePers($_SESSION['account']['parent']);
                    $_SESSION['totaleleve']              = $this->ParserHome->TotalEleve($annee, "", $_SESSION['account']['parent']);
                    $_SESSION['licence_montant']         = $this->ParserHome->LicenceDispo($_SESSION['account']['parent']);
                    $_SESSION['TotalParSexe']              = $this->ParserHome->TotalParSexe($annee, "", $_SESSION['account']['parent']);
                    $_SESSION['totaleleveparclasse']    = $this->ParserHome->ListParClasse($annee, $_SESSION['account']['parent']);
                    $_SESSION['TotalParClasSexe']        = $this->ParserHome->ListParClasseSexe($annee, $_SESSION['account']['parent']);
                    $_SESSION['resultatAnnuel']            = $this->ParserHome->ResultatAnnuel($annee, $_SESSION['account']['parent']);
                    $_SESSION['MoyenneDiscipline']        = $this->ParserHome->MoyenneDiscipline($annee, $_SESSION['account']['parent']);

                    $_SESSION['lesgp']                     = $this->Parser->ListeGP($_SESSION['account']['parent']);
                    $_SESSION['lespays']                   = $this->Parser->LstPays();
                    $_SESSION['ConnectedParent'] = intval($this->Parser->ConnectedParent($annee, $_SESSION['account']['parent']));

                    $_SESSION['lstGroupePromo']         = $this->ParserLogin->lstGroupePromo($_SESSION['account']['parent']);
                    $_SESSION['ListeAnnee']             = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);
                    $_SESSION['ListeAccesClasse']        = $this->Parser->ListeAccesClasse($_SESSION['account']['idlogin'], $_SESSION['account']['parent']);
                    $_SESSION['total_nofifer']             = intval($this->Parser->TotalNotifier('0', $_SESSION['account']['parent']));
                    $_SESSION['total_mesnoti']             = intval($this->Parser->TotalNotifier('1', $_SESSION['account']['parent']));
                    $_SESSION['ControleLicence'] = $this->Parser->ControleLicence($_SESSION['account']['parent']);
                    $_SESSION['liste_definitive'] = 0;
                    $res = $this->Parser->Liste_definitive_annee($_SESSION['account']['parent']);
                    foreach ($res as $row) {
                        if ($row->etat == '1' and $row->letat == '0') {
                            $_SESSION['liste_definitive'] = 1;
                        }
                    }

                    $_SESSION['rap_annee'] = $this->Parser->AnneePaiementEco($_SESSION['account']['parent']);
                    $_SESSION['classe_all'] = $this->Parser->ClasseAll($_SESSION['account']['parent']);
                    $_SESSION['anniv']     = $this->Parser->GetAnniversaire($annee, $_SESSION['account']['parent']);
                    //======================	

                    $_SESSION['pass'] = 'password';
                    return redirect()->to('app');
                } else {

                    $result2    =    $this->ParserLogin->SeconnecterUser($res, 'password');
                    foreach ($result2 as $row2) {
                    }

                    if (isset($row2->idcollaborateur) and $row2->idcollaborateur != "") {
                        $_SESSION['account']['id']                 = "";
                        $_SESSION['account']['nom']             = $row2->nom;
                        $_SESSION['account']['prenom']             = $row2->prenom;
                        $_SESSION['account']['email']             = $row2->adressemail;
                        $_SESSION['account']['identifiant']     = $row2->identifiant;
                        $_SESSION['account']['institution']     = $row2->entreprise;
                        $_SESSION['account']['groupe']             = $row2->idgroupe_user;
                        $_SESSION['account']['parent']             = $row2->codedoralya;
                        $_SESSION['account']['idlogin']            = $row2->idcollaborateur;
                        $_SESSION['account']['code']            = $row2->codedoralya;
                        $_SESSION['account']['logo']            = "";
                        $_SESSION['account']['type']            = $row2->typeent ?? '';
                        $_SESSION['account']['monnaie']            = $row2->monnaie ?? '';

                        $_SESSION['account']['fac']                 = $row2->fac ?? "";


                        $_SESSION['lesGroupes']             = $this->ParserLogin->ListeGroup($_SESSION['account']['parent']);
                        $_SESSION['lesannesactives']         = $this->ParserLogin->ListeAnneeActive($_SESSION['account']['parent']);
                        $_SESSION['lesclassesCompletes']     = $this->ParserLogin->ListeClasseComplet($_SESSION['account']['parent']);

                        $mesdroits = $this->ParserLogin->DroitGroup($row2->idgroupe_user);
                        foreach ($mesdroits as $rdw) {
                        }
                        $_SESSION['droit']['groupe'] = $rdw->nom_groupe ?? '';

                        $_SESSION['droit']['emp_afficher']     = $rdw->emp_afficher ?? '';
                        $_SESSION['droit']['emp_ajouter']     = $rdw->emp_ajouter ?? '';
                        $_SESSION['droit']['emp_modifier']     = $rdw->emp_modifier ?? '';
                        $_SESSION['droit']['emp_supprimer'] = $rdw->emp_supprimer ?? '';

                        $_SESSION['droit']['eco_afficher']     = $rdw->eco_afficher ?? '';
                        $_SESSION['droit']['eco_ajouter']     = $rdw->eco_ajouter ?? '';
                        $_SESSION['droit']['eco_modifier']     = $rdw->eco_modifier ?? '';
                        $_SESSION['droit']['eco_supprimer'] = $rdw->eco_supprimer ?? '';


                        $_SESSION['droit']['dep_afficher']     = $rdw->dep_afficher ?? '';
                        $_SESSION['droit']['dep_ajouter']     = $rdw->dep_ajouter ?? '';
                        $_SESSION['droit']['dep_modifier']     = $rdw->dep_modifier ?? '';
                        $_SESSION['droit']['dep_supprimer'] = $rdw->dep_supprimer ?? '';

                        $_SESSION['droit']['elev_afficher'] = $rdw->elev_afficher ?? '';
                        $_SESSION['droit']['elev_ajouter']     = $rdw->elev_ajouter ?? '';
                        $_SESSION['droit']['elev_modifier'] = $rdw->elev_modifier ?? '';
                        $_SESSION['droit']['elev_supprimer'] = $rdw->elev_supprimer ?? '';

                        $_SESSION['droit']['note_afficher'] = $rdw->note_afficher ?? '';
                        $_SESSION['droit']['note_ajouter']     = $rdw->note_ajouter ?? '';
                        $_SESSION['droit']['note_modifier'] = $rdw->note_modifier ?? '';
                        $_SESSION['droit']['note_supprimer'] = $rdw->note_supprimer ?? '';
                        $_SESSION['droit']['note_choix']    = $rdw->note_choix ?? '';

                        $_SESSION['droit']['recu_afficher'] = $rdw->recu_afficher ?? '';
                        $_SESSION['droit']['recu_ajouter']     = $rdw->recu_ajouter ?? '';
                        $_SESSION['droit']['recu_modifier'] = $rdw->recu_modifier ?? '';
                        $_SESSION['droit']['recu_supprimer'] = $rdw->recu_supprimer ?? '';

                        $_SESSION['droit']['conf_peda']         = $rdw->conf_pedagogique ?? '';
                        $_SESSION['droit']['conf_adm']             = $rdw->configuration ?? '';
                        $_SESSION['droit']['conf_eco']             = $rdw->vente_retour ?? '';


                        $_SESSION['droit']['p1'] = $row2->p1     ?? '0';
                        $_SESSION['droit']['p2'] = $row2->p2     ?? '0';
                        $_SESSION['droit']['p3'] = $row2->p3     ?? '0';
                        $_SESSION['droit']['p4'] = $row2->p4     ?? '0';
                        $_SESSION['droit']['p5'] = $row2->p5     ?? '0';
                        $_SESSION['droit']['p6'] = $row2->p6     ?? '0';
                        $_SESSION['droit']['p7'] = $row2->p7     ?? '0';
                        $_SESSION['droit']['p8'] = $row2->p8     ?? '0';
                        $_SESSION['droit']['p9'] = $row2->p9     ?? '0';
                        $_SESSION['droit']['p10'] = $row2->p10     ?? '0';
                        $_SESSION['droit']['p11'] = $row2->p11     ?? '0';
                        $_SESSION['droit']['p12'] = $row2->p12     ?? '0';

                        $_SESSION['droit']['m1'] = $row2->m1     ?? '0';
                        $_SESSION['droit']['m2'] = $row2->m2     ?? '0';
                        $_SESSION['droit']['m3'] = $row2->m3     ?? '0';
                        $_SESSION['droit']['m4'] = $row2->m4     ?? '0';
                        $_SESSION['droit']['m5'] = $row2->m5     ?? '0';
                        $_SESSION['droit']['m6'] = $row2->m6     ?? '0';
                        $_SESSION['droit']['m7'] = $row2->m7     ?? '0';
                        $_SESSION['droit']['m8'] = $row2->m8     ?? '0';
                        $_SESSION['droit']['m9'] = $row2->m9     ?? '0';
                        $_SESSION['droit']['m10'] = $row2->m10     ?? '0';
                        $_SESSION['droit']['m11'] = $row2->m11     ?? '0';
                        $_SESSION['droit']['m12'] = $row2->m12     ?? '0';
                        $_SESSION['pass'] = $_POST['passlogin'];
                        $_SESSION['droit']['modules'] = $row2->modules;

                        $track    =    $this->ParserLogin->AddTracking("Connexion", $_SESSION['account']['idlogin'] . "-" . $_SESSION['account']['prenom'] . " " . $_SESSION['account']['nom'], $_SESSION['account']['parent']);

                        // Update DashBoard ==
                        $annee = "";
                        foreach ($_SESSION['lesannesactives'] as $anneeactives) {
                        }
                        $annee = $anneeactives->periode ?? "";
                        $_SESSION['TotalEns']                  = $this->ParserHome->ComptePers($_SESSION['account']['parent']);
                        $_SESSION['totaleleve']              = $this->ParserHome->TotalEleve($annee, "", $_SESSION['account']['parent']);
                        $_SESSION['licence_montant']         = $this->ParserHome->LicenceDispo($_SESSION['account']['parent']);
                        $_SESSION['TotalParSexe']              = $this->ParserHome->TotalParSexe($annee, "", $_SESSION['account']['parent']);
                        $_SESSION['totaleleveparclasse']    = $this->ParserHome->ListParClasse($annee, $_SESSION['account']['parent']);
                        $_SESSION['TotalParClasSexe']        = $this->ParserHome->ListParClasseSexe($annee, $_SESSION['account']['parent']);
                        $_SESSION['resultatAnnuel']            = $this->ParserHome->ResultatAnnuel($annee, $_SESSION['account']['parent']);
                        $_SESSION['MoyenneDiscipline']        = $this->ParserHome->MoyenneDiscipline($annee, $_SESSION['account']['parent']);

                        $_SESSION['lesgp']                     = $this->Parser->ListeGP($_SESSION['account']['parent']);
                        $_SESSION['lespays']                   = $this->Parser->LstPays();
                        $_SESSION['ConnectedParent'] = intval($this->Parser->ConnectedParent($annee, $_SESSION['account']['parent']));

                        $_SESSION['lstGroupePromo']         = $this->ParserLogin->lstGroupePromo($_SESSION['account']['parent']);
                        $_SESSION['ListeAnnee']             = $this->ParserAnnee->ListeAnnee($_SESSION['account']['parent']);
                        $_SESSION['ListeAccesClasse']        = $this->Parser->ListeAccesClasse($_SESSION['account']['idlogin'], $_SESSION['account']['parent']);

                        $_SESSION['total_nofifer']             = intval($this->Parser->TotalNotifier('0', $_SESSION['account']['parent']));
                        $_SESSION['total_mesnoti']             = intval($this->Parser->TotalNotifier('1', $_SESSION['account']['parent']));
                        $_SESSION['ControleLicence'] = $this->Parser->ControleLicence($_SESSION['account']['parent']);
                        $_SESSION['liste_definitive'] = 0;
                        $res = $this->Parser->Liste_definitive_annee($_SESSION['account']['parent']);
                        foreach ($res as $row) {
                            if ($row->etat == '1' and $row->letat == '0') {
                                $_SESSION['liste_definitive'] = 1;
                            }
                        }
                        //======================

                        $_SESSION['rap_annee'] = $this->Parser->AnneePaiementEco($_SESSION['account']['parent']);
                        $_SESSION['classe_all'] = $this->Parser->ClasseAll($_SESSION['account']['parent']);
                        $_SESSION['anniv']     = $this->Parser->GetAnniversaire($annee, $_SESSION['account']['parent']);


                        $_SESSION['pass'] = 'password';
                        return redirect()->to('app');
                    } else {

                        //======================

                        $session = session();
                        $session->destroy();
                        return redirect()->to('lien-non-valide');

                        //=======================

                    }
                }
            } else {

                $session = session();
                $session->destroy();
                return redirect()->to('lien-non-valide');
            }
        }
    }



    public function LinkNonValide()
    {
        $data = [
            'main_content'          => 'login/nolink'
        ];
        echo view('shared/templatelogin', $data);
    }
}
