<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

?>
<!-- Page -->
<div class="page">
<div class="page-content container-fluid">
<div class="message-div"></div>
    <?php if(validation_errors() != FALSE){ ?>
        <div class="alert dark alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul>
            <?php //echo validation_errors();?>
            <?php var_dump($this->session->flashdata('msg_error')) ;?>
        </ul></div>
    <?php } ?> 
    <!-- Panel -->  
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">USMS - Thêm mới tài khoản</h3>
        </div>
        <div class="panel-body">           
            <form id="exampleFullForm" autocomplete="off" class="fv-form fv-form-bootstrap4" method="post" action="">
                    <div class="col-xs-12 col-xl-6 form-horizontal">
                        <div class="form-group row">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Tên tài khoản
                                <span class="required">*</span>
                            </label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <input type="text" class="form-control" name="username" placeholder="" value="<?php echo set_value('username'); ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Email
                                <span class="required">*</span>
                            </label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <input type="text" class="form-control" name="email" placeholder="" value="<?php echo set_value('email'); ?>" >
                            </div>
                        </div>                            
                        <div class="form-group row">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Chọn Giảng viên</label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <select class="form-control" id="user" name="user" data-plugin="select2">
                                    <option value="">--- Chọn ---</option>                            
                                <?php
                                if(isset($users) && !empty($users)){
                                    foreach($users as $user) {
                                ?>
                                    <option value="<?php echo $user->User_ID; ?>"><?php echo $user->Name; ?></option>
                                <?php
                                    }
                                }
                                ?>
                                </select>                                                               
                            </div>
                        </div>                           
                        <div class="form-group row">
                            <label class="form-control-label" for="Birthday">Ngày sinh</label>
                            <div class="input-group col-xs-12 col-xl-12 col-md-9">
                                <span class="input-group-addon">
                                    <i class="icon md-calendar" aria-hidden="true"></i>
                                </span>
                                <input id="birthday" name="birthday" type="text" class="form-control" disabled>
                            </div>                                            
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Trạng thái</label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <select class="form-control" id="" name="status" data-plugin="select2">
                                    <option value="">--- Chọn ---</option>
                                    <option value="0">Mới tạo, chưa kích hoạt</option>
                                    <option value="1">Đã kích hoạt</option>
                                    <option value="2">Hết hạn sử dụng</option>
                                    <option value="3">Khóa vì vi phạm</option>
                                </select>
                            </div>
                        </div>                           
                        <div class="form-group row">
                            <label class="form-control-label" for="DateIssue">Ngày hiệu lực</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon md-calendar" aria-hidden="true"></i>
                                </span>
                                <input name="date_issue" type="text" class="form-control" data-plugin="datepicker">
                            </div>                                            
                        </div>                            
                        <div class="form-group col-xs-12 col-xl-12 text-xs-right padding-top-m">
                            <button type="submit" class="btn btn-primary waves-effect" id="" name="submit">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</div>
<!-- End Page -->
<script>
// Display success message
$(document).ready(function() {
    $('.message-div').hide();
    <?php if($this->session->flashdata('msg_error')){ ?>
        $('.message-div').addClass('alert dark alert-warning alert-dismissible');
        $('.message-div').html('<?php echo $this->session->flashdata('msg_error'); ?>').show();
        setTimeout(function() { $(".message-div").slideUp("slow"); }, 5000);
    <?php } ?>    
    <?php if($this->session->flashdata('msg_success')){ ?>
        $('.message-div').addClass('alert dark alert-success alert-dismissible');
        $('.message-div').html('<?php echo $this->session->flashdata('msg_success'); ?>').show();
        setTimeout(function() { $(".message-div").slideUp("slow"); }, 2000);
    <?php } ?>

});
</script>
<script type="text/javascript">
$(document).ready(function($){
  //get birthday for user
    $('#user').change(function(){
        var user_id = $('#user option:selected').val();
        var url = '<?php echo base_url(); ?>User/ajax_GetUserBirthday';
        //alert(user_id);
        $.ajax({
          type:'POST',
          url:url,
          data:({id:user_id}),
          success: function(data){
            $('#birthday').val(data);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Lỗi!');
          }
        });
    });
});  
</script> 