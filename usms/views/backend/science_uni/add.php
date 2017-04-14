<?php  
/**
* USMS - He thong quan ly khoa hoc cong nghe (UTT)
* v 1.0
* @author TungVu
* @email  tungnv249@gmail.com
* @url    facebook.com/mr.tungnv
* 20/03/2017
*/
?>
<!-- Page -->
<div class="page">
    <div class="page-content container-fluid">
    <div class="message-div"></div>
        <?php if(validation_errors() != FALSE){ ?>
            <div class="alert dark alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul>
                <?php echo validation_errors();?>
            </ul></div>
        <?php } ?>    
        <!-- Panel -->  
        <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">USMS - Thêm mới Đề tài khoa học cấp trường</h3>
        </div>
            <div class="panel-body">
                <?php //var_dump($user); ?>
                <div class="row">
                    <form id="form_addScienceUni" autocomplete="off" action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-12">
                                    <label class="form-control-label" for="Name">Tên đề tài</label>
                                    <span class="required">*</span>
                                    <?php //echo form_error('Name'); ?>
                                    <input type="text" class="form-control" name="Name"
                                    placeholder="" autocomplete="off" value="<?php echo set_value('Name');?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Code">Mã số</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Code"
                                    placeholder="" autocomplete="off" value="<?php echo set_value('Code');?>" />
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Department_ID">Đơn vị đăng ký</label>
                                    <select class="form-control" id="" name="Department_ID">
                                        <option value="">-- Chọn --</option>
                                <?php if(isset($departments) && !empty($departments)):
                                        foreach ($departments as $department) : ?>
                                        <option value="<?php echo $department->ID; ?>"><?php echo $department->Name; ?></option>
                                <?php endforeach;endif; ?>
                                    </select>
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Date_Register">Ngày đăng ký</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Date_Register"
                                    placeholder="" data-plugin="datepicker" autocomplete="off" value="<?php echo set_value('Date_Register');?>" />
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Date_Start">Ngày bắt đầu</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Date_Start"
                                    placeholder="" data-plugin="datepicker" autocomplete="off" id="Date_Start" value="<?php echo set_value('Date_Start');?>" />
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Date_Finish">Ngày kết thúc</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Date_Finish"
                                    placeholder="" data-plugin="datepicker" autocomplete="off" id="Date_Finish" value="<?php echo set_value('Date_Finish');?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-4">
                                    <label class="form-control-label" for="User_ID">Chủ nhiệm</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="" name="User_ID" data-plugin="select2">
                                        <option value="">-- Chọn --</option>
                                        <?php
                                            if(!empty($users)){
                                                foreach ($users as $value) { ?>
                                                <option value="<?php echo $value['User_ID']; ?>"><?php echo $value['Name'].' | '.$value['DepartmentName']; ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </select>  
                                </div>
                                <div class="form-group col-xs-12 col-md-4">
                                    <label class="form-control-label" for="UserJoin_ID">Tham gia</label>
                                    <div class="select2-default">
                                    <select class="form-control" multiple="multiple" data-plugin="select2" name="UserJoin_ID[]">
                                       <!--  <option value="0"></option> -->
                                        <?php
                                            if(!empty($users)){
                                                foreach ($users as $value) { ?>
                                                <option value="<?php echo $value['User_ID']; ?>" ><?php echo $value['Name'].' | '.$value['DepartmentName']; ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-md-4">
                                    <label class="form-control-label" for="Sector">Khối ngành</label>
                                    <div class="select2-default">
                                    <select class="form-control" multiple="multiple" data-plugin="select2" name="Sector">
                                       <!--  <option value="0"></option> -->
                                        <?php
                                            $sectors = [
                                                'Kết cấu - Cầu',
                                                'Đường bộ - Vật liệu - Địa kỹ thuật',
                                                'CNTT - Điện tử',
                                                'Kinh tế vận tải',
                                                'Tổng hợp'
                                            ];
                                            if(!empty($sectors)){
                                                foreach ($sectors as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Decided_Outline">QĐ xét đề cương</label>
                                    <select class="form-control" id="" name="Decided_Outline" >
                                        <option value="0">-- Chọn --</option>
                                        <option value="1">Quyết định số 1</option>
                                        <option value="2">Quyết định số 2</option>
                                        <option value="2">Quyết định số 3</option>
                                    </select>                                           
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Decided_Mission">QĐ giao nhiệm vụ</label>
                                    <select class="form-control" id="" name="Decided_Mission" >
                                        <option value="0">-- Chọn --</option>
                                        <option value="1">Quyết định số 1</option>
                                        <option value="2">Quyết định số 2</option>
                                        <option value="2">Quyết định số 3</option>
                                    </select>                                           
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Decided_Acceptance">QĐ nghiệm thu</label>
                                    <select class="form-control" id="" name="Decided_Acceptance" >
                                        <option value="0">-- Chọn --</option>
                                        <option value="1">Quyết định số 1</option>
                                        <option value="2">Quyết định số 2</option>
                                        <option value="2">Quyết định số 3</option>
                                    </select>                                           
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Decided_Result">QĐ công nhận KQ</label>
                                    <select class="form-control" id="" name="Decided_Result" >
                                        <option value="0">-- Chọn --</option>
                                        <option value="1">Quyết định số 1</option>
                                        <option value="2">Quyết định số 2</option>
                                        <option value="2">Quyết định số 3</option>
                                    </select>                                           
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Outline_Status">Trạng thái đề cương</label>
                                    <select class="form-control" id="" name="Outline_Status" >
                                        <option value="">-- Chọn --</option>
                                        <option value="0">Không đạt</option>
                                        <option value="1">Đạt</option>
                                    </select> 
                                </div>
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Acceptance_Status">Trạng thái nghiệm thu</label>
                                    <select class="form-control" id="" name="Acceptance_Status" >
                                        <option value="">-- Chọn --</option>
                                        <option value="0">Chưa nghiệm thu</option>
                                        <option value="1">Đã nghiệm thu</option>
                                    </select> 
                                </div>
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Year">Năm học</label>
                                    <select class="form-control" id="" name="Year" >
                                    <span class="required">*</span>
                                        <option value="">-- Chọn --</option>
                                    <?php
                                        $now = date('Y');
                                        for($i = $now - 10;$i < $now + 5;$i++){?>
                                        <option value="<?php echo $i;?>-<?php echo $i+1;?>"><?php echo $i;?> - <?php echo $i+1;?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Extend_ID">QĐ gia hạn</label>
                                    <select class="form-control" id="" name="Extend_ID" >
                                        <option value="0">-- Chọn --</option>
                                        <option value="1">Quyết định số 1</option>
                                        <option value="2">Quyết định số 2</option>
                                        <option value="2">Quyết định số 3</option>
                                    </select>                                           
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-12 col-md-4">
                                    <label class="form-control-label" for="Point">Điểm</label>
                                    <input type="text" class="form-control" id="" name="Point"
                                placeholder="" autocomplete="off" value="<?php echo set_value('Point');?>" />
                                </div>
                                <div class="form-group col-xs-12 col-md-4">
                                    <label class="form-control-label" for="Level">Xếp loại</label>
                                    <select class="form-control" id="" name="Level" >
                                        <option value="">-- Chọn --</option>
                                        <option value="0">Loại A</option>
                                        <option value="1">Loại B</option>
                                    </select> 
                                </div>
                                <div class="form-group col-xs-12 col-md-4">
                                    <label class="form-control-label" for="Expense">Kinh phí</label>
                                    <input type="text" class="form-control" id="" name="Expense"
                                placeholder="" autocomplete="off" value="<?php echo set_value('Expense');?>" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-control-label" for="Outline_Target">Mục tiêu của đề tài</label>
                                    <span class="required">*</span>
                                <textarea class="form-control" id="textarea" name="Outline_Target" value="<?php echo set_value('Outline_Target');?>" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="Outline_Subjects">Đối tượng, Phạm vi nghiên cứu</label>
                                    <span class="required">*</span>
                                <textarea class="form-control" id="textarea" name="Outline_Subjects" value="<?php echo set_value('Outline_Subjects');?>" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="Outline_Method">Phương pháp nghiên cứu</label>
                                    <span class="required">*</span>
                                <textarea class="form-control" id="textarea" name="Outline_Method" value="<?php echo set_value('Outline_Method');?>" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="Outline_Content">Nội dung nghiên cứu</label>
                                    <span class="required">*</span>
                                <textarea class="form-control" id="textarea" name="Outline_Content" value="<?php echo set_value('Outline_Content');?>" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="Outline_Result">Dự kiến kết quả</label>
                                    <span class="required">*</span>
                                <textarea class="form-control" id="textarea" name="Outline_Result" value="<?php echo set_value('Outline_Result');?>" rows="3"></textarea>
                            </div>
<!--                             <div class="form-group form-material" data-plugin="formMaterial">
                            <label class="form-control-label" for="inputFile">Đính kèm</label>
                                    <span class="required">*</span>
                                <input type="text" class="form-control" placeholder="Chọn.." readonly="" />
                                <input type="file" id="inputFile" name="inputFile" multiple="" />
                            </div> 
 -->
                                <?php
                                foreach ($css_files as $file): ?>
                                    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
                                <?php endforeach; ?>
                                <?php foreach ($js_files as $file): ?>
                                    <script src="<?php echo $file; ?>"></script>
                                <?php endforeach; ?>
                                <?php echo $output; ?>

                            <div class="form-group form-material text-xs-right col-xs-12 col-md-12">
                                <button id="submit" type="submit" class="btn btn-primary">Lưu lại</button>
                            </div>                        
                            <!-- End Example Basic Form -->
                        </div>
                    </div>
                    </form>                                      
                    <div class="clearfix hidden-md-down"></div>
                </div>            
            </div>
        </div>  
    </div>
    <!-- End Page -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#Magazine_Year").datepicker( {
            format: " yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });        
    });
</script>
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
    $(document).ready(function(){
        var engine = new Bloodhound({
          // local: [{value: 'red'}, {value: 'blue'}, {value: 'green'} , {value: 'yellow'}, {value: 'violet'}, {value: 'brown'}, {value: 'purple'}, {value: 'black'}, {value: 'white'}],
          local: [],
          datumTokenizer: function(d) {
            return Bloodhound.tokenizers.whitespace(d.value);
          },
          queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        engine.initialize();

        $('#keyword').tokenfield({
          typeahead: [null, { source: engine.ttAdapter() }]
        });        
    });
</script>
