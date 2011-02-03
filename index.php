<?php
$error = false;
if ($_POST)
{
	$url = $_POST['url'];
	if($file = @file_get_contents($url))
	{
		$hash = md5($file);
		$url = base64_encode($url);
		$location = "watch.php?url={$url}&hash={$hash}";
		header("Location: {$location}");
	}
	else { $error = true; }	
}
?>
<!DOCTYPE html>
<html> 
	<head> 
		<title>Watch URL</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style>
			.error { color:red; }
		</style>
	</head> 
	<body>
		<h1>Get a warning if an URL content change</h1>
		<form method="post" action="">
			<p>
				<label>URL:
					<input type="text" name="url" />
				</label>
			</p>
<?php if ($error) { ?>
			<p class="error">
				Error trying to get the URL
			</p>
<?php } ?>
			<input type="submit" />
		</form>
	</body>
</html>
