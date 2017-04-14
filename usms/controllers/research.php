<?php
/**
* TungVu @20160912
*/
class Research extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('teacher_model');
		$this->load->model('research_model');
		$this->load->helper('url');
	}

	function index()
	{		

		$auth = $this->session->userdata('authentication');
		if (isset($auth)&&!empty($auth))
		{
			$myuser = json_decode($auth,true);
			if (isset($myuser)&&!empty($myuser)) {
				$data['profile'] = $this->teacher_model->profile($myuser['id']);

				$data['user_job'] = $this->teacher_model->getJobByUser($myuser['id']);
				$data['user_research'] = $this->teacher_model->getResearchByUser($myuser['id']);
				$data['user_science'] = $this->teacher_model->getScienceByUser($myuser['id']);
				$data['user_book'] = $this->teacher_model->getBookByUser($myuser['id']);
				$data['user_teaching'] = $this->teacher_model->getTeachingByUser($myuser['id']);

				$data['profile'] = !empty($data['profile'])?$data['profile'][0]:array();
				$datateacher['teacher'] = $data['profile'];
				$html = $this->tlayout->header($datateacher);
				$html .= $this->load->view('profile',$data,true);
				//$html .= $this->tlayout->right();
				$html .= $this->tlayout->footer();
				$this->layout->title(isset($myuser)?'Thông tin giảng viên - '.$myuser['fullname']:'Thông tin giảng viên');
				$this->layout->view($html);
			}
			else
			{
				$html = $this->tlayout->Header();
				$html .= $this->load->view('404',null,true);
				$html .= $this->tlayout->Footer();
				$this->layout->title('404 - Page Not Found');
				$this->layout->view($html);
			}
		} else
		{
			$html = $this->tlayout->Header();
			$html .= $this->load->view('404',null,true);
			$html .= $this->tlayout->Footer();
			$this->layout->title('404 - Page Not Found');
			$this->layout->view($html);
		}
	}

