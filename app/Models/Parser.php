<?php

namespace App\Models;

use CodeIgniter\Model;

class Parser extends Model
{
	private $soap_client, $soap_client2, $config, $soapParameters;

	public function __construct()
	{
		ini_set('soap.wsdl_cache_enabled', '0');
		ini_set('soap.wsdl_cache_ttl', '0');
		ini_set("default_socket_timeout", 6000);
		$this->config = new \Config\MessaConfig();
		$this->soapParameters = array('login' => "admin", 'password' =>   $this->config->KeyWs);
		$this->soap_client    = new \SoapClient($this->config->LienWs,    $this->soapParameters);
		//$this->soap_client2   = new \SoapClient($this->config->LienCand,  $this->soapParameters);
	}

	public function init_soap_client()
	{
		return $this->soap_client;
	}

	public function init_soap_client2()
	{
		//return $this->soap_client2;
		return $this->soap_client;
	}
	//============================================

	public function AddTracking($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddTracking($a1, $a2, $a3);

		return $result;
	}

	public function AddAnneeAcad($a1, $a2, $a3, $a4, $a5, $a6)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddAnneeAcad($a1, $a2, $a3, $a4, $a5, $a6);

		return $result;
	}

	public function DeleteAnnee($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeleteAnnee($a1, $a2);

		return $result;
	}

	public function ActiveAnnee($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ActiveAnnee($a1, $a2);

		return $result;
	}

	public function ListeEconomat($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeEconomat($a1, $a2, $a3);

		return $result;
	}

	public function ListeEconomat_new($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeEconomat_new($a1, $a2);

		return $result;
	}

	public function ResetEconomat($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetEconomat($a1, $a2);

		return $result;
	}


	public function AddEconomat($a1, $a2, $a3, $a4, $a5, $a6, $a7)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddEconomat($a1, $a2, $a3, $a4, $a5, $a6, $a7);

		return $result;
	}

	public function AddEconomat_3($a1, $a2, $a3, $a4, $a5, $a6, $a7)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddEconomat_3($a1, $a2, $a3, $a4, $a5, $a6, $a7);

		return $result;
	}

	public function CtlLicChangementAnnee($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CtlLicChangementAnnee($a1, $a2, $a3);

		return $result;
	}

	public function get_entreprise($id)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetEntreprise($id);

		return $result;
	}

	public function ModEntreprise($a1, $a2, $b1, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $code)
	{
		$client = $this->init_soap_client();
		$result    	=    $client->ModEntreprise($a1, $a2, $b1, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $code);

		return $result;
	}

	public function PeriodeEntreprise(
		$p1,
		$p2,
		$p3,
		$p4,
		$p5,
		$p6,
		$p7,
		$p8,
		$p9,
		$p10,
		$p11,
		$p12,
		$m1,
		$m2,
		$m3,
		$m4,
		$m5,
		$m6,
		$m7,
		$m8,
		$m9,
		$m10,
		$m11,
		$m12,
		$a1,
		$a2,
		$a3,
		$a4,
		$a5,
		$a6,
		$code
	) {
		$client = $this->init_soap_client();
		$result    	=    $client->PeriodeEntreprise(
			$p1,
			$p2,
			$p3,
			$p4,
			$p5,
			$p6,
			$p7,
			$p8,
			$p9,
			$p10,
			$p11,
			$p12,
			$m1,
			$m2,
			$m3,
			$m4,
			$m5,
			$m6,
			$m7,
			$m8,
			$m9,
			$m10,
			$m11,
			$m12,
			$a1,
			$a2,
			$a3,
			$a4,
			$a5,
			$a6,
			$code
		);

		return $result;
	}


	public function ListeFac($a1)
	{

		$client = $this->init_soap_client();
		$result    	=    $client->ListeFac($a1);

		return $result;
	}

	public function AddFaculte($p1, $p2, $p3, $p4, $p5)
	{

		$client = $this->init_soap_client();
		$result    	=    $client->AddFaculte($p1, $p2, $p3, $p4, $p5);

		return $result;
	}

	public function ModFac($a1, $a2, $a3, $a4, $a5)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModFac($a1, $a2, $a3, $a4, $a5);

		return $result;
	}

	public function DelFac($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->DelFac($a1, $a2);

		return $result;
	}

	public function ListeCours($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeCours($a1);

		return $result;
	}

	public function ModCours($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModCours($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19);

		return $result;
	}


	public function AddCours($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19)
	{

		$client = $this->init_soap_client();
		$result =    $client->AddCours($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19);

		return $result;
	}


	public function DelCours($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->DelCours($a1, $a2);

		return $result;
	}




	public function ListeClasse($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeClasse($a1);

		return $result;
	}



	public function ModClasse($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModClasse($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15);

		return $result;
	}



	public function ListelaClasse($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListelaClasse($a1, $a2);

		return $result;
	}


	public function ListeFac2($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeFac2($a1);

		return $result;
	}


	public function ListeCoursParClasse($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeCoursParClasse($a1, $a2);

		return $result;
	}




	public function ListeClasseCompletImport($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeClasseCompletImport($a1, $a2);

		return $result;
	}


	public function ListeCoursParFac($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeCoursParFac($a1, $a2);

		return $result;
	}


	public function AddCoursParClasse($a1, $a2, $a3, $a4, $a5, $a6, $a7)
	{

		$client = $this->init_soap_client();
		$result =    $client->AddCoursParClasse($a1, $a2, $a3, $a4, $a5, $a6, $a7);

		return $result;
	}



	public function DelClasseCours($a1, $a2, $a3, $a4)
	{

		$client = $this->init_soap_client();
		$result =    $client->DelClasseCours($a1, $a2, $a3, $a4);

		return $result;
	}


	public function ClonerClasse($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->ClonerClasse($a1, $a2, $a3);

		return $result;
	}


	public function ListePeriode($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListePeriode($a1, $a2);

		return $result;
	}


	public function AddPeriodeParClasse($a1, $a2, $a3, $a4, $a5)
	{

		$client = $this->init_soap_client();
		$result =    $client->AddPeriodeParClasse($a1, $a2, $a3, $a4, $a5);

		return $result;
	}

	public function DelPeriode($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->DelPeriode($a1, $a2);

		return $result;
	}

	public function ModPeriodeParClasse($a1, $a2, $a3, $a4)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModPeriodeParClasse($a1, $a2, $a3, $a4);

		return $result;
	}

	public function AppliquerPeriode($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->AppliquerPeriode($a1, $a2);

		return $result;
	}

	public function ListeGpa($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeGpa($a1);

		return $result;
	}


	public function AddGpa($a1, $a2, $a3, $a4, $a5, $a6, $a7)
	{

		$client = $this->init_soap_client();
		$result =    $client->AddGpa($a1, $a2, $a3, $a4, $a5, $a6, $a7);

		return $result;
	}

	public function ModGpa($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModGpa($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8);

		return $result;
	}

	public function DeleteGpa($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->DeleteGpa($a1, $a2);

		return $result;
	}

	public function LstGroupe($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->LstGroupe($a1);

		return $result;
	}


	public function DeleteGroupeClassique($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->DeleteGroupeClassique($a1, $a2);

		return $result;
	}



	public function UpDateGPClassique($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->UpDateGPClassique($a1, $a2, $a3);

		return $result;
	}

	public function ListeClasseComplet2($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeClasseComplet2($a1);

		return $result;
	}

	public function ModConfigEco($a1, $a2, $a3, $a4, $a5, $a6, $a7)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModConfigEco($a1, $a2, $a3, $a4, $a5, $a6, $a7);

		return $result;
	}

	public function DeleteConfigEco($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->DeleteConfigEco($a1, $a2);

		return $result;
	}

	public function LicenceDispo($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->LicenceDispo($a1);

		return $result;
	}

	public function ListeGP($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeGP($a1);

		return $result;
	}


	public function LstPays()
	{

		$client = $this->init_soap_client();
		$result =    $client->LstPays();

		return $result;
	}

	public function AddEleve($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20)
	{

		$client = $this->init_soap_client();
		$result =    $client->AddEleve($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20);

		return $result;
	}

	public function AddPersonneResp($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10)
	{

		$client = $this->init_soap_client();
		$result =    $client->AddPersonneResp($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10);

		return $result;
	}


	public function Leleve($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->Leleve($a1, $a2);

		return $result;
	}


	public function ListeDiplome($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeDiplome($a1, $a2);

		return $result;
	}


	public function ListeParent($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeParent($a1, $a2);

		return $result;
	}


	public function ListePromo($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListePromo($a1, $a2);

		return $result;
	}


	public function ListeAnneeEleve($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeAnneeEleve($a1, $a2);

		return $result;
	}

	public function ListeAbsence($a1, $a2)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeAbsence($a1, $a2);

		return $result;
	}



	public function ClasseActuelle($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->ClasseActuelle($a1, $a2, $a3);

		return $result;
	}

	public function PaiementEtud($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->PaiementEtud($a1, $a2, $a3);

		return $result;
	}

	public function PaiementEtudDataNew($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->PaiementEtudDataNew($a1, $a2, $a3);

		return $result;
	}


	public function BalanceEtud($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->BalanceEtud($a1, $a2, $a3);

		return $result;
	}

	public function BalanceEtudNext($a1, $a2, $a3)
	{

		$client = $this->init_soap_client();
		$result =    $client->BalanceEtudNext($a1, $a2, $a3);

		return $result;
	}


	public function GetPhoto($a1)
	{

		$client = $this->init_soap_client();
		$result =    $client->GetPhoto($a1);

		return $result;
	}


	public function ListeFormationClasse($a1, $a2, $a3, $a4)
	{

		$client = $this->init_soap_client();
		$result =    $client->ListeFormationClasse($a1, $a2, $a3, $a4);

		return $result;
	}


	public function ListeFormationClasseNew($a1, $a2, $a3, $a4)
	{

		$client = $this->init_soap_client();
		$result = $client->ListeFormationClasseNew($a1, $a2, $a3, $a4);

		return $result;
	}



	public function ModEleve($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20)
	{

		$client = $this->init_soap_client();
		$result =    $client->ModEleve($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20);

		return $result;
	}


	public function ListeProgramme($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeProgramme($a1);

		return $result;
	}



	public function AddDiplome($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddDiplome($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10);

		return $result;
	}



	public function DelDiplome($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DelDiplome($a1, $a2, $a3);

		return $result;
	}

	public function AddGroupe($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddGroupe($a1, $a2);

		return $result;
	}



	public function ResetMontantArrieeEleve($a1, $a2, $a3, $a4)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetMontantArrieeEleve($a1, $a2, $a3, $a4);

		return $result;
	}


	public function BulletinData($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->BulletinData($a1, $a2);

		return $result;
	}



	public function ListeConduite($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeConduite($a1, $a2);

		return $result;
	}

	public function DeleteParent($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeleteParent($a1, $a2, $a3);

		return $result;
	}

	public function DeletePromotion($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeletePromotion($a1, $a2);

		return $result;
	}

	public function UpdateGroupePromo($a1, $a2, $a3, $a4, $a5, $a6)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateGroupePromo($a1, $a2, $a3, $a4, $a5, $a6);

		return $result;
	}


	public function lstGroupePromo($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->lstGroupePromo($a1);

		return $result;
	}

	public function Close_dossier($a1, $a2, $a3, $a4)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Close_dossier($a1, $a2, $a3, $a4);

		return $result;
	}

	public function SendMail($a1, $a2, $a3, $a4, $a5, $a6)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SendMail($a1, $a2, $a3, $a4, $a5, $a6);

		return $result;
	}

	public function UpdateNote($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateNote($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14);

		return $result;
	}

	public function UpdateNote2($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateNote2($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14);

		return $result;
	}

	public function NoteAppreciation($a1, $a2, $a3, $a4, $a5)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->NoteAppreciation($a1, $a2, $a3, $a4, $a5);

		return $result;
	}

	public function UpdateMemoBulletin($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateMemoBulletin($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14);

		return $result;
	}

	public function UpdateMemoBulletin2($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateMemoBulletin2($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14);

		return $result;
	}

	public function VideAbsence($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->VideAbsence($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10);

		return $result;
	}

	public function AddAbsence($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddAbsence($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9);

		return $result;
	}

	public function UpdateConduite($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateConduite($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14);

		return $result;
	}

	public function UpdateNoteb($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateNoteb($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14);

		return $result;
	}

	public function Appabs($a1, $a2, $a3, $a4, $a5)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Appabs($a1, $a2, $a3, $a4, $a5);

		return $result;
	}

	public function Cqui($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Cqui($a1, $a2);

		return $result;
	}

	public function ModBulletinCours($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModBulletinCours($a1, $a2, $a3);

		return $result;
	}

	public function OrdreMatiere($a1, $a2, $a3, $a4, $a5)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->OrdreMatiere($a1, $a2, $a3, $a4, $a5);

		return $result;
	}

	public function TestCode()
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TestCode();

		return $result;
	}

	public function GetAll2($code)
	{
		$client2 	= 	$this->init_soap_client2();
		$result    	=   $client2->GetAll2($code);

		return $result;
	}


	public function GetCandidat($a1, $code)
	{
		$client2 	= 	$this->init_soap_client2();
		$result    	=   $client2->GetCandidat($a1, $code);

		return $result;
	}


	public function RechercheClasse($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->RechercheClasse($a1, $code);

		return $result;
	}


	public function GetEtabl($code)
	{
		$client2 	= 	$this->init_soap_client2();
		$result    	=   $client2->GetEtabl($code);

		return $result;
	}


	public function GetPersonneResp($code)
	{
		$client2 	= 	$this->init_soap_client2();
		$result    	=   $client2->GetPersonneResp($code);

		return $result;
	}

	public function DeleteDossier($code)
	{
		$client2 	= 	$this->init_soap_client2();
		$result    	=   $client2->DeleteDossier($code);

		return $result;
	}

	public function ListeRub($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeRub($code);

		return $result;
	}


	public function AddRubrique($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddRubrique($a1, $code);

		return $result;
	}

	public function LstRecu($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstRecu($a1, $a2, $code);

		return $result;
	}

	public function LstRecu_data($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstRecu_data($a1, $a2, $code);

		return $result;
	}

	public function LstDepense_data($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstDepense_data($a1, $a2, $a3, $code);

		return $result;
	}


	public function AddDepense($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddDepense($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $code);

		return $result;
	}


	public function ImpressionPromo($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ImpressionPromo($a1, $a2, $code);

		return $result;
	}

	public function ImpressionPromoEmail($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ImpressionPromoEmail($a1, $a2, $code);

		return $result;
	}


	public function ListeEleve($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeEleve($a1, $code);

		return $result;
	}

	public function ListeEleve__2($a1, $code, $annee)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeEleve__2($a1, $code, $annee);

		return $result;
	}

	public function ListEmpruntOuvrage($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListEmpruntOuvrage($a1, $code);

		return $result;
	}

	public function DelEmpruntOuvrage($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DelEmpruntOuvrage($a1, $code);

		return $result;
	}

	public function ModEmpruntOuvrage($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModEmpruntOuvrage($a1, $a2, $code);

		return $result;
	}

	public function AddEmpruntOuvrage($a1, $a2, $a3, $a4, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddEmpruntOuvrage($a1, $a2, $a3, $a4, $code);

		return $result;
	}

	public function Get_fichier($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_fichier($a1, $code);

		return $result;
	}

	public function Get_le_fichier($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_le_fichier($a1, $code);

		return $result;
	}


	public function add_fichier_joint($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->add_fichier_joint($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code);

		return $result;
	}

	public function add_fichier_joint_message($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->add_fichier_joint_message($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code);

		return $result;
	}


	public function add_fichier_joint_message_personnel($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->add_fichier_joint_message_personnel($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code);

		return $result;
	}


	public function delete_fichier_joint($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->delete_fichier_joint($a1, $code);

		return $result;
	}

	public function SendMailEleve($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SendMailEleve($a1, $a2, $a3, $code);

		return $result;
	}


	public function ListeAutresFrais($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeAutresFrais($code);

		return $result;
	}



	public function ListPaiementEtude($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListPaiementEtude($a1, $a2, $code);

		return $result;
	}


	public function get_reference($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->get_reference($a1);

		return $result;
	}



	public function Add_paiement($a1, $a2, $a3, $a4, $b1, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $ref, $code, $notifier, $idpar, $par)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Add_paiement($a1, $a2, $a3, $a4, $b1, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $ref, $code, $notifier, $idpar, $par);

		return $result;
	}




	public function ResetEconomat2($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetEconomat2($a1, $a2, $a3);

		return $result;
	}


	public function Lerecu($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Lerecu($a1, $a2);

		return $result;
	}

	public function u_programme_option($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->u_programme_option($a1, $a2);

		return $result;
	}

	public function QteSession_etu($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->QteSession_etu($a1, $a2, $a3);

		return $result;
	}

	public function LstPersonneEtu($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstPersonneEtu($a1, $a2);

		return $result;
	}

	public function UpPaiementEtud($a1, $a2, $a3, $a4, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpPaiementEtud($a1, $a2, $a3, $a4, $code);

		return $result;
	}

	public function CreerFacture($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CreerFacture2($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $code);

		return $result;
	}


	public function DeletePaiement($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeletePaiement($a1, $code);

		return $result;
	}


	public function PaiementEtudParent($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->PaiementEtudParent($a1, $a2, $code);

		return $result;
	}

	public function ListeFormationClasseAbsence($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeFormationClasseAbsence($a1, $a2, $a3, $code);

		return $result;
	}

	public function ListeFormationClasse2($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeFormationClasse2($a1, $a2, $a3, $code);

		return $result;
	}


	public function TableauMoyennes($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TableauMoyennes($a1, $a2, $a3, $code);

		return $result;
	}


	public function ListeAccesClasse($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeAccesClasse($a1, $code);

		return $result;
	}

	public function ListeFormationClasseBulletinData($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeFormationClasseBulletinData($a1, $a2, $a3, $code);

		return $result;
	}

	public function Get_fichier_2($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_fichier_2($a1, $code);

		return $result;
	}

	public function Get_fichier_3($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_fichier_3($a1, $code);

		return $result;
	}
	public function Get_fichier_5($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_fichier_5($a1, $code);

		return $result;
	}

	public function ListePayroll_employe($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListePayroll_employe($a1, $code);

		return $result;
	}



	public function ListeFormationClassePalmaresse($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeFormationClassePalmaresse($a1, $a2, $a3, $code);

		return $result;
	}

	public function ListeFormationClassePalmaresse_access($idprogramme, $annee, $groupe, $matiere, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeFormationClassePalmaresse_access($idprogramme, $annee, $groupe, $matiere, $code);

		return $result;
	}

	public function ResetMoyenneGenerale($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetMoyenneGenerale($a1, $a2, $code);

		return $result;
	}

	public function PalmaresPdf($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->PalmaresPdf($a1, $a2, $a3, $code);

		return $result;
	}

	public function ListeAnneeActive($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeAnneeActive($code);

		return $result;
	}


	public function MatierePalmaresse($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->MatierePalmaresse($a1, $a2, $a3, $code);

		return $result;
	}

	public function MatierePalmaresse_access($classe, $annee, $groupe, $matiere, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->MatierePalmaresse_access($classe, $annee, $groupe, $matiere, $code);

		return $result;
	}


	public function PalmaresseNew($id, $annee, $gp, $periode, $lecode)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->PalmaresseNew($id, $annee, $gp, $periode, $lecode);

		return $result;
	}




	public function BulletinMatiere($a1, $a2, $a3, $a4, $a5, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->BulletinMatiere($a1, $a2, $a3, $a4, $a5, $code);

		return $result;
	}

	public function ModPasse($a1, $a2, $a3, $a4, $a5, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModPasse($a1, $a2, $a3, $a4, $a5, $code);

		return $result;
	}


	public function LstRecu_dataID($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstRecu_dataID($a1, $code);

		return $result;
	}


	public function RechercheDepense($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->RechercheDepense($a1, $code);

		return $result;
	}


	public function ModDepense($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModDepense($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $code);

		return $result;
	}


	public function DeleteDepense($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeleteDepense($a1, $code);

		return $result;
	}


	public function LstDepense($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstDepense($a1, $a2, $a3, $code);

		return $result;
	}


	public function LstRubrique($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstRubrique($code);

		return $result;
	}


	public function UpdateRubrique($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateRubrique($a1, $a2, $code);

		return $result;
	}

	public function PaiementEtud2($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->PaiementEtud2($a1, $a2, $code);

		return $result;
	}

	public function Mod_Access($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Mod_Access($a1, $a2, $code);

		return $result;
	}

	public function PaiementEtudAnticiper($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->PaiementEtudAnticiper($a1, $a2, $code);

		return $result;
	}


	public function ListeVersement($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeVersement($a1, $code);

		return $result;
	}


	public function ListeFormationClasseBalance($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeFormationClasseBalance($a1, $a2, $a3, $code);

		return $result;
	}

	public function Recette($a1, $a2, $a3, $a4, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Recette($a1, $a2, $a3, $a4, $code);

		return $result;
	}

	public function RecetteData($a1, $a2, $a3, $a4, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->RecetteData($a1, $a2, $a3, $a4, $code);

		return $result;
	}


	public function  SetIdProgrammeB1($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SetIdProgrammeB1($code);

		return $result;
	}



	public function  Rapport_economat_ecole($code, $a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Rapport_economat_ecole($code, $a1);

		return $result;
	}

	public function  Rapport_economat_ecole2($code, $a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Rapport_economat_ecole_2($code, $a1);

		return $result;
	}

	public function  DroitGroup($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DroitGroup($a1);

		return $result;
	}
	public function  GetImage($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetImage($a1);

		return $result;
	}

	public function  UpdateGroup($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $idgp)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpdateGroup($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $idgp);

		return $result;
	}

	public function AddAutresFrais($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddAutresFrais($a1, $a2, $a3, $code);

		return $result;
	}

	public function ModAutresFrais($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModAutresFrais($a1, $a2, $a3, $code);

		return $result;
	}

	public function DeleteAutresFrs($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeleteAutresFrs($a1, $code);

		return $result;
	}


	public function SynchroniserBulletin($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SynchroniserBulletin($a1, $a2, $code);

		return $result;
	}


	public function afficher_log($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->afficher_log($a1, $a2, $a3, $code);

		return $result;
	}


	public function MoyenneDiscipline_2($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->MoyenneDiscipline_2($a1, $a2, $code);

		return $result;
	}

	public function TotalRecord($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TotalRecord($code);

		return $result;
	}
	public function ListPersonnelAll($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListPersonnelAll($a1, $code);

		return $result;
	}

	public function AddPersonnel($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddPersonnel($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21);

		return $result;
	}

	public function SetMatiereEnseignant($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SetMatiereEnseignant($a1, $a2, $a3);

		return $result;
	}

	public function ModPersonnel($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModPersonnel($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23);

		return $result;
	}

	public function ListPersonnel($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListPersonnel($a1, $code);

		return $result;
	}


	public function ResetPersonnel($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetPersonnel($a1, $code);

		return $result;
	}

	public function AddAccesClasse($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddAccesClasse($a1, $a2, $a3, $code);

		return $result;
	}


	public function ModPasse2($a1, $a2, $a3, $a4, $a5, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModPasse2($a1, $a2, $a3, $a4, $a5, $code);

		return $result;
	}

	public function Add_Presense($a1, $a2, $a3, $a4, $a5, $a6, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Add_Presense($a1, $a2, $a3, $a4, $a5, $a6, $code);

		return $result;
	}


	public function DeleteAccesClasse($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeleteAccesClasse($a1, $code);

		return $result;
	}

	public function Salaire($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Salaire($a1, $code);

		return $result;
	}


	public function addSalaire($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->addSalaire($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $code);

		return $result;
	}

	public function update_taxe($a1, $a2, $a3, $a4, $a5, $a6, $a7, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->update_taxe($a1, $a2, $a3, $a4, $a5, $a6, $a7, $code);

		return $result;
	}

	public function DelSalaire($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DelSalaire($a1, $code);

		return $result;
	}

	public function ListeCollaborateurPayroll($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeCollaborateurPayroll($code);

		return $result;
	}


	public function Creer_payroll($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Creer_payroll($a1, $code);

		return $result;
	}

	public function Creer_bonus($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Creer_bonus($a1, $a2, $code);

		return $result;
	}


	public function Categorie_payroll($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Categorie_payroll($code);

		return $result;
	}

	public function ListePayroll($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListePayroll($a1, $a2, $a3, $code);

		return $result;
	}


	public function add_fichier_joint_calendrier($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->add_fichier_joint_calendrier($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $code);

		return $result;
	}


	public function GetNotification($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetNotification($a1, $code);

		return $result;
	}

	public function TotalNotifier($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TotalNotifier($a1, $code);

		return $result;
	}

	public function Lecture($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Lecture($a1, $code);

		return $result;
	}


	public function VerifierBulletin($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->VerifierBulletin($code);

		return $result;
	}


	public function VerifierAttestation($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->VerifierAttestation($code);

		return $result;
	}


	public function VerifierEmployer($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->VerifierEmployer($code);

		return $result;
	}


	public function DerniereClasse($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DerniereClasse($a1, $code);

		return $result;
	}

	public function GetLastPromo($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetLastPromo($a1);

		return $result;
	}

	public function SetPinnApp($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SetPinnApp($code);

		return $result;
	}

	public function Transcript($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Transcript($a1, $code);

		return $result;
	}

	public function Label_pin_app($code, $programme, $annee, $groupe)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Label_pin_app($code, $programme, $annee, $groupe);

		return $result;
	}

	public function Liste_definitive_annee($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Liste_definitive_annee($code);

		return $result;
	}


	public function Setliste_defivitive($annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Setliste_defivitive($annee, $code);

		return $result;
	}



	public function setPin_app_enseignant($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->setPin_app_enseignant($code);

		return $result;
	}

	public function SeconnecterPIN($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SeconnecterPIN($code);

		return $result;
	}

	public function get_reference_pmt($idetu, $annee, $desc)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->get_reference_pmt($idetu, $annee, $desc);

		return $result;
	}

	public function Get_le_Parent($id, $lecode)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_le_Parent($id, $lecode);

		return $result;
	}

	public function Set_parent($id, $nom, $prenom, $email, $tel, $lien, $adresse, $info, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Set_parent($id, $nom, $prenom, $email, $tel, $lien, $adresse, $info, $code);

		return $result;
	}


	public function UpParent($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->UpParent($id, $code);

		return $result;
	}

	public function AddCoursSimple($idcours, $idfaculte, $titre, $coef, $idpromotion, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddCoursSimple($idcours, $idfaculte, $titre, $coef, $idpromotion, $code);

		return $result;
	}


	public function AddPersonneResp_save($id, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddPersonneResp_save($id, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $code);

		return $result;
	}


	public function ConnectedParent($annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ConnectedParent($annee, $code);

		return $result;
	}

	public function ResetMpPersonnel($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetMpPersonnel($a1, $code);

		return $result;
	}

	public function GetTotalEcole($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetTotalEcole($a1);

		return $result;
	}

	public function GetTotalEns($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetTotalEns($a1);

		return $result;
	}

	public function GetTotalEleve($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetTotalEleve($a1, $a2);

		return $result;
	}

	public function GetSuccesEchec($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetSuccesEchec($a1);

		return $result;
	}

	public function GetAnneeEcole($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetAnneeEcole($a1);

		return $result;
	}

	public function ValiderResetPassword($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ValiderResetPassword($a1);

		return $result;
	}

	public function DelcoursClasseProgramme($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DelcoursClasseProgramme($a1, $a2, $a3, $code);

		return $result;
	}

	public function GetMatiereProgramme($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetMatiereProgramme($a1, $a2, $code);

		return $result;
	}


	public function AjouterContenu($titre_cours, $contenuCours, $creer_par, $format, $idcategorie, $type_doc, $extension, $taille, $ordre, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AjouterContenu($titre_cours, $contenuCours, $creer_par, $format, $idcategorie, $type_doc, $extension, $taille, $ordre, $code);

		return $result;
	}

	public function RatacherContenu($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->RatacherContenu($a1, $a2, $code);

		return $result;
	}

	public function LastNiveau($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LastNiveau($a1, $a2, $a3, $code);

		return $result;
	}

	public function GetCoursProgramme($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetCoursProgramme($a1, $a2, $a3, $code);

		return $result;
	}

	public function GetCoursContenue($code_cours, $idcategorie, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetCoursContenue($code_cours, $idcategorie, $code);

		return $result;
	}

	public function ModifierContenu($code_cours, $titre, $taille, $extension, $contenuCours, $ordre, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ModifierContenu($code_cours, $titre, $taille, $extension, $contenuCours, $ordre, $code);

		return $result;
	}

	public function SupprimerContenu($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SupprimerContenu($a1, $code);

		return $result;
	}

	public function CouperContenu($code_cours, $idcategorie, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CouperContenu($code_cours, $idcategorie, $code);

		return $result;
	}

	public function ImporterContenu($a1, $a2, $a3, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ImporterContenu($a1, $a2, $a3, $code);

		return $result;
	}

	public function CreerDevoir($description, $contenueDevoir, $corrige, $annee, $idprogramme, $idmatiere, $groupe, $sur, $dateAu, $creer_par, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CreerDevoir($description, $contenueDevoir, $corrige, $annee, $idprogramme, $idmatiere, $groupe, $sur, $dateAu, $creer_par, $code);

		return $result;
	}


	public function GetDevoir($idprogramme, $annee, $groupe, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetDevoir($idprogramme, $annee, $groupe, $code);

		return $result;
	}

	public function MwenSe($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->MwenSe($code);

		return $result;
	}

	public function InvitationClasse($annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->InvitationClasse($annee, $code);

		return $result;
	}

	public function AnneePaiementEco($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AnneePaiementEco($code);

		return $result;
	}


	public function CloseCours($idprogramme, $idcours, $etat, $annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CloseCours($idprogramme, $idcours, $etat, $annee, $code);

		return $result;
	}


	public function ActionCategorieCours($idcategorie, $categorie, $idprogramme, $groupe, $idcours, $ordre, $supprimer, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ActionCategorieCours($idcategorie, $categorie, $idprogramme, $groupe, $idcours, $ordre, $supprimer, $code);

		return $result;
	}

	public function LstCategorieCours($idcategorie, $idprogramme, $groupe, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LstCategorieCours($idcategorie, $idprogramme, $groupe, $idcours, $code);

		return $result;
	}


	public function ActionRessource($idressources, $code_cours, $description, $contenu, $extension, $taille, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ActionRessource($idressources, $code_cours, $description, $contenu, $extension, $taille, $code);

		return $result;
	}

	public function LesRessources($code_cours,  $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LesRessources($code_cours,  $code);

		return $result;
	}


	public function Ajout_question($idprogramme, $groupe, $idcours, $idcontenu, $libelle, $creer_par, $image, $extension, $taille, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Ajout_question($idprogramme, $groupe, $idcours, $idcontenu, $libelle, $creer_par, $image, $extension, $taille, $code);

		return $result;
	}

	public function Ajout_reponse($idquestion, $reponse, $image, $extension, $taille, $est_bonne, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Ajout_reponse($idquestion, $reponse, $image, $extension, $taille, $est_bonne, $code);

		return $result;
	}


	public function LesQuestionsReponses($idprogramme, $groupe, $idcours,  $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LesQuestionsReponses($idprogramme, $groupe, $idcours,  $code);

		return $result;
	}


	public function cut_question($idquestion, $idcontenu, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->cut_question($idquestion, $idcontenu, $code);

		return $result;
	}



	public function delete_question($idquestion, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->delete_question($idquestion, $code);

		return $result;
	}

	public function LaQuestionReponse($idquestion, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LaQuestionReponse($idquestion, $code);

		return $result;
	}


	public function Modifier_question($idquestion, $libelle, $image, $extension, $taille, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Modifier_question($idquestion, $libelle, $image, $extension, $taille, $code);

		return $result;
	}

	public function Modifier_reponse($action, $idquestion, $idreponse, $reponse, $est_bonne, $image, $extension, $taille, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Modifier_reponse($action, $idquestion, $idreponse, $reponse, $est_bonne, $image, $extension, $taille, $code);

		return $result;
	}

	public function Control_del($cle_select, $cle_where, $table, $valeur, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Control_del($cle_select, $cle_where, $table, $valeur, $code);

		return $result;
	}

	public function Supprimer_image($table, $id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Supprimer_image($table, $id, $code);

		return $result;
	}


	public function ActionActivites($action, $code_activite, $intitule, $type, $date_limite, $enonce, $creer_par, $taille, $idprogramme, $groupe, $idcours, $annee_academique, $extension, $supprimer, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ActionActivites($action, $code_activite, $intitule, $type, $date_limite, $enonce, $creer_par, $taille, $idprogramme, $groupe, $idcours, $annee_academique, $extension, $supprimer, $code);

		return $result;
	}

	public function TravauxPratiques($idprogramme, $groupe, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TravauxPratiques($idprogramme, $groupe, $idcours, $code);

		return $result;
	}

	public function TravailPratique($code_activite, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TravailPratique($code_activite, $code);

		return $result;
	}


	public function ListeActiviteRendu($idprogramme, $groupe, $idcours, $code_activite, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeActiviteRendu($idprogramme, $groupe, $idcours, $code_activite, $code);

		return $result;
	}

	public function correctionDevoir($idetudiants, $code_activite, $note, $bareme, $info, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->correctionDevoir($idetudiants, $code_activite, $note, $bareme, $info, $code);

		return $result;
	}


	public function DeleteDevoir($code_activite, $idetudiants, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DeleteDevoir($code_activite, $idetudiants, $code);

		return $result;
	}


	public function creer_evaluation($description_eval, $information, $date_debut, $date_fin, $duree, $nbQuestion, $mode_select, $idprogramme, $groupe, $idcours, $les_questions, $annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->creer_evaluation($description_eval, $information, $date_debut, $date_fin, $duree, $nbQuestion, $mode_select, $idprogramme, $groupe, $idcours, $les_questions, $annee, $code);

		return $result;
	}

	public function ListeEvaluation($idprogramme, $groupe, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeEvaluation($idprogramme, $groupe, $idcours, $code);

		return $result;
	}



	public function delete_evaluation($idevaluation, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->delete_evaluation($idevaluation, $code);

		return $result;
	}



	public function modifier_evaluation($idevaluation, $description_eval, $information, $date_debut, $date_fin, $duree, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->modifier_evaluation($idevaluation, $description_eval, $information, $date_debut, $date_fin, $duree, $code);

		return $result;
	}


	public function delete_q_elav($idevaluation, $questions, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->delete_q_elav($idevaluation, $questions, $code);

		return $result;
	}

	public function add_q_elav($idevaluation, $questions, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->add_q_elav($idevaluation, $questions, $code);

		return $result;
	}

	public function Resultat_Qcm($idevaluation, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Resultat_Qcm($idevaluation, $code);

		return $result;
	}

	public function FeuilleCorrigee($idetudiants, $idevaluation, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->FeuilleCorrigee($idetudiants, $idevaluation, $code);

		return $result;
	}

	public function LesBonnesReponses($idevaluation, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LesBonnesReponses($idevaluation, $code);

		return $result;
	}

	public function getForum($idprogramme, $groupe, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->getForum($idprogramme, $groupe, $idcours, $code);

		return $result;
	}

	public function ajouter_forum($idetudiants, $message, $idprogramme, $groupe, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ajouter_forum($idetudiants, $message, $idprogramme, $groupe, $idcours, $code);

		return $result;
	}

	public function ajouter_forum_reponse($idetudiants, $reference, $message, $idprogramme, $groupe, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ajouter_forum_reponse($idetudiants, $reference, $message, $idprogramme, $groupe, $idcours, $code);

		return $result;
	}


	public function delete_forum($idforum, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->delete_forum($idforum, $code);

		return $result;
	}


	public function import_enseignant($groupuser, $classe, $groupeclasse, $les_enseignants, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->import_enseignant($groupuser, $classe, $groupeclasse, $les_enseignants, $code);

		return $result;
	}

	public function import_eleve($groupeleve, $classe, $annee, $eleves, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->import_eleve($groupeleve, $classe, $annee, $eleves, $code);

		return $result;
	}

	public function import_bulletin_eleve($lesPeriodes, $annee, $notes, $code)
	{
		$client  = 	 $this->init_soap_client();
		$result  =   $client->import_bulletin_eleve($lesPeriodes, $annee, $notes, $code);

		return $result;
	}

	public function ImporterCategorie($a_importer, $importer_dans, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ImporterCategorie($a_importer, $importer_dans, $code);

		return $result;
	}

	public function DisqueElearning($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DisqueElearning($code);

		return $result;
	}

	public function ChangeGroupeEnseignant($groupe, $id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ChangeGroupeEnseignant($groupe, $id, $code);

		return $result;
	}

	public function deleteFichierMessage($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->deleteFichierMessage($a1, $code);

		return $result;
	}

	public function CountTableMessage($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CountTableMessage($code);

		return $result;
	}

	public function CountTablePublipostage($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->CountTablePublipostage($code);

		return $result;
	}

	public function Get_fichier_3_bis($idetudiant, $offset, $no_of_records_per_page, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_fichier_3_bis($idetudiant, $offset, $no_of_records_per_page, $code);

		return $result;
	}

	public function Get_fichier_2_bis($idetudiant, $offset, $no_of_records_per_page, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Get_fichier_2_bis($idetudiant, $offset, $no_of_records_per_page, $code);

		return $result;
	}

	public function LeSolde($annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LeSolde($annee, $code);

		return $result;
	}

	public function ControleLicence($code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ControleLicence($code);

		return $result;
	}

	public function SetContrat($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SetContrat($a1, $code);

		return $result;
	}

	public function MoyenneClasse($groupe, $idfaculte, $annee, $idprogramme, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->MoyenneClasse($groupe, $idfaculte, $annee, $idprogramme, $code);

		return $result;
	}

	public function BulletinDataNew($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->BulletinDataNew($a1, $code);

		return $result;
	}

	public function BulletinData_access($a1, $a2, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->BulletinData_access($a1, $a2, $code);

		return $result;
	}

	public function get_groupe_promo($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->get_groupe_promo($a1, $code);

		return $result;
	}

	public function GetMatiereClasse($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetMatiereClasse($a1, $code);

		return $result;
	}

	public function BulletinData_all_lignt($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->BulletinData_all_lignt($a1, $code);

		return $result;
	}

	public function AbsRet($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AbsRet($a1, $code);

		return $result;
	}

	public function delete_bulletin($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->delete_bulletin($a1, $code);

		return $result;
	}

	public function ClasseAll($lecode)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ClasseAll($lecode);

		return $result;
	}

	public function add_parascolaire($idetudiants, $idcours, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->add_parascolaire($idetudiants, $idcours, $code);

		return $result;
	}

	public function Liste_parascolaire($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->Liste_parascolaire($a1, $code);

		return $result;
	}

	public function up_parascolaire($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->up_parascolaire($id, $code);

		return $result;
	}

	public function NouvelleAttestation($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->NouvelleAttestation($id, $code);

		return $result;
	}

	public function NouvelleAttestation2($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->NouvelleAttestation2($id, $code);

		return $result;
	}
	public function PosterDecisionAnnuelle($id, $memo, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->PosterDecisionAnnuelle($id, $memo, $code);

		return $result;
	}

	public function L_ActiviteRendu($code_activite, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->L_ActiviteRendu($code_activite, $code);

		return $result;
	}

	public function LaRessource($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LaRessource($id, $code);

		return $result;
	}


	public function GetAnniversaire($annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->GetAnniversaire($annee, $code);

		return $result;
	}


	public function clearCoursClasse($a1, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->clearCoursClasse($a1, $code);

		return $result;
	}

	public function listeAbsenceEleve($annee, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->listeAbsenceEleve($annee, $code);

		return $result;
	}

	public function deleteAdsence($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->deleteAdsence($id, $code);

		return $result;
	}

	public function deleteAdsenceArray($id, $code)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->deleteAdsenceArray($id, $code);

		return $result;
	}





	//===================================================================	

}
