<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
</head>

<body>
	<h1>HASIL SURVEY</h1>

	<a href="<?= BASEURL ?>admin/exportToxlsx">Export to Excel</a>

	<table border="1" cellpadding="10" cellspacing="0"">
			<tr>
				<td>Nama</td>
				<td>Bidang</td>
				<td>Sub Bidang</td>
				<td>Sub Sub Bidang</td>
				<td>Saran</td>
			</tr>
			
			<?php foreach ($data['result'] as $result) : ?>
				<tr>
					<td><?= $result['nama']; ?></td>
					<td><?= $result['bidang']; ?></td>
					<td><?= $result['sub_bidang']; ?></td>
					<td><?= $result['sub_sub_bidang']; ?></td>
					<td><?= $result['saran']; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
</body>
</html>