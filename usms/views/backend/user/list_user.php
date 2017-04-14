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
<?php //var_dump($users);?>
<!-- Panel -->
<div class="panel panel-bordered">
<div class="panel-heading">
    <h3 class="panel-title">USMS - Quản lý người dùng</h3>
</div>
    <div class="panel-body container-fluid">                    
      <div class="row row-lg">
        <div class="col-xs-12 col-md-12">
        	<div class="example table-responsive">
                <table class="table table-striped" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Đơn vị</th>
                            <th>Trạng thái</th>                        
                            <th class="text-nowrap">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($users) && !empty($users))
                        {                           
                            $stt = 0;
                            foreach ($users as $value) {
                                $stt++;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value->Name;?></td>
                            <td><?php echo isset($value->Email) ? $value->Email : ""; ?></td>
                            <td><?php echo $value->DepartmentName;?></td>
                            <td><?php echo $value->Status == 1 ? '<span class="tag tag-table tag-success">Hoạt động</span>' : '';?></td>
                            <td class="text-nowrap">
                                <a href="/user/edit/<?php echo $this->encrypt->encode($value->User_ID) ; ?>" class="btn btn-sm btn-icon btn-flat waves-effect" data-toggle="tooltip" data-original-title="Sửa">
                                    <i class="icon md-edit" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteThis(<?php echo $value->ID; ?>);" class="btn btn-sm btn-icon btn-flat waves-effect" data-toggle="tooltip" data-original-title="Xóa">
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
                  <a href="/User/add" class="btn btn-success waves-effect"><i class="icon md-collection-plus" aria-hidden="true"></i> Thêm mới</a>
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
            //title: 'Cảnh báo!',
            message: 'Bạn có chắc chắn muốn xóa ?',
            buttons: {
                'cancel': {
                    label: 'Quay lại',
                    className: 'btn-default pull-left'
                },
                'confirm': {
                    label: 'Xóa ngay',
                    className: 'btn-danger pull-right'
                }
            },
            callback: function($result){
                if($result){
                    window.location = url+"user/delete/"+id;
                }
            }
    });
}       
</script>