//person
	public function ajax_add_person()
	{
		$this->_validate();
		if($this->input->post('uid1') && $this->input->post('uid1') != "" && $this->input->post('office') && $this->input->post('office') != "" ){
			$uid1 = $this->input->post('uid1');
			$address = $this->input->post('office');

			$data_user = array(
				'fullname' => getSaveSqlStr($uid1),
				'address' => getSaveSqlStr($address),
				'user_type' => 5,//khong phai giang vien cua truong
			);

			$this->research_model->addUser($data_user);
			$uid = $this->db->insert_id();
			$office = $address;
		}else{
			$uid = $this->input->post('uid2');
			$office = "utt";
		}

		$data = array(
				//'uid' => getSaveSqlStr($this->input->post('uid1')),
				'uid' => getSaveSqlStr($uid),
				'research_id' => getSaveSqlStr($this->input->post('research_id')),
				'education' => getSaveSqlStr($this->input->post('education')),
				'role' => getSaveSqlStr($this->input->post('role')),
				'office' => getSaveSqlStr($office),
				'email' => getSaveSqlStr($this->input->post('email')),
				'extra' => 1,
				'timecreated' => date("Y-m-d H:m:s")
			);
		//var_dump($data);die;

		$insert = $this->research_model->insertResearchPerson($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit_person($id)
	{
		$data = $this->research_model->getPersonById($id);
		echo json_encode($data);
	}

	public function ajax_delete_person($id)
	{
		$this->research_model->deletePersonById($id);
		echo json_encode(array("status" => TRUE));
	}	

	public function ajax_update_person()
	{
		//$this->_validate();
		$data = array(
			'uid' => getSaveSqlStr($this->input->post('uid')),
			'education' => getSaveSqlStr($this->input->post('education')),
			'role' => getSaveSqlStr($this->input->post('role')),
			'office' => getSaveSqlStr($this->input->post('office')),
			'email' => getSaveSqlStr($this->input->post('email')),
			'extra' => 1,
			'timeupdate' => date("Y-m-d H:m:s")
			);
		$this->research_model->updatePerson($this->input->post('research_id'), $data);
		
		echo json_encode(array("status" => TRUE));
	}





private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('uid1') == '')
		{
			$data['inputerror'][] = 'uid1';
			$data['error_string'][] = 'Chưa nhập họ tên';
			$data['status'] = FALSE;
		}

		if($this->input->post('office') == '')
		{
			$data['inputerror'][] = 'office';
			$data['error_string'][] = 'Chưa nhập Nơi công tác';
			$data['status'] = FALSE;
		}

		if($this->input->post('education') == '')
		{
			$data['inputerror'][] = 'education';
			$data['error_string'][] = 'Chưa chọn Học hàm/Học vị';
			$data['status'] = FALSE;
		}

		if($this->input->post('role') == '')
		{
			$data['inputerror'][] = 'role';
			$data['error_string'][] = 'Chưa chọn Trách nhiệm tham gia trong đề tài';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Chưa nhập email';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}	

	function edit()
	{
		$auth = $this->session->userdata('authentication');
		if (isset($auth)&&!empty($auth))
		{
			$myuser = json_decode($auth,true);
			if (!isset($myuser)||empty($myuser))
			{
				redirect('authentication','refresh');
			}
		} else
		{
			redirect('authentication','refresh');
		}
		
		$teacher =  $this->teacher_model->getAllTeachers();
		$data['teacher'] = $teacher;
		//var_dump($teacher);die;


		$id = $this->uri->segment(3);
		$research_data = $this->teacher_model->getResearchById($id);
		$person = $this->research_model->getPersonByResearch($id);
		//var_dump($person);die;

		$data['id'] = $id;
		$data['person'] = $person;
		$data['research'] = $research_data;

		$profile = $this->teacher_model->profile($myuser['id']);
		$user_job = $this->teacher_model->getJobByUser($myuser['id']);
		$user_research = $this->teacher_model->getResearchByUser($myuser['id']);
		$user_science = $this->teacher_model->getScienceByUser($myuser['id']);
		$user_book = $this->teacher_model->getBookByUser($myuser['id']);
		$user_teaching = $this->teacher_model->getTeachingByUser($myuser['id']);

		//$data['user_job'] = $user_job;
		$data['profile'] = !empty($profile)?$profile[0]:array();
		//$data['user_research'] = $user_research;
		//$data['user_science'] = $user_science;
		//$data['user_book'] = $user_book;
		//$data['user_teaching'] = $user_teaching;
		

		$datateacher['teacher'] = $data['profile'];

		//$datateacher['teacher'] = $data['research'];
		$html = $this->tlayout->Header();
		$html .= $this->load->view('research_edit',$data,true);
		$html .= $this->tlayout->footer();
		$this->layout->js(base_url().'publics/admin/plugins/ckeditor/ckeditor.js',true);
		
		//Show Layout
		$this->layout->title('Thay đổi thông tin đề tài NCKH');	
		$this->layout->view($html);



		//Thay đổi
		if (isset($_POST['sedit'])&&!empty($_POST['sedit']))
		{
			
			$name = getSaveSqlStr(strip_tags($this->input->post('fullname')));
			$birthday = getSaveSqlStr(strip_tags($this->input->post('birthday')));
			//$sex = getSaveSqlStr(strip_tags($this->input->post('sex')));
			$city = getSaveSqlStr(strip_tags($this->input->post('city')));
			$education = getSaveSqlStr(strip_tags($this->input->post('education')));
			$address = getSaveSqlStr(strip_tags($this->input->post('address')));
			$phone = getSaveSqlStr(strip_tags($this->input->post('phone')));
			$about = ($this->input->post('about'));

			//training
			$dh_hedaotao = getSaveSqlStr(strip_tags($this->input->post('dh_hedaotao')));
			$dh_noidaotao = getSaveSqlStr(strip_tags($this->input->post('dh_noidaotao')));
			$dh_nganhhoc = getSaveSqlStr(strip_tags($this->input->post('dh_nganhhoc')));
			$dh_nuocdaotao = getSaveSqlStr(strip_tags($this->input->post('dh_nuocdaotao')));
			$dh_namtotnghiep = getSaveSqlStr(strip_tags($this->input->post('dh_namtotnghiep')));
			$dh_bang2 = getSaveSqlStr(strip_tags($this->input->post('dh_bang2')));
			$dh_bang2namtotnghiep = getSaveSqlStr(strip_tags($this->input->post('dh_bang2namtotnghiep')));
			$sdh_thacsichuyennganh = getSaveSqlStr(strip_tags($this->input->post('sdh_thacsichuyennganh')));
			$sdh_thacsinamcapbang = getSaveSqlStr(strip_tags($this->input->post('sdh_thacsinamcapbang')));
			$sdh_thacsinoidaotao = getSaveSqlStr(strip_tags($this->input->post('sdh_thacsinoidaotao')));
			$sdh_tiensichuyennganh = getSaveSqlStr(strip_tags($this->input->post('sdh_tiensichuyennganh')));
			$sdh_tiensinamcapbang = getSaveSqlStr(strip_tags($this->input->post('sdh_tiensinamcapbang')));
			$sdh_tiensinoidaotao = getSaveSqlStr(strip_tags($this->input->post('sdh_tiensinoidaotao')));
			$sdh_tiensitenluanan = getSaveSqlStr(strip_tags($this->input->post('sdh_tiensitenluanan')));
			$ngoaingu1 = getSaveSqlStr(strip_tags($this->input->post('ngoaingu1')));
			$ngoaingu1_mucdo = getSaveSqlStr(strip_tags($this->input->post('ngoaingu1_mucdo')));
			$ngoaingu2 = getSaveSqlStr(strip_tags($this->input->post('ngoaingu2')));
			$ngoaingu2_mucdo = getSaveSqlStr(strip_tags($this->input->post('ngoaingu2_mucdo')));
			$ngoaingu3 = getSaveSqlStr(strip_tags($this->input->post('ngoaingu3')));
			$ngoaingu3_mucdo = getSaveSqlStr(strip_tags($this->input->post('ngoaingu3_mucdo')));
			$ngoaingu4 = getSaveSqlStr(strip_tags($this->input->post('ngoaingu4')));
			$ngoaingu4_mucdo = getSaveSqlStr(strip_tags($this->input->post('ngoaingu4_mucdo')));
			$chungchi = getSaveSqlStr(strip_tags($this->input->post('chungchi')));

			$avatarup = $this->upload('avatar');
		    $avatar = ($avatarup['success'])?$avatarup['upload_data']['file_name']:($this->teacher_model->getAvatar($myuser['id']));
		    if ($avatarup['success'])
		    {
		    	if (file_exists('./uploads/images/avatar/'.($this->teacher_model->getAvatar($myuser['id'])))) unlink('./uploads/images/avatar/'.($this->teacher_model->getAvatar($myuser['id'])));
		    }
			//Check mail
			// if (filter_var(isset($email)?$email:null, FILTER_VALIDATE_EMAIL))
			// {
			// 	$cemail = $this->profile_model->checkmail($this->uid, $email);
			// 	if (!$cemail)
			// 	{
			// 		$error['email'] = "Địa chỉ email ".$email." đã tồn tại!";
			// 	}
			// } else $error['email'] = "Địa chỉ email không đúng!";
			//Check name
			if (strlen($name) < 6 )
			{
				$error['name'] = "Tên quá ngắn! Tối thiểu 6 kí tự";
			}
			//Run
			if (!isset($error)&&empty($error))
			{
				$update_info = array(
								'fullname' => $name,
								'avatar' => $avatar,
								'city' => $city,
								'address' => $address,
								'phone' => $phone,
								'about' => $about,
								'birthday' => $birthday,
								'education' => $education,
								//'sex' => $sex,
				);

				$update_training = array(
								'dh_hedaotao' => $dh_hedaotao,
								'dh_noidaotao' => $dh_noidaotao,
								'dh_nganhhoc' => $dh_nganhhoc,
								'dh_nuocdaotao' => $dh_nuocdaotao,
								'dh_namtotnghiep' => $dh_namtotnghiep,
								'dh_bang2' => $dh_bang2,
								'dh_bang2namtotnghiep' => $dh_bang2namtotnghiep,
								'sdh_thacsichuyennganh' => $sdh_thacsichuyennganh,
								'sdh_thacsinamcapbang' => $sdh_thacsinamcapbang,
								'sdh_thacsinoidaotao' => $sdh_thacsinoidaotao,
								'sdh_tiensichuyennganh' => $sdh_tiensichuyennganh,
								'sdh_tiensinamcapbang' => $sdh_tiensinamcapbang,
								'sdh_tiensinoidaotao' => $sdh_tiensinoidaotao,
								'sdh_tiensitenluanan' => $sdh_tiensitenluanan,
								'ngoaingu1' => $ngoaingu1,
								'ngoaingu1_mucdo' => $ngoaingu1_mucdo,
								'ngoaingu2' => $ngoaingu2,
								'ngoaingu2_mucdo' => $ngoaingu2_mucdo,
								'ngoaingu3' => $ngoaingu3,
								'ngoaingu3_mucdo' => $ngoaingu3_mucdo,
								'ngoaingu4' => $ngoaingu4,
								'ngoaingu4_mucdo' => $ngoaingu4_mucdo,
								'chungchi' => $chungchi,
				);
		

				$cok = $this->teacher_model->updateInfo($myuser['id'], $update_info);

				$data_training = $this->teacher_model->getTrainingByUser($myuser['id']);
				if(empty($data_training)){
					$data_training_merge = array_merge(array('uid' => $myuser['id']), $update_training);
					$cok2 = $this->teacher_model->insertUserTraining($data_training_merge);
				}else{
					$cok2 = $this->teacher_model->updateTraining($myuser['id'], $update_training);
				}

				if ($cok && $cok2) {
					$data['message_success'] = "Thay đổi thông tin thành công";
					redirect('profile','refresh');
				}else $data['message_success'] = "Thay đổi thông tin thất bại";
			} else $data['message_error'] = $error;
		}//end isset $_POST['sedit']

		
	}

	function changepass()
	{
		$auth = $this->session->userdata('authentication');
		if (isset($auth)&&!empty($auth))
		{
			$myuser = json_decode($auth,true);
			$data['profile'] = $this->teacher_model->profile($myuser['id']);
			$datateacher['teacher'] = $data['profile'];			
		}

		$data = array();
		//$html = $this->adminlayout->loadTop();
		//$html .= $this->adminlayout->loadMenu();
		if (isset($_POST)&&!empty($_POST)) 
		{
			$old = $this->input->post('oldpass');
			$new = $this->input->post('newpass');
			$repass = $this->input->post('renewpass');
			$isok = $this->teacher_model->checkoldpass($myuser['id'], $old);
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
				$status = $this->teacher_model->changepass($myuser['id'], $new);
				if ($status) $data['message_success'] = "Thay đổi mật khẩu thành công";
				else $data['message_error'] = array('error',"Thay đổi mật khẩu thất bại");
			} else $data['message_error'] = $error;

		}
		$html = $this->tlayout->header($datateacher);
		$html .= $this->load->view('changepass_view',$data,true);		
		$html .= $this->tlayout->footer();	
		//Show Layout
		$this->layout->title('Đổi mật khẩu');
		$this->layout->view($html);
	}

	function upload($name){
		$this->load->library('upload');
	    $config = array(
	        'upload_path' =>'uploads/images/avatar',
	        'allowed_types' => "gif|jpg|png|jpeg",
	        'overwrite' => TRUE,
	        'max_size' => "1024000",
	        'encrypt_name' => true,
	    );
	    $new_name = time().$_FILES[$name]['name'];
	    $config['file_name'] = $new_name;
	    $data = array();
	    $data['success'] = false;
	    $this->upload->initialize($config);
	    if($this->upload->do_upload($name))
	    {
	        $dataUpload = $this->upload->data();
	        $data['upload_data'] = $dataUpload;
	        //$data['urlImg'] = $dataUpload['file_name'];
	        $data['success'] = true;
	    }
	    else
	    {
	        $data['error'] = array('error' => $this->upload->display_errors());
	    }
	    @unlink($_FILES['tmp_name']);
	    //die(json_encode($data));
	    return $data;
    }
}
?>