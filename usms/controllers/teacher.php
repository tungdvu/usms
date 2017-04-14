<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

class Teacher extends MY_Controller{
        private $authentication;
        function __construct(){
            parent::__construct();
            $this->load->library('USMSLayout');

            //$this->load->model('model_teacher');
            // $this->permit->authentication();
            // $site_select = (int)$this->input->post('site_select');
            // $lang_select = $this->input->post('lang_select');
            // if(isset($site_select) && $site_select !=0 && isset($lang_select) && !empty($lang_select)){
            //     $this->session->set_userdata('site_select',$site_select);
            //     $this->session->set_userdata('lang_select',$lang_select);
            //     redirect(curPageURL());
            // }
            
            $this->layout->css('template/global/vendor/datatables-bootstrap/dataTables.bootstrap.css');
            $this->layout->css('template/global/vendor/datatables-fixedheader/dataTables.fixedHeader.css');
            $this->layout->css('template/global/vendor/datatables-responsive/dataTables.responsive.css');
            $this->layout->css('template/assets/examples/css/tables/datatable.css');           
            $this->layout->css('template/global/fonts/font-awesome/font-awesome.css'); 

            $this->layout->js('template/global/vendor/datatables/jquery.dataTables.js');
            $this->layout->js('template/global/js/Plugin/datatables.js');
            $this->layout->js('template/assets/examples/js/tables/datatable.js');
            $this->layout->js('template/assets/examples/js/uikit/icon.js');

        }

        public function index(){
            $this->layout->title('USMS - Danh sách giảng viên');
            $html = $this->usmslayout->loadTop();
            $html .= $this->usmslayout->loadMenu();
            $html .= $this->load->view('backend/teacher/list_teacher',NULL,true);
            $html .= $this->usmslayout->loadFooter('backend/layout/footer');
            $this->layout->view($html);
        }

    }
?>
