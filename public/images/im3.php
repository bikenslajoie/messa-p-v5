<?php // content="text/plain; charset=utf-8"
require_once ('../tools/jpgraph/jpgraph.php');
require_once ('../tools/jpgraph/jpgraph_pie.php');
require_once ('../tools/jpgraph/jpgraph_pie3d.php');

// Some data
$data = array(100,200);
$datax = array('M=100','F=200');
$graph = new PieGraph(300,150);
$graph->SetShadow();
 
$graph->title->Set("A simple Pie plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$p1 = new PiePlot3D($data);
$p1->SetAngle(15);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends($datax);
$p1->ExplodeSlice(1);
$graph->Add($p1);
 
$graph->Stroke();

?>