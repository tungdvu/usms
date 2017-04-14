<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */
class Authentication extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('USMSLayout');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_account');

	}

	public function index()
	{
		$authentication = $this->session->userdata('authentication');
		if(isset($authentication) && !empty($authentication)){
			$user = json_decode($authentication,TRUE);
			if($user['Group_ID'] == 1 ){
				$count = $this->model_account->total(array(
					'Email'=>$user['Email'],
					'Password' => $user['Password'],
					'Salt' => $user['Salt'],
					'ID' => $user['ID'],
					// 'user_type' => $user['user_type']
				));
				if($count == 0){
					redirect('/authentication');
				}else{
					redirect('/dashboard');
				}
			}else{
				redirect('/authentication');
			}
		}
		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|callback__validData');
		
		if($this->form_validation->run() == TRUE){
			$email = $this->input->post('email');
			$user = $this->model_account->get('*',array('Email'=>$email));
			//set data user in session
			$this->session->set_userdata('authentication',json_encode($user));
			$this->session->set_flashdata('message_flashdata',array('type'=>'successful','message'=>'Đăng nhập thành công'));
			redirect('/dashboard');
		}

		$this->form_validation->set_error_delimiters('<div class="alert dark alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>','</div>');
		
		//add custom css login view
		$this->layout->css('template/assets/examples/css/pages/login-v2.css');
		
		$html = $this->load->view('backend/layout/login');
		$this->layout->title('Đăng nhập vào hệ thống');	
		$this->layout->view($html);

	}

	public function _validData($password='',$email=''){
			$email = $this->input->post('email');
			$count = $this->model_account->total(array('Email'=>$email,'Group_ID'=>1));
			if($count==0){
				$this->form_validation->set_message('_validData','Tài khoản không tồn tại');
				return false;
			}
			$user= $this->model_account->get('ID,Email,Password,Salt,Group_ID',array('Email'=>$email));
			$password_encode = md5(md5(md5($password).md5($user['Salt'])));
			if($user['Password']!=$password_encode) {
				$this->form_validation->set_message('_validData','Mật khẩu không đúng');
				return false;
			}
			// if ($user['permit'] ==2){
			// 	$yoursite = $this->site_model->getByID($user['id']);
			// 	if(is_array($yoursite) && count($yoursite) == 0){
			// 		$this->form_validation->set_message('_validData','Bạn không đủ quyền để đăng nhập vào quản trị site');
			// 		return false;
			// 	}
			// }
			return true;
    }

	public function logout()
	{
		$this->session->unset_userdata('authentication');
		redirect('authentication','refresh');
	}
}

?>