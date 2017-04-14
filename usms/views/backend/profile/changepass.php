<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
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
<div class="page-content container-fluid">
  <div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-lg-12">
      <!-- Begin Content -->
      <!-- Panel Full Example -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Đổi mật khẩu
          </h3>
        </div>
        <div class="panel-body">
          <?php
              if(isset($message_success)&&!empty($message_success))
              {
                  
                  echo '<div class="alert dark alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><h4><i class="icon fa fa-warning"></i>Thông báo !</h4>';
                  echo '<i class="icon md-check" aria-hidden="true"></i> &nbsp;'.$message_success;
                  echo '</div>';
              }
              if(isset($message_error)&&!empty($message_error))
              {
                
                echo '<div class="alert dark alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><h4><i class="icon md-alert-circle-o" aria-hidden="true"></i> Có lỗi xảy ra!</h4><ul>';
                foreach ($message_error as $key => $value) {
                    echo '<li>'.$value.'</li>';
                }
                echo "</ul></div>";
              }
          ?>        	

          <form id="exampleFullForm" autocomplete="off" method="post" action="">
            <div class="row row-lg">
              <div class="col-xs-12 col-xl-6 form-horizontal">
                <div class="form-group row form-material">
                  <label class="col-xs-12 col-xl-12 col-md-3 form-control-label">Mật khẩu cũ
                    <span class="required">*</span>
                  </label>
                  <div class="col-xs-12 col-xl-12 col-md-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon md-lock" aria-hidden="true"></i>
                      </span>
                      <input type="password" class="form-control" name="oldpass" placeholder=""
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group row form-material">
                  <label class="col-xs-12 col-xl-6 col-md-3 form-control-label">Mật khẩu mới
                    <span class="required">*</span>
                  </label>
                  <div class="col-xs-12 col-xl-12 col-md-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon md-lock" aria-hidden="true"></i>
                      </span>
                      <input type="password" class="form-control" name="newpass" placeholder=""
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group row form-material">
                  <label class="col-xs-12 col-xl-6 col-md-3 form-control-label">Nhập lại Mật khẩu mới
                    <span class="required">*</span>
                  </label>
                  <div class="col-xs-12 col-xl-12 col-md-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon md-lock" aria-hidden="true"></i>
                      </span>
                      <input type="password" class="form-control" name="renewpass" placeholder=""
                      required="">
                    </div>
                  </div>
                </div>                
              <div class="form-group form-material col-xs-12 col-xl-12 text-xs-right padding-top-m">
                <button type="submit" class="btn btn-primary" id="validateButton1">Xác nhận</button>
              </div>
              </div>

            </div>
          </form>
        </div>
      </div>
      <!-- End Panel Full Example -->

      <!-- End Content -->
    </div>
  </div>
</div>
</div>
<!-- End Page -->