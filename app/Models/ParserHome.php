<?php

namespace App\Models;

use CodeIgniter\Model;

class ParserHome extends Model
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
	//==================  HOME ==========================

	public function ComptePers($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ComptePers($a1);

		return $result;
	}

	public function TotalEleve($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TotalEleve($a1, $a2, $a3);

		return $result;
	}

	public function LicenceDispo($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->LicenceDispo($a1);

		return $result;
	}

	public function TotalParSexe($a1, $a2, $a3)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->TotalParSexe($a1, $a2, $a3);

		return $result;
	}

	public function ListParClasse($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListParClasse($a1, $a2);

		return $result;
	}


	public function ListParClasseSexe($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListParClasseSexe($a1, $a2);

		return $result;
	}

	public function ResultatAnnuel($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ResultatAnnuelNew($a1, $a2);

		return $result;
	}

	public function MoyenneDiscipline($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->MoyenneDiscipline($a1, $a2);

		return $result;
		//return array();
	}

	//===================================================================	

}
