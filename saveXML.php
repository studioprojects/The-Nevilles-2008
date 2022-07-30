<?php
$xmlLoc = $_GET['g'];
$file = fopen($xmlLoc, "w+") or die("Can't open XML file");
$xmlString = $HTTP_RAW_POST_DATA; 
if(!fwrite($file, $xmlString)){
print "<?xml version=\"1.0\" encoding=\"utf-8\"?><output>Error writing to XML-file</output>";
}else{
print "<?xml version=\"1.0\" encoding=\"utf-8\"?><output>XML File Saved</output>";
}
fclose($file);
?>
