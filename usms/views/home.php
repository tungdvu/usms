</div>
<article class="post-listing post">
	<div class="single-post-thumb"></div>
	<div class="post-inner">
	<?php
		$msg = $this->session->flashdata('notification');
		if (!empty($msg)) {
			echo '<div class="alert alert-warning alert-dismissable"><b><i class="icon fa fa-'.(isset($msg['type'])?$msg['type']:null).'"></i>Thông báo</b><br>'.(isset($msg['message'])?$msg['message']:null).'</div>';
		}
	?>
	<h1 class="post-title">Danh sách giảng viên<?php //echo $department->name_vn; ?></h1><p class="post-meta"></p>
	<div class="clear"></div>
		<div class="entry">
		<ul class="row">
		<?php
			if (isset($listGV)&&!empty($listGV)) {
				foreach ($listGV as $key => $value) { ?>
					<li class="col-md-6">
							<div class="author-bio">
								<!--<div class="author-avatar">
									<img class="avatar avatar-90 photo img-thumbnail" src="'.imgExist(base_url().'uploads/images/avatar/'.$value['avatar']).'"  height="90" width="90">
								</div>-->

								<div class="author-description">
									<h4><a href="teacher.php/<?php echo slug($value['fullname']).'-gv'.$value['id'].'/profile.html'; ?>"><?php echo $value['fullname'];?></a></h4>
									
									<?php echo isset($value['khoa'])?(' - '.$value['khoa']):null;?>
									<br>
									<?php echo isset($value['coso'])?(' - Cơ sở đào tạo: ' .$value['coso']):null; ?>
								</div>
								<div>
									<a class="more-link" href="teacher.php/<?php echo slug($value['fullname']).'-gv'.$value['id'].'/profile.html'; ?>">Lý lịch khoa học »</a>
								</div>								
								<div class="clear"></div>
							</div>
					</li>
				<?php
				}
			}
		?>
		</ul>
		</div>
	</div>
</article>
									<!-- <a class="more-link" href="teacher.php/'.slug($value['fullname']).'-gv'.$value['id'].'.html'.'">Xem Chi Tiết »</a> -->