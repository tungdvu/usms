<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class USMSLayout {

	private $_template_f;
	private $CI,$userinfo;


	public function __construct() {
        $this->CI = & get_instance();
        $this->_template_f = $this->CI->config->item('template_f');
	}

	public function loadTop($viewFile = 'backend/layout/header', $data = array()){

		$authentication = $this->CI->session->userdata('authentication');
		if(isset($authentication) && !empty($authentication))
		{
			$guser = json_decode($authentication,TRUE);
			$userID = $guser['User_ID'];
			$this->userinfo = $this->CI->model_permit->getUserInfo($userID);

			$this->CI->session->set_userdata('userinfo',$this->userinfo);
			$data['userInfo'] = $this->CI->session->userdata('userinfo');

		}

		return $this->CI->load->view($this->_template_f . $viewFile, $data, true);		

	}

	function loadMenu($current = 'treeview', $viewFile = 'backend/layout/menu_left',  $data = array()){

		$menu =  $this->CI->load->view($this->_template_f . $viewFile, $data, true);

		$menu = str_replace('class_'.$current, 'active', $menu);

		return $menu;

	}

	function loadFooter($viewFile = '', $data = array()){

		return $this->CI->load->view($this->_template_f . $viewFile, $data, true);

	}



}
?>
