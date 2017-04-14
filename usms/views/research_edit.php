</div>
<h3>Sửa chi tiết đề tài khoa học</h3>
<?php //var_dump($research); ?>
<div class="main section" >
<!--   <form action method='post' enctype="multipart/form-data"> -->
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
    
    <h2>Bổ sung các thông tin chung</h2><hr>
    <div class="form-group">
          <label class="col-sm-3 control-label">Mã số: </label><small class="required">(*)</small>
          <div class="col-sm-6"><input class="form-control" type="text" name="code" value="<?=isset($research)?($research->code):(set_value('code'))?>" required></div>
    </div>

    <div class="form-group">
          <label class="col-sm-3 control-label">Cơ quan chủ trì thực hiện đề tài: </label><small class="required">(*)</small>
            <div class="col-sm-6">
            <input type="radio" onclick="javascript:yesnoCheck();" name="office" id="noCheck" value="Trường Đại học Công nghệ GTVT" checked required><label for "yesCheck">Trường Đại học Công nghệ GTVT </label>
            <input type="radio" onclick="javascript:yesnoCheck();" name="office" id="yesCheck" required><label for "noCheck" >Khác</label>

            <div id="ifYes" style="visibility:hidden" class="col-sm-6">
            <input type='text' id='yes' name='office' placeholder="Nhập tên cơ quan khác">
            </div>
          </div>             
    </div>

    <div class="form-group">
          <label class="col-sm-3 control-label">Tóm tắt đề tài: </label><small class="required">(*)</small>
          <div class="col-sm-6"><textarea class="form-control" rows="4" cols="100" type="text" name="summary" value="<?=isset($research)?($research->summary):(set_value('summary'))?>" required></textarea>
          </div>
    </div>

    <div class="form-group">
          <label class="col-sm-3 control-label">Nội dung đóng góp cho khoa học:</label><small class="required">(*)</small>
          <div class="col-sm-6"><textarea class="form-control" rows="4" cols="100" type="text" name="for_science" value="<?=isset($research)?($research->for_science):(set_value('for_science'))?>" required></textarea>
          </div>
    </div>

    <div class="form-group">
          <h5>Nội dung đóng góp cho thực tế (Nếu có):</h5><br>
          <label class="col-sm-3 control-label">Phạm vi:</label>
          <div class="col-sm-3">
            <select name="reality_group" class="form-control">
                <option value="">--Chọn--</option>
                <option value="1">Quốc gia</option>
                <option value="2">Ngành</option>
                <option value="3">Địa phương</option>
                <option value="4">Nhà trường</option>
            </select>           
          </div>
    </div>
    <div class="form-group">
          <label class="col-sm-3 control-label">Nội dung:</label>
          <div class="col-sm-6">
            <textarea class="form-control" rows="4" cols="100" type="text" name="reality_content" value="<?=isset($research)?($research->reality_content):(set_value('reality_content'))?>" required></textarea>           
          </div>
    </div>

    <div class="form-group">
          <h5>Sản phẩm đề tài làm tài liệu phục vụ cho đào tạo (Nếu có):</h5><br>
          <label class="col-sm-3 control-label">Hệ đào tạo:</label>
          <div class="col-sm-3">
            <select name="training_group" class="form-control">
                <option value="">--Chọn--</option>
                <option value="1">Đại học</option>
                <option value="2">Sau đại học</option>
                <option value="3">Cả hai</option>
            </select>           
          </div>
    </div>
    <div class="form-group">
          <label class="col-sm-3 control-label">Tên chương trình/Môn học/Chuyên đề liên quan:</label>
          <div class="col-sm-6">
            <textarea class="form-control" rows="4" cols="100" type="text" name="training_content" value="<?=isset($research)?($research->training_content):(set_value('training_content'))?>" required></textarea>           
          </div>
    </div>                        

    <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-9" style="text-align: right"><button class="btn btn-primary btn-lg" type="submit" value="Cập Nhật" name="sedit"><i class='fa fa-save'></i> Cập nhật</button></div>
    </div>
  </div>
<!-- </form> -->



<h4>Người thực hiện</h4>
<table class="form-table table table-striped table-bordered">
  <tr valign="top">
    <th class=""><label for="TT">TT</label></th>
    <th class="col-sm-2"><label for="Họ tên">Họ tên</label></th>
    <th class=""><label for="Học hàm/Học vị">Học hàm/Học vị</label></th>
    <th class=""><label for="Trách nhiệm">Trách nhiệm tham gia trong đề tài</label></th>
    <th class="col-sm-3"><label for="Nơi công tác">Nơi công tác</label></th>
    <th class="col-sm-2"><label for="Email">Email</label></th>
    <th class="col-sm-2"><label for="Thao tác">Thao tác</label></th>
  </tr>
  <?php if(isset($person) && !empty($person)){ 
    $stt = 1;
    foreach ($person as $p) {
  ?>
  <tr>
    <td><?php echo $stt++; ?></td>
    <td><?php echo $p['name']; ?></td>
    <td>
        <?php 
          echo $p['education'] == 1 ? "Kỹ sư" : ""; 
          echo $p['education'] == 2 ? "Cử nhân" : "";  
          echo $p['education'] == 3 ? "Thạc sĩ" : "";
          echo $p['education'] == 4 ? "Tiến sĩ" : "";
          echo $p['education'] == 5 ? "PGS/GS" : "";
        ?>
    </td>
    <td>
        <?php 
          echo $p['role'] == 1 ? "Chủ nhiệm" : ""; 
          echo $p['role'] == 2 ? "Thư ký" : "";  
          echo $p['role'] == 3 ? "Thành viên" : "";
        ?>
    </td>    
    <td><?php echo $p['office'] == "utt" ? "Trường Đại học Công nghệ GTVT" : $p['office'] ; ?></td>
    <td><?php echo $p['email']; ?></td>
    <td>
      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Sửa" onclick="edit_person(<?php echo $p['id'] ?>)"><i class="glyphicon glyphicon-pencil"></i> </a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Xóa" onclick="delete_person(<?php echo $p['id'] ?>)"><i class="glyphicon glyphicon-trash"></i> </a>                  
    </td>
  </tr>
  <?php }
  } ?>
