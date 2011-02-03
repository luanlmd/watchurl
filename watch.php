<?php
$hash = $_GET['hash'];
$url = base64_decode($_GET['url']);
if($file = file_get_contents($url))
{
	$file = md5($file);
}
$equal = ($file == $hash);
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Watch URL</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<?php if ($equal) { ?>
		<meta http-equiv="refresh" content="10" />
<?php } ?>
	</head> 
	<body>
<?php if ($equal) { ?>
		<h1>No change</h1>
		<p>Content of <a href="<?php echo $url ?>"><?php echo $url ?></a> has not changed.</p>
<?php } else { ?>
		<h1>Wohoooo!</h1>
		<p>The URL content has changed! <a href="<?php echo $url ?>"><?php echo $url ?></a></p>
		<audio controls loop autoplay src="change.ogg"></audio>
<?php } ?>
	</body>
</html>
