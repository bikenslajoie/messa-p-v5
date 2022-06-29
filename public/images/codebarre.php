<?php
require_once ('../tools/jpgraph/jpgraph_barcode.php');

$symbology = BarcodeFactory::Create (ENCODING_CODE128 );
$barcode = BackendFactory ::Create(BACKEND_IMAGE, $symbology);
$barcode ->Stroke('ABC123');
?>