<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 20/03/2017
 */

class ScienceUni extends MY_Controller{
        private $authentication;
        function __construct(){
            parent::__construct();
            $this->load->library('USMSLayout');
            $this->load->library('image_CRUD');
            $this->permit->authentication();            
            $this->load->helper(array('form','url'));
            $this->load->library(array('MY_Encrypt','form_validation','session'));    
            $this->load->model(array('model_scienceuni','model_user','model_file','model_department'));
            
            //$user$this->CI->session->userdata('userinfo');

        }

        public function add()
        {
            if(!isset($this->uri->rsegments[3])){
                $current_file = unserialize(base64_decode($this->input->post('current_file')));
                if (!(strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest')) {
                    $this->model_file->delete_files($current_file);
                }
            }

            $this->layout->css('template/global/vendor/formvalidation/formValidation.css');
            $this->layout->css('template/assets/examples/css/forms/validation.css');
            $this->layout->css('template/global/vendor/select2/select2.css');
            $this->layout->css('template/assets/examples/css/forms/layouts.css');
            $this->layout->css('template/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css');
            $this->layout->css('template/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.css');
            $this->layout->css('template/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css');
            $this->layout->css('template/global/vendor/typeahead-js/typeahead.css');
            $this->layout->css('template/assets/examples/css/forms/advanced.css');
            
            $this->layout->js('template/global/vendor/select2/select2.full.min.js');
            $this->layout->js('template/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js');
            $this->layout->js('template/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js');
            $this->layout->js('template/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js');
            $this->layout->js('template/global/vendor/typeahead-js/bloodhound.min.js');
            $this->layout->js('template/global/vendor/typeahead-js/typeahead.jquery.min.js');
            $this->layout->js('template/global/js/Plugin/bootstrap-tagsinput.js');


            // $configRules = array(
   //              array(
   //                  'field' => 'Name',
   //                  'label' => 'Tên bài báo',
   //                  'rules' => 'required',
   //                  //'errors' => array('required' => 'Chưa nhập %s.',
   //                  //),
   //              ),
   //          );
   //          $this->form_validation->set_rules($configRules);


            $this->form_validation->set_rules('Name','Tên bài báo','trim|required');
            $this->form_validation->set_rules('Magazine_Name','Tên báo/tạp chí','trim|required');
            $this->form_validation->set_rules('Magazine_No','Số tạp chí','trim|required');
            $this->form_validation->set_rules('Magazine_Year','Năm','trim|required|');
            $this->form_validation->set_rules('Page_Start','Trang bắt đầu','trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('Page_End','Trang kết thúc','trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('ResearchArea_ID','Lĩnh vực','trim|required');
            $this->form_validation->set_rules('Type_Area','Phạm vi','trim|required');
            $this->form_validation->set_rules('Type','Loại tạp chí','trim|required');
            $this->form_validation->set_rules('Keyword','Từ khóa','trim|required');
            $this->form_validation->set_rules('Summary','Tóm tắt bài báo','trim|required|min_length[50]');


            $this->form_validation->set_message('required','Chưa nhập %s');
            $this->form_validation->set_message('numeric','%s phải là giá trị số');
            $this->form_validation->set_message('min_length','%s phải có tối thiểu %s ký tự');
            $this->form_validation->set_error_delimiters('<li>', '</li>');


            $rules =  array(
                array('')
            );


            
            $authentication = $this->session->userdata('authentication');

            if($this->form_validation->run() == FALSE){
                //$error = json_encode(validation_errors()) ;
                //$this->session->set_flashdata('msg_error', $error);
            }else{
                //check exist author
                $author = $this->input->post('User_ID');
                $relate_author = $this->input->post('UserJoin_ID');

                if(in_array($author,$relate_author)){
                    $this->session->set_flashdata('msg_error','Chủ nhiệm đề tài và người tham gia không được trùng nhau.');
                    redirect('/ScienceUni/add');
                }else{
                    $user = json_decode($authentication,TRUE);
                    $data = array(
                        'Name' => $this->input->post('Name'),
                        'Magazine_Name' => $this->input->post('Magazine_Name'),
                        'Magazine_No' => $this->input->post('Magazine_No'),
                        'Magazine_Year' => $this->input->post('Magazine_Year'),
                        'Type' => $this->input->post('Type'),
                        'ResearchArea_ID' => $this->input->post('ResearchArea_ID'),
                        'Type_Area' => $this->input->post('Type_Area'),
                        'Page_Start' => $this->input->post('Page_Start'),
                        'Page_End' => $this->input->post('Page_End'),
                        'Branch' => $this->input->post('Branch'),
                        'Keyword' => $this->input->post('Keyword'),
                        'User_ID' => $this->input->post('User_ID'),
                        //'User_Relate_ID' => $this->input->post('User_Relate_ID'),
                        'Project_ID' => $this->input->post('Project_ID'),
                        'Summary' => $this->input->post('Summary'),
                        'Created_Date' => date('Y-m-d H:i:s'),
                        'Created_User' => $user['User_ID'],
                    );
                    var_dump($data);die;
                    $flag = $this->model_magazine->addMagazine($data,$current_file);
                    if($flag){
                        $this->session->set_flashdata('msg_success','Thành công');
                        redirect('/Magazine/add');                    
                    }

                }               
            }
            $data['users'] = $this->model_user->totalUser();
            $data['departments'] = $this->model_department->getRootDepartment();

            //var_dump($data['departments']);
           // $data['research_area'] = $this->model_magazine->getReasearchArea(array('ID','Name'));


            $image_crud = new image_CRUD();
            $image_crud->set_url_field('Filename');
            $image_crud->set_primary_key_field('ID');
            $image_crud->set_type_feild('Type');
            $image_crud->set_type_feild_value('file');
            $image_crud->set_status_feild('F_ID');
            $image_crud->set_status_value(0);
            $image_crud->set_library_view_file('list_file.php');
            $image_crud->set_photo_where(array('F_ID'=>0));
            $image_crud->set_table('s_files')
            ->set_image_path('uploads/attachments');                
            $output = $image_crud->render();
            $data['output'] = $output->output;
            $data['js_files'] = $output->js_files;
            $data['css_files'] = $output->css_files;

            $html = $this->usmslayout->loadTop();
            $html .= $this->usmslayout->loadMenu();
            $html .= $this->load->view('backend/science_uni/add',isset($data)?$data:"",TRUE);
            $html .= $this->usmslayout->loadFooter('backend/layout/footer');
            $this->layout->title('USMS - Nhập dữ liệu bài báo');            
            $this->layout->view($html);
        }



}