<?php // content="text/plain; charset=utf-8"
session_name('MessaOnlineWebBase'); 
if (!isset($_SESSION)) {
  session_start();
}
require_once ('../tools/jpgraph/jpgraph.php');
require_once ('../tools/jpgraph/jpgraph_bar.php');

require_once ('format.php');

ini_set("soap.wsdl_cache_enabled", "0");
require_once ("../../ws/lib/nusoap.php");
require_once ("../key.php");

$soapParameters = Array('login' => "admin", 'password' => $Lastkey) ;

require_once ("../lien_ws.php"); 
$client 	= new SOAPclient($lien_ws,$soapParameters);
$listeCours = $client->ListeClasse($_SESSION['account']['parent']);
// We need some data

$datay = array();
$lstx = array();

foreach($listeCours as $row){
	$lstx[] = utf8_decode($row->groupe);
	$datay[] = 10;
}



$datax = $lstx;



// Setup the graph. 
$graph = new Graph(500,250);    
$graph->SetScale("textlin");
$graph->img->SetMargin(50,15,25,25);
 
//$graph->title->Set('"GRAD_MIDVER"');
$graph->title->SetColor('darkred');
// Setup font for axis
$graph->xaxis->SetFont(FF_FONT1);
$graph->yaxis->SetFont(FF_FONT1);
 
// Create the bar pot

$graph->xaxis->SetTickLabels($datax);

$bplot = new BarPlot($datay);



$bplot->SetWidth(0.6);
 
// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);
 
// Set color for the frame of each bar
$bplot->SetColor("navy");

$graph->Add($bplot);


// Setup the values that are displayed on top of each bar
$bplot->value->SetFormatCallback('barValueFormat');  
$bplot->value->Show(); 
$graph->title->Set("Bar Plots");
// Finally send the graph to the browser
$graph->Stroke();
?>