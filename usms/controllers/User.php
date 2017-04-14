<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 01/12/2016
 */

class User extends MY_Controller{
    private $authentication;
    function __construct(){
        parent::__construct();
        $this->load->library('USMSLayout');
        $this->permit->authentication();            
        $this->load->helper(array('form','url'));
        $this->load->library('MY_Encrypt');					
        $this->load->model('model_user');
        $this->load->model('model_department');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
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
        $this->layout->js('template/global/js/Plugin/dataTables.buttons.min.js');
        $this->layout->js('template/global/js/Plugin/jszip.min.js');
        $this->layout->js('template/global/js/Plugin/pdfmake.min.js');
        $this->layout->js('template/global/js/Plugin/vfs_fonts.js');
        $this->layout->js('template/global/js/Plugin/buttons.html5.min.js');

        $users = $this->model_user->getUser();
        $data['users'] = $users;

        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/user/list_user',isset($data)?$data:"",true);
        $html .= $this->usmslayout->loadFooter('backend/layout/footer');
        $this->layout->title('USMS - Quản lý người dùng');
        $this->layout->view($html);        
    }

    public function edit($id)
    {

        $this->layout->css('template/global/vendor/formvalidation/formValidation.css');
        $this->layout->css('template/assets/examples/css/forms/validation.css');
        $this->layout->css('template/global/vendor/select2/select2.css');
        $this->layout->css('template/assets/examples/css/forms/layouts.css');
        $this->layout->js('template/global/vendor/select2/select2.full.min.js');
        $this->layout->css('template/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css');
        $this->layout->js('template/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js');

        if($this->uri->total_segments() < 3){
            redirect('/User');
        }else{
            $id = $this->encrypt->decode($this->uri->segment(3));
        }
        
        $data_user = $this->model_user->getUserById($id);
        $data_branch = $this->model_user->getBranch();
        $data_department = $this->model_department->getRootDepartment();
        $data_position = $this->model_user->getPosition();

        $data['user'] = $data_user;
        $data['branchs'] = $data_branch;
        $data['departments'] = $data_department; 
        $data['positions'] = $data_position;

        $this->form_validation->set_rules('name','Họ tên','trim|required');
        $this->form_validation->set_rules('education','Học hàm học vị','trim|required');
        //$this->form_validation->set_rules('type_department','Type Department','trim|required');
        $birth = $this->input->post('birthday');
        if($this->form_validation->run()){
            $data = array(
                'Name' => $this->input->post('name'),
                'Sex' => $this->input->post('sex'),
                'Birthday' => date('Y-m-d',strtotime($birth)) ,
                'Email' => $this->input->post('email'),
                'Phone' => $this->input->post('phone'),
                'Address' => $this->input->post('address'),
                'Education' => $this->input->post('education'),
                'Position_ID' => $this->input->post('position'),
                'Organization' => $this->input->post('organization'),
                'Department_ID' => $this->input->post('department'),
                'Place_ID' => $this->input->post('place'),
            );
            //var_dump($data);die;
            $flag = $this->model_user->updateUser($id,$data);
            if($flag){
                $this->session->set_flashdata('msg_success', 'Cập nhật dữ liệu thành công!');
                redirect('/User');
            }else{
                $this->session->set_flashdata('msg_error', 'Không thể cập nhật dữ liệu!');
                redirect('/User');
            }    

        }            
        $this->form_validation->set_error_delimiters('<ul><li>','</li></ul>');//style lại lỗi input form

        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/user/edit_user',isset($data)?$data:"",TRUE);
        $this->layout->title('USMS -Sửa người dùng');           
        $this->layout->view($html);         
    }

    public function ajax_GetUserBirthday()
    {
        $id = $this->input->post('id');
        if($id != ""){
            $data = $this->model_user->GetUserInfo($id);
            echo date("d-m-Y", strtotime($data)) ;
        }
    }

    public function delete($id)
    {
        $this->model_user->deleteUser($id);
        $this->session->set_flashdata('msg_success','Xóa Người dùng thành công.');
        redirect('/User');           
    }
    

}