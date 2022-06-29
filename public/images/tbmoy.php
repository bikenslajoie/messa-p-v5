<?php // content="text/plain; charset=utf-8"
require_once ('../application/third_party/jpgraph/jpgraph.php');
require_once ('../application/third_party/jpgraph/jpgraph_pie.php');
require_once ('../application/third_party/jpgraph/jpgraph_pie3d.php');

$ldata = "0000-0000__1__0";
if(isset($_GET['data'])){
	$ldata = $_GET['data'];
}
$t = explode("__",$ldata);
if($t[1]==0 and $t[2]==0){
	$data = array("0","1"); 
}else{
	$data = array($t[1],$t[2]); 
}

 
// A new pie graph
$graph = new PieGraph(250,200);
$graph->SetShadow();
 
// Title setup
$graph->title->Set($t[0]);
$graph->title->SetFont(FF_FONT2,FS_BOLD);
 
// Setup the pie plot
$p1 = new PiePlot($data);
 
// Adjust size and position of plot
$p1->SetSize(0.30);
$p1->SetCenter(0.5,0.52);
 
// Setup slice labels and move them into the plot
$p1->value->SetFont(FF_FONT2,FS_BOLD);
$p1->value->SetColor("#ffffff");
$p1->SetLabelPos(0.65);
 
// Explode all slices
$p1->ExplodeAll(7);
 
// Add drop shadow
$p1->SetShadow();
$p1->SetLegends($t = array("Succès: ".$t[1],"Échec: ".$t[2]));
// Finally add the plot
$graph->Add($p1);
$p1->SetSliceColors(array('#008055','#E13232')); 
// ... and stroke it
$graph->Stroke(); 
?>