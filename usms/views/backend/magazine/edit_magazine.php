<?php  
/**
* USMS - He thong quan ly khoa hoc cong nghe (UTT)
* v 1.0
* @author TungVu
* @email  tungnv249@gmail.com
* @url    facebook.com/mr.tungnv
* 27/12/2016
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
            <h3 class="panel-title">USMS - Nhập dữ liệu bài báo</h3>
        </div>
            <div class="panel-body">
                <?php //var_dump($user); ?>
                <div class="row">
                    <form id="form_editmagazine" autocomplete="off" action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-12">
                                    <label class="form-control-label" for="Name">Tên bài báo</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Name"
                                    placeholder="" autocomplete="off" value="<?php echo isset($magazines->Name) ? $magazines->Name : "" ; ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-5">
                                    <label class="form-control-label" for="Magazine_Name">Tên tạp chí/Báo</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Magazine_Name"
                                    placeholder="" autocomplete="off" value="<?php echo isset($magazines->Magazine_Name) ? $magazines->Magazine_Name : "" ; ?>" />
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Type">Loại</label>
                                    <select class="form-control" id="" name="Type" data-plugin="select2">
                                        <option value="1" <?php echo $magazines->Type == 1?"selected":""; ?>>Tạp chí</option>
                                        <option value="2" <?php echo $magazines->Type == 2?"selected":""; ?>>Hội thảo/Hội nghị</option>
                                        <option value="3" <?php echo $magazines->Type == 3?"selected":""; ?>>Kỷ yếu</option>
                                    </select>
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Magazine_No">Số tạp chí</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Magazine_No"
                                    placeholder="" autocomplete="off" value="<?php echo isset($magazines->Magazine_No) ? $magazines->Magazine_No : "" ; ?>" />
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Magazine_Year">Năm</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Magazine_Year"
                                    placeholder="" autocomplete="off" id="Magazine_Year" value="<?php echo isset($magazines->Magazine_Year) ? $magazines->Magazine_Year : "" ; ?>" />
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="form-group col-xs-12 col-md-5">
                                    <label class="form-control-label" for="ResearchArea_ID">Lĩnh vực</label>
                                    <select class="form-control" id="" name="ResearchArea_ID" data-plugin="select2" >
                                    <option value="0">-- Chọn lĩnh vực --</option>
                                    <?php
                                        if(!empty($research_area)){
                                            foreach ($research_area as $value) { ?>
                                            <option value="<?php echo $value['ID']; ?>" <?php echo $value['ID'] == $magazines->ResearchArea_ID  ? "selected" : "";?> ><?php echo $value['Name']; ?></option>
                                        <?php
                                            }
                                        }
                                    ?>
                                    </select>                                           
                                </div>                           
                                <div class="form-group col-xs-12 col-md-3">
                                    <label class="form-control-label" for="Type_Area">Phạm vi</label>
                                    <select class="form-control" id="" name="Type_Area" data-plugin="select2">
                                        <option value="0" <?php echo $magazines->Type_Area == 0 ? "selected" : "";?>>Trong nước</option>
                                        <option value="1" <?php echo $magazines->Type_Area == 1 ? "selected" : "";?>>Quốc tế</option>
                                    </select>                                           
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Page_Start">Trang bắt đầu</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Page_Start"
                                    placeholder="" autocomplete="off" value="<?php echo isset($magazines->Page_Start) ? $magazines->Page_Start : ""; ?>"/>                                           
                                </div>                           
                                <div class="form-group col-xs-12 col-md-2">
                                    <label class="form-control-label" for="Page_End">Trang kết thúc</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="Page_End"
                                    placeholder="" autocomplete="off" value="<?php echo isset($magazines->Page_End) ? $magazines->Page_End : ""; ?>" />                                           
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-5">
                                    <label class="form-control-label" for="Branch">Chuyên ngành</label>
                                    <input type="text" class="form-control" id="" name="Branch"
                                    placeholder="" autocomplete="off" value="<?php echo isset($magazines->Branch) ? $magazines->Branch : ""; ?>"/>
                                </div>
                                <div class="form-group col-xs-12 col-md-7">
                                    <label class="form-control-label" for="Keyword">Từ khóa</label>
                                    <span class="required">*</span>
                                    <input type="text" name="Keyword" class="form-control" id="keyword" value="<?php echo isset($magazines->Keyword) ? $magazines->Keyword : ""; ?>" placeholder="Nhập từ khóa và nhấn Enter" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-md-5">
                                    <label class="form-control-label" for="User_ID">Tác giả</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="" name="User_ID" data-plugin="select2">
                                        <?php
                                            if(!empty($users)){
                                                foreach ($users as $value) { ?>
                                                <option value="<?php echo $value['User_ID']; ?>" <?php echo $value['User_ID'] == $magazines->User_ID ? "selected" : "";?>><?php echo $value['Name'].' | '.$value['DepartmentName']; ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </select>  
                                </div>
                                <div class="form-group col-xs-12 col-md-7">
                                    <label class="form-control-label" for="User_Relate_ID">Tham gia cùng tác giả</label>
                                    <div class="select2-default">
                                    <select class="form-control" multiple="multiple" data-plugin="select2" name="User_Relate_ID[]">
                                       <!--  <option value="0"></option> -->
                                        <?php
                                            if(!empty($users)){
                                                foreach ($users as $value) { ?>
                                                <option value="<?php echo $value['User_ID']; ?>" <?php if(in_array($value['User_ID'],json_decode($magazines->RelateUser_ID))){echo "selected";}else{echo "";} ?> ><?php echo $value['Name'].' | '.$value['DepartmentName']; ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="Project_ID">Công trình liên quan</label>
                                <input type="text" class="form-control" id="" name="Project_ID"
                                placeholder="" autocomplete="off" value="
                                <?php echo isset($magazines->Project_ID) ? $magazines->Project_ID : $magazines->Project_ID == 0 ? "":"" ; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="Summary">Tóm tắt bài báo</label>
                                <span class="required">*</span>
                                <textarea class="form-control" id="textarea" name="Summary" rows="3"><?php echo isset($magazines->Summary) ? $magazines->Summary : ""; ?></textarea>
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
                                <button id="submit" type="submit" class="btn btn-primary">Cập nhật</button>
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
