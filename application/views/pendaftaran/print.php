<!DOCTYPE html>
<html>
<head>
	<title>Print code <?=$row->name?></title>
	<style type="text/css">
		*{
			font-family: sans-serif;
		}
	</style>
</head>
<body>
    <table>
    	<tr>
    		<th>tanggal</th>
    	</tr>
    	<tr>
    		<?php
    			foreach ($report as $result) { ?>
    				<td><?=$result->tgl_pendaftaran?></td>
			<?php }
    		?>
    	</tr>
    </table>
</body>
</html>