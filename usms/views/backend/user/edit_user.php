<?php  
/**
* USMS - He thong quan ly khoa hoc cong nghe (UTT)
* v 1.0
* @author TungVu
* @email  tungnv249@gmail.com
* @url    facebook.com/mr.tungnv
* 30/11/2016
*/

?>
<!-- Page -->
<div class="page">
    <div class="page-content container-fluid">
        <!-- Panel -->  
        <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">USMS - Cập nhật người dùng</h3>
        </div>
            <div class="panel-body">
            <?php if(validation_errors() != FALSE){ ?>
                <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors();?>
                </div>
            <?php } ?>
                <?php //var_dump($user); ?>
                <div class="row">
                    <form autocomplete="off" action="" method="post">
                    <div class="col-md-6 col-xs-12">
                        <!-- Example Basic Form -->
                        <div class="example-wrap">
                            <div class="example">
                                    <div class="row">
                                        <div class="form-group form-material col-xs-12 col-md-12">
                                            <label class="form-control-label" for="name">Họ tên</label>
                                            <input type="text" class="form-control" id="" name="name"
                                            placeholder="" autocomplete="off" value="<?php echo isset($user[0]->Name)? $user[0]->Name:""; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">                           
                                        <div class="form-group form-material col-xs-12 col-md-3">
                                            <label class="form-control-label" for="sex">Giới tính</label>
                                            <select class="form-control" id="" name="sex" data-plugin="select2">
                                                <option value="0" <?php if($user[0]->Sex == 0 ){echo "selected";} else {echo "";} ?>>Nam</option>
                                                <option value="1" <?php if($user[0]->Sex == 1 ){echo "selected";} else {echo "";} ?>>Nữ</option>
                                            </select>
                                        </div>                           
                                        <div class="form-group form-material col-xs-12 col-md-8">
                                            <label class="form-control-label" for="Birthday">Ngày sinh</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon md-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input name="birthday" type="text" class="form-control" data-plugin="datepicker" value="<?php echo isset($user[0]->Birthday) ? date_format(new DateTime($user[0]->Birthday),"d-m-Y") : "00-00-0000"; ?>">
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-material col-xs-12 col-md-6">
                                            <label class="form-control-label" for="Email">Email</label>
                                            <input type="email" class="form-control" id="" name="email"
                                            placeholder="" autocomplete="off" value="<?php echo isset($user[0]->Email)? $user[0]->Email:""; ?>" />
                                        </div>
                                        <div class="form-group form-material col-xs-12 col-md-6">
                                            <label class="form-control-label" for="Phone">Điện thoại</label>
                                            <input type="text" class="form-control" id="" name="phone"
                                            placeholder="" autocomplete="off" value="<?php echo isset($user[0]->Phone)? $user[0]->Phone:""; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="form-control-label" for="Address">Địa chỉ</label>
                                        <input type="text" class="form-control" id="" name="address"
                                        placeholder="" autocomplete="off" value="<?php echo isset($user[0]->Address)? $user[0]->Address:""; ?>" />
                                    </div>
                            </div>
                        </div>
                        <!-- End Example Basic Form -->
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <!-- Example Basic Form Without Label -->
                        <div class="example-wrap">
                            <div class="example">
                                <div class="row">
                                    <div class="form-group form-material col-xs-12 col-md-6">
                                        <label class="form-control-label" for="Education">Học hàm/Học vị</label>
                                        <input type="text" class="form-control" name="education" placeholder=""
                                        autocomplete="off" value="<?php echo isset($user[0]->Education)? $user[0]->Education:""; ?>" />
                                    </div>
                                    <div class="form-group form-material col-xs-12 col-md-4">
                                        <label class="form-control-label" for="Position">Chức vụ</label>
                                        <select class="form-control" id="" name="position" data-plugin="select2">
                                        <?php foreach ($positions as $ps) { ?>
                                            <option value="<?php echo $ps['ID']; ?>" <?php if($user[0]->Position_ID == $ps['ID'] ){echo "selected";} else {echo "";} ?>><?php echo $ps['Name']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-material col-xs-12 col-md-10">
                                        <label class="form-control-label" for="organization">Cơ quan</label>
                                        <input type="text" class="form-control" name="organization" placeholder=""
                                        autocomplete="off" value="<?php echo isset($user[0]->Organization)? $user[0]->Organization:""; ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-material col-xs-12 col-md-6">
                                        <label class="form-control-label" for="Department">Đơn vị</label>
                                        <select class="form-control" id="" name="department" data-plugin="select2">
                                        <?php foreach ($departments as $dp) { ?>
                                            <option value="<?php echo $dp->ID; ?>" <?php if($user[0]->Department_ID == $dp->ID ){echo "selected";} else {echo "";} ?>><?php echo $dp->Name; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-material col-xs-12 col-md-6">
                                        <label class="form-control-label" for="Place">Cơ sở</label>
                                        <select class="form-control" id="" name="place" data-plugin="select2">
                                        <?php foreach ($branchs as $branch) { ?>
                                            <option value="<?php echo $branch['ID']; ?>" <?php if($user[0]->Place_ID == $branch['ID'] ){echo "selected";} else {echo "";} ?>><?php echo $branch['Name']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-material text-xs-right">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Example Basic Form Without Label -->
                    </div>
                    </form>
                    <div class="clearfix hidden-md-down"></div>
                </div>            
            </div>
        </div>  
    </div>
    <!-- End Page -->
