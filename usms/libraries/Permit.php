<?php

/**
* 
*/
class Permit
{
	private $CI;
	private $authentication, $uid;
	function __construct()
	{
		$this->CI = & get_instance();
		//$this->CI->load->model('admin/model_user');
		$this->CI->load->model('model_account');
	}

	function authentication(){
		$this->authentication = $this->CI->session->userdata('authentication');
		if(isset($this->authentication) && !empty($this->authentication)){
			$user = json_decode($this->authentication,TRUE);
			if($user['Group_ID'] == 1 ){
				$count = $this->CI->model_account->total(array(
					'Email'=>$user['Email'],
					'Password' => $user['Password'],
					'Salt' => $user['Salt'],
					'ID' => $user['ID']
				));	
				$this->uid = $user['ID'];
			}else{
				redirect('/');
			}
		}else{
			redirect('/authentication');
		}
	}
	function Check($userID,$siteID)
	{
		$User = $this->CI->permit_model->getINFO($userID);
		if (!$User) {
			show_error("Vui lòng kiểm tra lại thông tin đăng nhập");
		} elseif ($User['permit']!=-1)
		{
			$Site = $this->CI->permit_model->getSite($userID, $siteID);
			if (!$Site){
				show_error("Lỗi! Bạn không có quyền truy cập vào trang này hoặc trang bạn yêu cầu không tồn tại!");
			} 
		}
	}
	function isSU($userID)
	{
		$User = $this->CI->permit_model->getINFO($userID);
		if (isset($User) && !empty($User)) 
		{
			if ($User['permit'] == -1) return true;
			else return false;
		} return false;
	}
	
	function checkSelectSite(){
		$this->CI->load->model('admin/permit_model');
		$this->CI->load->model('admin/site_model');
		$this->CI->load->library('session');
		$site_select_ss  = $this->CI->session->userdata('site_select');
		$lang_select_ss  = $this->CI->session->userdata('lang_select');
		if(!isset($site_select_ss) || is_bool($site_select_ss) || $site_select_ss == 0 || !isset($lang_select_ss) || is_bool($lang_select_ss)){
			$language = $this->CI->Model_lang->getAllLang();
			$authentication = $this->CI->session->userdata('authentication');
			if(isset($authentication) && !empty($authentication)){
				$guser = json_decode($authentication,TRUE);
				$userID = $guser['id'];
				$yoursite = NULL;
				if ($guser['permit'] ==2){
					$yoursite = $this->CI->site_model->getByID($userID);
				}else{
					$yoursite = $this->CI->site_model->getAll();
				}
				echo '
				<div id="show_select_site" class="modal" data-backdrop="static" data-keyboard="false">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title"><b>Vui lòng chọn một ngôn ngữ và một site để tiếp tục</b></h4>
					  </div>
					  <form method="post" action="">
					  <div class="modal-body">
					  <label>Chọn ngôn ngữ:</label>
					  <select class="form-control" name="lang_select" title="Chọn ngôn ngữ"><optgroup label="Chọn ngôn ngữ">';
				          foreach ((isset($language)?$language:array()) as $k => $val)
				          {
				            if ((isset($lang_select_ss)?$lang_select_ss:null) == $val['code'])
				            {
				              echo '<option selected value="'.$val['code'].'">'.$val['name'].'</option>';
				            } else echo '<option value="'.$val['code'].'">'.$val['name'].'</option>';
				          }
				        echo '</select>';
						  if (isset($yoursite)&&!empty($yoursite)){
							echo '<label>Chọn site quản lý:</label><select class="form-control" name="site_select" title="Chọn site"><optgroup label="Chọn site">';
								foreach ($yoursite as $key => $value)
								{
								  echo '<option value="'.$value['id'].'">'.$value['url_name'].'</option>';
								}
							  echo '</select>';
							}
						echo '
					  </div>
					  <div class="modal-footer">
						<button type="submit" class="btn btn-primary">Chọn</button>
					  </div>
					  </form>
					</div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div>
				';
				 echo '<script>
					$(document).ready(function()
						{
						  $("#show_select_site").modal("show");
						});
                  </script>';
			}
		}
	}

	function getCheckPermit($permit="1") // [1:Super Admin(default)] | [2: Admin] | [3: Manager] | [4: Member] //
	{
		$p = $permit;
		if (in_array($permit, array('1', '2', '3','4')))
		{
			$p = ($permit==1)?'-1':$p;
			$p = ($permit==2)?'1':$p;
			$p = ($permit==3)?'2':$p;
			$p = ($permit==4)?'0':$p;

			$User = $this->CI->permit_model->getINFO((int)$this->uid);
			if (isset($User) && !empty($User)) 
			{
				if ( $User['permit'] == $p ) return true;
				else return false;
			} return false;
		} else return false;
	}

	function checkRedirect($page = "", $permit = "1") // [1:Super Admin(default)] | [2: Admin] | [3: Manager] | [4: Member] //
	{
		$permit = (int)$permit;
		$ck = $this->getCheckPermit($permit);
		if (!$ck){
			$this->CI->session->set_flashdata('message_flashdata',array('type'=>'error','message'=>'Bạn không đủ quyền để truy cập chức năng này'));
			redirect($page,'refresh');		
		} // IF NOT -> goto $page
	}
}

?>