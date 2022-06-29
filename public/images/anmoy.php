<?php // content="text/plain; charset=utf-8"
require_once ('../application/third_party/jpgraph/jpgraph.php');
require_once ('../application/third_party/jpgraph/jpgraph_pie.php');
require_once ('../application/third_party/jpgraph/jpgraph_pie3d.php');

$ldata = "0000-0000__1__0";
if(isset($_GET['data'])){
	$ldata = $_GET['data'];
}
$t = explode("__",$ldata);

$data = array($t[1],$t[2]); 
$graph = new PieGraph(200,170);
$graph->SetShadow();
$graph->title->Set($t[0]);
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot3D($data);
$p1->SetAngle(20);
$p1->SetSize(0.30);
$p1->SetCenter(0.5,0.52);
$p1->SetLegends($t = array("Succès: ".$t[1],"Échec: ".$t[2]));
 
$graph->Add($p1);
$p1->SetSliceColors(array('#008055','#E13232')); 
$graph->Stroke();
 
?>