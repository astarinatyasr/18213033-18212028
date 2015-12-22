<?php
	if (isset($_GET["action"]) && isset($_GET["NIM"]) && ($_GET["action"])=="get_info" ){
		/* Redirect browser */
		$url = 'http://localhost/rest-api.php?action=get_info&NIM=' . $_GET["NIM"] . '&format=' . $_GET["format"];
		header("Location: " . $url);
	}
	/* Make sure that code below does not get executed when we redirect. */
	exit;
?>
