</div>
<div class="main section" >
                    <form action method='post' enctype="multipart/form-data">
                    <div class='card-panel'>
                    <div class='form-horizontal'>
                    <?php
                      if (isset($message_error)&&!empty($message_error))
                      {
                        echo '<div class="alert alert-warning alert-dismissable"><b><i class="icon fa fa-warning"></i> Cảnh báo</b><br><ul>';
                        foreach ($message_error as $key => $value) {
                          echo '<li>'.$value.'</li>';
                        } 
                        echo '</ul></div>';
                      }
                      if (isset($message_success)&&!empty($message_success))
                      {
                        echo '<div class="alert alert-success alert-dismissable"><b><i class="icon fa fa-check"></i> Thông báo</b><br>'.$message_success.'</div>';
                      }
                    ?>
                    <div class="form-group">
                          <div class="col-sm-12"><center>
                          <div style="margin-top:95px;margin-bottom:-105px;font-weight:bold;">Chọn ảnh đại diện</div>
                            <img id="mavt" title="Thay đổi avatar. Nên chọn ảnh kích thước 180 x 180" style="width:180px;cursor: pointer;" src="<?=imgExist(base_url().'uploads/images/avatar/'.$profile['avatar'])?>" class="img-thumbnail">
                          <input type="file" accept='image/*' id="avatar" name="avatar" style="display:none">
                          </center>
                          </div>
                    </div>
                    <?php var_dump(time()) ;?>
                    <h2>Lý lịch sơ lược</h2><hr>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Họ và tên: </label>
                          <div class="col-sm-4">
                          <input class="form-control" type="text" name="fullname" value="<?=isset($profile)?($profile['fullname']):(set_value('fullname'))?>">
                          <span class="help-block"></span>
                          </div>
                    </div>

                    <div class="form-group">
                          <label class="col-sm-2 control-label">Ngày sinh: </label>
                          <div class="col-sm-4"><input class="form-control" type="date" name="birthday" value="<?=isset($profile)?($profile['birthday']):(set_value('birthday'))?>" >
                          <span class="help-block"></span>
                          </div>
                          <label class="col-sm-2 control-label">Giới tính: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sex" value="<?=isset($profile)?($profile['sex']):""?>" disabled />
                          <span class="help-block"></span>
                          </div>              
                    </div>

                    <div class="form-group">
                          <label class="col-sm-2 control-label">Tỉnh/Thành phố: </label>
                          <div class="col-sm-4">
                          <input class="form-control" type="text" name="city" value="<?=isset($profile)?($profile['city']):(set_value('city'))?>">
                          <span class="help-block"></span>
                          </div>
                          <label class="col-sm-2 control-label">Học hàm/Học vị: </label>
                          <div class="col-sm-4">
                          <input class="form-control" type="text" name="education" value="<?=isset($profile)?($profile['education']):(set_value('education'))?>" required>
                          <span class="help-block"></span>
                          </div>                          
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Địa chỉ liên hệ: </label>
                          <div class="col-sm-10"><input class="form-control" type="text" name="address" value="<?=isset($profile)?($profile['address']):(set_value('address'))?>" required></div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Điện thoại: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="phone" value="<?=isset($profile)?($profile['phone']):(set_value('phone'))?>"></div>
                          <label class="col-sm-2 control-label">Email: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="email" value="<?=isset($profile)?($profile['email']):(set_value('email'))?>" disabled></div>
                    </div>

                    <!--<div class="form-group">
                         <label class="col-sm-2 control-label">Giới thiệu: </label>
                          <div class="col-sm-9"><textarea class="ckeditor" type="text" name="about"><?=isset($profile)?($profile['about']):(set_value('about'))?></textarea></div></div>
                    -->      
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Cơ sở đào tạo: </label>
                          <div class="col-sm-4"><input class="form-control"  disabled value="<?=isset($profile)?($profile['brch']):""?>"></div>
                          <label class="col-sm-2 control-label">Đơn vị: </label>
                          <div class="col-sm-4"><input class="form-control" disabled value="<?=isset($profile)?($profile['department']):""?>"></div>
                    </div>        
                    
                    <h2>Quá trình đào tạo</h2><hr>
                    <h4>1. Đại học:</h4>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Hệ đào tạo: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_hedaotao" value="<?=isset($profile)?($profile['dh_hedaotao']):(set_value('dh_hedaotao'))?>"></div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Nơi đào tạo: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_noidaotao" value="<?=isset($profile)?($profile['dh_noidaotao']):(set_value('dh_noidaotao'))?>"></div>
                          <label class="col-sm-2 control-label">Ngành học: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_nganhhoc" value="<?=isset($profile)?($profile['dh_nganhhoc']):(set_value('dh_nganhhoc'))?>"></div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Nước đào tạo: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_nuocdaotao" value="<?=isset($profile)?($profile['dh_nuocdaotao']):(set_value('dh_nuocdaotao'))?>"></div>
                          <label class="col-sm-2 control-label">Năm tốt nghiệp: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_namtotnghiep" value="<?=isset($profile)?($profile['dh_namtotnghiep']):(set_value('dh_namtotnghiep'))?>"></div>              
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Bằng đại học 2: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_bang2" value="<?=isset($profile)?($profile['dh_bang2']):(set_value('dh_bang2'))?>"></div>
                          <label class="col-sm-2 control-label">Năm tốt nghiệp: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="dh_bang2namtotnghiep" value="<?=isset($profile)?($profile['dh_bang2namtotnghiep']):(set_value('dh_bang2namtotnghiep'))?>"></div>              
                    </div>

                    <h4>2. Sau đại học:</h4>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Bằng thạc sĩ chuyên ngành: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_thacsichuyennganh" value="<?=isset($profile)?($profile['sdh_thacsichuyennganh']):(set_value('sdh_thacsichuyennganh'))?>"></div>
                          <label class="col-sm-2 control-label">Năm cấp bằng: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_thacsinamcapbang" value="<?=isset($profile)?($profile['sdh_thacsinamcapbang']):(set_value('sdh_thacsinamcapbang'))?>"></div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Nơi đào tạo: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_thacsinoidaotao" value="<?=isset($profile)?($profile['sdh_thacsinoidaotao']):(set_value('sdh_thacsinoidaotao'))?>"></div>                          
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Bằng tiến sĩ chuyên ngành: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_tiensichuyennganh" value="<?=isset($profile)?($profile['sdh_tiensichuyennganh']):(set_value('sdh_tiensichuyennganh'))?>"></div>
                          <label class="col-sm-2 control-label">Năm cấp bằng: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_tiensinamcapbang" value="<?=isset($profile)?($profile['sdh_tiensinamcapbang']):(set_value('sdh_tiensinamcapbang'))?>"></div>              
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Nơi đào tạo: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_tiensinoidaotao" value="<?=isset($profile)?($profile['sdh_tiensinoidaotao']):(set_value('sdh_tiensinoidaotao'))?>"></div>
                          <label class="col-sm-2 control-label">Tên chuyên đề luận án bậc cao nhất: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="sdh_tiensitenluanan" value="<?=isset($profile)?($profile['sdh_tiensitenluanan']):(set_value('sdh_tiensitenluanan'))?>"></div>
                    </div>

                    <h4>3. Ngoại ngữ</h4>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">1: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="ngoaingu1" value="<?=isset($profile)?($profile['ngoaingu1']):(set_value('ngoaingu1'))?>"></div>
                          <label class="col-sm-2 control-label">Mức độ sử dụng: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="ngoaingu1_mucdo" value="<?=isset($profile)?($profile['ngoaingu1_mucdo']):(set_value('ngoaingu1_mucdo'))?>"></div>          
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">2: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="ngoaingu2" value="<?=isset($profile)?($profile['ngoaingu2']):(set_value('ngoaingu2'))?>"></div>
                          <label class="col-sm-2 control-label">Mức độ sử dụng: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="ngoaingu2_mucdo" value="<?=isset($profile)?($profile['ngoaingu2_mucdo']):(set_value('ngoaingu2_mucdo'))?>"></div>          
                    </div>
                    <div class="form-group">
                          <label class="col-sm-2 control-label">3: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="ngoaingu3" value="<?=isset($profile)?($profile['ngoaingu3']):(set_value('ngoaingu3'))?>"></div>
                          <label class="col-sm-2 control-label">Mức độ sử dụng: </label>
                          <div class="col-sm-4"><input class="form-control" type="text" name="ngoaingu3_mucdo" value="<?=isset($profile)?($profile['ngoaingu3_mucdo']):(set_value('ngoaingu3_mucdo'))?>"></div>          
                    </div>        

                    <h4>4. Chứng chỉ:</h4>
                    <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10"><input class="form-control" type="text" name="chungchi" value="<?=isset($profile)?($profile['chungchi']):(set_value('chungchi'))?>"></div>
                    </div>

                    <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-9" style="text-align: right"><button class="btn btn-primary btn-lg" type="submit" value="Cập Nhật" name="sedit"><i class='fa fa-save'></i> Cập nhật</button></div>
                    </div>
              </div>
              </form>
              </div>
              <hr>
              <h2>Quá trình công tác chuyên môn</h2>
              <?php //var_dump($profile); ?>      

              <div class="form-group"><!-- begin Job -->
              <table class="form-table table table-striped table-bordered">
              <tr valign="top">
                <th class="col-sm-2"><label for="Thời gian">Thời gian</label></th>
                <th class="col-sm-4"><label for="Nơi công tác">Nơi công tác</label></th>
                <th class="col-sm-4"><label for="Công việc đảm nhận">Công việc đảm nhận</label></th>
                <th class="col-sm-2"><label for="Thao tác">Thao tác</label></th>
              </tr>

              <?php if(!empty($user_job)) {

                foreach ($user_job as $key => $job) { ?>
                  <tr>
                    <td class=""><?php echo isset($job)?($job['thoigian']):"";?></td>
                    <td class=""><?php echo isset($job)?($job['noicongtac']):"";?></td>
                    <td class=""><?php echo isset($job)?($job['congviec']):"";?></td>
                    <td class="">
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Sửa" onclick="edit_job(<?php echo $job['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i> </a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Xóa" onclick="delete_job(<?php echo $job['id']; ?>)"><i class="glyphicon glyphicon-trash"></i> </a>
                    </td>         
                  </tr>

                  <?php
                }
              ?>
                
              <?php }else{ ?>
              <tr>
                <td colspan="4">Chưa có thông tin.</td>  
              </tr>
              <?php } ?>
              </table>
              </div>
              <button class="btn btn-success" onclick="add_job()"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
              <!-- Bootstrap modal -->
              <div class="modal fade" id="modal_form" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Thêm quá trình công tác</h3>
                          </div>
                          <div class="modal-body form">
                              <form action="#" id="form" class="form-horizontal">
                                  <input type="hidden" name="uid" value="<?php echo isset($profile) ? $profile['id'] : (set_value('id')); ?>" />
                                  <input type="hidden" name="id" value="<?php echo isset($job) ? $job['id'] : (set_value('id')); ?>">
                                  <div class="form-body">
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Thời gian</label>
                                          <div class="col-md-9">
                                              <input name="thoigian" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Nơi công tác</label>
                                          <div class="col-md-9">
                                              <input name="noicongtac" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Công việc</label>
                                            <div class="col-md-9">
                                              <input name="congviec" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="btnSave" onclick="save_job()" class="btn btn-primary">Lưu lại</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Bỏ qua</button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- End Bootstrap modal -->

<!-- Begin nghiencuu -->
<hr>
<h2>Quá trình nghiên cứu khoa học</h2>
<h4>1. Các đề tài nghiên cứu khoa học đã tham gia</h4>
              <?php //var_dump($user_research); ?>      

              <div class="form-group"><!-- begin Research -->
              <table class="form-table table table-striped table-bordered">
              <tr valign="top">
                <th class=""><label for="TT">TT</label></th>
                <th class="col-sm-5"><label for="Tên đề tài">Tên đề tài</label></th>
                <th class=""><label for="Năm hoàn thành">Năm hoàn thành</label></th>
                <th class="col-sm-2"><label for="Đề tài cấp">Đề tài cấp</label></th>
                <th class="col-sm-3"><label for="Trách nhiệm tham gia trong đề tài">Trách nhiệm tham gia trong đề tài</label></th>
                <th class="col-sm-2"><label for="Thao tác">Thao tác</label></th>
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
                    <td class="">
                      <!--
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Sửa" onclick="edit_research(<?php echo $research['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i> </a> -->

                      <a class="btn btn-sm btn-primary" href="<?php echo base_url().'teacher.php/research/edit/'.$research['id']; ?>" title="Sửa"><i class="glyphicon glyphicon-pencil"></i> </a>                      
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Xóa" onclick="delete_research(<?php echo $research['id']; ?>)"><i class="glyphicon glyphicon-trash"></i> </a>
                    </td>         
                  </tr>

                  <?php
                }
              ?>
                
              <?php }else{ ?>
              <tr>
                <td colspan="6">Chưa có thông tin.</td>  
              </tr>
              <?php } ?>
              </table>
              </div>
              <button class="btn btn-success" onclick="add_research()"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
              <!-- Bootstrap modal research -->
              <div class="modal fade" id="modal_research" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Thêm đề tài nghiên cứu</h3>
                          </div>
                          <div class="modal-body form">
                              <form action="#" id="form_research" class="form-horizontal">
                                  <input type="hidden" name="uid" value="<?php echo isset($profile) ? $profile['id'] : (set_value('id')); ?>" />
                                  <input type="hidden" name="id" value="<?php echo isset($research) ? $research['id'] : (set_value('id')); ?>">
                                  
                                  <div class="form-body">
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Tên đề tài nghiên cứu</label>
                                          <div class="col-md-9">
                                              <input name="research_name" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Năm hoàn thành</label>
                                          <div class="col-md-9">
                                              <input name="research_year" placeholder="VD:2015" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Đề tài cấp</label>
                                            <div class="col-md-9">
                                              <select name="research_level" class="form-control">
                                                  <option value="">--Chọn--</option>
                                                  <option value="1">Cấp Trường</option>
                                                  <option value="2">Cấp Bộ</option>
                                                  <option value="4">Cấp Tỉnh</option>
                                                  <option value="5">Cấp Thành phố</option>
                                                  <option value="3">Cấp Nhà nước</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Trách nhiệm tham gia trong đề tài</label>
                                            <div class="col-md-9">
                                              <input name="research_role" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>                                      
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="btnSaveResearch" onclick="save_research()" class="btn btn-primary">Lưu lại</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Bỏ qua</button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- End Bootstrap modal -->
<!-- End nghiencuu -->

<!-- Begin khoahoc -->
<h4>2. Các công trình khoa học đã công bố</h4>
              <?php //var_dump($user_research); ?>      

              <div class="form-group"><!-- begin Job -->
              <table class="form-table table table-striped table-bordered">
              <tr valign="top">
                <th class=""><label for="TT">TT</label></th>
                <th class="col-sm-5"><label for="Tên công trình">Tên công trình</label></th>
                <th class=""><label for="Năm công bố">Năm công bố</label></th>
                <th class="col-sm-2"><label for="Nơi công bố">Nơi công bố</label></th>
                <th class="col-sm-2"><label for="Thao tác">Thao tác</label></th>
              </tr>

              <?php if(!empty($user_science)) {
                $stt = 1;
                foreach ($user_science as $key => $science) { ?>
                  <tr>
                    <td><?php echo $stt++; ?></td>
                    <td class=""><?php echo isset($science)?($science['name']):"";?></td>
                    <td class=""><?php echo isset($science)?($science['year']):"";?></td>
                    <td class=""><?php echo isset($science)?($science['publish_area']):"";?></td>
                    <td class="">
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Sửa" onclick="edit_science(<?php echo $science['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i> </a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Xóa" onclick="delete_science(<?php echo $science['id']; ?>)"><i class="glyphicon glyphicon-trash"></i> </a>
                    </td>         
                  </tr>

                  <?php
                }
              ?>
                
              <?php }else{ ?>
              <tr>
                <td colspan="5">Chưa có thông tin.</td>  
              </tr>
              <?php } ?>
              </table>
              </div>
              <button class="btn btn-success" onclick="add_science()"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
              <!-- Bootstrap modal science -->
              <div class="modal fade" id="modal_science" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Thêm công trình khoa học</h3>
                          </div>
                          <div class="modal-body form">
                              <form action="#" id="form_science" class="form-horizontal">
                                  <input type="hidden" name="uid" value="<?php echo isset($profile) ? $profile['id'] : (set_value('id')); ?>" />
                                  <input type="hidden" name="id" value="<?php echo isset($science) ? $science['id'] : (set_value('id')); ?>">
                                  
                                  <div class="form-body">
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Tên công trình</label>
                                          <div class="col-md-9">
                                              <input name="science_name" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Năm công bố</label>
                                          <div class="col-md-9">
                                              <input name="science_year" placeholder="VD:2015" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Nơi công bố</label>
                                            <div class="col-md-9">
                                              <textarea name="science_publish_area" placeholder="" class="form-control"></textarea>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>                                      
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="btnSaveScience" onclick="save_science()" class="btn btn-primary">Lưu lại</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Bỏ qua</button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- End Bootstrap modal -->
<!-- End khoahoc -->

<!-- Begin giaotrinh -->
<h4>3. Giáo trình, tài liệu đã xuất bản</h4>
              <?php //var_dump($user_research); ?>      

              <div class="form-group"><!-- begin Job -->
              <table class="form-table table table-striped table-bordered">
              <tr valign="top">
                <th class=""><label for="TT">TT</label></th>
                <th class="col-sm-5"><label for="Tên công trình">Tên giáo trình, tài liệu</label></th>
                <th class=""><label for="Năm công bố">Năm xuất bản</label></th>
                <th class="col-sm-2"><label for="Nơi công bố">Nơi xuất bản</label></th>
                <th class="col-sm-2"><label for="Thao tác">Thao tác</label></th>
              </tr>

              <?php if(!empty($user_book)) {
                $stt = 1;
                foreach ($user_book as $key => $book) { ?>
                  <tr>
                    <td><?php echo $stt++; ?></td>
                    <td class=""><?php echo isset($book)?($book['name']):"";?></td>
                    <td class=""><?php echo isset($book)?($book['year']):"";?></td>
                    <td class=""><?php echo isset($book)?($book['publish']):"";?></td>
                    <td class="">
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Sửa" onclick="edit_book(<?php echo $book['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i> </a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Xóa" onclick="delete_book(<?php echo $book['id']; ?>)"><i class="glyphicon glyphicon-trash"></i> </a>
                    </td>         
                  </tr>

                  <?php
                }
              ?>
                
              <?php }else{ ?>
              <tr>
                <td colspan="5">Chưa có thông tin.</td>  
              </tr>
              <?php } ?>
              </table>
              </div>
              <button class="btn btn-success" onclick="add_book()"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
              <!-- Bootstrap modal science -->
              <div class="modal fade" id="modal_book" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Thêm Giáo trình, tải liệu</h3>
                          </div>
                          <div class="modal-body form">
                              <form action="#" id="form_book" class="form-horizontal">
                                  <input type="hidden" name="uid" value="<?php echo isset($profile) ? $profile['id'] : (set_value('id')); ?>" />
                                  <input type="hidden" name="id" value="<?php echo isset($book) ? $book['id'] : (set_value('id')); ?>">
                                  
                                  <div class="form-body">
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Tên Giáo trình, tài liệu</label>
                                          <div class="col-md-9">
                                              <input name="book_name" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Năm xuất bản</label>
                                          <div class="col-md-9">
                                              <input name="book_year" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Nơi xuất bản</label>
                                            <div class="col-md-9">
                                              <textarea name="book_publish" placeholder="" class="form-control"></textarea>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>                                      
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="btnSaveBook" onclick="save_book()" class="btn btn-primary">Lưu lại</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Bỏ qua</button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- End Bootstrap modal -->
<!-- End giaotrinh -->

<!-- Begin teaching -->
<h4>3. Hướng dẫn sau đại học</h4>
              <?php //var_dump($user_teaching); ?>      

              <div class="form-group">
              <table class="form-table table table-striped table-bordered">
              <tr valign="top">
                <th class=""><label for="TT">TT</label></th>
                <th class="col-sm-5"><label for="Tên công trình">Học viên</label></th>
                <th class=""><label for="Năm công bố">Tên luận văn, luận án</label></th>
                <th class=""><label for="Năm công bố">Trình độ</label></th>
                <th class="col-sm-2"><label for="Nơi công bố">Năm hoàn thành</label></th>
                <th class="col-sm-2"><label for="Thao tác">Thao tác</label></th>
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
                    <td class="">
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Sửa" onclick="edit_teaching(<?php echo $teaching['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i> </a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Xóa" onclick="delete_teaching(<?php echo $teaching['id']; ?>)"><i class="glyphicon glyphicon-trash"></i> </a>
                    </td>         
                  </tr>

                  <?php
                }
              ?>
                
              <?php }else{ ?>
              <tr>
                <td colspan="6">Chưa có thông tin.</td>  
              </tr>
              <?php } ?>
              </table>
              </div>
              <button class="btn btn-success" onclick="add_teaching()"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
              <!-- Bootstrap modal science -->
              <div class="modal fade" id="modal_teaching" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Thêm Giáo trình, tải liệu</h3>
                          </div>
                          <div class="modal-body form">
                              <form action="#" id="form_teaching" class="form-horizontal">
                                  <input type="hidden" name="uid" value="<?php echo isset($profile) ? $profile['id'] : (set_value('id')); ?>" />
                                  <input type="hidden" name="id" value="<?php echo isset($teaching) ? $teaching['id'] : (set_value('id')); ?>">
                                  
                                  <div class="form-body">
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Học viên</label>
                                          <div class="col-md-9">
                                              <input name="teaching_name" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Tên luận văn, luận án</label>
                                          <div class="col-md-9">
                                              <input name="teaching_thesis" placeholder="" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="control-label col-md-3">Trình độ</label>
                                          <div class="col-md-9">
                                             <select name="teaching_level" class="form-control">
                                                  <option value="">--Chọn--</option>
                                                  <option value="1">Thạc sĩ</option>
                                                  <option value="2">Tiến sĩ</option>
                                              </select> 
                                          </div>
                                      </div>                                    
                                      
                                      <div class="form-group">
                                          <label class="control-label col-md-3">Năm hoàn thành</label>
                                            <div class="col-md-9">
                                              <textarea name="teaching_year" placeholder="" class="form-control"></textarea>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>                                      
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="btnSaveTeaching" onclick="save_teaching()" class="btn btn-primary">Lưu lại</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Bỏ qua</button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- End Bootstrap modal -->
<!-- End giaotrinh -->
                      
<style>
.avt-hover{
    border: 3px solid #fff;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);-moz-box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);opacity: 0.4;
}
</style>
<script>
  $('#mavt').hover(function() {
    $('#mavt').attr('class', 'avt-hover');
  }, function() {
    $('#mavt').attr('class', 'img-thumbnail');
  });
  $('#mavt').click(function(event) {
    $("#avatar").trigger('click');
      $("#avatar").change(function(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
          var dataURL = reader.result;
          var output = document.getElementById('mavt');
          output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
      });
  });
</script>

<script type="text/javascript">

var save_method; //for save method string
var table;

function add_job()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Thêm quá trình công tác'); // Set Title to Bootstrap modal title
}

function add_research()
{
    save_method = 'add';
    $('#form_research')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_research').modal('show'); // show bootstrap modal
    $('.modal-title').text('Thêm đề tài nghiên cứu'); // Set Title to Bootstrap modal title
}

function add_science()
{
    save_method = 'add';
    $('#form_science')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_science').modal('show'); // show bootstrap modal
    $('.modal-title').text('Thêm công trình khoa học'); // Set Title to Bootstrap modal title
}

function add_book()
{
    save_method = 'add';
    $('#form_book')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_book').modal('show'); // show bootstrap modal
    $('.modal-title').text('Thêm Giáo trình, tài liệu'); // Set Title to Bootstrap modal title
}

function add_teaching()
{
    save_method = 'add';
    $('#form_teaching')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_teaching').modal('show'); // show bootstrap modal
    $('.modal-title').text('Thêm Hướng dẫn sau đại học'); // Set Title to Bootstrap modal title
}

function edit_job(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('profile/ajax_edit_job/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="thoigian"]').val(data.thoigian);
            $('[name="noicongtac"]').val(data.noicongtac);
            $('[name="congviec"]').val(data.congviec);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa quá trình công tác'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_science(id)
{
    save_method = 'update';
    $('#form_science')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('profile/ajax_edit_science/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="science_name"]').val(data.name);
            $('[name="science_year"]').val(data.year);
            $('[name="science_publish_area"]').val(data.publish_area);
            
            $('#modal_science').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa Công trình khoa học'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Lỗi! Không lấy được dữ liệu Công trình khoa học');
        }
    });
}

function edit_book(id)
{
    save_method = 'update';
    $('#form_book')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('profile/ajax_edit_book/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="book_name"]').val(data.name);
            $('[name="book_year"]').val(data.year);
            $('[name="book_publish"]').val(data.publish);
            
            $('#modal_book').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa Giáo trình, tài liệu'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Lỗi! Không lấy được dữ liệu Giáo trình, tài liệu');
        }
    });
}

