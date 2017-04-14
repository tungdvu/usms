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
<div class="page-content">
<?php
//var_dump($departments);  
?>
<!-- Panel -->  
<div class="panel panel-bordered">
<div class="panel-heading">
    <h3 class="panel-title">USMS - Thêm đơn vị</h3>
</div>
        <div class="panel-body">            
            <?php echo validation_errors(); ?>
            <form id="exampleFullForm" autocomplete="off" class="fv-form fv-form-bootstrap4" method="post" action="">
            <?php if($this->session->flashdata('msg')){
            echo '<div class="alert dark alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="icon md-check" aria-hidden="true"></i> &nbsp;'.$this->session->flashdata('msg').'</div>';} ?>       
                    <div class="col-xs-12 col-xl-6 form-horizontal">
                        <div class="form-group row form-material">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Tên đơn vị
                                <span class="required">*</span>
                            </label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="" required>
                            </div>
                        </div>                           
                        <div class="form-group row form-material">
                            <label class="form-control-label">Đơn vị cấp trên</label>
                            <div class="col-xs-12 col-xl-12 col-md-6">
                                <select class="form-control" id="s_department" name="s_department" data-plugin="select2">
                                    <option value="0">-- Là đơn vị cấp trên --</option>                            
                                <?php
                                if(isset($departments) && !empty($departments)){
                                    foreach($departments as $department) { ?>
                                    <option value="<?php echo $department['id']; ?>"><?php echo $department['name']; ?></option>
                                <?php }
                                    }
                                ?>
                                </select>                                                               
                            </div>
                        </div>
                        <div class="form-group row form-material">
                            <label class="form-control-label">Kiểu</label>
                            <div class="col-xs-12 col-xl-12 col-md-6">
                                <select class="form-control" id="type_department" name="type_department" data-plugin="select2">
                                    <option value="">--- Chọn ---</option>
                                    <option value="phong-ban">Phòng - Ban</option>
                                    <option value="khoa">Khoa</option>
                                    <option value="bo-mon">Bộ môn</option>
                                    <option value="trung-tam">Trung tâm</option>
                                    <option value="cong-doan">Công đoàn</option>
                                    <option value="doan-thanh-nien">Đoàn Thanh niên</option>
                                </select>
                            </div>
                        </div>                            
                        <div class="form-group form-material col-xs-12 col-xl-12 text-xs-right padding-top-m">
                            <button type="submit" class="btn btn-primary waves-effect" id="" name="submit">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</div>
<!-- End Page -->
