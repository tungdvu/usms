<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 *01/12/2016
 */

?>
<!-- Page -->
<div class="page">
<div class="page-content">
<div class="message-div"></div>
<?php if(validation_errors() != FALSE){ ?>
    <div class="alert dark alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul>
        <?php echo validation_errors();?>
    </ul></div>
<?php } ?>
  <!-- Panel -->
  <div class="panel panel-bordered">
    <div class="panel-heading">
    <h3 class="panel-title">USMS - Quản lý tài khoản</h3>
    </div>
    <div class="panel-body container-fluid">                   
      <div class="row row-lg">
        <div class="col-xs-12 col-md-12">
        	<div class="example table-responsive">
                <table class="table table-striped" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản</th>
                            <th>Giảng viên</th>                        
                            <th>Nhóm tài khoản</th>
                            <th class="text-nowrap">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($accounts) && !empty($accounts))
                        {                           
                            $stt = 0;
                            foreach ($accounts as $value) {
                                $stt++;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value->Email;?></td>
                            <td><?php echo $value->Name;?></td>
                            <td>
                            <?php if($value->GroupName == "Quản trị"){echo '<span class="tag tag-danger">'.$value->GroupName.'</span>' ;} ?>
                            <?php if($value->GroupName == "Người dùng"){echo '<span class="tag tag-info">'.$value->GroupName.'</span>' ;} ?>
                            </td>
                            <td class="text-nowrap">
                                <a href="/Account/edit/<?php echo $this->encrypt->encode($value->ID) ; ?>" class="btn btn-sm btn-icon btn-primary waves-effect" data-toggle="tooltip" data-original-title="Sửa">
                                    <i class="icon md-edit" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteThis(<?php echo $value->ID; ?>);" class="btn btn-sm btn-icon btn-danger waves-effect" data-toggle="tooltip" data-original-title="Xóa">
                                    <i class="icon fa-trash" aria-hidden="true"></i>
                                </a>                                
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
        	</div>
            <!-- Button Group -->
            <div class="pull-xs-right">
                <div>
                  <a href="/Account/add" class="btn btn-success waves-effect"><i class="icon md-collection-plus" aria-hidden="true"></i> Thêm mới</a>
                </div>               
            </div>
            <!-- End Button Group -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Panel -->
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
    var url="<?php echo base_url();?>";
    function deleteThis(id){
       var r=confirm("Bạn có chắc chắn muốn xóa tài khoản này?");
        if (r==true) {
          window.location = url+"account/delete/"+id;
        } else {
          return false;
        }
    }
</script>