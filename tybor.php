<?php

$message = "";
$header = "";

$validApps[] = "station identification";
$validApps[] = "diggbarred";
$validApps[] = "la-petite-url";

$application = strip_tags($_GET['app']);
$version = strip_tags($_GET['v']);
$site = strip_tags($_GET['id']);
$extensions = stripslashes(strip_tags($_GET['ext']));
$php_version = strip_tags($_GET['php']);
$apache_version = strip_tags($_GET['apache']);

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
	fwrite($fp, $apache_version);
	fwrite($fp, '	');
	fwrite($fp, $php_version);
	fwrite($fp, '	');
	fwrite($fp, $extensions);
	fwrite($fp, '
');
	fclose($fp);
	
	$message = "Your plugin has been registered. Thanks! We're sending you back to your site, now.";
	$header = '<meta http-equiv="refresh" content="5;URL='. $_GET['back_to'].'&registered=yes">';

}
else
{
	$message =  "not a valid application.";
}

?>
<html>
	<head>
		<title>EXTRA FUTURE Plugin Registration</title>
		<?php echo $header; ?>
	</head>
	<body>
		<p><?php echo $message; ?></p>
	</body>
</html>