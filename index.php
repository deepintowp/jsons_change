<?php 

$jsons_directory  = dirname(__FILE__).'/jsons';



$jsons_files = glob($jsons_directory . "/*.json");

//echo "<pre>";
//var_dump($jsons_files);
$i = 0;



foreach($jsons_files as $jsons_file){
	$str = file_get_contents($jsons_file);
	$json = json_decode($str, true);
	$filename = basename($jsons_file, ".json");
	$json['name'] = 'MSB #'.$filename;
	$newjson = json_encode($json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
	$fp = fopen( dirname(__FILE__).'/output_jsons/'.$filename, 'w');
	fwrite($fp, $newjson);
	fclose($fp);
}