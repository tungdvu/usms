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
<!-- <div class="page-header">
  <h1 class="page-title">USMS - Quản lý đơn vị</h1>
</div> -->
<div class="page-content">
<div class="message-div"></div>
<?php //var_dump($departments);?>
  <!-- Panel -->
  <div class="panel panel-bordered">
    <div class="panel-heading">
    <h3 class="panel-title">USMS - Quản lý đơn vị</h3>
    </div>
    <div class="panel-body container-fluid">                 
      <div class="row row-lg">
        <div class="col-xs-12 col-md-12">
        	<div class="example table-responsive">
                <table class="table table-striped" data-plugin="dataTable">
                    <thead class="bg-blue-grey-100">
                        <tr>
                            <th>ID</th>
                            <th>Tên đơn vị</th>
                            <th>Đơn vị cấp trên</th>                        
                            <th class="" data-orderable="false">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($departments) && !empty($departments))
                        {                           
                            $stt = 0;
                            foreach ($departments as $value) {
                                $stt++;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value->Name;?></td>
                            <td><?php echo $value->ParentName;?></td>
                            <td class="">
                                <a href="/department/edit/<?php echo $this->encrypt->encode($value->ID) ; ?>" class="btn btn-sm  btn-icon btn-flat waves-effect" data-toggle="tooltip" data-original-title="Sửa">
                                    <i class="icon md-edit" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteThis(<?php echo $value->ID; ?>);" class="btn btn-sm  btn-icon btn-flat waves-classic waves-effect" data-toggle="tooltip" data-original-title="Xóa" data-type="confirm">
                                    <i class="icon fa-close" aria-hidden="true"></i>
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
                  <a href="/Department/add" class="btn btn-success waves-effect"><i class="icon md-collection-plus" aria-hidden="true"></i> Thêm mới</a>
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
<!-- <script type="text/javascript">
    var url="<?php echo base_url();?>";
    function deleteThis(id){
       var r=confirm("Bạn có chắc chắn muốn xóa đơn vị?");
        if (r==true) {
          window.location = url+"department/delete/"+id;
        } else {
          return false;
        }
    }
</script> -->

<script>
//Modify Confirm using Bootbox Plugin
    var url="<?php echo base_url();?>";
    function deleteThis(id){
        bootbox.confirm({
            title: 'Thông báo',
            message: 'Bạn có chắc chắn muốn xóa ?',
            buttons: {
                'cancel': {
                    label: '<i class="fa fa-reply"></i> Quay lại',
                    className: 'pull-left'
                },
                'confirm': {
                    label: '<i class="fa fa-check"></i> Xóa ngay',
                    className: 'btn-danger pull-right'
                }
            },
            callback: function($result){
                if($result){
                    window.location = url+"department/delete/"+id;
                }
            }
    });
}       
</script>

<script>
// Display success message
$(document).ready(function() {
$('.message-div').hide();
<?php if($this->session->flashdata('msg_error')){ ?>
    $('.message-div').addClass('alert dark alert-warning alert-dismissible');
    $('.message-div').html('<?php echo $this->session->flashdata('msg_error'); ?>').show();
    setTimeout(function() { $(".message-div").slideUp("slow"); }, 2000);
<?php } ?>    
<?php if($this->session->flashdata('msg_success')){ ?>
    $('.message-div').addClass('alert dark alert-success alert-dismissible');
    $('.message-div').html('<?php echo $this->session->flashdata('msg_success'); ?>').show();
    setTimeout(function() { $(".message-div").slideUp("slow"); }, 2000);
<?php } ?>
});
</script>