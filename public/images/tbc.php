<?php // content="text/plain; charset=utf-8"
session_name('MessaOnlineWebBase'); 
if (!isset($_SESSION)) {
  session_start();
}
require_once ('../application/third_party/jpgraph/jpgraph.php');
require_once ('../application/third_party/jpgraph/jpgraph_line.php');
require_once ('format.php');


//$soapParameters = Array('login' => "admin", 'password' => $Lastkey) ;

//require_once ("lien_ws.php"); 
//$client 	= new SOAPclient($lien_ws,$soapParameters);


$datay1 = array();
$datax = array();

$datay1 = unserialize($_GET['y']);
$datax 	= unserialize($_GET['x']);

// Setup the graph
$graph = new Graph(760,80);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($datax);
$graph->xgrid->SetColor('#E3E3E3');
$graph->SetMargin(25,22,22,22);
// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");

$graph->legend->SetFrameWeight(1);
$p1->value->Show();
$p1->value->SetFormat('%01.2f');
// Output line
$graph->Stroke();

?>