function edit_teaching(id)
{
    save_method = 'update';
    $('#form_teaching')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('profile/ajax_edit_teaching/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="teaching_name"]').val(data.name);
            $('[name="teaching_thesis"]').val(data.thesis);
            $('[name="teaching_level"]').val(data.level);
            $('[name="teaching_year"]').val(data.year);
            
            $('#modal_teaching').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa hướng dẫn sau đại học'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Lỗi! Không lấy được dữ liệu');
        }
    });
}

function edit_research(id)
{
    save_method = 'update';
    $('#form_research')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('profile/ajax_edit_research/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="research_name"]').val(data.name);
            $('[name="research_year"]').val(data.year);
            $('[name="research_level"]').val(data.level);
            $('[name="research_role"]').val(data.role);
            
            $('#modal_research').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa đề tài nghiên cứu'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Lỗi! Không lấy được dữ liệu Nghiên cứu khoa học');
        }
    });
}

function delete_job(id)
{
    if(confirm('Bạn có chắc chắc muốn xóa?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('profile/ajax_delete_job')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Lỗi! Không xóa được dữ liệu');
            }
        });

    }
}

function delete_science(id)
{
    if(confirm('Bạn có chắc chắc muốn xóa?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('profile/ajax_delete_science')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_science').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Lỗi! Không xóa được dữ liệu');
            }
        });

    }
}

