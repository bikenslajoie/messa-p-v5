<?php // content="text/plain; charset=utf-8"
require_once ('../tools/jpgraph/jpgraph.php');
require_once ('../tools/jpgraph/jpgraph_bar.php');
require_once ('format.php');

$data1y=array(47,80,40,116);
$data2y=array(61,30,82,105);


// Create the graph. These two calls are always required
$graph = new Graph(500,250,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
// ...and add it to the graPH
$graph->Add($gbplot);

$b1plot->value->SetFormatCallback('barValueFormat'); 
$b2plot->value->SetFormatCallback('barValueFormat'); 
$b1plot->value->Show();
$b2plot->value->Show();

$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$b2plot->SetColor("white");
$b2plot->SetFillColor("#11cccc");


$graph->title->Set("Bar Plots");

// Display the graph
$graph->Stroke();
?>