<?php

	if (isset($_GET["action"]) && isset($_GET["id"]) && isset($_GET["action"])=="get_info"){
		$info = file_get_contents('http://localhost/rest-api.php?action=get_info&id=' . $_GET["id"]);
			echo $info;
	echo '<br />';
	echo '<br />';
		$info = json_decode($info,true);
	}
?>

<TABLE>
<tr>
	<td>ID: </td>
	<td> <?php echo $info["id"] ?></td>
</tr>
<tr>
	<td>Nama:  </td>
	<td> <?php echo $info["nama"] ?></td>
</tr>
</TABLE>