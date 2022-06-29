<?php

namespace App\Models;

use CodeIgniter\Model;

class ParserAnnee extends Model
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

	//==================  ANNEE ACADEMIQUE ==========================

	public function ListeAnnee($a1)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->ListeAnnee($a1);

		return $result;
	}

	public function set_licence($a1, $a2)
	{
		$client 	= 	$this->init_soap_client();
		$result    	=   $client->set_licence($a1, $a2);

		return $result;
	}



	//===================================================================	

}
