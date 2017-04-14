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
<div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <h2>Lấy lại mật khẩu ?</h2>
      <p>Nhập vào địa chỉ email của bạn để lấy lại mật khẩu.</p>
      <p><?php echo validation_errors(); ?></p>
      
      <?php if($this->session->flashdata('msg_success')) echo '<div class="alert dark alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <p>'.$this->session->flashdata('msg_success').'</p></div>';?>

      <?php if($this->session->flashdata('msg_error')) echo '<div class="alert dark alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <p>'.$this->session->flashdata('msg_error').'</p></div>';?>      
      
      <form method="post" role="form" autocomplete="off">
        <div class="form-group form-material floating" data-plugin="formMaterial">
          <input type="email" class="form-control empty" id="inputEmail" name="email">
          <label class="floating-label" for="inputEmail">Email</label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
        </div>
      </form>
        <footer class="page-copyright">
          <p>© 2016 BY UTT. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
    </div>
  </div>
  <!-- End Page -->