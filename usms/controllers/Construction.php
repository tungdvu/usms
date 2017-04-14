<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 11/12/2016
 */

class Construction extends MY_Controller{
        function __construct(){
            parent::__construct();
            $this->load->library('USMSLayout');
            //$user$this->CI->session->userdata('userinfo');
        }

        public function index(){
                $this->layout->css('template/assets/examples/css/pages/maintenance.css');

            $html = $this->usmslayout->loadTop();
            $html .= $this->usmslayout->loadMenu();
            $html .= $this->load->view('backend/layout/underconstruction',isset($data)?$data:"",true);
            $html .= $this->usmslayout->loadFooter('backend/layout/footer');
            $this->layout->title('USMS - Chức năng đang phát triển');
            $this->layout->view($html);
        }
}