<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 28/12/2016
 */

class Attachment extends MY_Controller {
    function Attachment() {
        parent::__construct ();
    }
	
    function download(){
		$file_name_encode = $this->input->get('file');
		if(!isset($file_name_encode) || is_bool($file_name_encode)){
			redirect($this->config->base_url());
			return;
		}
		$upload_dir = $this->config->base_url('uploads/attachments').'/';
		$file_name = base64_decode($file_name_encode);
		
		if ( $file_name == "") {
			echo "File không tồn tại";
			die;
		}
		$length   = printf('%u',filesize($upload_dir.$file_name)) ; 
		//mở file để đọc với chế độ nhị phân (binary)
		$fp = fopen($upload_dir.$file_name, "rb");
		header('Content-type: application/octet-stream');
		header('Content-disposition: attachment; filename="'.$file_name.'"');
		 
		//đọc file và trả dữ liệu về cho browser
		fpassthru($fp);
		fclose($fp);
    }
}