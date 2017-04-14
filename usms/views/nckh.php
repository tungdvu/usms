<div>
<h3>Xuất dữ liệu: Nghiên cứu khoa học</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>STT</td>
			<td>Họ tên</td>
			<td>Đề tài</td>
			<td>Năm</td>
			<td>Cấp</td>
			<td>Trách nhiệm</td>
		</tr>
	</thead>
	<?php
		
		$stt = 1;
		foreach ($nckh as $k) { ?>
	<tbody>
		<tr>
			<td><?php echo $stt++; ?></td>
			<td><?php echo $k['tname'] ?></td>
			<td><?php echo $k['name'] ?></td>
			<td><?php echo $k['year'] ?></td>
			<td>
				<?php
	                echo $k['level'] == 1 ? "Cấp Trường" : ""; 
	                echo $k['level'] == 2 ? "Cấp Bộ" : "";  
	                echo $k['level'] == 3 ? "Cấp Nhà nước" : "";
	                echo $k['level'] == 4 ? "Cấp Tỉnh" : "";
	                echo $k['level'] == 5 ? "Cấp Thành phố" : "";
				?>
				
			</td>
			<td><?php echo $k['role'] ?></td>
		</tr>
	</tbody>
	<?php
		}
	?>

</table>

<br>
<h3>Bài báo khoa học</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>STT</td>
			<td>Họ tên</td>
			<td>Tên công trình</td>
			<td>Năm công bố</td>
			<td>Nơi công bố</td>
		</tr>
	</thead>
	<?php
		
		$tt = 1;
		foreach ($baibao as $k) { ?>
	<tbody>
		<tr>
			<td><?php echo $tt++; ?></td>
			<td><?php echo $k['tname'] ?></td>
			<td><?php echo $k['name'] ?></td>
			<td><?php echo $k['year'] ?></td>
			<td><?php echo $k['publish_area'];?></td>
		</tr>
	</tbody>
	<?php
		}
	?>

</table>

</div>