function delete_research(id)
{
    if(confirm('Bạn có chắc chắc muốn xóa?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('profile/ajax_delete_research')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_research').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Lỗi! Không xóa được dữ liệu Nghiên cứu khoa học');
            }
        });

    }
}

function delete_book(id)
{
    if(confirm('Bạn có chắc chắc muốn xóa?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('profile/ajax_delete_book')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_book').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Lỗi! Không xóa được dữ liệu Giáo trình, tài liệu');
            }
        });

    }
}

function delete_teaching(id)
{
    if(confirm('Bạn có chắc chắc muốn xóa?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('profile/ajax_delete_teaching')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_teaching').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Lỗi! Không xóa được dữ liệu.');
            }
        });

    }
}

function save_job()
{
    $('#btnSave').text('loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('profile/ajax_add_job')?>";
     } else {
         url = "<?php echo site_url('profile/ajax_update_job')?>";
     }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Lưu lại'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Không thêm được dữ liệu');
            $('#btnSave').text('Lưu lại'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }

    });
}

function save_science()
{
    $('#btnSaveScience').text('loading...'); //change button text
    $('#btnSaveScience').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('profile/ajax_add_science')?>";
     } else {
         url = "<?php echo site_url('profile/ajax_update_science')?>";
     }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_science').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_science').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSaveScience').text('Lưu lại'); //change button text
            $('#btnSaveScience').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Không thêm được dữ liệu');
            $('#btnSaveScience').text('Lưu lại'); //change button text
            $('#btnSaveScience').attr('disabled',false); //set button enable 

        }

    });
}

