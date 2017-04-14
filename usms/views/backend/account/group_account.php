<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 *10/12/2016
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
    <h3 class="panel-title">USMS - Quản lý Nhóm tài khoản</h3>
    <div class="panel-actions">
    <a href="/account/addgroup" class="btn btn-primary btn-block">
        <i class="icon md-plus" aria-hidden="true"></i> Thêm mới
    </a>
    </div>
</div>
    <div class="panel-body container-fluid">                    
      <div class="row row-lg">
        <div class="col-xs-12 col-md-12">
        	<div class="example table-responsive">
                <table class="table table-striped" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên nhóm</th>                      
                            <th>Ghi chú</th>
                            <th class="text-nowrap">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($groups) && !empty($groups))
                        {                           
                            $stt = 0;
                            foreach ($groups as $value) {
                                $stt++;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value->Name;?></td>
                            <td><?php echo $value->Description;?></td>
                            <td class="text-nowrap">
                                <a href="/user/edit/<?php echo $this->encrypt->encode($value->ID) ; ?>" class="btn btn-sm btn-icon btn-primary waves-effect" data-toggle="tooltip" data-original-title="Sửa">
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