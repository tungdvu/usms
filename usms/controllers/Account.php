<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 02/12/2016
 */

class Account extends MY_Controller{
    private $authentication;
    function __construct(){
        parent::__construct();
        $this->load->library('USMSLayout');
        $this->permit->authentication();            
        $this->load->helper(array('form','url'));
        $this->load->library('MY_Encrypt');					
        $this->load->model('model_account');
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
            

        $accounts = $this->model_account->getAccount();
        $data['accounts'] = $accounts;

        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/account/list_account',isset($data)?$data:"",true);
        $html .= $this->usmslayout->loadFooter('backend/layout/footer');
        $this->layout->title('USMS - Quản lý người dùng');
        $this->layout->view($html);        
    }

    public function add()
    {

        $users = $this->model_user->getUser();
        $data['users'] = $users;

        $this->form_validation->set_rules('username','Tên tài khoản','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('user','Tên giảng viên','trim|required');
        $this->form_validation->set_rules('status','Trạng thái','trim|required');
        $this->form_validation->set_rules('date_issue','Ngày hiệu lực','trim|required');

        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $userID = $this->input->post('user');
            //kiem tra xem da ton tai tai khoan hay chua
            $data_username = $this->model_account->totalAccount('username',$username);
            $data_email = $this->model_account->totalAccount('email',$email);
            $data_userID = $this->model_account->totalAccount('User_ID',$userID);
            //var_dump($data_account);die;
            if($data_username == TRUE){
                $error[] = "Tên tài khoản đã tồn tại trên hệ thống.";
            }
            if($data_email == TRUE){
                $error[] = "Email đã tồn tại trên hệ thống.";
            }
            if($data_userID == TRUE){
                $error[] = "Giảng viên này đã có tài khoản trên hệ thống.";
            }

            if($data_username == FALSE && $data_email == FALSE && $data_userID == FALSE){
                $data = array(
                    'Username' => $username,
                    'Email' => $email,
                    'User_ID' => $userID,
                    'Status' => $this->input->post('status'),
                    'Date_Issued' => $this->input->post('date_issue'),
                    'Created_Date' =>  date('Y-m-d H:i:s',time())
                );
                $flag = $this->model_account->insertAccount($data);
                if($flag){
                    $this->session->set_flashdata('msg_success', 'Thêm tài khoản thành công.');
                    redirect('/Account');
                }else{
                    $error[] = "Không thêm được tài khoản";
                }
            }else{
                var_dump($error) ;die;
                $this->session->set_flashdata('msg_error',$error);
                redirect('/Account/add');
            }
        }        
        $this->form_validation->set_error_delimiters('<li>','</li>');//style lại lỗi input form
        
        $this->layout->css('template/global/vendor/formvalidation/formValidation.css');
        $this->layout->css('template/assets/examples/css/forms/validation.css');
        $this->layout->css('template/global/vendor/select2/select2.css');
        $this->layout->js('template/global/vendor/select2/select2.full.min.js');
        $this->layout->css('template/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css');
        $this->layout->js('template/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js');

        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/account/add_account',isset($data)?$data:"",TRUE);
        $this->layout->title('USMS - Thêm tài khoản');           
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
            redirect('/Account');
        }else{
            $id = $this->encrypt->decode($this->uri->segment(3));
        }
        
        $data['account'] = $this->model_account->getAccountById($id);
        $data['users'] = $this->model_user->getUser();
        //var_dump($data['account']);die;

        $this->form_validation->set_rules('username','Tên tài khoản','trim|required');
        //$this->form_validation->set_rules('education','Học hàm học vị','trim|required');
        //$this->form_validation->set_rules('type_department','Type Department','trim|required');
        $birth = $this->input->post('birthday');
        if($this->form_validation->run()){
            $username = $this->input->post('username');
            var_dump($username);die;
            $email = $this->input->post('email');
            $userID = $this->input->post('user');
            $data = array(
                'Username' => $username,
                'Email' => $email,
                'User_ID' => $this->input->post('user'),
                'Status' => $this->input->post('status'),
                'Date_Issued' => $this->input->post('date_issue'),
                'Group_ID' => $this->input->post('group'),
                'Modified_Date' =>  date('Y-m-d H:i:s',time())
            );
            var_dump($username);die;
            $flag = $this->model_user->updateUser($id,$data);
            if($flag){
                $this->session->set_flashdata('msg_success', 'Cập nhật dữ liệu thành công!');
                redirect('/Account');
            }else{
                $this->session->set_flashdata('msg_error', 'Không thể cập nhật dữ liệu!');
                redirect('/Account');
            }    

        }            
        $this->form_validation->set_error_delimiters('<li>','</li>');

        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/account/edit_account',isset($data)?$data:"",TRUE);
        $this->layout->title('USMS - Cập nhật tài khoản');           
        $this->layout->view($html);         
    }

    public function delete($id)
    {
        $this->model_account->deleteAccount($id);
        $this->session->set_flashdata('msg_success','Xóa tài khoản thành công.');
        redirect('/Account');         
    }

    public function group()
    {
        
        $groups = $this->model_account->getGroupAccount();
        $data['groups'] = $groups;

        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/account/group_account',isset($data)?$data:"",TRUE);
        $this->layout->title('USMS - Quản lý nhóm tài khoản');           
        $this->layout->view($html);          
    }        

}