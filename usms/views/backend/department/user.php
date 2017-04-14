<html>
<head>
<meta charset="utf-8">
</head>
<body>
<table>
<?php
//var_dump($users);die;
$tt = 0;
foreach ($users as $value) { $tt++;?>
	<tr>
	<td><?php echo $tt;?></td>
	<td><?php echo $value['id'];?></td>
	<td><?php echo $value['fullname']; ?></td>
	<td><?php echo $value['address']; ?></td>
	<td><?php echo $value['birthday']; ?></td>
	<td><?php echo $value['sex']; ?></td>
	<td>UTT</td>
	<td><?php echo $value['education']; ?></td>
	<td><?php echo $value['br_id']; ?></td>
	<td>Chuc vu</td>
	<td><?php echo $value['department_id']; ?></td>
	<td>Que quan</td>
	<td><?php echo $value['city']; ?></td>
	<td>Việt Nam</td>
	<td><?php echo $value['phone']; ?></td>
	<td><?php echo $value['email']; ?></td>
	<td><?php echo $value['avatar']; ?></td>
	<td><?php echo $value['time_create']; ?></td>
	<td><?php echo $value['time_update']; ?></td>
	<td>Create_User</td>
	<td>Modified_User</td>
	<td><?php echo $value['status']; ?></td>
	</tr>
<?php
}

?>
</body>

</table>
</html>
