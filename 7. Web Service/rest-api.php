<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
	function get_info_by_NIM($NIM){
		mysql_connect('localhost', 'root', '');
		mysql_select_db('dbprogif');
		$info = array();
		$result = mysql_query('SELECT * FROM  datakader where NIM=' . $NIM);
		$info = mysql_fetch_array($result, MYSQL_ASSOC);
		return $info;
	}
	
	if (isset($_GET["action"])){
		switch($_GET["action"]){
			case "get_info";
				if (isset($_GET["NIM"]))
					$value = get_info_by_NIM($_GET["NIM"]);
				else
					$value = "ERROR";
				break;
		}
	}
	
?>

<div id="mycanvas" class="row" style="height:1080px;width:1080px;overflow:scroll;">
                <table id="employees" class="table table-condensed table-bordered table-hover">   
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info"><?php echo "Id"?></td>
						<td><?php echo $value['id']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></td>
                        <td style="width:100px" class="info">Nama</th>
                        <td><?php echo $value['Nama']?></td>
                    </tr>
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">NIM</td>
						<td><?php echo $value['NIM']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Unit/Himpunan/Organisasi</td>
                        <td><?php echo $value['Unit/Himpunan/Organisasi']?></td>
                    </tr>
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Event Kepanitian 1</td>
						<td><?php echo $value['Event_Kepanitiaan_1']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Posisi</td>
                        <td><?php echo $value['Posisi_1']?></td>
                    </tr>
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Tahun Mulai</td>
						<td><?php echo $value['Tahun_Mulai_1']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Tahun Akhir</td>
                        <td><?php echo $value['Tahun_Akhir_1']?></td>
                    </tr>
       
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Event Kepanitian 2</td>
						<td><?php echo $value['Event_Kepanitiaan_2']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Posisi</td>
                        <td><?php echo $value['Posisi_2']?></td>
                    </tr>
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Tahun Mulai</td>
						<td><?php echo $value['Tahun_Mulai_2']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Tahun Akhir</td>
                        <td><?php echo $value['Tahun_Akhir_2']?></td>
                    </tr>
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Event Kepanitian 3</td>
						<td><?php echo $value['Event_Kepanitiaan_3']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Posisi</td>
                        <td><?php echo $value['Posisi_3']?></td>
                    </tr>
					<tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Tahun Mulai</td>
						<td><?php echo $value['Tahun_Mulai_3']?></td>
                    </tr>
                    <tr>
						<th style="width:100px"></th>
                        <td style="width:100px" class="info">Tahun Akhir</td>
                        <td><?php echo $value['Tahun_Akhir_3']?></td>
                    </tr>
                </table>
</div>

<?php
	if (isset($_GET["format"]) && ($_GET["format"])=="png"){
		echo '<script type="text/javascript">' , "$('#employees').tableExport({type:'png',escape:'false'});", '</script>';
	} elseif (isset($_GET["format"]) && ($_GET["format"])=="csv"){
		echo '<script type="text/javascript">'
		, "$('#employees').tableExport({type:'csv',escape:'false'});"
		, '</script>'
		;
	} elseif (isset($_GET["format"]) && ($_GET["format"])=="xls"){
		echo '<script type="text/javascript">'
		, "$('#employees').tableExport({type:'excel',escape:'false'});"
		, '</script>'
		;
	} elseif (isset($_GET["format"]) && ($_GET["format"])=="txt"){
		echo '<script type="text/javascript">'
		, "$('#employees').tableExport({type:'txt',escape:'false'});"
		, '</script>'
		;
	};

	exit(json_encode($value));
?>

