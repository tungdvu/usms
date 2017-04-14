<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('USMSLayout');
        //$this->permit->authentication();   
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->model('model_account');

		//custom css js
		$this->layout->css('template/global/fonts/material-design/material-design.min.css');
		$this->layout->css('template/global/fonts/brand-icons/brand-icons.min.css');
		$this->layout->css('template/assets/examples/css/pages/forgot-password.css');		

	}

	public function index()
	{
		
		//add custom css login view
		//$this->layout->css('template/assets/examples/css/pages/login-v2.css');
		$this->layout->title('USMS | Thông tin tài khoản');	
        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();		
		$html .= $this->load->view('backend/profile/index');
		$this->layout->view($html);

		$auth = $this->session->userdata('authentication');

	}

	function changepass()
	{
		$this->load->library('form_validation');
		$data = array();		

		$auth = $this->session->userdata('authentication');
		if(isset($auth)&&!empty($auth))
		{
			$myuser = json_decode($auth,true);

			$this->form_validation->set_rules('oldpass','Old Password','trim|required|min_length[8]');
			$this->form_validation->set_rules('newpass','New Password','trim|required|min_length[8]');
			$this->form_validation->set_rules('renewpass','Re New Password','trim|required|min_length[8]');
			
			if (isset($_POST)&&!empty($_POST)) 
			{
				$old = $this->input->post('oldpass');
				$new = $this->input->post('newpass');
				$repass = $this->input->post('renewpass');
				
				$isok = $this->model_account->checkoldpass($myuser['ID'], $old);
				if (!$isok) 
				{
					$error[] = "Mật khẩu cũ không đúng";
				}
				if (!preg_match('/[!@#$%*a-zA-Z0-9]{8,}/',$new))
				{
					$error[] = "Mật khẩu mới phải lớn hơn hoặc bằng 8 ký tự và chỉ bao gồm chữ, số và một số ký tự đặc biệt !@#$%*";
				}
				if ($repass != $new) 
				{
					$error[] = "Nhập lại mật khẩu không khớp";
				}
				if (!isset($error) && empty($error))
				{
					$status = $this->model_account->changepass($myuser['ID'], $new);
					if ($status) {
						$data['message_success'] = "Thay đổi mật khẩu thành công.";
						//redirect('/Authentication/logout');		
					}else {
						$data['message_error'] = array('error',"Thay đổi mật khẩu thất bại");
					}
				} else {
					$data['message_error'] = $error;
				}

			}
			$this->layout->css('template/global/vendor/formvalidation/formValidation.css');		
			$this->layout->css('template/assets/examples/css/forms/validation.css');
			$this->layout->js('template/assets/examples/js/forms/validation.js');
	        
	        $this->layout->title('USMS | Đổi mật khẩu');
	        $html = $this->usmslayout->loadTop();
	        $html .= $this->usmslayout->loadMenu();
	        $html .= $this->load->view('backend/profile/changepass',$data,true);
	        $html .= $this->usmslayout->loadFooter('backend/layout/footer');
	        $this->layout->view($html);			

		}else{
			redirect('/authentication');
		}
				
	}

	function forgotpass()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$user = $this->model_account->getEmail($email);
			
			if (!$user) {
				//Some sort of error happened, redirect user back // to form
				$this->session->set_flashdata('msg_error','Địa chỉ email không tồn tại trên hệ thống');
				//redirect('user/forgotpass');
			}else{
				$code = mt_rand('5000', '200000').random_string('alnum').time();
				$id = $user[0]['ID'];
				$email = $user[0]['Email'];

				$this->model_account->changepass($id, $code);
				$this->sendmail($email,$code);
			}
		}
		$html = $this->usmslayout->loadTop();
		$html .= $this->usmslayout->loadMenu();
		$html .= $this->load->view('backend/profile/forgotpass',isset($data)?$data:"", TRUE);
		$this->layout->title('USMS | Quên mật khẩu');
		$this->layout->view($html);
	}

	function sendmail($mailto,$content)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'uttteams@gmail.com',
			'smtp_pass' => 'UTTTeamAHLPT',					
			'useragent' => 'USMS - Hệ thống quản lý Khoa học Công nghệ',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('uttteams@gmail.com', 'USMS - Hệ thống quản lý Khoa học Công nghệ');
		$this->email->to($mailto);
		$htmlMessage = "Mật khẩu mới của bạn là:".$content;
		$this->email->subject('USMS - Mật khẩu mới của bạn');
		$this->email->message($htmlMessage);

		if ($this->email->send()) {
			$this->session->set_flashdata('msg_success', "Đặt lại mật khẩu thành công.<br/>Vui lòng kiểm tra email của bạn!");
			//redirect('/user');
		} else {
	        //$this->email->print_debugger();
			$this->session->set_flashdata('msg_error', "Có lỗi xảy ra! Không gửi được email!");
		}
	}


	
}

?>