<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 28/12/2016
 */
?>
<!-- Page -->
<div class="page">
<div class="page-content container-fluid">
    <div class="col-xs-12 col-lg-3">
      <!-- Page Widget -->
      <div class="card card-shadow text-xs-center">
        <div class="card-block">
          <a class="avatar avatar-lg" href="javascript:void(0)">
          <?php $avatar = ($magazines->Avatar !== "") ? $magazines->Avatar: "default_avatar.png"; ?>
            <img src="<?php echo base_url().'uploads/images/avatar/'.$avatar;?>"
            alt="<?php echo isset($magazines->Author) ? $magazines->Author: ""; ?>" title="<?php echo isset($magazines->Author) ? $magazines->Author: ""; ?>">
          </a>
          <h4 class="profile-user"><?php echo isset($magazines->Author) ? $magazines->Author: ""; ?></h4>
          <p class="profile-job"><?php echo isset($magazines->Education) ? $magazines->Education: ""; ?></p>
          <div class="profile-social">
            <a class="icon fa fa-envelope" href="javascript:void(0)" title="<?php echo isset($magazines->Email) ? $magazines->Email : "";?> "></a>
            <a class="icon fa fa-phone" href="javascript:void(0)"></a>
            <a class="icon bd-dribbble" href="javascript:void(0)"></a>
            <a class="icon bd-github" href="javascript:void(0)"></a>
          </div>
          <a class="btn btn-primary" href="/Construction">Xem lý lịch</a>
        </div>
        <div class="card-footer">
          <div class="row no-space">
            <div class="col-xs-12"><i class="icon wb wb-stats-bars" title="Thống kê của tác giả"></i> Thống kê của tác giả
              <p class="profile-job">Tổng số: <a href="#"><?php echo isset($countByAuthor) ? $countByAuthor :""; ?></a> bài báo khoa học </p>
              <!-- <span>bài báo khoa học</span> -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Page Widget -->
    </div>
    <div class="col-xs-12 col-lg-9">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-heading">
        <!-- <h3 class="panel-title">USMS - Xem chi tiết thông tin bài báo khoa học</h3> -->
        </div>      
        <div class="panel-body">
            <div class="example">
                <h4><?php echo isset($magazines->Name) ? $magazines->Name: ""; ?></h4>
                <div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
                aria-multiselectable="true" role="tablist">
                  <div class="panel panel-default">
                    <div class="panel-heading" id="exampleHeadingContinuousOne" role="tab">
                      <a class="panel-title" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
                      href="#exampleCollapseContinuousOne" aria-controls="exampleCollapseContinuousOne"
                      aria-expanded="true">
                      <i class="icon wb-menu" aria-hidden="true"></i>
                      Thông tin bài báo
                    </a>
                    </div>
                    <div class="panel-collapse collapse in" id="exampleCollapseContinuousOne" aria-labelledby="exampleHeadingContinuousOne" role="tabpanel">
                      <div class="panel-body">
                        <dl class="dl-horizontal">
                          <dt class="col-xs-12 col-sm-3"><span><i class="icon fa fa-user" title="Tác giả"></i></span> Tác giả:</dt>
                          <dd class="col-xs-12 col-sm-9">
                          <a href="javascript:void(0)"><span><?php echo isset($magazines->Author) ? $magazines->Author: ""; ?></span></a></dd>
                          <?php if(!empty(json_decode($magazines->RelateUser_ID))) { ?>
                          <dt class="col-xs-12 col-sm-3"><i class="icon wb-users" title="Tham gia cùng:"></i> Tham gia cùng:</dt>
                          <dd class="col-xs-12 col-sm-9">
                            <?php 
                                foreach (json_decode($magazines->RelateUser_ID) as $key) {
                                    echo '<a href="javascript:void(0)">'.getName($key)."</a></br>";
                                }
                            ?>
                          </dd>
                          <?php } ?>
                          <dt class="col-xs-12 col-sm-3"><i class="icon fa fa-book" title="Tạp chí"></i> Tạp chí:</dt>
                          <dd class="col-xs-12 col-sm-9"><a href="javascript:void(0)"><span><?php echo isset($magazines->Magazine_Name) ? $magazines->Magazine_Name: ""; ?></span></a></dd>
                          <dt class="col-xs-12 col-sm-3"><i class="icon fa fa-book" title="Số tạp chí"></i> Số tạp chí:</dt>
                          <dd class="col-xs-12 col-sm-9"><a href="javascript:void(0)"><span><?php echo isset($magazines->Magazine_No) ? $magazines->Magazine_No: ""; ?></span></a></dd>
                          <!-- <dd class="col-xs-12 col-sm-9 offset-sm-3">Donec id elit non mi porta gravida.</dd> -->
                          <dt class="col-xs-12 col-sm-3"><i class="icon fa fa-calendar" title="Năm xuất bản"></i> Năm xuất bản:</dt>
                          <dd class="col-xs-12 col-sm-9"><span><?php echo isset($magazines->Magazine_Year) ? $magazines->Magazine_Year: ""; ?></span></dd>
                          <dt class="col-xs-12 col-sm-3"><i class="icon fa fa-tags" title="Số trang trên tạp chí"></i> Trang trên tạp chí:</dt>
                          <dd class="col-xs-12 col-sm-9"><span>Từ trang <?php echo isset($magazines->Page_Start) ? $magazines->Page_Start: ""; ?> đến trang <?php echo isset($magazines->Page_End) ? $magazines->Page_End: ""; ?></span></dd>
                          <dt class="col-xs-12 col-sm-3"><i class="icon fa fa-recycle" title="Lĩnh vực"></i> Lĩnh vực:</dt>
                          <dd class="col-xs-12 col-sm-9"><a href="javascript:void(0)"><span><?php echo isset($magazines->ResearchArea) ? $magazines->ResearchArea: ""; ?></span></a></dd>
                          <dt class="col-xs-12 col-sm-3"><i class="icon fa fa-globe" title="Phạm vi"></i> Phạm vi:</dt>
                          <dd class="col-xs-12 col-sm-9">
                          <span><?php echo $magazines->Type_Area == 0 ? "Trong nước" : "";?>
                          <?php echo $magazines->Type_Area == 1 ? "Quốc tế" : ""; ?></span></dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
