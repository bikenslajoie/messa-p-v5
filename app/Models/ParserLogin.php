<?php

namespace App\Models;

use CodeIgniter\Model;

class ParserLogin extends Model
{
	private $soap_client, $config, $soapParameters;

	public function __construct()
	{
		ini_set('soap.wsdl_cache_enabled', '0');
		ini_set('soap.wsdl_cache_ttl', '0');
		ini_set("default_socket_timeout", 6000);
		$this->config = new \Config\MessaConfig();
		$this->soapParameters = array('login' => "admin", 'password' =>   $this->config->KeyWs);
		$this->soap_client    = new \SoapClient($this->config->LienWs,    $this->soapParameters);
	}

	public function init_soap_client()
	{
		return $this->soap_client;
	}
	//==================  LOGIN ==========================

	public function SeconnecterAdmin($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SeconnecterAdmin($a1, $a2);

		return $result;
	}


	public function SeconnecterAdminDoralya($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SeconnecterAdminDoralya($a1, $a2);

		return $result;
	}

	public function SeconnecterAdmin_silent($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SeconnecterAdmin($a1, $a2);

		return $result;
	}

	public function ListeGroup($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeGroup($a1);

		return $result;
	}


	public function ListeAnneeActive($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeAnneeActive($a1);

		return $result;
	}

	public function ListeClasseComplet($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeClasseComplet($a1);

		return $result;
	}

	public function AddTracking($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->AddTracking($a1, $a2, $a3);

		return $result;
	}

	public function SeconnecterUser($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SeconnecterUser($a1, $a2);

		return $result;
	}

	public function SeconnecterUser_silent($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->SeconnecterUser($a1, $a2);

		return $result;
	}


	public function DroitGroup($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->DroitGroup($a1);

		return $result;
	}

	public function EmailMessa($message_email, $lesMails, $objet)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->EmailMessa($message_email, $lesMails, $objet);

		return $result;
	}


	public function lstGroupePromo($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->lstGroupePromo($a1);

		return $result;
	}

	public function ListeProgramme($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeProgramme($a1);

		return $result;
	}


	public function ConnectedParent2($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ConnectedParent2($a1, $a2);

		return $result;
	}


	public function ResetMpPersonnel($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResetMpPersonnel($a1);

		return $result;
	}


	//===================================================================	

}