</table>
<button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_person" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Thêm người thực hiện</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_person" class="form-horizontal">
                    <input type="hidden" name="research_id" value="<?php echo $id; ?>" />                   
                    <div class="form-body">
                      <div class="form-group">
                        <label class="col-md-3 control-label">Người thực hiện:</label>
                        <div class="col-sm-6">
                        <input type="radio" onclick="javascript:yesnoCheck1();" name="uid1" id="yesCheck1">
                        Là giảng viên trong trường</div>
                        <div class="col-sm-3">
                        <input type="radio" onclick="javascript:yesnoCheck1();" name="uid1" id="noCheck1">  Không
                        </div>
                      </div>

                      <div class="form-group" id="ifYes1" style="display: none">
                        <label class="col-sm-3 control-label">Chọn:</label>
                        <div class="col-md-9">
                            <select name= "uid2" class="form-control" id="yes1">
                            <?php foreach ($teacher as $value) { ?>
                              <option value="<?php echo $value['id']; ?>"><?php echo $value['fullname'].' | '.$value['donvi']; ?></option>
                            <?php
                            }
                            ?>
                              
                            </select>
                        </div>
                      </div>

                      <div class="form-group" id="ifYes2" style="display: none">
                          <label class="control-label col-md-3">Họ tên:</label>
                          <div class="col-md-9">
                            <input type='text' id='yes2' name='uid1' class="form-control" placeholder="" required>
                          </div>
                          <label class="control-label col-md-3">Nơi công tác</label>
                          <div class="col-md-9">
                            <input type="text" name="office" class="form-control">
                            <span class="help-block"></span>
                          </div>  
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Học hàm/Học vị</label>
                            <div class="col-md-9">
                                <select name="education" class="form-control" required>
                                    <option value="">--Chọn--</option>
                                    <option value="1">Kỹ sư</option>
                                    <option value="2">Cử nhân</option>
                                    <option value="3">Thạc sĩ</option>
                                    <option value="4">Tiến sĩ</option>
                                    <option value="5">PGS/GS</option>
                                </select>                                              
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Trách nhiệm tham gia trong đề tài</label>
                              <div class="col-md-9">
                                <select name="role" class="form-control" required>
                                    <option value="">--Chọn--</option>
                                    <option value="1">Chủ nhiệm</option>
                                    <option value="2">Thư ký</option>
                                    <option value="3">Thành viên</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                              <div class="col-md-9">
                                <input type="text" name="email" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>                                                                             
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_person()" class="btn btn-primary">Lưu lại</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Bỏ qua</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

</div>
              
                      
<style>
.avt-hover{
    border: 3px solid #fff;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);-moz-box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);opacity: 0.4;
}
small.required {
  color:red;
}
</style>

<script type="text/javascript">
  function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').css('display','block');
    }
    else document.getElementById('ifYes').css('display','none');
}

  function yesnoCheck1() {
    if (document.getElementById('yesCheck1').checked) {
        $('#ifYes1').css('display','block');
        $('#ifYes2').css('display','none');
    }
    else {
      $('#ifYes2').css('display','block');
      $('#ifYes1').css('display','none');
    }
}
</script>


<script type="text/javascript">

var save_method; //for save method string
var table;

function add_person()
{
    save_method = 'add';
    $('#form_person')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_person').modal('show'); // show bootstrap modal
    $('.modal-title').text('Thêm người thực hiện'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form_person')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

//    $('#ifYes2').css('display','block');

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('research/ajax_edit_person/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="uid"]').val(data.uid);
            $('[name="education"]').val(data.education);
            $('[name="role"]').val(data.role);
            $('[name="office"]').val(data.office);
            $('[name="email"]').val(data.email);
            
            $('#modal_person').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa người thực hiện'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Không tải được dữ liệu: Người thực hiện');
        }
    });
}

function delete_person(id)
{
    if(confirm('Bạn có chắc chắc muốn xóa?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('research/ajax_delete_person')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_person').modal('hide');
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

function save_person()
{
    $('#btnSave').text('loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('research/ajax_add_person')?>";
     } else {
         url = "<?php echo site_url('research/ajax_update_person')?>";
     }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_person').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_person').modal('hide');
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

</script>

<div>

