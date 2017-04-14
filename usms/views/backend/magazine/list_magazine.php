<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 11/12/2016
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
        <h3 class="panel-title">USMS - Quản lý dữ liệu bài báo khoa học</h3>
        <div class="panel-actions">
            <cite>Tổng số bài báo:  </cite><span class="tag tag-pill tag-lg tag-success"><?php echo $countAllMagazine; ?></span>
      </div>
    </div>
    <div class="panel-body container-fluid">                 
      <div class="row row-lg">
        <div class="col-xs-12 col-md-12">
        	<div class="example table-responsive">
                <table class="table table-hover" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <!-- <th><input type="checkbox" id="checkAll"></input></th> -->
                            <th style="width: 5px" data-orderable="false"><div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" class="inputcheckbox" id="checkAll"><label for="inputcheckbox"></label>
                            </div></th>                            
                            <th>ID</th>
                            <th style="width: 400px">Tên bài báo</th>
                            <th style="width: 100px">Tạp chí</th>
                            <th>Số tạp chí</th>
                            <th>Trang</th>
                            <th>Tác giả</th>
                            <!-- <th>Tham gia</th> -->
                            <th>Lĩnh vực</th>
                            <th>Năm</th>  
                            <th>Phạm vi</th>                        
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($magazines) && !empty($magazines))
                        {                           
                            $stt = 0;
                            foreach ($magazines as $value) {
                                $stt++;
                        ?>
                        <tr>
                            <!-- <td><input type="checkbox" class="selectedId" name="selectedId[]" value="<?php echo $value->ID;?>" /></td> -->
                            <td>
                            <div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" class="inputcheckbox" name="selectedId[]" value="<?php echo $value->ID;?>" ><label for="inputcheckbox"></label>
                            </div>
                            </td>
                            <td><?php echo $stt; ?></td>
                            <td><a class="hightlight" href="Magazine/single/<?php echo $this->encrypt->encode($value->ID) ; ?>"><?php echo $value->Name;?></a><?php echo ($value->File !== NULL) ? ' <i class="fa fa-file-pdf-o text-danger" aria-hidden="true" title="Có tệp đính kèm"></i>' : "";  ?></td>
                            <td><?php echo $value->Magazine_Name;?></td>
                            <td><?php echo isset($value->Magazine_No) ? $value->Magazine_No :"";?></td>
                            <td><?php echo $value->Page_Start.'-'.$value->Page_End;?></td>
                            <td><?php echo $value->Author;?></td>
<!--                             <td>
                                <?php
                                    if(!empty($value->RelateUser_ID)) { 
                                        foreach (json_decode($value->RelateUser_ID) as $key) {
                                            echo getName($key)."</br>";
                                    }
                                }else{ echo ""; } ?>
                            </td> -->
                            <td><?php echo isset($value->ResearchArea) ? $value->ResearchArea : "";?></td>
                            <td><?php echo $value->Magazine_Year;?></td>
                            <td><?php if ($value->Type_Area == 0) echo "Trong nước";?>
                                <?php if ($value->Type_Area == 1) echo "Quốc tế";?>
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
                  <a href="/Magazine/add" class="btn btn-success waves-effect"><i class="icon md-collection-plus" aria-hidden="true"></i> Thêm</a>
                  <button id="btn-edit" type="button" class="btn btn-dark waves-effect"><i class="icon fa fa-edit" aria-hidden="true"></i> Sửa</button>
                  <button id="btn-delete" type="button" class="btn btn-danger waves-effect"><i class="icon fa fa-remove" aria-hidden="true"></i> Xóa</button>
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

<script type="text/javascript">
    function addEventHandler(elem,eventType,handler){
    if (elem.addEventListener)
        elem.addEventListener(eventType,handler,false);
    else if (elem.attachEvent)
        elem.attachEvent ('on'+eventType,handler);
}
$(document).ready(function(){
    // var items = document.getElementsByClassName("clickable");
    // i = items.length;
    // while(i--){
    //     (function(item){
    //         addEventHandler(items[i],"click",function(){
    //             // make your ajax call here
    //             $(this).addClass('active').siblings().removeClass('active');
    //             var id = $(this).attr('data-id');
    //             //console.log(id);
    //             //window.alert("clicked on a thing: "+id);
    //             $('#btn-edit').on('click',function(){
    //                 alert(id);
    //             });
    //         });
    //     })(items[i].innerHTML); //items[i].innerHTML
    // }
  
});


$(document).ready(function(){
    var url="<?php echo base_url();?>";
    //select all checkbox 
    $('#checkAll').on('click', function ( e ) {
        $('input[name="selectedId[]"]').prop('checked', $(this).is(':checked'));
    });

    // Edit Button Click
    $('#btn-edit').on('click',function(e){
        e.preventDefault();
        var atLeastOneIsChecked = $('input[name="selectedId[]"]:checked');
        if(atLeastOneIsChecked.length == 1){
            //Edit one
            var id = $('input[name="selectedId[]"]:checked').val();
            //alert(123);
            window.location = url+"Magazine/edit/"+id;
        }else{
            bootbox.alert('Chọn một dòng để cập nhật.');
        }       
    });

    // Delete Button Click
    $('#btn-delete').on('click',function(e){
        e.preventDefault();
        var atLeastOneIsChecked = $('input[name="selectedId[]"]:checked');
        if(atLeastOneIsChecked.length == 0){
            bootbox.alert('Chưa chọn dòng để xóa');
        }else{
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
                        var id = $('input[name="selectedId[]"]:checked');
                        var myCheckboxes = [];
                        $(id).each(function() {
                           myCheckboxes.push($(this).val());
                        });
                        //console.log(myCheckboxes);
                        $.ajax({
                            url: url + "Magazine/delete",
                            type: 'POST',
                            data: {id:myCheckboxes},
                            success: function(status){
                                //console.log(status);
                                if(status === 'success'){
                                    //bootbox.alert('Xóa dữ liệu thành công');
                                    location.reload();
                                }
                            }
                        });                        
                    }
                }
            });
        }
    });
});    
</script>
<script type="text/javascript">
$(document).ready(function() {
    // $('#myTable').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copyHtml5',
    //         'excelHtml5',
    //         'csvHtml5',
    //         'pdfHtml5'
    //     ]
    // } );
} );
</script>