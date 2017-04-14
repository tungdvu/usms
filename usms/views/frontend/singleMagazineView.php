<div class="row">
	<div class="page-content container">
	<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9">
			<!-- Panel -->
			<div class="panel panel-default"> 
				<div class="panel-heading" role="tab">
					<i class="icon fa fa-bars" aria-hidden="true"></i> Thông tin chi tiết bài báo khoa học
				</div>    
				<div class="panel-body content">
					<div class="list-group-item">
						<h4 class="media-heading">Tên bài báo:</h4><?php echo isset($magazines->Name) ? $magazines->Name: ""; ?>
					</div>                    
					<div class="">                      
						<dl class="dl-horizontal">
							<dt class="col-xs-12 col-sm-5"><span><i class="icon fa fa-user" title="Tác giả"></i></span> Tác giả:</dt>
							<dd class="">
								<a href="javascript:void(0)"><span><?php echo isset($magazines->Author) ? $magazines->Author: ""; ?></span></a></dd>
								<?php if(!empty(json_decode($magazines->RelateUser_ID))) { ?>
								<dt class="col-xs-12 col-sm-5"><i class="icon wb-users" title="Tham gia cùng:"></i> Tham gia cùng:</dt>
								<dd class="">
									<?php 
									foreach (json_decode($magazines->RelateUser_ID) as $key) {
										echo '<a href="javascript:void(0)">'.getName($key)."</a></br>";
									}
									?>
								</dd>
								<?php } ?>
								<dt class="col-xs-12 col-sm-5"><i class="icon fa fa-book" title="Tạp chí"></i> Tạp chí:</dt>
								<dd class=""><a href="javascript:void(0)"><span><?php echo isset($magazines->Magazine_Name) ? $magazines->Magazine_Name: ""; ?></span></a></dd>
								<!-- <dd class=" offset-sm-3">Donec id elit non mi porta gravida.</dd> -->
								<dt class="col-xs-12 col-sm-5"><i class="icon fa fa-calendar" title="Năm xuất bản"></i> Năm xuất bản:</dt>
								<dd class=""><span><?php echo isset($magazines->Magazine_Year) ? $magazines->Magazine_Year: ""; ?></span></dd>
								<dt class="col-xs-12 col-sm-5"><i class="icon fa fa-tags" title="Số trang trên tạp chí"></i> Trang:</dt>
								<dd class=""><span>Từ trang <?php echo isset($magazines->Page_Start) ? $magazines->Page_Start: ""; ?> đến trang <?php echo isset($magazines->Page_End) ? $magazines->Page_End: ""; ?></span></dd>
								<dt class="col-xs-12 col-sm-5"><i class="icon fa fa-recycle" title="Lĩnh vực"></i> Lĩnh vực:</dt>
								<dd class=""><a href="javascript:void(0)"><span><?php echo isset($magazines->ResearchArea) ? $magazines->ResearchArea: ""; ?></span></a></dd>
								<dt class="col-xs-12 col-sm-5"><i class="icon fa fa-globe" title="Phạm vi"></i> Phạm vi:</dt>
								<dd class="">
									<span><?php echo $magazines->Type_Area == 0 ? "Trong nước" : "";?>
										<?php echo $magazines->Type_Area == 1 ? "Quốc tế" : ""; ?></span></dd>
									</dl>
						</div>
						<div class="list-group-item">
							<h4 class="media-heading">Tóm tắt:</h4>
							<blockquote class="blockquote">
								<p class="text-justify"><cite><?php echo isset($magazines->Summary) ? $magazines->Summary: ""; ?></cite></p>
							</blockquote>
						</div>
						<div class="list-group-item">
							<h4 class="media-heading">Từ khóa:</h4>
							<!-- <span><?php echo isset($magazines->Keyword) ? $magazines->Keyword: ""; ?></span> -->
							<div class="keyword">
								<?php $array = explode(',', $magazines->Keyword);
								foreach ($array as $keyword) {
									echo '<span class="label label-default">'.trim($keyword).'</span> ';
								}
								?></div>
						</div>
		                <?php if(!empty($files) && $magazines->Type_Area == 0){?>
		                <div class="list-group-item">
		                <h4 class="media-heading">Tải bản đầy đủ:</h4>
		                    <ul class="file-attach">
		                    <?php foreach ($files as $file) {
		                        echo '<li><i class="icon fa fa-file-pdf-o"></i> <a href="'.base_url().'attachment/download?file='.base64_encode($file->Filename).'">'.substr($file->Filename, 6).'</a></li>';
		                    } ?>
		                    </ul>
		                </div>
						<div class="list-group-item">
                			<div id="pdf-wrapper" class="list-group-item" style="height: 500px;"></div>
						</div>
		                <?php } ?>            
				</div><!-- .panel-body-->
				<div class="panel-footer">
					<!--                 <p>Tác giả giữ bản quyền bài báo. Vui lòng liên hệ tác giả <a href="javascript:void(0)"><?php echo isset($magazines->Author) ? $magazines->Author: ""; ?></a> để có bản đầy đủ.</p> -->
				</div> 
			</div>
			<!-- End Panel -->
		</div>
		<div class="col-xs-12 col-md-3 col-sm-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin tác giả</div>
				<div class="panel-body">
			        <div class="card-block" style="text-align: center;">
			          <a class="avatar avatar-lg" href="javascript:void(0)">
			          <?php $avatar = ($magazines->Avatar !== "") ? $magazines->Avatar: "default_avatar.png"; ?>
			            <img src="<?php echo base_url().'uploads/images/avatar/'.$avatar;?>"
			            alt="<?php echo isset($magazines->Author) ? $magazines->Author: ""; ?>" title="<?php echo isset($magazines->Author) ? $magazines->Author: ""; ?>" style="width: 60%;align-content: center;text-align: center;">
			          </a>
			          <h4 class="profile-user"><?php echo isset($magazines->Author) ? $magazines->Author: ""; ?></h4>
			          <p class="profile-job"><?php echo isset($magazines->Education) ? $magazines->Education: ""; ?></p>
			          <div class="profile-social">
			            <a class="icon fa fa-envelope" href="javascript:void(0)" title="<?php echo isset($magazines->Email) ? $magazines->Email : "";?> "></a>
			            <a class="icon fa fa-phone-square" href="javascript:void(0)" title="<?php echo isset($magazines->Phone) ? $magazines->Phone : "Chưa cập nhật số điện thoại";?> "></a>
			          </div>
	          			<?php $href = "http://utt.edu.vn/teacher.php/".slug($magazines->Author)."-gv".$magazines->User_ID."/profile.html";
			           ?>
			          <a class="btn btn-primary" href="<?php echo $href; ?>" target="_blank">Lý lịch khoa học</a>	
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<!-- End Page -->
<script type="text/javascript">
  <?php if(!empty($files) && $magazines->Type_Area == 0){ ?>
  var obj = "<?php echo base_url().'uploads/attachments/'.$files[0]->Filename; ?>";
  var options = {
    pdfOpenParams: { 
      zoom:'page-fit' 
    }
};
PDFObject.embed(obj, "#pdf-wrapper", options);
  //PDFObject.embed(obj, "#pdf-wrapper",{zoom: 'page-fit'});
//PDFObject.embed(obj, "#pdf-wrapper", options);
<?php }else{ ?>
  console.log('No Attachment File Avaiable');
<?php
} ?>
</script>