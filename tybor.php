<?php

$validApps[] = "station identification";
$validApps[] = "diggbarred";
$validApps[] = "la-petite-url";

$application = $_POST['app'];
$version = $_POST['v'];
$site = $_POST['id'];
$extensions = $_POST['ext'];

if($site == "")
{
	$site = "n/a";
}

if(in_array($application,$validApps))
{

	$fp = fopen('registrations.txt','a');
	fwrite($fp, time());
	fwrite($fp, '	');
	fwrite($fp,$application);
	fwrite($fp, '	');
	fwrite($fp, $version);
	fwrite($fp, '	');
	fwrite($fp, $site);
	fwrite($fp,'	');
	fwrite($fp, $extensions);
	fwrite($fp, '
');
	fclose($fp);

}
else
{
	echo "not a valid application.";
}

?>