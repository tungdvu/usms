<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

class Department extends MY_Controller{
        private $authentication;
        function __construct(){
            parent::__construct();
            $this->load->library('USMSLayout');
            $this->permit->authentication();            
            $this->load->helper(array('form','url'));
            $this->load->library('MY_Encrypt');					
            $this->load->model('model_department');
            $this->load->library('form_validation');

        }

        public function index(){

        	//load css js			
			$this->layout->css('template/global/vendor/datatables-bootstrap/dataTables.bootstrap.css');
			$this->layout->css('template/assets/examples/css/tables/datatable.css');
			$this->layout->css('template/global/fonts/font-awesome/font-awesome.css');
			// ///<!-- Plugins -->
			$this->layout->js('template/global/vendor/datatables/jquery.dataTables.js');
			$this->layout->js('template/global/vendor/datatables-bootstrap/dataTables.bootstrap.js');
			// //<!-- Page -->
			$this->layout->js('template/global/js/Plugin/datatables.js');
			$this->layout->js('template/assets/examples/js/tables/datatable.js');         	
        	
        	//get all department
        	$departments = $this->model_department->getDepartment(array('id','name'));
    		$data['departments'] = $departments;
            $data['active'] = array('department','Department/index');
    		//var_dump($departments);die;

            $html = $this->usmslayout->loadTop();
            //$html .= $this->usmslayout->loadMenu();
            $html .= $this->usmslayout->loadMenu($current = 'treeview', $viewFile = 'backend/layout/menu_left',  $data);
            $html .= $this->load->view('backend/department/list_department',isset($data)?$data:"",true);
            $html .= $this->usmslayout->loadFooter('backend/layout/footer');
            $this->layout->title('USMS - Quản lý đơn vị');
            $this->layout->view($html);
        }

        public function add()
        {
        	       	
		  	$this->layout->css('template/global/vendor/formvalidation/formValidation.css');
		    $this->layout->css('template/assets/examples/css/forms/validation.css');
			$this->layout->css('template/global/vendor/select2/select2.css');
			$this->layout->js('template/global/vendor/select2/select2.full.min.js');

			$this->form_validation->set_rules('name','Tên đơn vị','trim|required');
			$this->form_validation->set_rules('s_department','Đơn vị cấp trên','trim|required');
			$this->form_validation->set_rules('type_department','Kiểu đơn vị','trim|required');

			if($this->form_validation->run()){
				$data = array(
					'Name' => $this->input->post('name'),
					'Parent_ID' => $this->input->post('s_department'),
					'Key' => $this->input->post('type_department'),
				);
				$flag = $this->model_department->addDepartment($data);
				$this->session->set_flashdata('msg_success','Thêm đơn vị thành công.');
				redirect ('/department');
			}

        	//get all department
        	$departments = $this->model_department->totalDepartment(array('id','name'));
    		$data['departments'] = $departments;

            $html = $this->usmslayout->loadTop();
            $html .= $this->usmslayout->loadMenu();
        	$html .= $this->load->view('backend/department/add_department',isset($data)?$data:"",TRUE);
            $this->layout->title('USMS - Thêm mới đơn vị');        	
        	$this->layout->view($html);
        }

        public function edit($id)
        {

		  	$this->layout->css('template/global/vendor/formvalidation/formValidation.css');
		    $this->layout->css('template/assets/examples/css/forms/validation.css');
			$this->layout->css('template/global/vendor/select2/select2.css');
			$this->layout->js('template/global/vendor/select2/select2.full.min.js');

			$this->form_validation->set_rules('name','Department Name','trim|required');
			$this->form_validation->set_rules('s_department','Superior Department','trim|required');
			$this->form_validation->set_rules('type_department','Type Department','trim|required');

        	if($this->uri->total_segments() < 3){
        		redirect('/Department');
        	}else{
        		$id = $this->encrypt->decode($this->uri->segment(3));
        	}
        	
        	$dep = $this->model_department->getDepartmentById($id);
        	if(isset($dep) && !empty($dep)){
        		$data['dep'] = $dep;
        	}else{
        		redirect('/Department');
        	}
        	
        	$alldep = $this->model_department->getRootDepartment();
    		$data['alldep'] = $alldep;

    		$key = $this->model_department->getKeyDepartment();
    		$data['key'] = $key;

    		if($this->form_validation->run()) {
    			$data = array(
    				'Name' => $this->input->post('name'),
    				'Parent_ID' => $this->input->post('s_department'),
    				'Key' => $this->input->post('type_department')
				);
				//var_dump($data);die;
				$flag = $this->model_department->updateDepartment($id,$data);
				if($flag){
					$this->session->set_flashdata('msg_success','Cập nhật thành công.');
					redirect('/Department');
				}else{
					$this->session->set_flashdata('msg_error','Lỗi! Không cập nhật được dữ liệu.');
				}
    		}

            $html = $this->usmslayout->loadTop();
            $html .= $this->usmslayout->loadMenu();
        	$html .= $this->load->view('backend/department/edit_department',isset($data)?$data:"",TRUE);
            $this->layout->title('USMS -Sửa đơn vị');        	
        	$this->layout->view($html);        	
        }

        function delete($id)
        {
            $count_child = $this->model_department->getChildDepartment($id);
            //var_dump($count_child);die;
        	if($count_child == TRUE){
        		$this->session->set_flashdata('msg_error','Không thể xóa Đơn vị cấp trên.');
        		redirect('/Department');
        	}else{
        		$this->model_department->deleteDepartment($id);
        		$this->session->set_flashdata('msg_success','Xóa Đơn vị thành công.');
        		redirect('/Department');
        	}        	
        }

        function user()//lay user tu host de import
        {
        	$users = $this->model_department->user();
        	$data['users'] = $users;
        	$html = $this->load->view('backend/department/user',$data);
        	$this->layout->view($html);  
        }

    }
?>
