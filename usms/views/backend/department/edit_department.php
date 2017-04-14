<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 25/11/2016
 */

?>
<!-- Page -->
<div class="page">
<div class="page-content container-fluid">
    <!-- Panel -->  
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">USMS - Cập nhật đơn vị</h3>
        </div>
        <div class="panel-body">
            <?php echo validation_errors();?>
            <?php //var_dump($alldep); ?>
            <form id="exampleFullForm" autocomplete="off" class="fv-form fv-form-bootstrap4" method="post" action="">                  
                    <div class="col-xs-12 col-xl-6 form-horizontal">
                        <div class="form-group row form-material">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Tên đơn vị
                                <span class="required">*</span>
                            </label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php echo isset($dep[0]['Name']) ? $dep[0]['Name'] : ""; ?>" placeholder="" required>
                            </div>
                        </div>                           
                        <div class="form-group row form-material">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Đơn vị cấp trên</label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <select class="form-control" id="s_department" name="s_department" data-plugin="select2">
                                <option value="0">--- Là đơn vị cấp trên ---</option>
                                <?php if(isset($alldep) && !empty($alldep)) {
                                    foreach ($alldep as $row) { ?>
                                    <option value="<?php echo $row->ID; ?>" <?php if($row->Name == $dep[0]['ParentName']) {echo "selected";} ?> ><?php echo $row->Name; ?>
                                    </option>
                                <?php
                                    }
                                        }
                                ?>
                                </select>                                                               
                            </div>
                        </div>
                        <div class="form-group row form-material">
                            <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Kiểu</label>
                            <div class="col-xs-12 col-xl-12 col-md-9">
                                <select class="form-control" id="type_department" name="type_department" data-plugin="select2">
                                <?php if(isset($alldep) && !empty($alldep)) {
                                    foreach ($key as $val) { ?>
                                    <option value="<?php echo $val['Key']; ?>" <?php if($dep[0]['Key'] == $val['Key']){echo "selected";}else{echo "";} ?> >
                                        <?php echo $val['Key'] == "phong-ban" ? "Phòng Ban":""; ?>
                                        <?php echo $val['Key'] == "khoa" ? "Khoa":""; ?>
                                        <?php echo $val['Key'] == "bo-mon" ? "Bộ môn":""; ?>
                                        <?php echo $val['Key'] == "csdt" ? "CSĐT":""; ?>
                                        <?php echo $val['Key'] == "trung-tam" ? "Trung tâm":""; ?>
                                        <?php echo $val['Key'] == "cong-doan" ? "Công Đoàn":""; ?>
                                        <?php echo $val['Key'] == "doan-thanh-nien" ? "Đoàn Thanh niên":""; ?>
                                    </option>
                                <?php
                                    }
                                        }
                                ?>
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
