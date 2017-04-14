<section id="about-us">
	<div class="container">
		<div class="about-us">
			<div class="row">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#magazine" data-toggle="tab"><i class="fa fa-chain-broken"></i> Bài báo khoa học</a></li>
						<li><a href="#mission" data-toggle="tab"><i class="fa fa-th-large"></i> Đề tài khoa học</a></li>
						<li><a href="#community" data-toggle="tab"><i class="fa fa-users"></i> NCKH sinh viên</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="magazine">
							<div id="contact-form-section">
							<form id="magazine-form" class="magazine" name="contact-form" method="get" action="<?php echo base_url().'Site/Home/searchMagazine';?>">
							<?php
								//$attributes = array('class' => 'magazine', 'id' => 'magazine-form');
								//echo form_open('Site/Home/searchMagazine');
							?>
									<div class="row">
										<label for="Name" class="col-sm-3 col-md-3 col-xs-12">Tên bài báo:</label>
										<div class="form-group col-sm-8">
											<input type="text" name="Name" class="form-control">
										</div>
									</div>
									<div class="row">
										<label for="Magazine_Name" class="col-sm-3 col-md-3 col-xs-12">Tên tạp chí:</label>
										<div class="form-group col-sm-8">
											<input type="text" name="Magazine_Name" class="form-control">
										</div>
									</div>
									<div class="row">
										<label for="Magazine_No" class="col-sm-3 col-md-3 col-xs-12">Số tạp chí:</label>
										<div class="form-group col-sm-8">
											<input type="text" name="Magazine_No" class="form-control">
										</div>
									</div>
									<div class="row">
										<label for="Magazine_Year" class="col-sm-3 col-md-3 col-xs-12">Năm xuất bản:</label>
										<div class="form-group col-sm-3">
											<input type="text" name="Magazine_Year" class="form-control">
										</div>
									</div>
									<div class="row">
										<label for="Author_Name" class="col-sm-8 col-md-3 col-xs-12">Tác giả:</label>
										<div class="form-group col-sm-8">
										<input type="text" name="Author_Name" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-11 col-md-11 col-lg-11 col-xs-11">
											<!-- <a name="submit" type="submit" class="btn btn-primary">Tìm kiếm</a> -->
											<button type="submit" class="btn btn-primary" name="submit">Tìm kiếm</button>
										</div>
									</div>
									<?php //echo form_close(); ?>
								</form> 
							</div>
							<!-- Result Display -->
							<?php //var_dump($count);die; ?>
							<div class="result">
							<?php if(isset($datasearch)) { ?>
									<?php
										$count = ($count !== NULL) ? $count : 0;
										echo "<p class='info'><i>Tìm thấy <span class='text-danger'>".$count. "</span> bài báo khoa học.</i></p>";
										foreach ($datasearch as $key) { ?>
										<div class="single-blog">
											<h4 class="title"><a href="<?php echo base_url().'Site/Home/MagazineView/'.$this->encrypt->encode($key->ID); ?>"><?php echo $key->Name; ?></a></h4>
											<ul class="post-meta">
												<li><strong> Tạp chí:</strong> <?php echo $key->Magazine_Name; ?>
												<?php echo isset($key->Magazine_No)? ' - Số '.$key->Magazine_No:"";?>
												</li>
												<li><strong> Tác giả:</strong> <?php echo $key->Author; ?></li>
												<li><strong> Năm:</strong> <?php echo $key->Magazine_Year; ?></li>
											</ul>
										</div>
									<?php } ?>
							        <!-- Pagination -->
							        <div><?php echo $list_paginition; ?></div>
							<?php } ?>
							</div>							
						</div>
						<div class="tab-pane fade" id="mission">
							<div class="media">
								<img class="pull-left media-object" src="<?php echo base_url(); ?>template/frontend/images/underconstruction.jpg" alt="" style="width: 200px;height: 150px"> 
								<div class="media-body">
									<p class="text-danger">Chức năng đang phát triển...</p>
									<p>Vui lòng quay lại sau!</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="community">
							<div class="media">
								<img class="pull-left media-object" src="<?php echo base_url(); ?>template/frontend/images/underconstruction.jpg" alt="" style="width: 200px;height: 150px"> 
								<div class="media-body">
									<p class="text-danger">Chức năng đang phát triển...</p>
									<p>Vui lòng quay lại sau!</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section><!--/#about-us-->