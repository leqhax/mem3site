<?php

function DownloadBuild()
{
	if (ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');
	
	$derictory = '../builds/Loader.7z';
	$fp = fopen($derictory, "r") ;
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Description: File Transfer");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"aurora.7z\""); 
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".filesize($derictory));
	header_remove('Content-Encoding');
	ob_end_flush();
	while (!feof($fp)) {
		$buff = fread($fp, 1024);
		print $buff;
	}
	//readfile($derictory);
}
?>