function save_research()
{
    $('#btnSaveResearch').text('loading...'); //change button text
    $('#btnSaveResearch').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('profile/ajax_add_research')?>";
     } else {
         url = "<?php echo site_url('profile/ajax_update_research')?>";
     }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_research').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_research').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSaveResearch').text('Lưu lại'); //change button text
            $('#btnSaveResearch').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Không thêm được dữ liệu');
            $('#btnSave').text('Lưu lại'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }

    });
}

function save_book()
{
    $('#btnSaveBook').text('loading...'); //change button text
    $('#btnSaveBook').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('profile/ajax_add_book')?>";
     } else {
         url = "<?php echo site_url('profile/ajax_update_book')?>";
     }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_book').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_book').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSaveBook').text('Lưu lại'); //change button text
            $('#btnSaveBook').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Không thêm được dữ liệu');
            $('#btnSaveBook').text('Lưu lại'); //change button text
            $('#btnSaveBook').attr('disabled',false); //set button enable 

        }

    });
}

function save_teaching()
{
    $('#btnSaveTeaching').text('loading...'); //change button text
    $('#btnSaveTeaching').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('profile/ajax_add_teaching')?>";
     } else {
         url = "<?php echo site_url('profile/ajax_update_teaching')?>";
     }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_teaching').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_teaching').modal('hide');
                setTimeout(function(){ location.reload(); }, 0);
                //reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSaveTeaching').text('Lưu lại'); //change button text
            $('#btnSaveTeaching').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Không thêm được dữ liệu');
            $('#btnSaveTeaching').text('Lưu lại'); //change button text
            $('#btnSaveTeaching').attr('disabled',false); //set button enable 

        }

    });
}

</script>

<div>