<!--                 <div class="list-group-item">
                <h4 class="media-heading">Tóm tắt bài báo</h4>
                    <cite title=""><?php echo isset($magazines->Summary) ? $magazines->Summary: ""; ?></cite>
                </div> -->
                <div class="list-group-item">
                <h4 class="media-heading">Tóm tắt:</h4>
                <blockquote class="blockquote">
                <p class="text-justify"><cite><?php echo isset($magazines->Summary) ? $magazines->Summary: ""; ?></cite></p>
                </blockquote>
                </div>
                <div class="list-group-item">
                <h4 class="media-heading">Từ khóa:</h4>
                    <!-- <span><?php echo isset($magazines->Keyword) ? $magazines->Keyword: ""; ?></span> -->
                    <div class="keyword">
                    <?php $array = explode(',', $magazines->Keyword);
                        foreach ($array as $keyword) {
                            echo '<span class="tag tag-default">'.trim($keyword).'</span>';
                        }
                     ?></div>
                </div>
                <div class="list-group-item">
                <h4 class="media-heading">Tải bản đầy đủ:</h4>
                    <ul class="file-attach">
                    <?php foreach ($files as $file) {
                        echo '<li><i class="icon fa fa-file-pdf-o"></i> <a href="'.base_url().'attachment/download?file='.base64_encode($file->Filename).'">'.substr($file->Filename, 6).'</a></li>';
                    } ?>
                    </ul>
                </div>
                <div class="comment-meta pull-xs-right">
                <?php if($magazines->Modified_User == 0) { ?>
                    <span class="date">Nhập dữ liệu lúc: <?php echo isset($magazines->Created_Date) ? $magazines->Created_Date :""; ?> bởi <?php echo getName($magazines->Created_User); ?></span>
                <?php }else{ ?>
                    <span class="date">Cập nhật lần cuối: <?php echo isset($magazines->Modified_Date) ? $magazines->Modified_Date :""; ?> bởi <?php echo getName($magazines->Modified_User); ?></span>
                <?php } ?>
                </div>
                <br>
                <div id="pdf-wrapper" class="list-group-item" style="height: 500px;"></div>
            </div>              
        </div>
      </div>
      <!-- End Panel -->
    </div>
</div>
</div>
<?php //var_dump($files);die; ?>
<!-- End Page -->
<script type="text/javascript">
  <?php if(!empty($files)){ ?>
  var obj = "<?php echo base_url().'uploads/attachments/'.$files[0]->Filename; ?>";
  var options = {
    pdfOpenParams: { 
      zoom:'page-fit' 
    }
};
PDFObject.embed(obj, "#pdf-wrapper", options);
  //PDFObject.embed(obj, "#pdf-wrapper",{zoom: 'page-fit'});
//PDFObject.embed(obj, "#pdf-wrapper", options);
<?php }else{ ?>
  console.log('No Attachment File Avaiable');
<?php
} ?>
</script>
