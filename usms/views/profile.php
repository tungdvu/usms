</div>

<article class="post-listing post" id="the-post">
	<div class="post-inner">
  		<div class="entry">
  				<?php
					if (isset($checklog)&&!empty($checklog)&&($checklog->id==$profile['id']))
					{ 
						echo "<div class='pull-right'><a class='btn btn-primary' href='teacher.php/thay-doi-thong-tin.html'><i class='fa fa-edit'></i> Chỉnh sửa thông tin</a></div>"; 
					} 
				?> 		
			<div class='form-horizontal'>
				<div class="form-group">
				      <div class="col1-sm-12"><center>
				      <div style="margin-top:95px;margin-bottom:-105px;font-weight:bold;">Chọn ảnh đại diện</div>
				        <img id="mavt" title="Thay đổi avatar. Nên chọn ảnh kích thước 180 x 180" style="width:180px;cursor: pointer;" src="<?=imgExist(base_url().'uploads/images/avatar/'.$profile['avatar'])?>" class="img-thumbnail">
				      <input type="file" accept='image/*' id="avatar" name="avatar" style="display:none">
				      </center>
				      </div>
				</div>

				<h3>Lý lịch sơ lược</h3><hr>
				<div class="form-group">
					<label class="col-sm-2 ">Họ và tên: </label>
					<div class="col-sm-4"><?php echo isset($profile)?($profile['fullname']): "<i>Chưa có thông tin</i>" ; ?></div>
					<?php if(isset($profile)){ ?>
					<label class="col-sm-2 ">Học hàm/Học vị: </label>
					<div class="col-sm-4"><?php echo $profile['education']; ?></div>
					<?php } ?>					
				</div>

				<div class="form-group">
					<label class="col-sm-2 ">Ngày sinh: </label>
					<div class="col-sm-4"><?php echo substr($profile['birthday'],8,2).'/'.substr($profile['birthday'],5,2).'/'.substr($profile['birthday'],0,4); ?></div>
					<label class="col-sm-2 ">Giới tính: </label>
					<div class="col-sm-4"><?php echo isset($profile)?($profile['sex']): "<i>Chưa có thông tin</i>" ; ?></div>              
				</div>

				<div class="form-group">
					<label class="col-sm-2 ">Tỉnh/Thành phố: </label>
					<div class="col-sm-10"><?php echo isset($profile) && $profile['city'] != "" ?($profile['city']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 ">Địa chỉ liên hệ: </label>
					<div class="col-sm-10"><?php echo isset($profile) && $profile['address'] != "" ?($profile['address']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 ">Điện thoại: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['phone'] != "" ?($profile['phone']): "<i>Chưa có thông tin</i>" ; ?></div>
					<label class="col-sm-2 ">Email: </label>
					<div class="col-sm-4"><?php echo isset($profile)?($profile['email']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>
				      
				<div class="form-group">
					<label class="col-sm-2 ">Cơ sở đào tạo: </label>
					<div class="col-sm-4"><?php echo isset($profile)?($profile['brch']): "<i>Chưa có thông tin</i>" ; ?></div>
					<label class="col-sm-2 ">Đơn vị: </label>
					<div class="col-sm-4"><?php echo isset($profile)?($profile['department']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>        

				<hr><h3>Quá trình đào tạo</h3>
				<h4>1. Đại học:</h4>
				<div class="form-group">
					<label class="col-sm-2 ">Hệ đào tạo: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_hedaotao'] != "" ?($profile['dh_hedaotao']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 ">Nơi đào tạo: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_noidaotao'] != "" ?($profile['dh_noidaotao']): "<i>Chưa có thông tin</i>" ; ?></div>
					<label class="col-sm-2 ">Ngành học: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_nganhhoc'] != "" ?($profile['dh_nganhhoc']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 ">Nước đào tạo: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_nuocdaotao'] != "" ?($profile['dh_nuocdaotao']): "<i>Chưa có thông tin</i>" ; ?></div>
					<label class="col-sm-2 ">Năm tốt nghiệp: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_namtotnghiep'] != "" ?($profile['dh_namtotnghiep']): "<i>Chưa có thông tin</i>" ; ?></div>              
				</div>
				<div class="form-group">
					<label class="col-sm-2 ">Bằng đại học 2: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_bang2'] != "" ?($profile['dh_bang2']): "<i>Chưa có thông tin</i>" ; ?></div>
					<label class="col-sm-2 ">Năm tốt nghiệp: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['dh_bang2namtotnghiep'] != "" ?($profile['dh_bang2namtotnghiep']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>

				<h4>2. Sau đại học:</h4>
				<div class="form-group">
					<label class="col-sm-2 ">Bằng thạc sĩ chuyên ngành: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_thacsichuyennganh'] != "" ?($profile['sdh_thacsichuyennganh']): "<i>Chưa có thông tin</i>" ; ?></div>
					<label class="col-sm-2 ">Năm cấp bằng: </label>
					<div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_thacsinamcapbang'] != "" ?($profile['sdh_thacsinamcapbang']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>
				<div class="form-group">
				      <label class="col-sm-2 ">Nơi đào tạo: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_thacsinoidaotao'] != "" ?($profile['sdh_thacsinoidaotao']): "<i>Chưa có thông tin</i>" ; ?></div>                         
				</div>
				<div class="form-group">
				      <label class="col-sm-2 ">Bằng tiến sĩ chuyên ngành: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_tiensichuyennganh'] != "" ?($profile['sdh_tiensichuyennganh']): "<i>Chưa có thông tin</i>" ; ?></div>
				      <label class="col-sm-2 ">Năm cấp bằng: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_tiensinamcapbang'] != "" ?($profile['sdh_tiensinamcapbang']): "<i>Chưa có thông tin</i>" ; ?></div>              
				</div>
				<div class="form-group">
				      <label class="col-sm-2 ">Nơi đào tạo: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_tiensinoidaotao'] != "" ?($profile['sdh_tiensinoidaotao']): "<i>Chưa có thông tin</i>" ; ?></div>
				      <label class="col-sm-2 ">Tên chuyên đề luận án bậc cao nhất: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['sdh_tiensitenluanan'] != "" ?($profile['sdh_tiensitenluanan']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>

				<h4>3. Ngoại ngữ</h4>
				<div class="form-group">
				      <label class="col-sm-2 ">1: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['ngoaingu1'] != "" ?($profile['ngoaingu1']): "<i>Chưa có thông tin</i>" ; ?></div>
				      <label class="col-sm-2 ">Mức độ sử dụng: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['ngoaingu1_mucdo'] != "" ?($profile['ngoaingu1_mucdo']): "<i>Chưa có thông tin</i>" ; ?></div>          
				</div>
				<div class="form-group">
				      <label class="col-sm-2 ">2: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['ngoaingu2'] != "" ?($profile['ngoaingu2']): "<i>Chưa có thông tin</i>" ; ?></div>
				      <label class="col-sm-2 ">Mức độ sử dụng: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['ngoaingu2_mucdo'] != "" ?($profile['ngoaingu2_mucdo']): "<i>Chưa có thông tin</i>" ; ?></div>          
				</div>
				<div class="form-group">
				      <label class="col-sm-2 ">3: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['ngoaingu3'] != "" ?($profile['ngoaingu3']): "<i>Chưa có thông tin</i>" ; ?></div>
				      <label class="col-sm-2 ">Mức độ sử dụng: </label>
				      <div class="col-sm-4"><?php echo isset($profile) && $profile['ngoaingu3_mucdo'] != "" ?($profile['ngoaingu3_mucdo']): "<i>Chưa có thông tin</i>" ; ?></div>          
				</div>        

				<h4>4. Chứng chỉ:</h4>
				<div class="form-group">
				      <label class="col-sm-2 "></label>
				      <div class="col-sm-10"><?php echo isset($profile) && $profile['chungchi'] != "" ?($profile['chungchi']): "<i>Chưa có thông tin</i>" ; ?></div>
				</div>

				<hr>
				<h3>Quá trình công tác chuyên môn</h3>
				<div><!-- begin Job -->
					<table class="form-table table table-striped table-bordered">
					<tr valign="top">
					<th class="col-sm-2"><label for="Thời gian">Thời gian</label></th>
					<th class="col-sm-5"><label for="Nơi công tác">Nơi công tác</label></th>
					<th class="col-sm-5"><label for="Công việc đảm nhận">Công việc đảm nhận</label></th>
					</tr>
					<?php if(!empty($user_job)) {

                	foreach ($user_job as $key => $job) { ?>
                  	<tr>
                    <td class=""><?php echo isset($job)?($job['thoigian']):"";?></td>
                    <td class=""><?php echo isset($job)?($job['noicongtac']):"";?></td>
                    <td class=""><?php echo isset($job)?($job['congviec']):"";?></td>       
                  	</tr>
              		<?php
                		}
          			?>
					<?php }else{ ?>
					<tr><td colspan="3"><i>Chưa có thông tin.</i></td></tr>
					<?php } ?>
					</table>									
				</div>

				<hr>
				<h3>Quá trình nghiên cứu khoa học</h3>
				<h4>1. Các đề tài nghiên cứu khoa học đã tham gia</h4>
					<div><!-- begin Research -->
              		<table class="form-table table table-striped table-bordered">
		              <tr valign="top">
		                <th class=""><label for="TT">TT</label></th>
		                <th class="col-sm-5"><label for="Tên đề tài">Tên đề tài</label></th>
		                <th class=""><label for="Năm hoàn thành">Năm hoàn thành</label></th>
		                <th class="col-sm-2"><label for="Đề tài cấp">Đề tài cấp</label></th>
		                <th class="col-sm-3"><label for="Trách nhiệm tham gia trong đề tài">Trách nhiệm tham gia trong đề tài</label></th>
		              </tr>

		              <?php if(!empty($user_research)) {
		                $stt = 1;
		                foreach ($user_research as $key => $research) { ?>
		                  <tr>
		                    <td><?php echo $stt++; ?></td>
		                    <td class=""><?php echo isset($research)?($research['name']):"";?></td>
		                    <td class=""><?php echo isset($research)?($research['year']):"";?></td>
		                    <td class="">
		                      <?php 
		                        echo $research['level'] == 1 ? "Cấp Trường" : ""; 
		                        echo $research['level'] == 2 ? "Cấp Bộ" : "";  
		                        echo $research['level'] == 3 ? "Cấp Nhà nước" : "";
		                        echo $research['level'] == 4 ? "Cấp Tỉnh" : "";
		                        echo $research['level'] == 5 ? "Cấp Thành phố" : "";
		                      ?>
		                    </td>
		                    <td class=""><?php echo isset($research)?($research['role']):"";?></td>       
		                  </tr>

		                  <?php
		                }
		              ?>
		              <?php }else{ ?>
		              <tr>
		                <td colspan="5"><i>Chưa có thông tin.</i></td>  
		              </tr>
		              <?php } ?>
		              </table>
		              </div>

				<h4>2. Các công trình khoa học đã công bố</h4>   
				<div>
					<table class="form-table table table-striped table-bordered">
					<tr valign="top">
					<th class=""><label for="TT">TT</label></th>
					<th class="col-sm-5"><label for="Tên công trình">Tên công trình</label></th>
					<th class="col-sm-2"><label for="Năm công bố">Năm công bố</label></th>
					<th class="col-sm-5"><label for="Nơi công bố">Nơi công bố</label></th>
					</tr>

					<?php if(!empty($user_science)) {
					$stt = 1;
					foreach ($user_science as $key => $science) { ?>
					<tr>
					<td><?php echo $stt++; ?></td>
					<td class=""><?php echo isset($science)?($science['name']):"";?></td>
					<td class=""><?php echo isset($science)?($science['year']):"";?></td>
					<td class=""><?php echo isset($science)?($science['publish_area']):"";?></td>        
					</tr>
					<?php
						}
					?>
					<?php }else{ ?>
					<tr>
					<td colspan="4"><i>Chưa có thông tin.</i></td>  
					</tr>
					<?php } ?>
					</table>
				</div>

				<h4>3. Giáo trình, tài liệu đã xuất bản</h4>   
				<div>
					<table class="form-table table table-striped table-bordered">
					<tr valign="top">
					<th class=""><label for="TT">TT</label></th>
					<th class="col-sm-5"><label for="Tên công trình">Tên giáo trình, tài liệu</label></th>
					<th class="col-sm-2"><label for="Năm công bố">Năm xuất bản</label></th>
					<th class="col-sm-5"><label for="Nơi công bố">Nơi xuất bản</label></th>
					</tr>

					<?php if(!empty($user_book)) {
					$stt = 1;
					foreach ($user_book as $key => $book) { ?>
					<tr>
					<td><?php echo $stt++; ?></td>
					<td class=""><?php echo isset($book)?($book['name']):"";?></td>
					<td class=""><?php echo isset($book)?($book['year']):"";?></td>
					<td class=""><?php echo isset($book)?($book['publish']):"";?></td>        
					</tr>
					<?php
						}
					?>
					<?php }else{ ?>
					<tr>
					<td colspan="4"><i>Chưa có thông tin.</i></td>  
					</tr>
					<?php } ?>
					</table>
				</div>

				<h4>4. Hướng dẫn sau đại học</h4>   
				<div>
					<table class="form-table table table-striped table-bordered">
					<tr valign="top">
					<th class=""><label for="TT">TT</label></th>
					<th class="col-sm-2"><label for="Học viên">Học viên</label></th>
					<th class="col-sm-6"><label for="Tên luận văn, luận án">Tên luận văn, luận án</label></th>
					<th class="col-sm-2"><label for="Trình độ">Trình độ</label></th>
					<th class="col-sm-2"><label for="Năm hoàn thành">Năm hoàn thành</label></th>
					</tr>

					<?php if(!empty($user_teaching)) {
					$stt = 1;
					foreach ($user_teaching as $key => $teaching) { ?>
					<tr>
					<td><?php echo $stt++; ?></td>
					<td class=""><?php echo isset($teaching)?($teaching['name']):"";?></td>
					<td class=""><?php echo isset($teaching)?($teaching['thesis']):"";?></td>
                    <td class="">
                      <?php echo $teaching['level'] == 1 ? "Thạc sĩ" : ""; ?>
                      <?php echo $teaching['level'] == 2 ? "Tiến sĩ" : ""; ?>
                    </td>					
					<td class=""><?php echo isset($teaching)?($teaching['year']):"";?></td>        
					</tr>
					<?php
						}
					?>
					<?php }else{ ?>
					<tr>
					<td colspan="5"><i>Chưa có thông tin.</i></td>  
					</tr>
					<?php } ?>
					</table>
				</div>

				<h3>Các hướng nghiên cứu quan tâm</h3><hr>									

			
			</div><!-- End .form-horizontal -->
		</div><!-- End .entry -->
	</div>
</article><!--End .main section -->



<div>